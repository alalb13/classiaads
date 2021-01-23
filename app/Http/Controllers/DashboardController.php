<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome()
    {

        $announcements = Announcement::where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->with('user')->paginate(5);

        return view('dashboard/panel', compact('announcements'));
    }

    public function deleteAnnouncementDashboard($id)
    {
        Announcement::where('id', $id)->delete();
        return redirect()->route('dashboard')->with('deleted.announcement.succes', 'deteted announcement successfully');
    }

}
