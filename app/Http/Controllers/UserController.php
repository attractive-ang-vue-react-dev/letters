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
        if (strlen($content) < 100) {
          return redirect()->back()->withErrors([
            "Your letter is too short."
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
      $new_letter->save();

      if ($is_draft) {
        return redirect("/history")->with("success", "You've saved a draft!");
      } else {
        return "You cannot send a letter yet.";
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
