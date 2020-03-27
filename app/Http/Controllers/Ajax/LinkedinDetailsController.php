<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;



class LinkedinDetailsController extends Controller
{
    public function store(request $request)
    {
        
        $user = User::findOrFail(Auth::id());
        // dd($user);
        $user->update([
            'linkedin_email' => $request['linkedinEmail'],
            'linkedin_password' => Hash::make($request['linkedinPassword']),
        ]);

            return response()->json([
            "linkedinEmail" => $user->linkedin_email,
            "linkedinPassword" => $user->linkedin_password
        ]);
    }

        public function delete(request $request)
    {
        
        $user = User::findOrFail(Auth::id());

        $user->update([
            'linkedin_email' => null,
            'linkedin_password' => null,
        ]);

            return response()->json([
            "details" => $user,
        ]);
    }

}
