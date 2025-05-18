@extends('dashboard.template.layout')
@section('content')

<div class="body flex-grow-1">
        @include('dashboard.template.alerts')
        <div class="container-lg px-4">
          <div class="row">
        <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Update Gallery</h4>
                      <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{route('save-updated-gallery')}}">
                        @csrf
                    
                        <div class="form-group">
                          <label for="exampleInputUsername1">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{$gall->title}}" >
                          <input type="hidden" class="form-control" id="galleryId" name="galleryId" value="{{$gall->id}}" >

                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea class="form-control" id="description" name="description">{{$gall->description}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Upload Images</label>
                          <input accept="image/png, image/jpg, image/jpeg" type="file" class="form-control" id="fileUploads[]" name="fileUploads[]" multiple>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Status</label>
                          <select name="status" id="status" class="form-control">
                              <option @if($gall->status == 'Active'){{'selected'}}@endif value="Active">Active</option>
                              <option @if($gall->status == 'Not Active'){{'selected'}}@endif value="Not Active">Not Active</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2 mt-2"> Submit </button>
                      </form>
                    </div>
                  </div>
  
              </div>

              <div class="col-md-6">
                <div class="card">
                                      <div class="card-header">
                                          Gallery Photos
                                      </div>
                                      <div class="card-body">
                                              <table class="table">
                                                      <tbody>
                                                      <?php
                                                          $images = DB::table('gallery_images')
                                                          ->where('gallery_id', $gall->id)
                                                          ->get();
                                                          if($images){
                                                          foreach ($images as $img) {
                                                              ?>
                                                                  <tr>
                                                                      <td><img id="IMG<?=$img->image_id?>" onclick="viewImage('IMG<?=$img->image_id?>')" width="20%" src="<?= asset('gallery_images/'.$img->file_name.'') ?>"/></td>
                                                                      <td><a href="{{ route('delete-gallery-image' , [$img->image_id , $img->file_name] ) }}" type="button" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a></td>
                                                                  </tr>
                                                              <?php
                                                          }}  
                                                      ?>         
                                                    </tbody>
                                              </table>
                                      </div>
                                  </div>
                </div>
                </div>
        </div>
      </div>


@endsection

<script type="text/javascript">
    function viewImage(image_id){
        const gallery = new Viewer(document.getElementById(image_id));
    }
</script>
