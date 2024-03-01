<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sale;
use App\Models\Account;
use App\Models\Mt4account;
use App\Models\Eombalance;
use App\Models\Order;
use App\Models\Alert;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\Close_orders;
use App\Http\Traits\DrawDown;
use Carbon\Carbon;
use URL;

class DashboardController extends Controller
{
    public function index($mt4_account = null) {
        if (!($user = Auth::user())) return redirect('/');

        if(is_null($mt4_account)) {

            if ($user->default_account == 0) {
                $account = Account::where('user_id', $user->id)->where('active', 1)->where('trial', 0)->first();
                if (is_null($account)) {
                    $account = Account::where('user_id', $user->id)->where('active', 1)->first();
                    if (is_null($account)) {
                        $account = Account::where('user_id', $user->id)->first();
                        if (is_null($account)) {

                            return abort('404');
                        }
                    }
                }}
            else $account = Account::where('mt4_account', $user->default_account)->first();
            if (is_null($account)) return abort('404');
        }
        else
        {
            if(Account::where('id', $mt4_account)->doesntExist()) return abort(404);
            $account = Account::where('id', $mt4_account)->first();
            if ($user->id != $account->user_id) return abort(404);
        }

        $dbvar['clientname'] = $user->name;

        $dbvar['mt4_account'] = $account->mt4_account;

        $dbvar['account_name'] = $account->name;

        $dbvar['account_id'] = $account->id;

        $dbvar['active'] = $account->active;

        $dbvar['account_type'] = $account->package . ' account. Size: $' . number_format($account->size,2) . '  - Stage ' . $account->stage;

        $dbvar['profit_target_txt'] = number_format($account->condition->succeed_percentage1, 2) . '% = $' . number_format($account->size * ( 1 + $account->condition->succeed_percentage1 / 100),2);

        $dbvar['profit_target_perc'] = $account->condition->succeed_percentage1;

        switch ($account->package) {
            case 'Trial':
                $dbvar['days_needed_txt'] = '10 day free trial';
                break;
            case 'Edu':
                $dbvar['days_needed_txt'] = 'Monthly Subscription';
                break;
            case 'Live':
                $dbvar['days_needed_txt'] = $account->condition->days_live . ' to Scale up';
                break;
            default:
                $dbvar['days_needed_txt'] = $account->condition->days_assessment . ' Assessment';
                break;
        }

        $dbvar['draw_down_txt'] = number_format($account->condition->dd_percentage1, 2) . '% from ATH Balance';
        $dbvar['draw_down'] = $account->condition->dd_percentage1;

        $list_accounts = Account::where('user_id',$user->id)->orderBy('mt4_account', 'desc')->get();
        $show_accounts = [];
        foreach ($list_accounts as $list_account) {
            if($list_account->mt4_account == $account->mt4_account) continue;
            if ($list_account->active) $active = " (active)"; else $active = "";
            $url = URL::to('/index/'.$list_account->id);
            $show_accounts[] =  '<a class="dropdown-item" href="' . $url . '">' . $list_account->mt4_account . $active . '</a>';
        }
        if (empty($show_accounts)) $show_accounts[] =  'No other Accounts to Select';

        $dbvar['ath'] = number_format($account->max_high,2);

        $dbvar['dd_level'] = number_format($account->dd_level,2);

        // $dbvar['max_available_risk'] = $rs_user->BALANCE - $account->dd_level;

        // $dbvar['current_remaining_risk'] = $this->remaining_risk($account->mt4_account);

        // $dbvar['current_equity'] = number_format($rs_user->EQUITY,2);

        $dbvar['current_balance'] = number_format(0);

        $eombalances = Eombalance::where('account_id', $account->id)->get();

        $lastmonth = Eombalance::where('account_id', $account->id)->max('formonth');

        $eombalance4view = [];
        $monthlypl = [];

        Foreach ($eombalances as $eombalance) {

            $eombalance4view[$eombalance->formonth] = $eombalance->eombalance;

            if ($eombalance->formonth == $lastmonth) $dbvar['current_balance'] = number_format($eombalance->eombalance, 2);
            if ($eombalance->formonth == $lastmonth - 1) $dbvar['lastmonth_balance'] = number_format($eombalance->eombalance, 2);
            if ($eombalance->formonth == $lastmonth - 3) $dbvar['3agomonth_balance'] = number_format( $eombalance->eombalance, 2);
            if ($eombalance->formonth == 0) {
                $prevbalance = $eombalance->eombalance;
                continue;
            }
            $monthlypl[$eombalance->formonth] = $eombalance->eombalance - $prevbalance;
            $prevbalance = $eombalance->eombalance;
            $dbvar['current_balance'] = number_format($eombalance->eombalance);
        }

                                                                                                                        ///////////////
        // $dbvar['balance-profit-target'] = (($rs_user->BALANCE - $account->size) / ($account->size * $dbvar['profit_target_perc'] / 100)) * 100;
        // $dbvar['balance-profit-target'] = round( $dbvar['balance-profit-target'], 2);
        // if ($dbvar['balance-profit-target'] < 0) $dbvar['balance-profit-target'] = 0;
        // $dbvar['profit_perc'] = round(($rs_user->BALANCE - $account->size) / $account->size * 100,2);
        // if ($dbvar['profit_perc'] < 0) $dbvar['profit_perc'] = 0;

        // $dbvar['draw-down-balance'] = round(($rs_user->BALANCE - $account->size) / ($account->max_high * $dbvar['draw_down'] / 100) * 100, 2);
        // if ($dbvar['draw-down-balance'] > 0) $dbvar['draw-down-balance'] = 0; else $dbvar['draw-down-balance'] = -$dbvar['draw-down-balance'];

        // $dbvar['draw-down-equity'] = round(($rs_user->EQUITY - $account->size) / ($account->max_high * $dbvar['draw_down'] / 100) * 100, 2);
        // if ($dbvar['draw-down-equity'] > 0) $dbvar['draw-down-equity'] = 0; else $dbvar['draw-down-equity'] = -$dbvar['draw-down-equity'];

        // $dbvar['used-risk-max-risk'] = round((($dbvar['max_available_risk'] - $dbvar['current_remaining_risk']) / $dbvar['max_available_risk'] * 100), 2);


        $percentage = 0;
        if(isset($monthlypl[$lastmonth]))
            $percentage = ($monthlypl[$lastmonth] / $eombalance4view[$lastmonth - 1]) * 100;
        $dbvar['balance_change'] = number_format($percentage,2);

        if($percentage > 0)
            $dbvar['balance_change_badge'] = 'badge-soft-success';

        elseif($percentage < 0)
            $dbvar['balance_change_badge'] = 'badge-soft-danger';

        else
            $dbvar['balance_change_badge'] = 'badge-soft-primary';

        $rrr['loss'] = 0.0;
        $rrr['win'] = 0.0;

        $winorlose = true;



        //////// alerts
        ///
        ///

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        $deposit_sum = Transaction::where('account_id', $account->id)->where('type', 'deposit')->sum('amount');
        $dbvar['deposit_sum'] = number_format($deposit_sum, 2);

        $fees_sum = Transaction::where('account_id', $account->id)->where('type', 'Fees paid')->sum('amount');
        $dbvar['fees_sum'] = number_format($fees_sum, 2);

        $referral_sum = Transaction::where('account_id', $account->id)->where('type', 'Referral Fees received')->sum('amount') - Transaction::where('account_id', $account->id)->where('type', 'Deposit from RF')->sum('amount') -Transaction::where('account_id', $account->id)->where('type', 'Withdrawal from RF')->sum('amount');
        $dbvar['referral_sum'] = number_format($referral_sum, 2);

        $withdrawal_sum = Transaction::where('account_id', $account->id)->where('type', 'withdrawal')->sum('amount');
        $dbvar['withdrawal_sum'] = number_format($withdrawal_sum, 2);

        return view('db_index', compact('dbvar', 'show_accounts', 'monthlypl', 'eombalance4view' , 'rrr', 'alerts'));
    }

