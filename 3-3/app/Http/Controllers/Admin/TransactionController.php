<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use App\Models\Alert;
use App\Models\Transaction;
use App\Models\Eombalance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with('account')->find($id);
        return response()->json(
            [
                'transaction'=> $transaction,
                'isSuccess' => $transaction ? true : false
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
        $request->validate([
            'account_id' => ['required', 'string'],
            'type' => ['required', 'string'],
            'amount' => ['required', 'string', 'numeric', 'gt:0'],
            'date' => ['required', 'string'],
        ]);

        $transaction = Transaction::find($id);

        $transaction->account_id = $request->get('account_id');
        $transaction->type = $request->get('type');
        $transaction->amount = $request->get('amount');
        $transaction->date = $request->get('date');
        $transaction->note = $request->get('note');

        $transaction->save();

        return response()->json(
            [
                'transaction'=> $transaction,
                'isSuccess' => true
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Transaction::destroy($id);

        if($res)
            return response()->json(
                [
                    'isSuccess' => true
                ], 200);
        else
            return response()->json(
                [
                    'isSuccess' => false
                ], 200);
    }
}