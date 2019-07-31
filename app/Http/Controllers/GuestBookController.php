<?php

namespace App\Http\Controllers;

use App\GuestMessage;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index(Request $request) {
        $messages = GuestMessage::orderBy('created_at', 'desc')->paginate(5);
        return view('index', ['messages' => $messages]);
    }

    public function refreshCaptcha(Request $request) {
        return captcha_img();
    }
}
