<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use App\Models\Alert;
use App\Models\Dailybalance;
use App\Models\Eombalance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::with(['user', 'eombalance'])->orderBy('created_at')->get();
        return response()->json([
            'accounts' => $accounts,
        ], 200); // Status code here
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
            'owner' => ['required', 'string'],
            'mt4_account' => ['required', 'string', 'unique:accounts'],
            'name' => ['required', 'string'],
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
            'package' => ['required', 'string'],
        ]);

        $account = new Account;
        $account->user_id = $request->get("owner");
        $account->mt4_account = $request->get("mt4_account");
        $account->name = $request->get("name");
        // $account->mt4_password = Hash::make($request->get('password'));
        $account->package = $request->get("package");

        $res = $account->save();

        if ($res) {
            Session::flash('message', 'New account has been added successfully!');
            Session::flash('alert-class', 'alert-success');
            return response()->json([
                'isSuccess' => true,
                'Message' => "Account added successfully!"
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
        $account = Account::find($id);
        return response()->json(
            [
                'account'=> $account,
                'isSuccess' => $account ? true : false
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
            'owner' => ['required', 'string'],
            'mt4_account' => ['required', 'string'],
            'name' => ['required', 'string'],
            'package' => ['required', 'string'],
        ]);

        // if($request->get('changePassword') === 'true') {
        //     $request->validate([
        //         'password' => ['required', 'string', 'min:6', 'confirmed'],
        //     ]);
        // }

        $account = Account::find($id);

        $this->validate($request, [
            'mt4_account'=> [
                Rule::unique('accounts')->ignore($account->mt4_account, 'mt4_account')
            ]
        ]);

        $alerts = Alert::where('account', $account->mt4_account)->get();
        foreach($alerts as $alert) {
            $alert->user_id = $request->get('owner');
            $alert->account = $request->get('mt4_account');
            $alert->save();
        }

        $account->user_id = $request->get('owner');
        $account->mt4_account = $request->get('mt4_account');
        $account->name = $request->get('name');
        $account->package = $request->get('package');

        // if($request->get('changePassword') === 'true') {
        //     $account->mt4_password = Hash::make($request->get('password'));
        // }

        $account->save();

        return response()->json(
            [
                'account'=> $account,
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
        $account = Account::with(['dailybalance', 'eombalance'])->find($id);

        if($account) {
            $alerts = Alert::where('account', $account->mt4_account)->get();

            if($alerts) {
                foreach($alerts as $alert) {
                    $alert->forceDelete();
                }
            }

            if($account->dailybalance) {
                $dailyId = [];
                foreach($account->dailybalance as $balance) {
                    array_push($dailyId, $balance->id);
                }
                // delete dailybalance
                Dailybalance::destroy($dailyId);
            }
            if($account->eombalance) {
                $eomId = [];
                foreach($account->eombalance as $balance) {
                    array_push($eomId, $balance->id);
                }
                // delete eombalance
                Eombalance::destroy($eomId);
            }

            // delete account
            Account::destroy($id);

            return response()->json(
                [
                    'isSuccess' => true
                ], 200);
        } else {
            return response()->json(
                [
                    'isSuccess' => false
                ], 200);
        }
    }
}