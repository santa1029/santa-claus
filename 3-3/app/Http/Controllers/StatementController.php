<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Statement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Models\Eombalance;
use App\Models\Alert;
use App\Models\Transaction;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;


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
        $statements = Statement::whereIn('account_id', $account_ids)->orderBy('created_at', 'desc')->where('pdf', 'like', '%statements/%')->with('account')->get();
        return view('statements', compact('dbvar', 'alerts', 'statements'));
    }
    
    public function view($id) {
        if (!($user = Auth::user())) return redirect('/');
        $statement = Statement::where('id', $id)->where('pdf', 'like', '%statements/%')->first();
        if($statement && $statement['account'] && intval($statement['account']['user_id']) === intval($user['id'])) {
            $pdfPath = storage_path('app/public/'.$statement['pdf']);
            return response()->file($pdfPath);
        } else {
            return abort('404');
        }
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
        $account_id = $account->id;
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
       
        return view('statements-year', compact('dbvar', 'alerts', 'statements', 'accounts', 'account_id'));
    }



    public function year_view($id) {
        if (!($user = Auth::user())) return redirect('/');
        $account_id = $id;
        $year = date("Y");
        $month = date("m");
        $date = date("d");

        $new_statement = Statement::where('account_id', $id)->where('pdf', 'like', '%statements-year/%')->first();
        if($new_statement){
            $new_pdfPath = $new_statement->pdf;
            if(Storage::disk('public')->exists($new_pdfPath)) {
                Storage::disk('public')->delete($new_pdfPath);
            }
            Statement::destroy($id);
        }
        
        $total_management = 0;
        $account = Account::where('id', $account_id)->first();
         
        if(!Eombalance::where('account_id', $account_id)->whereYear('created_at', $year-1)->first()){
            $content = '<page style="font-size: 14pt">
                            <table style="width: 100%; border-collapse: collapse; margin-bottom: 0px">
                                <tr style="vertical-align: center;">
                                    <td style="padding-bottom: 15px;">
                                    <img src="'.public_path('assets/images/pdf_picture.png').'" alt="logo" style="width: 200px" />
                                    </td>
                                </tr>
                            </table>
                                <h1>There is no yearly statement.</h1>
                            <p style="font-size: 8pt; text-align: center; margin-top: 30px">
                                Please report any discrepancies within 24 hours, otherwise this
                                statement will be considered correct and confirmed as such by you
                            </p>
                        </page>';
        }else{
            $start_balance = Eombalance::where('account_id', $account_id)->whereYear('created_at', $year-1)->first()->eombalance;
            $managements = Eombalance::where('account_id', $account_id)->whereYear('created_at', $year-1)->get();
            $total_deposit = Transaction::where('user_id', $account_id)->whereYear('created_at', $year-1)->where(function($query) { $query->where('type', 'deposit')->orWhere('type', 'deposit from RF');})->sum('amount');
            $total_withdrawal = Transaction::where('user_id', $account_id)->whereYear('created_at', $year-1)->where('type', 'withdrawal')->orWhere('type', 'withdrawal from RF')->sum('amount');
            $end_balance = Eombalance::where('account_id', $account_id)->whereYear('created_at', $year-1)->latest()->first()->eombalance;
    
            if($end_balance>$start_balance){
                $total_PL = $end_balance - $start_balance;
            }else $total_PL = $start_balance - $end_balance;
            $total_performance = $total_PL * 0.1;
            foreach($managements as $management){
                $total_management =+ ($management->eombalance) * 1/599;
            }
            $content = '<page style="font-size: 14pt">
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 0px">
                            <tr style="vertical-align: center;">
                                <td style="padding-bottom: 15px;">
                                <img src="'.public_path('assets/images/pdf_picture.png').'" alt="logo" style="width: 200px" />
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 50px">
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding-right: 70px; border-bottom: 1px solid; padding-bottom: 15px;">
                                    <div style="padding: 25px 40px; border: 1px solid">
                                        <p style="font-weight: bold; margin: 0 0 10px">Spread Betting Account</p>
                                        <p style="font-weight: bold; margin: 0">'.$account->mt4_account.''.'</p>
                                    </div>
                                </td>
                                <td style="width: 50%; border-bottom: 1px solid; padding-bottom: 15px;">
                                    <div style="border: 1px solid; padding: 25px 40px;">
                                        <p style="height: 18px; margin: 0 0 10px">'.$account->user->name.'</p>
                                    </div>
                                    <p style="text-align: center; margin: 30px">'.number_format($year-1, 0, '', '').' year '.'</p>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0; margin-left: 40px; border-bottom: 1px solid;">Start balance year '.number_format($year-1, 0, '', '').' </div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0 50px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($start_balance, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0; margin-left: 40px; border-bottom: 1px solid;">Total In</div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0 50px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($total_deposit, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0; margin-left: 40px; border-bottom: 1px solid;">Total Out</div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0 50px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($total_withdrawal, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20px 0 10px 0; margin-left: 40px;">Total Performance Fees:</div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20 0 10px 40px; margin-right: 40px;">€ '.number_format($total_performance, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0; margin-left: 40px; border-bottom: 1px solid;">Total Management Fees:</div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0 50px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($total_management, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20px 0 10px 0; margin-left: 40px; border-bottom: 1px solid;">Total NET P&L for year '.number_format($year-1, 0, '', '').' </div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20px 0 10px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($total_PL, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20px 0 10px 0; margin-left: 40px; border-bottom: 1px solid;">Ending Balance Year '.number_format($year-1, 0, '', '').' </div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20px 0 10px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($end_balance, 2).'</div>
                                </td>
                            </tr>
                        </table>
                    </page>';
        }
        
                        
        $html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array(10, 5, 10, 5));
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $pdfContent = $html2pdf->output('', 'S');

        $file_path = 'statement_year/'.bin2hex(random_bytes(16)).'.pdf';
        Storage::disk('public')->put($file_path, $pdfContent);
        $statement = new Statement;
        $statement->account_id = $id;
        $statement->date = $year.'-'.$month.'-'.$date;
        $statement->pdf = $file_path;
        $statement->save();
        $pdfPath = storage_path('app/public/'.$file_path);

         return response()->file($pdfPath);

        
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
        $account_id = $id;
        $year = date("Y");
        $month = date("m");
        $date = date("d");

        $new_statement = Statement::where('account_id', $id)->where('pdf', 'like', '%statements-year/%')->first();
        if($new_statement){
            $new_pdfPath = $new_statement->pdf;
            if(Storage::disk('public')->exists($new_pdfPath)) {
                Storage::disk('public')->delete($new_pdfPath);
            }
            Statement::destroy($id);
        }
        
        $total_management = 0;
        $account = Account::where('id', $account_id)->first();
         
        if(!Eombalance::where('account_id', $account_id)->whereYear('created_at', $year-1)->first()){
            $content = '<page style="font-size: 14pt">
                            <table style="width: 100%; border-collapse: collapse; margin-bottom: 0px">
                                <tr style="vertical-align: center;">
                                    <td style="padding-bottom: 15px;">
                                    <img src="'.public_path('assets/images/pdf_picture.png').'" alt="logo" style="width: 200px" />
                                    </td>
                                </tr>
                            </table>
                                <h1>There is no yearly statement.</h1>
                            <p style="font-size: 8pt; text-align: center; margin-top: 30px">
                                Please report any discrepancies within 24 hours, otherwise this
                                statement will be considered correct and confirmed as such by you
                            </p>
                        </page>';
        }else{
            $start_balance = Eombalance::where('account_id', $account_id)->whereYear('created_at', $year-1)->first()->eombalance;
            $managements = Eombalance::where('account_id', $account_id)->whereYear('created_at', $year-1)->get();
            $total_deposit = Transaction::where('user_id', $account_id)->whereYear('created_at', $year-1)->where(function($query) { $query->where('type', 'deposit')->orWhere('type', 'deposit from RF');})->sum('amount');
            $total_withdrawal = Transaction::where('user_id', $account_id)->whereYear('created_at', $year-1)->where('type', 'withdrawal')->orWhere('type', 'withdrawal from RF')->sum('amount');
            $end_balance = Eombalance::where('account_id', $account_id)->whereYear('created_at', $year-1)->latest()->first()->eombalance;
    
            if($end_balance>$start_balance){
                $total_PL = $end_balance - $start_balance;
            }else $total_PL = $start_balance - $end_balance;
            $total_performance = $total_PL * 0.1;
            foreach($managements as $management){
                $total_management =+ ($management->eombalance) * 1/599;
            }
            $content = '<page style="font-size: 14pt">
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 0px">
                            <tr style="vertical-align: center;">
                                <td style="padding-bottom: 15px;">
                                <img src="'.public_path('assets/images/pdf_picture.png').'" alt="logo" style="width: 200px" />
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 50px">
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding-right: 70px; border-bottom: 1px solid; padding-bottom: 15px;">
                                    <div style="padding: 25px 40px; border: 1px solid">
                                        <p style="font-weight: bold; margin: 0 0 10px">Spread Betting Account</p>
                                        <p style="font-weight: bold; margin: 0">'.$account->mt4_account.''.'</p>
                                    </div>
                                </td>
                                <td style="width: 50%; border-bottom: 1px solid; padding-bottom: 15px;">
                                    <div style="border: 1px solid; padding: 25px 40px;">
                                        <p style="height: 18px; margin: 0 0 10px">'.$account->user->name.'</p>
                                    </div>
                                    <p style="text-align: center; margin: 30px">'.number_format($year-1, 0, '', '').' year '.'</p>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0; margin-left: 40px; border-bottom: 1px solid;">Start balance year '.number_format($year-1, 0, '', '').' </div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0 50px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($start_balance, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0; margin-left: 40px; border-bottom: 1px solid;">Total In</div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0 50px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($total_deposit, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0; margin-left: 40px; border-bottom: 1px solid;">Total Out</div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0 50px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($total_withdrawal, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20px 0 10px 0; margin-left: 40px;">Total Performance Fees:</div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20 0 10px 40px; margin-right: 40px;">€ '.number_format($total_performance, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0; margin-left: 40px; border-bottom: 1px solid;">Total Management Fees:</div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 50px 0 50px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($total_management, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20px 0 10px 0; margin-left: 40px; border-bottom: 1px solid;">Total NET P&L for year '.number_format($year-1, 0, '', '').' </div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20px 0 10px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($total_PL, 2).'</div>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20px 0 10px 0; margin-left: 40px; border-bottom: 1px solid;">Ending Balance Year '.number_format($year-1, 0, '', '').' </div>
                                </td>
                                <td style="width: 50%; padding: 0">
                                    <div style="padding: 20px 0 10px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($end_balance, 2).'</div>
                                </td>
                            </tr>
                        </table>
                    </page>';
        }
        
                        
        $html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array(10, 5, 10, 5));
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $pdfContent = $html2pdf->output('', 'S');

        $file_path = 'statement_year/'.bin2hex(random_bytes(16)).'.pdf';
        Storage::disk('public')->put($file_path, $pdfContent);
        $statement = new Statement;
        $statement->account_id = $id;
        $statement->date = $year.'-'.$month.'-'.$date;
        $statement->pdf = $file_path;
        $statement->save();
        $pdfPath = storage_path('app/public/'.$file_path);

         return response()->file($pdfPath);

        
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


// <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px">
//             <tr style="vertical-align: top;">
//                 <td style="width: 50%; padding: 0">
//                     <div style="padding: 30px 0 30px 40px; border: 1px solid; border-right: 0;">Your current Balance</div>
//                 </td>
//                 <td style="width: 50%; padding: 0">
//                     <div style="padding: 30px 0 30px 40px; border: 1px solid; border-left: 0">€ '.number_format($new_balance, 2).'</div>
//                 </td>
//             </tr>
//         </table>