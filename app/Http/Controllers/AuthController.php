<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User1;
use App\Models\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required',
            'password' => 'required',
        ]);
    
        // Fetch the user by id
        $user = DB::table('Users')
                  ->where('id', $request->id)
                  ->first(['id', 'password']);
    
        // Check if user exists and password matches
        if ($user && $user->password === $request->password) {
            return response()->json(1);
        } else {
            return response()->json(0);
        }
    }
    

    public function getLogs($userId)
    {
        $logs = DB::select('SELECT * FROM log WHERE id = ?', [$userId]);
        return response()->json($logs, 200);
    }

}
