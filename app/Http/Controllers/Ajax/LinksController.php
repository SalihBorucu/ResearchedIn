<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use duncan3dc\Laravel\Dusk;
use App\User;
use App\Link;



class LinksController extends Controller
{
    public function find(request $request)
    {
        // dd($request->value);
            $browser = new Dusk;
    $linkedInUsername = "uchikanda@hotmail.com";
    $linkedInPassword = "adminpassword12";
    $prospectsArray = [];
    // dd($browser);

    $browser->visit('https://www.linkedin.com/login?fromSignIn=true&trk=guest_homepage-basic_nav-header-signin')
            ->type('session_key', $linkedInUsername)
            ->type('session_password', $linkedInPassword)
            ->click('button[data-control-urn="login-submit"]')
            ->pause(3000)
//             // ->screenshot(storage_path('app/bla'));


//             // foreach($request->links as $link){
//             //     if($link === null){

//             //     }else{
//             //         $browser->visit($link);

//             //         $company = $browser->element(".pv-entity__secondary-title.t-14.t-black.t-normal")->getText();
//             //         $country = $browser->element(".t-16.t-black.t-normal.inline-block")->getText();
//             //         $name = $browser->element(".inline.t-24.t-black.t-normal.break-words")->getText();
//             //         $nameArr = explode(" ",$name);
//             //         $firstName = array_shift($nameArr);
//             //         $secondName = implode($nameArr);
//             //         $title = $browser->element("h3[class='t-16 t-black t-bold']")->getText();

//             //         if($browser->element(".pv-entity__location.t-14 t-black--light.t-normal block")){
//             //             $city = $browser->element(".pv-entity__location.t-14 t-black--light.t-normal block")->getText();
//             //             }else{
//             //                 $city = null;
//             //             }

//             //         $prospect = (object) [
//             //             'company' => $company,
//             //             'firstName' => $firstName,
//             //             'secondName' => $secondName,
//             //             'country' => $country,
//             //             'title' => $title,
//             //             'city' => $city
//             //         ];

//             //         array_push($prospectsArray, $prospect);
//             //             }
//             // }
//             // dd($prospectsArray);
        



    ->visit($request->value);
    $company = $browser->element(".pv-entity__secondary-title.t-14.t-black.t-normal")->getText();
    $country = $browser->element(".t-16.t-black.t-normal.inline-block")->getText();
    $name = $browser->element(".inline.t-24.t-black.t-normal.break-words")->getText();
    $nameArr = explode(" ",$name);
    $firstName = array_shift($nameArr);
    $secondName = implode($nameArr);
    $title = $browser->element("h3[class='t-16 t-black t-bold']")->getText();

    if($browser->element(".pv-entity__location.t-14 t-black--light.t-normal block")){
        $city = $browser->element(".pv-entity__location.t-14 t-black--light.t-normal block")->getText();
        }else{
            $city = null;
        }

    // $prospect = [$company, $country, $name, $title, $firstName, $secondName, $city];
  $prospect = (object) [
    'company' => $company,
    'firstName' => $firstName,
    'secondName' => $secondName,
    'country' => $country,
    'title' => $title,
    'city' => $city
  ];
    return response()->json([
        "prospect" => $prospect,
    ]);




     
    }

        public function update(request $request)
    {
        $user = User::findOrFail(Auth::id());
        $links = Link::findOrFail($user->link->id);

        $links->update([
            'research_sheet' =>json_encode($request->links),
        ]);
        
        $links = Link::with('user')->find($links->id);
            return response()->json([
            "details" => $user,
        ]);
    }

}
