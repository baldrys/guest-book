<?php

namespace App\Http\Controllers;

use App\GuestMessage;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index(Request $request) {
        $messages = GuestMessage::orderBy('created_at', 'desc')->get();
        return view('index', ['messages' => $messages]);
    }
}
