<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Account;
use App\Models\Dailybalance;
use App\Models\Mt4account;

class GetDailyBalances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getbalances:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $accounts = Account::where('active', true)->get();

        foreach ($accounts as $account) {

            $rs_user  = Mt4account::where('LOGIN', $account->mt4_account);

            $balance = $rs_user->BALANCE;

            Dailybalance::create([
               'account_id' => $account->id,
               'dailybalance' => $balance,
            ]);

        }
        
        return;
    }
}
