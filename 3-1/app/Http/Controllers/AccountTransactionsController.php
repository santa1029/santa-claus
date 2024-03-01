<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\Alert;
use App\Models\Eombalance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawalRequest;
use App\Mail\DepositRequest;

class AccountTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'type' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'gt:0'],
            'date' => ['required', 'string'],
            'account_id' => ['required', 'string'],
        ]);

        $type = $request->get("type");
        $date = $request->get("date");
        $amount = $request->get("amount");
        $account_id = $request->get("account_id");
        $note = $request->get("note");

        $account = Account::find($account_id);
        $mt4_account = $account->mt4_account;
        $user_id = $account->user_id;

        $alert_short = $mt4_account.' - '.$type;
        $alert_long = 'Account '.$mt4_account.' - '.$type.' of '.number_format($amount, 2).'€';

        $alert = new Alert;
        $alert->user_id = $user_id;
        $alert->account = $mt4_account;
        $alert->alert_short = $alert_short;
        $alert->alert_long = $alert_long;

        $alert->save();
        $alert_id = $alert->id;

        if($type ==='Withdrawal from RF') {
            $instructions = $request->post('instructions');
            $bank_name_address = $request->post('bankNameAddress');
            $aba_swift = $request->post('abaSwift');
            $iban = $request->post('iban');

            $mailData = [
                'mt4_account' => $mt4_account,
                'withdrawal_amount' => $amount,
                'special_instructions' => $instructions,
                'bank_name_address' => $bank_name_address,
                'aba_swift' => $aba_swift,
                'IABN' => $iban
            ];
            Mail::to('accounts@kingsleymarkets.eu')->send(new WithdrawalRequest($mailData));
        } else if($type === 'Deposit from RF') {
            $mailData = [
                'mt4_account' => $mt4_account,
                'deposit_amount' => $amount
            ];
            Mail::to('accounts@kingsleymarkets.eu')->send(new DepositRequest($mailData));
        }

        $eombalance = Eombalance::where('account_id', $account_id)->latest()->first();
        if($eombalance) {
            $eombalance->eombalance = $eombalance->eombalance + $amount;
            $eombalance->save();
        }

        $transaction = new Transaction;
        $transaction->user_id = $account->user_id;
        $transaction->account_id = $account_id;
        $transaction->alert_id = $alert_id;
        $transaction->type = $type;
        $transaction->amount = $amount;
        $transaction->date = $date;
        $transaction->note = $note;

        $res = $transaction->save();

        if ($res) {
            Session::flash('message', 'New transaction has been added successfully!');
            Session::flash('alert-class', 'alert-success');
            return response()->json([
                'isSuccess' => true,
                'Message' => "Transaction added successfully!"
            ], 200); // Status code here
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            return response()->json([
                'isSuccess' => false,
                'Message' => "Something went wrong!"
            ], 200); // Status code here
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transactions = Transaction::where('account_id', $id)->orderBy('created_at', 'desc')->get();
        return response()->json(
            [
                'transactions'=> $transactions
            ], 200);
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