<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard', compact('users'));
    }

    public function userDashboard()
    {

        $messages = Message::where('to_id', Auth::user()->id)->get();

        return view('user.index', compact('messages'));
    }
}
