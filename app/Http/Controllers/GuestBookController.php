<?php

namespace App\Http\Controllers;

use App\GuestMessage;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index(Request $request) {
        $messages = GuestMessage::all();
        // $first =  $messages->first()->attachTags(['tag4', 'tag5']);
        // dd($first->tagsToString());
        // // $first->attachTag('tag3');
        // // $guestMessage = GuestMessage::withAnyTags(['tag3'])->get();
        // // dd($guestMessage);
        return view('index', ['messages' => $messages]);
    }
}
