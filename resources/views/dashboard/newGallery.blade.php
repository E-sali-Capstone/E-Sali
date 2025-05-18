@extends('dashboard.template.layout')
@section('content')

<div class="body flex-grow-1">
        @include('dashboard.template.alerts')
        <div class="container-lg px-4">
        <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">New Gallery</h4>
                      <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{route('save-gallery')}}">
                        @csrf
 
                        <div class="form-group">
                          <label for="exampleInputUsername1">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea class="form-control" id="description" name="description" value="{{old('description')}}" > </textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Upload Images</label>
                          <input accept="image/png, image/jpg, image/jpeg" type="file" class="form-control" id="fileUploads[]" name="fileUploads[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary me-2 mt-2"> Submit </button>
                      </form>
                    </div>
                  </div>

              </div>
    
        </div>
      </div>


@endsection