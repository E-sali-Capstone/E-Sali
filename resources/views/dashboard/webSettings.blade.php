@extends('dashboard.template.layout')
@section('content')

<div class="body flex-grow-1">
        @include('dashboard.template.alerts')
        <div class="container-lg px-4">
        <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Website Settings</h4>
                      <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('save-settings')}}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Website Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$settings->title}}" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description/Tagline</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{$settings->description}}" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$settings->address}}" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{$settings->contact_number}}" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" id="email_address" name="email_address" value="{{$settings->email_address}}" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">About</label>
                        <textarea type="text" class="form-control" id="about" name="about">{{$settings->about}}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Logo</label>
                          <input accept="image/png, image/jpg, image/jpeg" type="file" class="form-control" id="fileUpload" name="fileUpload">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Landing Page Background</label>
                          <input accept="image/png, image/jpg, image/jpeg" type="file" class="form-control" id="fileUploadBg" name="fileUploadBg">
                      </div>
                      <input type="hidden" name="oldLogo" value="{{$settings->logo}}">
                      <div class="mt-2">
                        <button type="submit" class="btn btn-primary btn-sm me-2"> Save Changes </button>
                      </div>
                    </form>
                    </div>
                  </div>

              </div>
    
        </div>
      </div>

@endsection
