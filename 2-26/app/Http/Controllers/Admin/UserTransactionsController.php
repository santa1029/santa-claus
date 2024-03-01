<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserTransactionsController extends Controller
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
            'account_id' => ['required', 'string'],
            'type' => ['required', 'string'],
            'amount' => ['required', 'string', 'numeric', 'gt:0'],
            'date' => ['required', 'string'],
            'user_id' => ['required', 'string'],
        ]);

        $type = $request->get("type");
        $date = $request->get("date");
        $amount = $request->get("amount");
        $account_id = $request->get("account_id");
        $user_id = $request->get("user_id");
        $note = $request->get("note");

        $account = Account::find($account_id);
        $mt4_account = $account->mt4_account;

        $alert_short = $mt4_account.' - '.$type;
        $alert_long = 'Account '.$mt4_account.' - '.$type.' of '.number_format($amount, 2).'€';

        $alert = new Alert;
        $alert->user_id = $user_id;
        $alert->account = $mt4_account;
        $alert->alert_short = $alert_short;
        $alert->alert_long = $alert_long;

        $alert->save();
        $alert_id = $alert->id;

        $transaction = new Transaction;
        $transaction->user_id = $user_id;
        $transaction->account_id = $account->id;
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
        $transactions = Transaction::with('account')->where('user_id', $id)->orderBy('created_at', 'desc')->get();
        $accounts = Account::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return response()->json(
            [
                'transactions'=> $transactions,
                'accounts' => $accounts
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