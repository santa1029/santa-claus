<?php

namespace App\Http\Controllers;

/// use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Alert;
use App\Models\Timing;
use App\Models\Slcheck;
use App\Models\Riskcheck;
use App\Models\Stoploss;
use App\Models\Order;               /// table MT4_TRADES
use App\Models\Mt4account;          /// table MT4_USERS
use Illuminate\Support\Facades\Session;
use App\Mail\RiskInfraction;
use App\Mail\SLInfraction;
use Illuminate\Support\Facades\Mail;
use App\Http\Traits\DrawDown;
use Carbon\Carbon;

class TradeController extends Controller
{

    use DrawDown;

    public function updateMt4trade()
    {

        $timing = Timing::first();

        if (Order::where('TIMESTAMP', '>', $timing->timestamp)->where('CMD', '<', 2)->doesntExist()) return response('no orders to process', 200);


        $orders = Order::where('TIMESTAMP', '>', $timing->timestamp)->where('CMD', '<', 2)->get();

        $no_of_opened = 0;
        $no_of_closed = 0;

        foreach ($orders as $order) {

            if ($order->OPEN_TIME > $timing->opentrade) {                                                               /// position opened
                $ok = $this->check_sl($order);
                if ($ok) $this->check_risk($order);
                $no_of_opened++;
            }

            $zerotime = Carbon::parse('2000/01/01 00:00:00');
            if ($order->CLOSE_TIME > $zerotime) {                                                                       /// position closed
                $this->check_max_high($order);
                $this->check_sl_on_close($order);
                $no_of_closed++;
            }
        }

        $timing->timestamp = $orders->max('TIMESTAMP');
        $timing->opentrade = $orders->max('OPEN_TIME');
        $timing->save();

        $response = 'Processed: Opened: ' . $no_of_opened . ' + Closed: ' . $no_of_closed;

        return response($response, 200);

    }




    public function check_max_high($order) {

        $account = Account::where('mt4_account', $order->LOGIN)->first();

        $current_balance = Mt4account::where('LOGIN', $order->LOGIN)->value('BALANCE');

        if($current_balance > $account->max_high) {
            $account->max_high = $current_balance;
            $account->dd_level = dd_level($account);
            $account->save();
        }

        return;
    }

    public function check_sl($order) {

        if($order->SL == 0) {
            $this->No_SL_Infraction($order);
            return(False);
        }

        Stoploss::create([
            'ticket' => $order->TICKET,
            'initial_sl' => $order->SL,
            'initial_sl_value' => $this->risk_of_trade($order),
        ]);

        return(true);
    }


    public function check_risk($order) {

        if ($this->remaining_risk($order->LOGIN) < 0) $this->Too_Much_Risk_Infraction($order);                          /// TRAIT remaining_risk in DrawDown

        return;
        }


    public function check_sl_on_close($order) {

            if($order->SL == 0) $this->soft_breach_SL($order,'close');

            return;
            }


    public function No_SL_Infraction($order) {

        $account = Account::where('mt4_account', $order->LOGIN)->first();

        if ((is_null($account->sl_breach_expiration)) or ($account->sl_breach_expiration < now())) {

            $account->sl_breach_expiration = Carbon::now()->addMinutes(10);
            $account->save();

            $email = $account->user->email;

            $mailData = [
                'name' => $account->user->name,
                'account_number' => $order->LOGIN,
                'order_number' => $order->TICKET,
            ];

            Mail::to($email)->send(new SLInfraction($mailData));

            Alert::create([
                    'user_id' => $account->user_id,
                    'account' => $order->LOGIN,
                    'alert_short' => $order->LOGIN . ' - ' . $order->TICKET . ': No SL',
                    'alert_long' => 'Account ' . $order->LOGIN . ' - Ticket ' . $order->TICKET . ' has no SL. 10 minute grace period activated. Make sure to place SL on each trade.',
                    'softbreach' => false,
                    'hardbreach' => false,
                    'seen' => false,
            ]);

            }

        Slcheck::create([
            'ticket' => $order->TICKET,
            'timelimit' => Carbon::now()->addMinutes(10),
        ]);

        return;
    }

    public function Too_Much_Risk_Infraction($order) {

                                                                                                                        /// Too Much Risk Infraction
        $account = Account::where('mt4_account',$order->LOGIN)->first();

        if ((is_null($account->risk_breach_expiration)) or ($account->risk_breach_expiration < now())) {

            $account->risk_breach_expiration = Carbon::now()->addMinutes(10);
            $account->save();

            $email = $account->user->email;

            $mailData = [
                'name' => $account->user->name,
                'account_number' => $order->LOGIN,
                'order_number' => $order->TICKET,
            ];

            Mail::to($email)->send(new RiskInfraction($mailData));

            Alert::create([
                'user_id' => $account->user_id,
                'account' => $order->LOGIN,
                'alert_short' => $order->LOGIN . ' is using too much risk',
                'alert_long' => 'Account ' . $order->LOGIN . ' is using too much risk. 10 minute grace period activated. Adjust risk to below available risk.',
                'softbreach' => false,
                'hardbreach' => false,
                'seen' => false,
            ]);

        }

        Riskcheck::create([
            'ticket' => $order->TICKET,
            'timelimit' => Carbon::now()->addMinutes(10),
            'mt4_account' => $account->mt4_account,
        ]);

        return;
    }



}
