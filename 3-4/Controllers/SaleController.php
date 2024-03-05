<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use App\Models\User;
use App\Models\Sale;
use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Mail\AlreadyHadTrial;
use App\Mail\CreateAssessmentAccount;
use App\Mail\CreateEduAccount;
use App\Mail\CreateTrialAccount;
use App\Mail\NoAccountToReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\Close_orders;
use App\Http\Traits\DrawDown;
use URL;

class SaleController extends Controller
{

    use Close_orders;
    use DrawDown;

    /// WooCommerce API
    /// url	string	https://proppers.io/
    /// consumer_key	ck_d9c13c23258bb257312f7c15550d116e2c7e04bc
    /// consumer_secret	cs_2a97d6562de7e06947bfd322053454d37f617cb0
    /// $woocommerce = new Client($url, $consumer_key, $consumer_secret, $options);
    /// https://packagist.org/packages/automattic/woocommerce
    ///
    ///
    /// WooCommerce API
    /// url	string	https://proppers.pro/
    ///
    ///
    /// WooCommerce API
    /// url	string	https://proppers.pro/
    /// consumer_key	ck_be3c3fa1d9f51b4e6866a3158143ec5365631e84
    /// consumer_secret	cs_31299c810c22cfedf2f01b95295b62599161019a
    /// $woocommerce = new Client($url, $consumer_key, $consumer_secret, $options);
    /// https://packagist.org/packages/automattic/woocommerce
    ///
    ///


