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


        $image = $req->file('file');
        $imageName = time(). '.' .$image->extension();
        $image->move(public_path('announcement/images'), $imageName);

        $announcement = new Announcement;
        $announcement->title = $req->input('title');
        $announcement->brand = $req->input('brand');
        $announcement->price = $req->input('price');
        $announcement->description = $req->input('description');
        $announcement->file = $imageName;
        $announcement->save();

        return redirect()->route ('editad', ['id'  =>$announcement->id])->with('announcement.created.successfully' ,'announcement created success');
    }


    public function editAnnouncement($id){

        $announcement = Announcement::find($id);
        return view('announcements/edit', compact('announcement'));
    }


    public function updateAnnouncement(Request $req, $id)
    {
        $announcement = Announcement::find($id);

        $image = $req->file('file');
        $imageName = time(). '.' .$image->extension();
        $image->move(public_path('announcement/images'), $imageName);

        $announcement = new Announcement;
        $announcement->title = $req->input('title');
        $announcement->brand = $req->input('brand');
        $announcement->price = $req->input('price');
        $announcement->description = $req->input('description');
        $announcement->img = $req->input('file');

        $announcement->update($req->input());
        return redirect()->route('editad', ['id' =>$announcement->id]);
    }

    public function destroy($announcement_)
    {
        Announcement::where('id', $announcement_id)->delete();
        return redirect()->route('home')->with('deleted.announcement.succes', 'deteted announcement successfully');
    }

}
