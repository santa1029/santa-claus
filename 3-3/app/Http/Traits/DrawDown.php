<?php

namespace App\Http\Traits;

use App\Models\Account;
use App\Models\Timing;
use App\Models\Condition;
use App\Models\Order;               /// table MT4_TRADES
use App\Models\Mt4account;          /// table MT4_USERS
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Traits\Orders_for_account;


Trait DrawDown {

    use Orders_for_account;

    public function current_risk($mt4_account) {

        $total_risk = 0.000;

        $open_trades = $this->open_orders_for_account($mt4_account);

        foreach($open_trades as $open_trade) {

            $total_risk += $this->risk_of_trade($open_trade);

        }

        return($total_risk);

        }

    public function total_available_risk($mt4_account) {

        $account = Account::where('mt4_account', $mt4_account)->first();

        $dd_level = $this->dd_level($account);

        $balance = Mt4account::where('LOGIN', $account->mt4_account)->value('BALANCE');

        $total_available_risk = $balance - $dd_level;

        return($total_available_risk);

    }

    public function remaining_risk($mt4_account) {

        $total_available_risk = $this->total_available_risk($mt4_account);
        $current_risk = $this->current_risk($mt4_account);

        return($total_available_risk - $current_risk);

    }

    public function dd_level($account) {

        $conditions = Condition::where('conditions', $account->conditions)->first();

        if($account->stage == 1) $dd_percentage = $conditions->dd_percentage1;
        else $dd_percentage = $conditions->dd_percentage2;

        $dd_level = $account->max_high * (1 - $dd_percentage / 100);

        if(($account->stage > 1) and ($dd_level > $account->size)) $dd_level = $account->size;

        return($dd_level);

    }

    public function risk_of_trade($order) {

        $contractsize = $this->contractsize($order->SYMBOL);

        $diff = 0.0;
        if ($order->CMD == 0) $diff = $order->OPEN_PRICE - $order->SL;
        if ($order->CMD == 1) $diff = $order->SL - $order->OPEN_PRICE;


        $conv_rate = $order->CONV_RATE1;
        if ((str_ends_with($order->SYMBOL, 's')) && substr($order->SYMBOL, 3, 3) == 'USD') $conv_rate = 1;

        $risk = $diff * $contractsize * $order->VOLUME / 100 * $conv_rate;

        return($risk);
    }


    Public function contractsize($symbol) {

        if (str_ends_with($symbol, 's')) $contractsize = 100000;
        elseif(Str::contains('BTCUSD.p ETHUSD.p BCHUSD.p USTUSD.p', $symbol)) $contractsize = 1;
        elseif(Str::contains('LTCUSD.p LNKUSD.p', $symbol)) $contractsize = 10;
        elseif(Str::contains('XRPUSD.p ', $symbol)) $contractsize = 10000;
        elseif(Str::contains('EOSUSD.p ', $symbol)) $contractsize = 100;
        elseif(Str::contains('BREUSD.p WTIUSD.p', $symbol)) $contractsize = 100;
        else $contractsize = 1;

        return($contractsize);

    }



}






