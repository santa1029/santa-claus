<?php

namespace App\Http\Traits;

use App\Models\Account;
use App\Models\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\Softbreached;


Trait Softbreach
{
    public function softbreach($account, $ticket, $type)
    {
        $email = $account->user()->email;

        switch ($type) {
            case 'SL':
                $mailData = [
                    'type' => $type,
                    'time_of' => now(),
                    'reason' => 'no Stop Loss on order ' . $ticket->ticket,
                    'ticket' => $ticket->ticket,
                    'time_limit' => $ticket->timelimit,
                    'name' => $account->user()->name,
                    'account_number' => $account->mt4_account,
                    ];
                break;
            case "SLC":
                $mailData = [
                    'time_of' => now(),
                    'reason' => 'no Stop Loss at time of closing of order ' . $ticket->ticket,
                    'ticket' => $ticket->ticket,
                    'name' => $account->user()->name,
                    'account_number' => $account->mt4_account,
                    'type' => 'SLC',
                ];
                break;
            case "RISK":
                $mailData = [
                    'time_of' => now(),
                    'reason' => 'you are taking too much risk ',
                    'time_limit' => $ticket->timelimit,
                    'name' => $account->user()->name,
                    'account_number' => $account->mt4_account,
                    'type' => 'RISK',
                ];
                break;
        }

        Mail::to($email)->bcc('disqualified@proppers.io')->send(new Softbreached($mailData));

        Alert:create([
        'user_id' => $account->user()->id,
        'account' => $account->mt4_account,
        'alert_short' => $account->mt4_account . ' soft breach',
        'alert_long' => 'Account ' . $account->mt4_account . 'soft breach recorded - reason: ' . $mailData['reason'],
        'soft_breach' => true,
    ]);

    }
}
