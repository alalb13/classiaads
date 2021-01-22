<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $categories =['Motors', 'Informatic', 'Elettronics', 'Books', 'Games', 'Sport', 'House', 'Smartphone'];

        foreach ($categories as $category)
        {
            $c = new Category();
            $c->name = $category;
            $c->save();
        }
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
