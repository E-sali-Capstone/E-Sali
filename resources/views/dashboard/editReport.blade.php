@extends('dashboard.template.layout')
@section('content')
<div class="body flex-grow-1">
        @include('dashboard.template.alerts')
  <div class="container-lg px-4">
    <div class="row">
        <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Report Details</h4>
                      <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{route('save-updated-report')}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername1">Type of Report</label>
                          <input type="text" class="form-control" id="type" name="type" value="{{ $report->type }}" >
                          <input type="hidden" name="reportId" value="{{ $report->id }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputUsername1">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{$report->title}}" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea class="form-control" id="description" name="description">{{$report->description}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Upload Files</label>
                          <input type="file" class="form-control" id="fileUploads[]" name="fileUploads[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary me-2 btn-sm mt-2"> Submit </button>
                      </form>
                    </div>
                  </div>

              </div>
              <div class="col-md-6">
                <div class="card">
                                      <div class="card-header">
                                          Report Files
                                      </div>
                                      <div class="card-body">
                                              <table class="table">
                                                      <tbody>
                                                      <?php
                                                          $files = DB::table('report_files')
                                                          ->where('reports_id', $report->id)
                                                          ->get();
                                                          if($files){
                                                          foreach ($files as $fl) {
                                                              ?>
                                                                  <tr>
                                                                      <td> <a href="<?= asset('report_files/'.$fl->file_name.'') ?>">{{$fl->file_name}}</a> </td>
                                                                      <td><a href="{{ route('delete-report-file' , [$fl->file_id , $fl->file_name] ) }}" type="button" class="btn btn-danger btn-sm text-white btn-sm"><i class="cil-trash"></i></a></td>
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