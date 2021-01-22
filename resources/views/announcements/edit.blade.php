    @extends('layouts.app')
    @section('content')
        <div class="container mt-5 pt-5">
            @if (session('announcement.created.successfully'))
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            Annuncio creato correttamente
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <form action="{{route('updatead',[ "id" =>$announcement->id])}}" method="POST" enctype="multipart/form-data">
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
                    <div class="input-group mb-3 mt-5">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                        <input type="file" name="file" class="form-control" id="inputGroupFile01" onchange="previewFile(this)">
                        <label class="custom-file-label" for="inputGroupFile01">Choose</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Create</button>
                </form>
                <div class="row text-center">
                    <div class="col-12">
                        <img class="mt-2" id="previewImg" alt="announcement image" style="max-width: 130px;margin-top:20px;" />
                    </div>
                </div>
        </div>
        <script>
            function previewFile(input){
                var file=$("input[type=file]").get(0).files[0];
                if(file)
                {
                    var reader = new FileReader();
                    reader.onload = function(){
                        $('#previewImg').attr("src", reader.result);
                    }
                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endsection
