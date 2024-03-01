<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Alert;
use App\Models\Eombalance;
use App\Models\Statement;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        if (!($user = Auth::user())) return redirect('/');

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        return view('admin.index', compact('dbvar', 'alerts'));
    }

    public function accounts() {
        if (!($user = Auth::user())) return redirect('/');

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        return view('admin.accounts', compact('dbvar', 'alerts'));
    }

    public function userTransactions() {
        if (!($user = Auth::user())) return redirect('/');

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        return view('admin.transactions-user', compact('dbvar', 'alerts'));
    }

    public function accountTransactions() {
        if (!($user = Auth::user())) return redirect('/');

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        return view('admin.transactions-account', compact('dbvar', 'alerts'));
    }

    public function eomBalances($account_id) {
        if (!($user = Auth::user())) return redirect('/');

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        $account = Account::where('id', $account_id)->get();
        if(count($account)) {
            $eomBalances = Eombalance::where('account_id', $account_id)->get();
            return view('admin.eombalances', compact('eomBalances', 'account_id', 'dbvar', 'alerts'));
        } else {
            return abort('404');
        }
    }

    public function statements($account_id=null) {
        if (!($user = Auth::user())) return redirect('/');

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        $account = Account::first();
        if($account_id) {
            $account = Account::find($account_id);
        }

        if($account) {
            $accounts = Account::all();
            $statements = Statement::where('account_id', $account->id)->get();

            return view('admin.statements', compact('dbvar', 'alerts', 'accounts', 'statements', 'account_id'));
        } else {
            return abort('404');
        }
    }
}