<?php

namespace guest_book\Http\Controllers;

use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index(Request $request) {
        return view('index');
    }
}
