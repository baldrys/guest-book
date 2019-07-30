<?php

namespace App\Http\Controllers;

use App\GuestMessage;
use Illuminate\Http\Request;
use App\Http\Requests\GuestBookMessageRequest;

class AjaxGuestBookController extends Controller
{
    public function postMessage(GuestBookMessageRequest $request) {
        $guestMessage = GuestMessage::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'homeapge' => $request['homeapge'],
            'text' => $request['message'],
        ]);

        if ($request['tags']) {
            $guestMessage->attachTags(preg_split('/\s+/', $request['tags']));
        }
        $view = view("layouts/message", ['message' => $guestMessage])->render();
        return response()->json(['new_message'=>$view]);
    }
}
