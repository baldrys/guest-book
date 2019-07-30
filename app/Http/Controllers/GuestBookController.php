<?php

namespace App\Http\Controllers;

use App\GuestMessage;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index(Request $request) {
        $messages = GuestMessage::all();
        return view('index', ['messages' => $messages]);
    }
}
