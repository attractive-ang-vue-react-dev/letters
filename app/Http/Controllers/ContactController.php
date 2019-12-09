<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Contact;
use App\Letter;

class ContactController extends Controller {

    public function contact_search(Request $request) {
        $filter = $request->filter;
        $contacts =Contact::where('id','like', $filter)
                      ->orWhere('first_name','like',$filter)
                      ->orWhere('middle_name','like',$filter)
                      ->orWhere('last_name','like',$filter)
                      ->orWhere('inmate_number','like',$filter)
                      ->orWhere('facility_name','like',$filter)
                      ->orWhere('facility_city','like',$filter)
                      ->get();
        return view('nav.contacts')->with([
        "user" => $contacts,
        "tab" => "contacts",
        "contacts" => $contacts
        ]);
    }

}
