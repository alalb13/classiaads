    @extends('layouts.app')
    @section('content')
        <div class="container mt-5 pt-5">
            <form action="{{route('updatead',  $announcement->id)}}" method="POST">
                @csrf
                <div class="row">
                <div class="col-12 mt-3">
                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{$announcement->title}}">
                </div>
                <div class="col-12 mt-3">
                    <input type="text" class="form-control" placeholder="Brand" name="brand" value="{{$announcement->brand}}">
                </div>
                <div class="col-12 mt-3">
                    <input type="number" class="form-control" placeholder="Price" name="price" value="{{$announcement->price}}">
                </div>
                <div class="col-12 mt-3">
                    <textarea type="text" class="form-control" placeholder="Description" name="description">{{$announcement->description}}</textarea>
                </div>
                </div>
                <button class="btn btn-primary mt-5" type="submit">Update</button>
            </form>
        </div>
    @endsection
