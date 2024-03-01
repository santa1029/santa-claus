<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Traits\Disqualify;
use App\Http\Traits\Softbreach;
use App\Http\Traits\DrawDown;
use App\Models\Account;
use App\Models\User;
use App\Models\Mt4account;
use App\Model\Riskcheck;
use App\Model\Slcheck;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class PeriodicCheckSB extends Command
{

    use Disqualify;
    use Softbreach;
    use DrawDown;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checksb:periodic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for Soft Breach';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::debug('Start SoftBreach Check - ', ['start time' => now()]);

        $tickets = Slcheck::where('timelimit', '<', now())->get();

        foreach ($tickets as $ticket) {

            $mt4_account = Mt4account::where('TICKET', $ticket->ticket)->first();

            if ($mt4_account->SL = 0) {
                $account = Account::where('mt4_account', $mt4_account->LOGIN)->first();
                $account->soft_breaches++;
                if ($account->soft_breaches > 2) $this->hardbreach_sl($account, $ticket);
                else $this->softbreach($account, $ticket, 'SL');
            }
            $ticket->delete();
        }


        $risks = Riskcheck::where('timelimit', '<', now())->get();

        foreach ($risks as $risk) {

            $available_risk = remaining_risk($risk->mt4_account);

            if ($available_risk < 0) {
                $account = Account::where('mt4_account', $risk->mt4_account)->first();
                $account->soft_breaches++;
                if ($account->soft_breaches > 2) $this->hardbreach_risk($account, $risk);
                else $this->softbreach($account, $risk, 'RISK');
            }
            $risk->delete();
        }

        Log::debug('End SoftBreach Check - ', ['end time' => now()]);
    }

    public function hardbreach_sl($account, $ticket) {

        $stop_out['time_of'] = now();
        $stop_out['type'] = 'S';
        $stop_out['ticket'] = $ticket->ticket;
        $stop_out['time_limit'] = $ticket->timelimit;
        $this->disqualify_account($stop_out, $account);

        return;
    }

    public function hardbreach_risk($account, $risk) {

        $stop_out['time_of'] = now();
        $stop_out['type'] = 'R';
        $stop_out['ticket'] = $risk->ticket;
        $stop_out['time_limit'] = $risk->timelimit;
        $this->disqualify_account($stop_out, $account);

        return;
    }

}
