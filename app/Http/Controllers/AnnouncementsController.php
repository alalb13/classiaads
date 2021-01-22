<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function newAnnouncement()
    {
        return view ('announcements/new');
    }

    public function postAnnouncement(Request $req)
    {
        $announcement = new Announcement;
        $announcement->title = $req->input('title');
        $announcement->brand = $req->input('brand');
        $announcement->price = $req->input('price');
        $announcement->description = $req->input('description');
        $announcement->save();
        // dd($annoucement);
        return redirect()->route ('editad', ['id'  =>$announcement->id]);
    }


    public function editAnnouncement($id){

        $announcement = Announcement::find($id);
        return view('announcements/edit', compact('announcement'));
    }


    public function updateAnnouncement(Request $req, $id)
    {
        $announcement = Announcement::find($id);

        $announcement->title = $req->input('title');
        $announcement->brand = $req->input('brand');
        $announcement->price = $req->input('price');
        $announcement->description = $req->input('description');
        $announcement->update($req->input());
        return redirect()->route('editad', ['id' =>$announcement->id]);
    }
}
