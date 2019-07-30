<?php

namespace App\Http\Controllers;

use App\GuestMessage;
use Illuminate\Http\Request;
use App\Http\Requests\GuestBookMessageRequest;

class AjaxGuestBookController extends Controller
{
    public function postMessage(GuestBookMessageRequest $request) {
        $username = $request['username'];
        return response()->json(['username'=>$username]);
    }
}
