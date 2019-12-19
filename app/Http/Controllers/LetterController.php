<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Contact;
use App\Letter;

class LetterController extends Controller
{
    public function send(Request $request) {
      $data = $request->validate([
        'contact_id' => 'required',
        'content' => 'required'
      ]);

      $user = Auth::user();

      if ($user->credit == 0) {
        return redirect("/credits");
      }

      $contact = Contact::find($data["contact_id"]);
      $content = $data["content"];

      $from_name = $user->first_name . " " $user->last_name;
      $from_address_1 = $user->addr_line_1;
      $from_address_2 = $user->addr_line_2;
      $from_city = $user->city;
      $from_state = $user->state;
      $from_zip = $user->postal;

      $to_name = $contact->first_name . " " . $contact->last_name . ", " . $contact->inmate_number;
      $to_facility_name = $contact->facility_name;
      $to_address = $contact->facility_address;
      $to_city = $contact->facility_city;
      $to_state = $contact->facility_state;
      $to_zip = $contact->facility_postal;

      return [
        $from_name,
        $from_address_1,
        $from_address_2,
        $from_city,
        $from_state,
        $from_zip,
        $to_name,
        $to_facility_name,
        $to_address,
        $to_city,
        $to_state,
        $to_zip
      ];


    }
}
