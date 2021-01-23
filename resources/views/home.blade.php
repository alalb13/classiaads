    @extends('layouts.app')

    @section('content')

        @if (session('edit.not.valit'))
        <div class="container">
            <div class="row  mt-5">
                <div class="col-12">
                    <div class="alert alert-danger">
                        Annuncio non modificato (Il formato del file deve essere jpg/png)
                    </div>
                </div>
            </div>
        </div>
        @endif
            @if (session('announcement.update.successfully'))
            <div class="container">
                <div class="row  mt-5">
                    <div class="col-12">
                        <div class="alert alert-warning">
                            Annuncio modificato correttamente
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if (session('deleted.announcement.succes'))
            <div class="container">
                <div class="row  mt-5">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            Annuncio eliminato correttamente
                        </div>
                    </div>
                </div>
            </div>
            @endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            @foreach ($announcements as $announcement)


            <div class="col-auto py-3">
                <div class="card align-items-center" style="width: 15rem;">
                    <img class="h-200 img-fluid w-75 card-img-top text-center" src="{{ asset('announcement/images')}}/{{$announcement->file}}" alt="Image of {{ Str::limit($announcement->title, 20) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($announcement->title, 20) }}</h5>
                        <h6 class="card-title"><strong>Brand</strong> {{$announcement->brand}}</h6>
                        <h6 class="card-title text-righr"><strong>Price: </strong> {{$announcement->price}} €</h6>
                        <h6 class="card-title text-righr"><strong>Category: </strong> {{$announcement->category->name}}</h6>
                        <h6 class="card-title text-righr"><strong>User: </strong> {{$announcement->user->name}}</h6>
                        <p class="card-text">{{ Str::limit($announcement->description, 30) }}</p>
                        <a href="{{route('singlead', ['id' =>$announcement->id])}}" class="btn btn-primary">See More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
