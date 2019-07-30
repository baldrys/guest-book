<?php

namespace App\Http\Controllers;

use App\GuestMessage;
use Illuminate\Http\Request;
use App\Http\Requests\GuestBookMessageRequest;

class AjaxGuestBookController extends Controller
{
    public function postMessage(GuestBookMessageRequest $request) {
        $perPage = 5;
        $guestMessage = GuestMessage::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'homeapge' => $request['homeapge'],
            'text' => $request['message'],
        ]);

        if ($request['tags']) {
            $guestMessage->attachTags(preg_split('/\s+/', $request['tags']));
        }
        $messages = GuestMessage::orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $request['page']);
        // $messages = GuestMessage::orderBy('created_at', 'desc')->paginate($perPage);
        // $view = view("layouts/message", ['message' => $guestMessage])->render();
        // return response()->json(['new_message'=>$view]);
        $newMessagesView = view("layouts/messages", ['messages' => $messages])->render();
        $newPagination = view("layouts/pagination", ['messages' => $messages])->render();
        return response()->json([
            'newMessages'=> $newMessagesView,
            'newPagination' => $newPagination,
            ]);
    }
}
