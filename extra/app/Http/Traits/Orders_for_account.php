<?php

namespace App\Http\Traits;


use App\Models\Order;


/// table MT4_TRADES



Trait Orders_for_account
{

    public function open_orders_for_account($mt4_account)
    {

        $orders = Order::where('LOGIN', $mt4_account)->where('CONV_RATE2', 0)->where('CMD', '<', 2)->get();


        return ($orders);

    }

    public function all_orders_for_account($mt4_account)
    {

        $orders = Order::where('LOGIN', $mt4_account)->get();

        return ($orders);

    }

    public function pending_orders_for_account($mt4_account)
    {

        $orders = Order::where('LOGIN', $mt4_account)->where('CLOSE_TIME', 0)->where('CMD', '>', 1)->where('CMD', '<', 6)->get();

        return ($orders);

    }

    public function closed_orders_for_account($mt4_account)
    {

        $orders = Order::where('LOGIN', $mt4_account)->where('CLOSE_TIME', '<', 0)->where('CMD', '<', 2)->get();

        return ($orders);

    }

}