    public function newSale(Request $request)
    {
        $uri = $request->path();

        //// Log::debug('Start Sale', ['Request' => $request]);

        $order_number = $request->arg;
        if (($request->action == "woocommerce_order_status_completed") or ($request->action == "woocommerce_order_status_processing")) {
            if ($request->path() == 'newsale')                                                                              ///// Sale from proppers.io
            {
                $woocommerce = new Client(
                    'https://proppers.io', // Your store URL
                    'ck_d9c13c23258bb257312f7c15550d116e2c7e04bc', // Your consumer key
                    'cs_2a97d6562de7e06947bfd322053454d37f617cb0', // Your consumer secret
                    [
                        'wp_api' => true, // Enable the WP REST API integration
                        'version' => 'wc/v3' // WooCommerce WP REST API version
                    ]
                );

                $order = $woocommerce->GET('orders/' . $order_number);


                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, "https://proppers.io/wp-json/wc/v3/orders/" . $order_number);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($ch, CURLOPT_USERPWD, 'ck_d9c13c23258bb257312f7c15550d116e2c7e04bc' . ':' . 'cs_2a97d6562de7e06947bfd322053454d37f617cb0');

                $order = curl_exec($ch);

                if (curl_errno($ch)) return response("API Error", 500);

            } elseif ($request->path() == 'pro/NewSale')                                                                ///// Subscription from proppers.pro
            {
                $woocommerce = new Client(
                    'https://proppers.pro', // Your store URL
                    'ck_be3c3fa1d9f51b4e6866a3158143ec5365631e84', // Your consumer key
                    'cs_31299c810c22cfedf2f01b95295b62599161019a', // Your consumer secret
                    [
                        'wp_api' => true, // Enable the WP REST API integration
                        'version' => 'wc/v3' // WooCommerce WP REST API version
                    ]
                );

                $order = $woocommerce->GET('orders/' . $order_number);

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, "https://proppers.pro/wp-json/wc/v3/orders/" . $order_number);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($ch, CURLOPT_USERPWD, 'ck_be3c3fa1d9f51b4e6866a3158143ec5365631e84' . ':' . 'cs_31299c810c22cfedf2f01b95295b62599161019a');

                $order = curl_exec($ch);


                if (curl_errno($ch)) return response("API Error", 500);;
            } else return response("Not from the right route", 500);
        } else return response("Not a status that needs processing", 200);

        $order = json_decode($order);

        curl_close($ch);

        $billing = $order->billing;
        $first_name = $billing->first_name;
        $last_name = $billing->last_name;
        $name = $first_name . ' ' . $last_name;
        $email = $billing->email;
        $items = $order->line_items;
        $item = $items[0]->product_id;

        $trial = false;
        $edu = false;
        $reset = false;
        $assessment = false;

        switch ($item) {
            case 353:
                                                                   /// Free Trial
                $trial = true;
                break;
            case 355:
                $item = $items[0]->variation_id;                   /// Assessment Account
                $assessment = true;
                break;
            case 362:
                $item = $items[0]->variation_id;                   /// Reset
                $reset = true;
                break;
            case 354:
                                                                   /// Edu Account
                $edu = true;
                break;
        }

        $plain_password = Str::random(8);
        $password = Hash::make($plain_password);

        $user = User::firstOrCreate(                            /// check if user exists, if not create him
            ['email' => $email],
            ['name' => $name,
             'password' => $password]
        );

        if (($trial) && ($user->has_had_trial)) {
            $this->user_already_had_trial($order);                                                  /// do User had already trial                   *****************
            return response("User already had trial", 200);
        }

        if (($reset) && ($user->account_to_reset == 0)) {
            $this->no_account_to_reset_registered($order);                                          /// do No account to reset registered           *****************
            return response("No Account to reset registered", 200);
        }

        if ($trial) {
            $this->trial_account($user, $order, $plain_password);
            return response("Trial Account created", 200);
        }

        if ($assessment) {
            $this->assessment_account($user, $order, $plain_password);
            return response("Assessment Account created", 200);
        }

        if ($reset) {
            $this->reset_account($user, $order, null);
            return response("Assessment Account created", 200);
        }

        if ($edu) {
            $this->edu_account($user, $order, $plain_password);
            return response("Education Account created", 200);
        }

        return response("Unknown Error", 500);

    }


    public function trial_account($user, $order, $password)
    {
        $package ="Trial";
        $first = true;
        $leverage = 10 * 1;

        $post = [
            'name' => 'Trial ' . $order->billing->first_name . ' ' . $order->billing->last_name,
            'leverage' => $leverage,
            'comment' => 'Free trial account - expires in 10 days',
            'group' => 'SC-T-ChltWe-USD',
            'balance' => 25000,
        ];

        $result = $this->api_create_account($post);

        $account_number = $result->login;
        $account_password = $result->password;

        $user->trader = true;
        $user->student = true;
        if ($first) $user->trial = true; else $user->trial = false;
        $user->first = false;
        $user->convertsTrial = true;
        $user->has_had_trial = true;

        $user->save();

        $account = Account::create([
            'user_id' => $user->id,
            'mt4_account' => $account_number,
            'mt4_password' => $account_password,
            'size' => 25000,
            'max_high' => 25000,
            'package' => $package,
            'conditions' => 'A1',
            'stage' => 0,
            'note' => '',
            'active' => true,
            'trial' => true,
            'reset_allowed' => false,
            'issue' => false,
            ]);

        $account->dd_level = $this->dd_level($account);
        $account->save();

        $email = $order->billing->email;

        $mailData = [
        'first_name' => $order->billing->first_name,
        'last_name' => $order->billing->last_name,
        'account_number' => $account_number,
        'account_password' => $account_password,
        'email' => $email,
        'user_password' => $password,
        'order_number' => $order->id,
        'first' => $first,
                    ];

        Mail::to($email)->bcc('trials@proppers.io')->send(new CreateTrialAccount($mailData));

        $this->sales_statistics($package, null);

        return;

        }


    public function edu_account($user, $order, $password)
    {
        $first = $user->first;
        $package = 'Edu';
        $leverage = 10 * 1;

        $post = [
            'name' => 'Education ' . $order->billing->first_name . ' ' . $order->billing->last_name,
            'leverage' => $leverage,
            'comment' => 'Edu account - Free unlimited resets',
            'group' => 'SC-T-ChltWe-USD',
            'balance' => 25000,
        ];

        $result = $this->api_create_account($post);

        $account_number = $result->login;
        $account_password = $result->password;

        $user->trader = false;
        $user->student = true;
        $user->trial = false;
        $user->first = false;

        $user->save();

        $account = Account::create([
            'user_id' => $user->id,
            'mt4_account' => $account_number,
            'mt4_password' => $account_password,
            'size' => 25000,
            'max_high' => 25000,
            'package' => $package,
            'conditions' => 'A1',
            'stage' => 0,
            'note' => '',
            'active' => true,
            'trial' => false,
            'reset_allowed' => true,
            'issue' => false,
            ]);

        $account->dd_level = $this->dd_level($account);
        $account->save();


        $email = $order->billing->email;

        $mailData = [
        'first_name' => $order->billing->first_name,
        'last_name' => $order->billing->last_name,
        'account_number' => $account_number,
        'account_password' => $account_password,
        'email' => $email,
        'user_password' => $password,
        'order_number' => $order->order_number,
        'first' => $first,
                    ];

        Mail::to($email)->bcc('payments@proppers.io')->send(new CreateEduAccount($mailData));

        $this->sales_statistics($package,null);

        return;

        }


    public function assessment_account($user, $order, $password)
    {
        $first = $user->first;

        $items = $order->line_items;
        $item = $items[0]->variation_id;

        switch ($item) {
            case 357:
                $package = 'Bronze';
                $balance = 12500;
                break;
            case 358:
                $package = 'Silver';
                $balance = 25000;
                break;
            case 359:
                $package = 'Gold';
                $balance = 50000;
                break;
            case 360:
                $package = 'Diamond';
                $balance = 100000;
                break;
            }

        $balance = $balance * 1;
        $leverage = 10 * 1;

        $post = [
            'name' => $package . ' Assessment ' . $order->billing->first_name . ' ' . $order->billing->last_name,
            'leverage' => $leverage,
            'comment' => 'Order ' . $order->id,
            'group' => 'SC-T-ChltWe-USD',
            'balance' => $balance,
        ];

        Log::debug('Create Ass Acc API', ['Account Info: ' => $post]);

        $result = $this->api_create_account($post);

        $account_number = $result->login;
        $account_password = $result->password;

        if($user->convertsTrial) $this->sales_statistics("Conversion", null);

        $user->trader = true;
        $user->student = true;
        $user->first = false;
        $user->trial = false;
        $user->convertsTrial = false;

        $user->save();

        $account = Account::create([
            'user_id' => $user->id,
            'mt4_account' => $account_number,
            'mt4_password' => $account_password,
            'size' => $balance,
            'max_high' => $balance,
            'package' => $package,
            'conditions' => 'A1',
            'stage' => 1,
            'note' => '',
            'active' => true,
            'trial' => false,
            'reset_allowed' => true,
            'issue' => false,
            ]);

        $account->dd_level = $this->dd_level($account);
        $account->save();


        $email = $order->billing->email;

        $mailData = [
        'first_name' => $order->billing->first_name,
        'last_name' => $order->billing->last_name,
        'account_number' => $account_number,
        'account_password' => $account_password,
        'email' => $email,
        'user_password' => $password,
        'order_number' => $order->id,
        'package' => $package,
        'first' => $first,
                    ];

        Mail::to($email)->bcc('payments@proppers.io')->send(new CreateAssessmentAccount($mailData));

        $this->sales_statistics($package, $order->total);

        return;

        }

    public function reset_account($user, $order, $password)
    {

        $account = Account::where('user_id', $user->id)->where('mt4_account', $user->account_to_reset)->first();

        $result = $this->close_orders($account->mt4_account, $account->mt4_password, null);
        $result = $this->disable_account($account->mt4_account);

        $account->active = false;
        $account->reset_allowed = false;
        $account->save();

        $items = $order->line_items;
        $item = $items[0]->variation_id;


        switch ($item) {
            case 363:
                $package = 'Bronze - Reset';
                $balance = 12500;
                break;
            case 364:
                $package = 'Silver - Reset';
                $balance = 25000;
                break;
            case 365:
                $package = 'Gold - Reset';
                $balance = 50000;
                break;
            case 366:
                $package = 'Diamond - Reset';
                $balance = 100000;
                break;
        }

        $balance = $balance * 1;
        $leverage = 10 * 1;

        $post = [
            'name' => $package . ' ' . $order->billing->first_name . ' ' . $order->billing->last_name,
            'leverage' => $leverage,
            'group' => 'SC-T-ChltWe-USD',
            'comment' => 'Order ' . $order->id,
            'balance' => $balance,
        ];

        $result = $this->api_create_account($post);

        $account_number = $result->login;
        $account_password = $result->password;

        $user->trader = true;
        $user->student = true;
        $user->save();

        $account = Account::create([
            'user_id' => $user->id,
            'mt4_account' => $account_number,
            'mt4_password' => $account_password,
            'size' => $balance,
            'max_high' => $balance,
            'package' => $package,
            'conditions' => 'A1',
            'stage' => 1,
            'note' => '',
            'active' => true,
            'trial' => false,
            'reset_allowed' => true,
            'issue' => false,
        ]);

        $account->dd_level = $this->dd_level($account);
        $account->save();

        $email = $order->billing->email;

        $mailData = [
            'first_name' => $order->billing->first_name,
            'last_name' => $order->billing->last_name,
            'account_number' => $account_number,
            'account_password' => $account_password,
            'email' => $email,
            'user_password' => $password,
            'order_number' => $order->id,
            'package' => $package,
        ];

        Mail::to($email)->bcc('payments@proppers.io')->send(new CreateResetAccount($mailData));

        $this->sales_statistics($package, $order->total);

        return;

    }


    public function sales_statistics($package, $sales_amount)
        {
            $now = now();
            $period = $now->year . '-' . $now->format('m');

            $sale = Sale::firstOrCreate(['period' => $period]);

            switch ($package) {
                case 'Trial':
                    $sale->increment('trials');
                    break;
                case 'Edu':
                    $sale->increment('edu_accounts');
                    $sale->increment('edu_accounts_amount', $sales_amount);
                case 'Bronze - Reset':
                    $sale->increment('reset_bronze_accounts');
                    $sale->increment('bronze_accounts_amount', $sales_amount);
                    break;
                case 'Silver - Reset':
                    $sale->increment('reset_silver_accounts');
                    $sale->increment('reset_silver_accounts_amount', $sales_amount);
                    break;
                case 'Gold - Reset':
                    $sale->increment('reset_gold_accounts');
                    $sale->increment('reset_gold_accounts_amount', $sales_amount);
                    break;
                case 'Diamond - Reset':
                    $sale->increment('reset_diamond_accounts');
                    $sale->increment('reset_diamond_accounts_amount', $sales_amount);
                    break;
                case 'Bronze':
                    $sale->increment('bronze_accounts');
                    $sale->increment('bronze_accounts_amount', $sales_amount);
                    break;
                case 'Silver':
                    $sale->increment('silver_accounts');
                    $sale->increment('silver_accounts_amount', $sales_amount);
                    break;
                case 'Gold':
                    $sale->increment('gold_accounts');
                    $sale->increment('gold_accounts_amount', $sales_amount);
                    break;
                case 'Diamond':
                    $sale->increment('diamond_accounts');
                    $sale->increment('diamond_accounts_amount', $sales_amount);
                    break;
                case 'Conversion':
                    $sale->increment('converted_trials');
                    break;
            }

            $sale->save();

            return;

        }


    public function user_already_had_trial($order) {

        $email = $order->billing->email;

        $mailData = [
        'first_name' => $order->billing->first_name,
        'last_name' => $order->billing->last_name,
        'order_number' => $order->number,
                    ];

        Mail::to($email)->bcc('issues@proppers.io')->send(new AlreadyHadTrial($mailData));

    }

    public function no_account_to_reset_registered($order) {

        $email = $order->billing->email;

        $mailData = [
            'first_name' => $order->billing->first_name,
            'last_name' => $order->billing->last_name,
            'order_number' => $order->number,
        ];

        Mail::to($email)->bcc('issues@proppers.io')->send(new NoAccountToReset($mailData));

    }

    public function api_create_account($post) {

        $datapost = json_encode($post);
        $api_key = 'zxcv4321';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://192.248.154.98:9508/Proppers/api/account");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datapost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'accept: ',
            'Content-Type: application/json',
            'api_key: ' . $api_key),
        );

        $result = curl_exec($ch);

        Log::debug('Account creates', ['Account Raw: ' => $result]);

        curl_close($ch);
        $result = json_decode($result);

        Log::debug('Account creates', ['Account decoded: ' => $result]);

        return($result);

    }
}
