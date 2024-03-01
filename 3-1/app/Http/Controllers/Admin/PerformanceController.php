<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eombalance;
use App\Models\Alert;
use App\Models\Account;
use App\Models\Statement;
use App\Models\Transaction;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'percentage' => ['required', 'numeric' ],
        ]);

        $percentage = $request->get("percentage");
        $accounts = Account::all();

        foreach($accounts as $account) {
            $last_eombalance = Eombalance::where('account_id', $account->id)->latest()->first();
            $prev_balance = 0;
            $performance = 0;
            $deposit_sum = 0;
            $withdrawal_sum = 0;
            $transactions = [];
            if($last_eombalance && $last_eombalance->eombalance) {
                $prev_balance = $last_eombalance->eombalance;
                $deposit_sum = Transaction::where('account_id', $account->id)
                    ->where('created_at', '>', $last_eombalance->created_at)
                    ->where(function($query) {
                        $query->where('type', 'deposit')
                            ->orWhere('type', 'deposit from RF');
                    })->sum('amount');
                $withdrawal_sum = Transaction::where('account_id', $account->id)
                    ->where(function($query) {
                        $query->where('type', 'withdrawal')
                            ->orWhere('type', 'withdrawal from RF');
                    })->where('created_at', '>', $last_eombalance->created_at)->sum('amount');
                $transactions = Transaction::where('account_id', $account->id)
                    ->where('created_at', '>', $last_eombalance->created_at)
                    ->where(function($query) {
                        $query->where('type', 'deposit')
                            ->orWhere('type', 'deposit from RF')
                            ->orWhere('type', 'withdrawal')
                            ->orWhere('type', 'withdrawal from RF');
                    })->get();
            } else {
                continue;
            }
            // $new_balance = $prev_balance * ((100 + $percentage)/100);
            if($deposit_sum>0){
                $interim_balance = $prev_balance + $deposit_sum;
                
            }else{
                $interim_balance = $prev_balance - $withdrawal_sum;
                
            }
            $PL = $new_balance - $withdrawal_sum;
            $performance = $PL * 0.1;
            $management = $new_balance * 1/120;
            $total_fee = $performance + $management;
            $New_balance = $prev_balance - $total_fee;
    
            
            $year = date("Y");
            $month = date("m");
            $date = date("d");

            $eomBalance = new EomBalance;
            $eomBalance->eombalance = $new_balance;
            $eomBalance->account_id = $account->id;
            $eomBalance->formonth = $last_eombalance->formonth + 1;
            $eomBalance->save();

            $transactions_html_str = '';
            foreach($transactions as $idx => $transaction) {
                $border_bottom_str = '';
                if($idx+1 === count($transactions))
                    $border_bottom_str .= 'border-bottom: 1px solid';

                $transactions_html_str .= ('<tr style="vertical-align: top;">
                    <td style="width: 50%; padding: 0">
                        <div style="padding: 20px 0; margin-left: 40px; '.$border_bottom_str.'">'.$transaction->type.'</div>
                    </td>
                    <td style="width: 50%; padding: 0">
                        <div style="padding: 20px 0 20px 40px; margin-right: 40px; '.$border_bottom_str.'">€ '.number_format($transaction->amount, 2).'</div>
                    </td>
                </tr>');
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
                                <p style="font-weight: bold; margin: 0">'.$account->mt4_account.'</p>
                            </div>
                        </td>
                        <td style="width: 50%; border-bottom: 1px solid; padding-bottom: 15px;">
                            <div style="border: 1px solid; padding: 25px 40px;">
                                <p style="height: 18px; margin: 0 0 10px">'.$account->user->name.'</p>
                            </div>
                            <p style="text-align: center; margin: 30px">'.date("F j, Y", strtotime($year.'-'.$month.'-'.$date)).'</p>
                        </td>
                    </tr>
                    <tr style="vertical-align: top;">
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 50px 0; margin-left: 40px; border-bottom: 1px solid;">Your Previous Balance</div>
                        </td>
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 50px 0 50px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($prev_balance, 2).'</div>
                        </td>
                    </tr>
                    '.$transactions_html_str.'
                    <tr style="vertical-align: top;">
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 50px 0; margin-left: 40px; border-bottom: 1px solid;">Balance after transactions</div>
                        </td>
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 50px 0 50px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($interim_balance, 2).'</div>
                        </td>
                    </tr>
                    <tr style="vertical-align: top;">
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 50px 0; margin-left: 40px; border-bottom: 1px solid;">Net Realized P/L</div>
                        </td>
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 50px 0 50px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($PL, 2).'</div>
                        </td>
                    </tr>
                    <tr style="vertical-align: top;">
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 20px 0 10px 0; margin-left: 40px;">Performance fee:</div>
                        </td>
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 20 0 10px 40px; margin-right: 40px;">€ '.number_format($performance, 2).'</div>
                        </td>
                    </tr>
                    <tr style="vertical-align: top;">
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 0 0; margin-left: 40px;">Management fee:</div>
                        </td>
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 0 0 10px 40px; margin-right: 40px;">€ '.number_format($management, 2).'</div>
                        </td>
                    </tr>
                    <tr style="vertical-align: top;">
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 0 0 20px 0; margin-left: 40px; border-bottom: 1px solid;">Total Fees</div>
                        </td>
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 0 0 20px 40px; margin-right: 40px; border-bottom: 1px solid;">€ '.number_format($total_fee, 2).'</div>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px">
                    <tr style="vertical-align: top;">
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 30px 0 30px 40px; border: 1px solid; border-right: 0;">Your current Balance</div>
                        </td>
                        <td style="width: 50%; padding: 0">
                            <div style="padding: 30px 0 30px 40px; border: 1px solid; border-left: 0">€ '.number_format($New_balance, 2).'</div>
                        </td>
                    </tr>
                </table>
                <p style="font-size: 8pt; text-align: center; margin-top: 30px">
                    Please report any discrepancies within 24 hours, otherwise this
                    statement will be considered correct and confirmed as such by you
                </p>
            </page>';

            $html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array(10, 5, 10, 5));
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content);
            $pdfContent = $html2pdf->output('', 'S');

            $file_path = 'statements/'.bin2hex(random_bytes(16)).'.pdf';
            Storage::disk('public')->put($file_path, $pdfContent);

            $statement = new Statement;
            $statement->account_id = $account->id;
            $statement->date = $year.'-'.$month.'-'.$date;
            $statement->pdf = $file_path;
            $statement->save();

            $alert = new Alert;
            $alert->user_id = $account->user_id;
            $alert->account = $account->mt4_account;
            $alert->alert_short = 'New balance for '.$account->mt4_account;
            $alert->alert_long = 'New Balance for Month End '.date("Y").'.'.(date('m')-1).' and statement is available now.';
            $alert->save();
        }

        return response()->json([
            'isSuccess' => true,
        ], 200); // Status code here
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}