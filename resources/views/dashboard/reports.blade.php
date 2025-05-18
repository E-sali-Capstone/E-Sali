@extends('dashboard.template.layout')
@section('content')
@if(Auth::user()->user_type ==  "Admin")
<div class="body flex-grow-1">
      @include('dashboard.template.alerts')
        <div class="container-lg">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap  pb-2 mb-3 border-bottom  ">
                <strong>Transparency Reports</strong>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a class="btn btn-sm btn-primary" href="{{route('new-report')}}">Create</a>
                    </div>
            </div>
            </div>
            <div class="card-body">
              <p class="text-body-secondary small">Official downloadable documents or publications that provide information on how governments operate, make decisions, and use public resources.</p>
              <div class="example">
                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview table-responsive" role="tabpanel" id="preview-1000">
                  <table id="dataTable" class="table text-center table-bordered">
                        <thead>
                          <tr>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Attachments</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($reports as $rep)
                            <tr>
                              <td>{{$rep->type}}</td>
                              <td>{{$rep->title}}</td>
                              <td>{{$rep->description}}</td>
                              <td>
                                @php
                                  $parameter= Crypt::encrypt($rep->id);
                                  $images= App\Models\ReportsUploadModel::where('reports_id', $rep->id)->get();
                                  foreach($images as $img){@endphp
                                    <a href="<?= asset('report_files/'.$img->file_name.'') ?>">{{$img->file_name}}</a> <br>
                                  @php
                                  }
                                  @endphp
                              </td>
                              <td>
                                <a href="{{route('edit-report' , $parameter)}}" type="button" class="btn btn-success text-white btn-rounded btn-fw btn-sm"> Edit </a>
                                <a href="{{route('delete-report' , $parameter)}}" type="button" class="btn btn-danger btn-rounded btn-fw btn-sm text-white"> Delete </a></td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
        </div>
      </div>
          
@endif

@endsection
