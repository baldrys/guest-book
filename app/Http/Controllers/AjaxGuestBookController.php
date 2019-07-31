<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $paginationMessages = view("includes/pagination-messages", ['messages' => $messages])->render();
        return response()->json([
            'paginationMessages'=> $paginationMessages,
            ]);
    }

    public function ajaxGetPaginateMessages(Request $request) {
        if($request->ajax())
        {
            $perPage = 5;
            $messages = GuestMessage::orderBy('created_at', 'desc')->paginate($perPage);
            $paginationMessages = view("includes/pagination-messages", ['messages' => $messages])->render();
            return response()->json([
                'paginationMessages'=> $paginationMessages,
                ]);
        }

    }

    public function ajaxSearch(Request $request) {
        if($request->ajax())
        {
            $perPage = 5;
            $q = $request['search'];
            if ($q){
                $query = GuestMessage::withAnyTags([$q])
                    ->orwhere('username', $q)
                    ->orWhere('email', $q);
                if ((bool)strtotime($q)){
                    $query = $query->orWhere('created_at', Carbon::parse($q));
                } 
                $messages = $query->orderBy('created_at', 'desc')->paginate($perPage);
                $paginationMessages = view("includes/pagination-messages", ['messages' => $messages])->render();
                return response()->json([
                    'paginationMessages'=> $paginationMessages,
                    ]);
            }

        }

    }


}
