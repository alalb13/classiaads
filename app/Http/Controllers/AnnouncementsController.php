<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;

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

    public function postAnnouncement(AnnouncementRequest $req)
    {


        $image = $req->file('file');
        $imageName = time(). '.' .$image->extension();
        $image->move(public_path('announcement/images'), $imageName);

        $announcement = new Announcement;
        $announcement->title = $req->input('title');
        $announcement->brand = $req->input('brand');
        $announcement->price = $req->input('price');
        $announcement->description = $req->input('description');
        // $announcement->category_id = $req->input('category');
        $announcement->category_id = $req->input('category_id');
        $announcement->file = $imageName;
        $announcement->save();

        return redirect()->route ('home')->with('announcement.created.successfully' ,'announcement created success');
        // return redirect()->route ('editad', ['id'  =>$announcement->id])->with('announcement.created.successfully' ,'announcement created success');
    }


    public function editAnnouncement($id){

        $announcement = Announcement::find($id);
        return view('announcements/edit', compact('announcement'));
    }


    public function updateAnnouncement(AnnouncementRequest $req, $id)
    {
        $announcement = Announcement::find($id);

        $image = $req->file('file');
        $imageName = time(). '.' .$image->extension();
        $image->move(public_path('announcement/images'), $imageName);

        $announcement->title = $req->input('title');
        $announcement->brand = $req->input('brand');
        $announcement->price = $req->input('price');
        $announcement->description = $req->input('description');
        $announcement->category_id = $req->input('category_id');
        $announcement->file = $imageName;
        $announcement->save();

        $announcement->update($req->input());
        return redirect()->route('home')->with('announcement.update.successfully', 'Ad Updates Success');
    }

    public function deleteAnnouncement($announcement)
    {
        Announcement::where('id', $announcement)->delete();
        return redirect()->route('home')->with('deleted.announcement.succes', 'deteted announcement successfully');
    }

    public function singleAd($announcement){

        $announcement = Announcement::find($announcement);
        return view ('announcements.single', compact('announcement'));

    }

}
