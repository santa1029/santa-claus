<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Traits\Disqualify;
use App\Models\Account;
use App\Models\User;
use App\Models\Mt4account;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class PeriodicCheckDD extends Command
{

    use Disqualify;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkdd:periodic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check DrawDown';

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
        Log::debug('Start DD Check - ', ['start time' => now()]);

        $accounts = Account::where('active', '1')->get();

        $no_of_accounts = $accounts->count();
        $current_account_no = 1;

        foreach ($accounts as $account) {

            $stop_out = [];

            $mt4_account = Mt4account::where('LOGIN',$account->mt4_account)->first();

            if ($mt4_account->EQUITY < $account->dd_level) {
                $stop_out['time_of'] = now();
                $stop_out['type'] = 'E';
                $stop_out['amount'] = $mt4_account->EQUITY;
                $this->disqualify_account($stop_out, $account);
            }

            if ($mt4_account->BALANCE < $account->dd_level) {
                $stop_out['time_of'] = now();
                $stop_out['type'] = 'B';
                $stop_out['amount'] = $mt4_account->BALANCE;
                $this->disqualify_account($stop_out, $account);
            }
        }
        Log::debug('End DD Check - ', ['end time' => now()]);
    }


}
