<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class QuanTriVienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getHome(): View
    {
        return view('admin.home');
    }
}
