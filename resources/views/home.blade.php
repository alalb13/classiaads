    @extends('layouts.app')

    @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            @foreach ($announcements as $announcement)
            <div class="col-auto py-3">
                <div class="card align-items-center" style="width: 15rem;">
                    <img class="img-fluid w-75 card-img-top text-center" src="{{ asset('announcement/images')}}/{{$announcement->file}}" alt="Image of {{$announcement->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}}</h5>
                        <h6 class="card-title"><strong>Brand</strong> {{$announcement->brand}}</h6>
                        <h6 class="card-title text-righr"><strong>Price: </strong> {{$announcement->price}} €</h6>

                        <p class="card-text">{{ Str::limit($announcement->description, 30) }}</p>
                        <a href="#" class="btn btn-primary">See More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
