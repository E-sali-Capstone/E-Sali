@extends('dashboard.template.layout')
@section('content')

<div class="body flex-grow-1">
        @include('dashboard.template.alerts')
        <div class="container-lg px-4">
          <div class="row">
        <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Update Announcement</h4>
                      <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{route('save-updated-announcement')}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername1">Category</label>
                          <select id="category" name="category" class="form-control">
                            <option value="">-- Please Choose a Category --</option>
                            <option value="Health and Safety">Health and Safety</option>
                            <option value="Education and Schools">Education and Schools</option>
                            <option value="Election Updates">Election Updates</option>
                            <option value="Transportation and Infrastructure">Transportation and Infrastructure</option>
                            <option value="Employment and Labor">Employment and Labor</option>
                            <option value="Public Safety and Security">Public Safety and Security</option>
                            <option value="Environment and Natural Resources">Environment and Natural Resources</option>
                            <option value="Technology and Digital Services">Technology and Digital Services</option>
                            <option value="Community Programs and Services">Community Programs and Services</option>
                            <option value="Emergency Alerts and Disaster Response">Emergency Alerts and Disaster Response</option>
                            <option value="Governance and Policy Updates">Governance and Policy Updates</option>
                            <option value="Utilities and Public Works">Utilities and Public Works</option>
                            <option value="Finance, Taxes, and Economic Affairs">Finance, Taxes, and Economic Affairs</option>
                          </select>                        
                        </div>  
                        <div class="form-group">
                          <label for="exampleInputUsername1">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{$announcement->title}}" >
                          <input type="hidden" name="announcementId" id="announcementId" value="{{$announcement->id}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Content</label>
                          <textarea class="form-control" id="content" name="content">{{$announcement->content}}</textarea>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Valid From</label>
                              <input type="datetime-local" class="form-control" id="validFrom" name="validFrom" value="{{$announcement->valid_from}}" >
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Valid To</label>
                              <input type="datetime-local" class="form-control" id="validTo" name="validTo"  value = "{{$announcement->valid_to}}" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option @if($announcement->announcement_status == 'Active'){{'selected'}}@endif value="Active">Active</option>
                                    <option @if($announcement->announcement_status == 'Not Active'){{'selected'}}@endif value="Not Active">Not Active</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Upload Images</label>
                          <input accept="image/png, image/jpg, image/jpeg" type="file" class="form-control" id="fileUploads[]" name="fileUploads[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary me-2 btn-sm mt-2"> Submit </button>
                      </form>
                    </div>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                                      <div class="card-header">
                                          Announcement Photos
                                      </div>
                                      <div class="card-body">
                                              <table class="table">
                                                      <tbody>
                                                      <?php
                                                          $images = DB::table('announcement_images')
                                                          ->where('announcements_id', $announcement->id)
                                                          ->get();
                                                          if($images){
                                                          foreach ($images as $img) {
                                                              ?>
                                                                  <tr>
                                                                      <td><img id="IMG<?=$img->image_id?>" onclick="viewImage('IMG<?=$img->image_id?>')" width="20%" src="<?= asset('images/'.$img->file_name.'') ?>"/></td>
                                                                      <td><a href="{{ route('delete-announcement-image' , [$img->image_id , $img->file_name] ) }}" type="button" class="btn btn-danger btn-sm text-white btn-sm"><i class="cil-trash"></i></a></td>
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
