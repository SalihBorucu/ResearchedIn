<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Link;



class LinksController extends Controller
{
    public function store(request $request)
    {
        $user = User::findOrFail(Auth::id());
        if($user->link){
            $links = Link::findOrFail($user->link->id);
            // dd($request->links);

            $links->update([
                'research_sheet' =>json_encode($request->links),
            ]);

        }else{
            $links = Link::create([
            'user_id' => $user->id,
            'research_sheet' =>json_encode($request->links),
        ]);
        };

        $links = Link::with('user')->find($links->id);
            return response()->json([
            "details" => $user,
        ]);
     
            

    }

        public function update(request $request)
    {
        
    }

}
