<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Statement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    //
    public function index() {
        if (!($user = Auth::user())) return redirect('/');

        if ($user->default_account == 0) {
            $account = Account::where('user_id', $user->id)->where('active', 1)->first();
            if (is_null($account)) {
                $account = Account::where('user_id', $user->id)->where('active', 1)->first();
                if (is_null($account)) {
                    $account = Account::where('user_id', $user->id)->first();
                    if (is_null($account)) {
                        return abort('404');
                    }
                }
            }
        }
        else
            $account = Account::where('mt4_account', $user->default_account)->first();

        if (is_null($account)) return abort('404');

        $dbvar['clientname'] = $user->name;
        
        $dbvar['mt4_account'] = $account->mt4_account;

        $dbvar['active'] = $account->active;

        $dbvar['profit_target_txt'] = number_format($account->condition->succeed_percentage1, 2) . '% = $' . number_format($account->size * ( 1 + $account->condition->succeed_percentage1 / 100),2);

        $dbvar['profit_target_perc'] = $account->condition->succeed_percentage1;

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        $accounts = Account::where('user_id', $user->id)->get();
        $account_ids = [];
        foreach($accounts as $account) {
            array_push($account_ids, $account['id']);
        }
        $statements = Statement::whereIn('account_id', $account_ids)->with('account')->get();
        return view('statements', compact('dbvar', 'alerts', 'statements'));
    }

    public function year_index() {
        if (!($user = Auth::user())) return redirect('/');

        if ($user->default_account == 0) {
            $account = Account::where('user_id', $user->id)->where('active', 1)->first();
            if (is_null($account)) {
                $account = Account::where('user_id', $user->id)->where('active', 1)->first();
                if (is_null($account)) {
                    $account = Account::where('user_id', $user->id)->first();
                    if (is_null($account)) {
                        return abort('404');
                    }
                }
            }
        }
        else
            $account = Account::where('mt4_account', $user->default_account)->first();

        if (is_null($account)) return abort('404');

        $dbvar['clientname'] = $user->name;
        
        $dbvar['mt4_account'] = $account->mt4_account;

        $dbvar['active'] = $account->active;

        $dbvar['profit_target_txt'] = number_format($account->condition->succeed_percentage1, 2) . '% = $' . number_format($account->size * ( 1 + $account->condition->succeed_percentage1 / 100),2);

        $dbvar['profit_target_perc'] = $account->condition->succeed_percentage1;

        $alerts = $user->alerts()->get();
        $alerts = $alerts->sortByDesc('created_at');
        $dbvar['$no_of_alerts_unread'] = $user->alerts()->where('seen', 0)->count();

        $accounts = Account::where('user_id', $user->id)->get();
        $account_ids = [];
        foreach($accounts as $account) {
            array_push($account_ids, $account['id']);
        }
        $statements = Statement::whereIn('account_id', $account_ids)->with('account')->get();
        return view('statements-year', compact('dbvar', 'alerts', 'statements'));
    }


    public function view($id) {
        if (!($user = Auth::user())) return redirect('/');
        $statement = Statement::where('id', $id)->with('account')->first();
        if($statement && $statement['account'] && intval($statement['account']['user_id']) === intval($user['id'])) {
            $pdfPath = storage_path('app/public/'.$statement['pdf']);
            return response()->file($pdfPath);
        } else {
            return abort('404');
        }
    }

    public function year_view($id) {
        if (!($user = Auth::user())) return redirect('/');
        $statement = Statement::where('id', $id)->with('account')->first();
        if($statement && $statement['account'] && intval($statement['account']['user_id']) === intval($user['id'])) {
            $pdfPath = storage_path('app/public'.$statement['pdf']);
            return response()->file($pdfPath);
        } else {
            return abort('404');
        }
    }

    public function adminView($id) {
        if (!($user = Auth::user())) return redirect('/');
        $statement = Statement::where('id', $id)->with('account')->first();
        if($statement) {
            $pdfPath = storage_path('app/public/'.$statement['pdf']);
            return response()->file($pdfPath);
        } else {
            return abort('404');
        }
    }
    public function adminViewYear($id) {
        if (!($user = Auth::user())) return redirect('/');
        $statement = Statement::where('id', $id)->with('account')->first();
        if($statement) {
            $pdfPath = storage_path('app/public'.$statement['pdf']);
            return response()->file($pdfPath);
        } else {
            return abort('404');
        }
    }

    public function delete($id) {
        $statement = Statement::find($id);
        if($statement) {
            $pdfPath = $statement->pdf;
            if(Storage::disk('public')->exists($pdfPath)) {
                Storage::disk('public')->delete($pdfPath);
            }
            Statement::destroy($id);
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
}