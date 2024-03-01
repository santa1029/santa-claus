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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('accounts')->orderBy('created_at')->get();
        return response()->json([
            'users' => $users,
        ], 200); // Status code here
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
            'user_name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'user_password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        
        $year = date("Y");
        $month = date("m");
        $date = date("d");

        $user = new User;
        $user->name = $request->get("user_name");
        $user->email = $request->get("email");
        $user->password = Hash::make($request->get('user_password'));
        $user->password_updated = $year.'-'.$month.'-'.$date;

        if($request->get("user_role") === "admin")
            $user->admin = 1;
        else if($request->get("user_role") === "investor")
            $user->trader = 1;

        $res = $user->save();

        if ($res) {
            Session::flash('message', 'New user has been added successfully!');
            Session::flash('alert-class', 'alert-success');
            return response()->json([
                'isSuccess' => true,
                'Message' => "User added successfully!"
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
        $user = User::with('accounts.eombalance')->find($id);
        return response()->json(
            [
                'user'=> $user,
                'isSuccess' => $user ? true : false
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
            'user_name' => ['required', 'string'],
            'email' => ['required', 'string'],
        ]);

        if($request->get('changePassword') === 'true') {
            $request->validate([
                'user_password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
        }

        $user = User::find($id);

        $this->validate($request, [
            'email'=> [
                Rule::unique('users')->ignore($user->email, 'email')
            ]
        ]);

        $user->name = $request->get('user_name');
        $user->email = $request->get('email');

        if($request->get("user_role") === "admin") {
            $user->admin = 1;
            $user->trader = 0;
        }
        else if($request->get("user_role") === "investor") {
            $user->admin = 0;
            $user->trader = 1;
        }

        if($request->get('changePassword') === 'true') {
            $user->password = Hash::make($request->get('user_password'));
        }

        $user->save();

        return response()->json(
            [
                'user'=> $user,
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
        $user = User::with([
            'alerts',
            'accounts.dailybalance',
            'accounts.eombalance'
        ])->find($id);

        if($user) {
            if($user->alerts) {
                foreach($user->alerts as $alert) {
                    $alert->forceDelete();
                }
            }

            if($user->accounts) {
                $ids = [];
                foreach($user->accounts as $account) {
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
                    array_push($ids, $account->id);
                }
                // delete accounts
                Account::destroy($ids);
            }

            // delete user
            User::destroy($id);

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