<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $announcement->user_id = Auth::id();
        $announcement->title = $req->input('title');
        $announcement->brand = $req->input('brand');
        $announcement->price = $req->input('price');
        $announcement->description = $req->input('description');
        $announcement->category_id = $req->input('category_id');

        $announcement->file = $imageName;
        $announcement->save();

        return redirect()->route ('dashboard')->with('announcement.created.successfully' ,'announcement created success');
        // return redirect()->route ('editad', ['id'  =>$announcement->id])->with('announcement.created.successfully' ,'announcement created success');
    }


    public function editAnnouncement($id){

        $announcement->user_id = Auth::id();
        return view('announcements/edit', compact('announcement'));
    }


    public function updateAnnouncement(AnnouncementRequest $req, $id)
    {
        $announcement = Announcement::find($id);

        $image = $req->file('file');
        $imageName = time(). '.' .$image->extension();
        $image->move(public_path('announcement/images'), $imageName);

        $announcement->user_id = Auth::id();
        $announcement->title = $req->input('title');
        $announcement->brand = $req->input('brand');
        $announcement->price = $req->input('price');
        $announcement->description = $req->input('description');
        $announcement->category_id = $req->input('category_id');
        $announcement->file = $imageName;
        $announcement->save();

        $announcement->update($req->input());
        return redirect()->route('dashboard')->with('announcement.update.successfully', 'Ad Updates Success');

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }

    public function deleteAnnouncement($id)
    {
        Announcement::where('id', $id)->delete();
        return redirect()->route('home')->with('deleted.announcement.succes', 'deteted announcement successfully');
    }

}
