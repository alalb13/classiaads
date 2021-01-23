@extends('layouts.app')
@section('content')

    <div class="container mt-5 ">
        <div class="row align-items-center justify-content-center ">
            <div class="col-12">
                <h1 class="text-center">{{$announcement->title}}</h1>
            </div>
        </div>
        <div class="row mt-5 align-items-center justify-content-center">
            <div class="col-6">
                <h4>{{$announcement->brand}}</h4>
                <h3>{{$announcement->price}} €</h3>
                <h3>{{$announcement->category->name}}</h3>
            </div>
            <div class="col-3">
                <img class="img-fluid w-75 card-img-top text-center" src="{{ asset('announcement/images')}}/{{$announcement->file}}" alt="Image of {{ Str::limit($announcement->title, 20) }}">
            </div>
            <div class="col-3">
                <p>{{$announcement->description}}</p>
            </div>
            @if(optional(Auth::user())->id === $announcement->user['id'])
            <div class="col-6 text-center mt-5">
                <a href="{{route('editad', ['id' =>$announcement->id])}}" class="btn btn-warning lead">Edit</a>
            </div>
            <div class="col-6 text-center mt-5">
                <a href="{{route('deletead', ['id' =>$announcement->id])}}" class="btn btn-danger lead">Delete</a>
            </div>
        @endif

        </div>
    </div>

@endsection
