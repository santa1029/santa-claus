<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Traits\Close_orders;
use App\Models\Account;
use App\Models\User;
use App\Mail\EndOfTrial;
use Illuminate\Support\Facades\Mail;
use View;

class EndTrial extends Command
{
    use Close_orders;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'endtrial:daily';

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
        $accounts = Account::where('active', true)->where('trial', true)->where( 'created_at', '<', now()->subDays(10))->get();

        foreach ($accounts as $account) {

            $account->active = false;
            $account->save();

            $email = $account->user()->email;

            $mailData = [
                'name' => $account->user()->name,
                'account_number' => $account->mt4_account,
                'created_at' => $account->created_at,
                ];

            Mail::to($email)->bcc('trials@proppers.io')->send(new EndOfTrial($mailData));

            $this->close_orders($account->mt4_account, $account->mt4_password, null);

            $this->disable_account($account->mt4_account);

        }


        return;
    }
}
