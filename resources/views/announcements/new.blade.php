    @extends('layouts.app')
    @section('content')
        <div class="container mt-5 pt-5">

            <form action="{{route('postad')}}" method="POST">
                @csrf
                <div class="row">
                <div class="col-12 py-3">
                    <input type="text" class="form-control" placeholder="Title" name="title" id="title">
                </div>
                <div class="col-12  py-3">
                    <input type="text" class="form-control" placeholder="Brand" name="brand" id="brand">
                </div>
                <div class="col-12  py-3">
                    <input type="number" class="form-control" placeholder="Price" name="price" id="price">
                </div>
                <div class="col-12  py-3">
                    <textarea type="text" class="form-control" placeholder="Description" name="description" id="description"></textarea>
                </div>
                </div>
                <button class="btn btn-primary" type="submit">Create</button>
                </form>
        </div>
    @endsection
