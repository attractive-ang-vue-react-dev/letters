<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Contact;
use App\Letter;

class UserController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function logout() {
      Auth::logout();
      return redirect('/login');
    }

    public function compose() {
      $user = Auth::user();

      $contacts = Contact::where('user_id', $user->id)->get();

      return view('nav.home')->with([
        "user" => $user,
        "tab" => "compose",
        "contacts" => $contacts
      ]);
    }

    public function contacts() {
      $user = Auth::user();

      $contacts = Contact::where('user_id', $user->id)->get();

      return view('nav.contacts')->with([
        "user" => $user,
        "tab" => "contacts",
        "contacts" => $contacts
      ]);
    }

    public function history() {
      $user = Auth::user();

      $letters = Letter::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

      return view('nav.history')->with([
        "user" => $user,
        "tab" => "history",
        "letters" => $letters
      ]);
    }

    public function add_contact(Request $request) {
      $user = Auth::user();

      $data = $request->validate([
        'first_name' => 'required|max:255',
        'middle_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'inmate_number' => 'required|max:50',
        'facility_name' => 'required|max:255',
        'facility_address' => 'required|max:255',
        'facility_city' => 'required|max:255',
        'facility_state' => 'required|max:255',
        'facility_postal' => 'required|max:255',
      ]);

      $new_contact = new Contact;

      $new_contact->user_id = $user->id;
      $new_contact->first_name = $data['first_name'];
      $new_contact->middle_name = $data['middle_name'];
      $new_contact->last_name = $data['last_name'];
      $new_contact->inmate_number = $data['inmate_number'];
      $new_contact->facility_name = $data['facility_name'];
      $new_contact->facility_address = $data['facility_address'];
      $new_contact->facility_city = $data['facility_city'];
      $new_contact->facility_state = $data['facility_state'];
      $new_contact->facility_postal = $data['facility_postal'];

      $new_contact->save();

      return redirect('/contacts');
    }

    public function remove_contact($id) {
      $user = Auth::user();

      $contact = Contact::find($id);

      if ($contact) {
        if ($contact->user_id == $user->id) {
          $contact->delete();
        }
      }

      return redirect('/contacts');
    }

    public function profile() {
      $user = Auth::user();

      return view('nav.profile')->with([
        "user" => $user,
        "tab" => "profile"
      ]);
    }

    public function credits() {
      $user = Auth::user();

      return view('nav.credits')->with([
        "user" => $user,
        "tab" => "credits"
      ]);
    }

    public function save_profile(Request $request) {
      $user = Auth::user();

      $data = $request->validate([
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'addr_line_1' => 'required|max:255',
        'addr_line_2' => 'min:0|max:50',
        'city' => 'required|max:255',
        'state' => 'required|max:2',
        'postal' => 'required|max:5',
      ]);

      $user->first_name = $data['first_name'];
      $user->last_name = $data['last_name'];
      $user->addr_line_1 = $data['addr_line_1'];
      $user->addr_line_2 = $data['addr_line_2'];
      $user->city = $data['city'];
      $user->state = $data['state'];
      $user->postal = $data['postal'];

      $user->save();

      return redirect('/profile');
    }

    public function send_letter(Request $request) {
      $user = Auth::user();

      $letter_id = $request->input('letter_id');
      $contact_id = $request->input('contact_id');
      $content = $request->input('content');

      $data = $request->validate([
        'attached_image' => 'image|max:5000'
      ]);

      if ($data["attached_image"]) {
        $attached_img = file_get_contents($data["attached_image"]);
      } else {
        $attached_img = false;
      }


      $is_draft = $request->input('is_draft');

      if ($is_draft == "yes") {
        $is_draft = true;
      } else {
        $is_draft = false;
      }

      $contact = Contact::find($contact_id);

      if (!$contact) {
        return redirect()->back()->withErrors([
          "That Contact doesn't exist."
        ]);
      }

      if (!$is_draft) {
        if (strlen($content) < 200) {
          return redirect()->back()->withErrors([
            "Your letter is too short. It must be at least 200 characters long."
          ]);
        }
      }

      if ($letter_id) {
        $new_letter = Letter::find($letter_id);
      } else {
        $new_letter = new Letter;
      }

      $new_letter->user_id = $user->id;
      $new_letter->contact_id = $contact_id;
      $new_letter->content = $content;

      if ($attached_img) {
        $new_letter->attached_img_src = $attached_img;
      }

      $new_letter->save();

      if ($is_draft) {
        return redirect("/history")->with("success", "You've saved a draft!");
      } else {
        $lob_key = env("LOB_KEY");

        $lob = new \Lob\Lob($lob_key);

        $from_name = $user->first_name . " " . $user->last_name;
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

        // $lob_from = $lob->addresses()->create(array(
        //   'name' => $from_name,
        //   'address_line1' => $from_address_1,
        //   'address_line2' => $from_address_2,
        //   'address_city' => $from_city,
        //   'address_state' => $from_state,
        //   'address_zip' => $from_zip
        // ));
        $lob_from = array(
          'name' => $from_name,
          'address_line1' => $from_address_1,
          'address_line2' => $from_address_2,
          'address_city' => $from_city,
          'address_state' => $from_state,
          'address_zip' => $from_zip
        );

        // $lob_to = $lob->addresses()->create(array(
        //   'name' => $to_name,
        //   'address_line1' => $to_facility_name,
        //   'address_line2' => $to_address,
        //   'address_city' => $to_city,
        //   'address_state' => $to_state,
        //   'address_zip' => $to_zip
        // ));
        $lob_to = array(
          'name' => $to_name,
          'address_line1' => $to_facility_name,
          'address_line2' => $to_address,
          'address_city' => $to_city,
          'address_state' => $to_state,
          'address_zip' => $to_zip
        );

        $date = \Carbon\Carbon::now()->toFormattedDateString();

        if ($attached_img) {
          $letter_content = "<!DOCTYPE html><html lang='en' dir='ltr'><head><meta charset='utf-8'><title></title><link href='https://fonts.googleapis.com/css?family=Montserrat&display=swap' rel='stylesheet'></head><body><style>* {font-family: 'Montserrat', sans-serif;} .date {margin-top: 5in;}</style><p class='date'>$date</p><p class='content'>$content</p><p><img src='$attached_img' style='max-width: 9in;'></p><p style='font-size: 12px; color: #eee;'>This letter was sent for free. Learn more at <b><i>ameelio.org</i></b>.</p></body></html>";
        } else {
          $letter_content = "<!DOCTYPE html><html lang='en' dir='ltr'><head><meta charset='utf-8'><title></title><link href='https://fonts.googleapis.com/css?family=Montserrat&display=swap' rel='stylesheet'></head><body><style>* {font-family: 'Montserrat', sans-serif;} .date {margin-top: 5in;}</style><p class='date'>$date</p><p class='content'>$content</p><p style='font-size: 12px; color: #eee;'>This letter was sent for free. Learn more at <b><i>ameelio.org</i></b>.</p></body></html>";
        }


        $lob_letter = $lob->letters()->create(array(
          'to' => $lob_to,
          'from' => $lob_from,
          'file' => $letter_content,
          'description' => 'Letter from ' . $user->first_name . " " . $user->last_name . " to Inmate # " . $contact->inmate_number,
          'color' => false
        ));

        $new_letter->sent = true;
        $new_letter->save();

        $user->credit -= 1;
        $user->save();

        return redirect("/history");
      }
    }

    public function continue_draft($letter_id) {
      $user = Auth::user();

      $letter = Letter::find($letter_id);

      if (!$letter) {
        return redirect("/");
      }

      $contacts = Contact::where('user_id', $user->id)->get();

      return view('nav.home')->with([
        "user" => $user,
        "tab" => "compose",
        "contacts" => $contacts,
        "contact_id" => $letter->contact_id,
        "content" => $letter->content,
        "letter_id" => $letter->id
      ]);
    }

    public function delete_letter($letter_id) {
      $user = Auth::user();

      $letter = Letter::find($letter_id);

      if (!$letter) {
        return redirect("/");
      }

      $letter->delete();

      return redirect()->back()->with("success", "You've deleted a letter.");
    }
}
