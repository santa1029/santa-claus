<?php

namespace App\Http\Traits;


Trait Close_orders {

    public function close_orders($mt4_account, $mt4_password, $ticket) {

        $ch = curl_init();
        if(is_null($ticket)) {
            curl_setopt($ch, CURLOPT_URL, 'http://192.248.154.98:9508/Proppers/api/order/closeAll?login=' . $mt4_account . '&password=' . $mt4_password);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'accept' => '*/*',]);
        }
        else {
            curl_setopt($ch, CURLOPT_URL, 'http://192.248.154.98:9508/Proppers/api/order/close?login=' . $mt4_account . '&password=' . $mt4_password . '&ticket=' . $ticket);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'accept' => '*/*',]);
        }

        $response = curl_exec($ch);

        curl_close($ch);

        return ($response);
    }


    public function disable_account($mt4_account){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'http://192.248.154.98:9508/Proppers/api/account/update?login=' . $mt4_account . '&status=DISABLE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'accept' => '*/*',]);

    }

}
