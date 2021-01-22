<?php

namespace App\Http\Controllers;

use App\Models\ImageAd;
use App\Models\Announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $announcements = Announcement::orderBy( 'created_at', 'desc' )->get();

        return view('home', compact('announcements'));
    }
}
