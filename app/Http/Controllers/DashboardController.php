<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Documentation;
use App\Models\Pic;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $pics = Pic::all();
        $activities = Activity::all();
        $documentations = Documentation::all();

        return view('pages.dashboard.index', compact('users', 'pics', 'activities', 'documentations'));
    }
}