    public function set_default_account($default_account) {

        if(Account::where('mt4_account', $default_account)->doesntExist()) return response('Account not found', 404);
        $account = Account::where('mt4_account', $default_account)->first();
        $account->user->default_account = $default_account;
        $account->user->save();

        return response('Set as Default', 200);
        }


    public function edu_part1()
    {
        if (!($user = Auth::user())) return redirect('/');

        if ($user->trial) return view('Edu_trial');

        return view('Edu_1')->with($user);
    }


    public function edu_part2() {
        if (!($user = Auth::user())) return redirect('/');

        if ($user->trial) return view('Edu_trial');

        return view('Edu_2');
    }

    public function edu_part3()
    {
        if (!($user = Auth::user())) return redirect('/');

        if ($user->trial) return view('Edu_trial');

        return view('Edu_3');
    }

    public function dailynews()
    {
        if (!($user = Auth::user())) return redirect('/');


        return view('News');
    }

    public function deposits() {
        if (!($user = Auth::user())) return redirect('/');

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        $deposits =Transaction::where('type', 'deposit')->where('user_id', $user->id)->get();

        return view('deposits', compact('dbvar', 'alerts', 'deposits'));
    }

    public function fees() {
        if (!($user = Auth::user())) return redirect('/');

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        $fees =Transaction::where('type', 'Fees paid')->where('user_id', $user->id)->get();

        return view('fees', compact('dbvar', 'alerts', 'fees'));
    }

    public function referralFees() {
        if (!($user = Auth::user())) return redirect('/');

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        $referral_fees =Transaction::where('type', 'Referral Fees received')->where('user_id', $user->id)->get();

        return view('referral-fees', compact('dbvar', 'alerts', 'referral_fees'));
    }

    public function withdrawals() {
        if (!($user = Auth::user())) return redirect('/');

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        $withdrawals =Transaction::where('type', 'withdrawal')->where('user_id', $user->id)->get();

        return view('withdrawals', compact('dbvar', 'alerts', 'withdrawals'));
    }
}
