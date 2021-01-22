<?php

namespace App\Models;

use App\Models\ImageAd;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    protected $fillable = ['announcements'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
