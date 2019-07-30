<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuestBookMessageRequest;

class AjaxGuestBookController extends Controller
{
    public function postMessage(GuestBookMessageRequest $request) {
        return 'hw';
    }
}
