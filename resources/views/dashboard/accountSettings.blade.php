@extends('dashboard.template.layout')
@section('content')
  <div class="body flex-grow-1">
        @include('dashboard.template.alerts')
        <div class="container-lg px-4">
        <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Account Details</h4>
                      <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('update-account')}}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Email Address</label>
                        <input readonly type="text" class="form-control" id="emailAddress" name="emailAddress" value="{{$account->email}}" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$account->name}}" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Photo</label>
                          <input accept="image/png, image/jpg, image/jpeg" type="file" class="form-control" id="fileUpload" name="fileUpload">
                      </div>
                      <input type="hidden" name="oldPhoto" value="{{$account->profile_photo}}">
                      <button type="submit" class="btn btn-primary btn-sm mt-2"> Submit </button>
                    </form>
                    </div>
                  </div>

              </div>
    
        </div>
      </div>
@endsection