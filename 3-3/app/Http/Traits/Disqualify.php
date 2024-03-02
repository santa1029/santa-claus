<?php

namespace App\Http\Traits;

use App\Models\Account;
use App\Models\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Traits\Close_orders;
use App\Mail\Disqualified;
use Illuminate\Support\Facades\Mail;



Trait Disqualify
{

    use Orders_for_account;

    public function disqualify_account($stop_out, $account)
    {

        $result = $this->close_orders($account->mt4_account, $account->mt4_password, null);
        $result = $this->disable_account($account->mt4_account);

        $account->active = false;
        if ($stop_out->type == 'E') $account->reason_close = 'your equity of $' . number_format($stop_out->amount, 2) .' was below your Max Drawdown of $' . number_format($account->dd_level,2) . ', resulting in a disqualification.';
        if ($stop_out->type == 'B') $account->reason_close = 'your balance of $' . number_format($stop_out->amount, 2) .' was below your Max Drawdown of $' . number_format($account->dd_level,2) . ', resulting in a disqualification.';
        if ($stop_out->type == 'S') $account->reason_close = 'you did not place a SL on order ' . $stop_out->ticket .' after being reminded, and given a grace period which ended at ' . $stop_out->limit . '. This is the 3rd soft-breach on this account, resulting in an automatic disqualification.';
        if ($stop_out->type == 'R') $account->reason_close = 'you did not lower the risk on account ' . $account->mt4_account .' after being reminded, and given a grace period which ended at ' . $stop_out->limit . '. This is the 3rd soft-breach on this account, resulting in an automatic disqualification.';
        $account->save();

        $email = $account->user()->email;

        $accounttype['trial'] = false;
        $accounttype['assessment'] = false;
        $accounttype['edu'] = false;

        switch($account->package) {
            case 'Bronze':
                $accounttype['assessment'] = true;
                $accounttype['name'] = 'Bronze Assessment';
                break;
            case 'Silver':
                $accounttype['assessment'] = true;
                $accounttype['name'] = 'Silver Assessment';
                break;
            case 'Gold':
                $accounttype['assessment'] = true;
                $accounttype['name'] = 'Gold Assessment';
                break;
            case 'Diamond':
                $accounttype['assessment'] = true;
                $accounttype['name'] = 'Diamond Assessment';
                break;
            case 'Trial':
                $accounttype['trial'] = true;
                $accounttype['name'] = 'Trial';
                break;
            case 'Edu':
                $accounttype['edu'] = true;
                $accounttype['name'] = 'Edu';
                break;
        }

        $mailData = [
            'name' => $account->user()->name,
            'account_number' => $account->mt4_account,
            'reason' => $account->reason_close,
            'accounttypeName' => $accounttype['name'],
            'accounttypeAss' => $accounttype['assessment'],
            'accounttypeEdu' => $accounttype['edu'],
            'accounttypeTrial' => $accounttype['edu'],
            'time_of' => $stop_out->time_of,
        ];

        Mail::to($email)->bcc('disqualified@proppers.io')->send(new Disqualified($mailData));

        Alert:create([
            'user_id' => $account->user()->id,
            'account' => $account->mt4_account,
            'alert_short' => $account->mt4_account . ' Disabled - Disqualified',
            'alert_long' => 'Account ' . $account->mt4_account . 'Hard Breach: ' . $account->reason_close,
            'hard_breach' => true,
            ]);

    }


}
