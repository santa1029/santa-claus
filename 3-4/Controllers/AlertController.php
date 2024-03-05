<?php

namespace App\Http\Controllers;
use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlertController extends Controller
{
    public function seenAllAlerts() {
        if (($user = Auth::user())) {
            Alert::where('user_id', $user->id)->where('seen', 0)->update([
                'seen' => 1
            ]);
            return response()->json([
                'message' => "success"
            ], 200); // Status code here
        } else {
            return response()->json([
                'message' => "You need to login"
            ], 401); // Status code here
        }
    }
    public function deleteOneAlert($id) {
        if (($user = Auth::user())) {
            Alert::destroy($id);
            return response()->json([
                'message' => "success"
            ], 200); // Status code here
        } else {
            return response()->json([
                'message' => "You need to login"
            ], 401); // Status code here
        }
    }

    public function deleteAllAlerts() {
        if (($user = Auth::user())) {
            Alert::where('user_id', $user->id)->delete();
            return response()->json([
                'message' => "success"
            ], 200); // Status code here
        } else {
            return response()->json([
                'message' => "You need to login"
            ], 401); // Status code here
        }
    }
}