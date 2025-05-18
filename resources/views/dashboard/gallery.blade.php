@extends('dashboard.template.layout')
@section('content')
@if(Auth::user()->user_type ==  "Admin")
<div class="body flex-grow-1">
      @include('dashboard.template.alerts')
        <div class="container-lg">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap  pb-2 mb-3 border-bottom  ">
                <strong>Gallery Table</strong>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a class="btn btn-sm btn-primary" href="{{route('new-gallery')}}">Create</a>
                    </div>
            </div>
            </div>
            <div class="card-body">
              <p class="text-body-secondary small">Curated collection of photographs managed by public institutions, showcasing significant events, historical milestones, cultural heritage, and notable figures. These galleries serve as visual archives that document and preserve the nation's history and identity.</p>
              <div class="example">
                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview table-responsive" role="tabpanel" id="preview-1000">
                  <table id="dataTable" class="table text-center table-bordered">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($gallery as $gall)
                            <tr>
                              <td>{{$gall->id}}</td>
                              <td>{{$gall->title}}</td>
                              <td>{{$gall->description}}</td>
                              <td>
                              @php
                                  $parameter= Crypt::encrypt($gall->id);
                                  @endphp
                                <a href="{{route('edit-gallery' , $parameter)}}" type="button" class="btn btn-success btn-rounded btn-fw btn-sm text-white">View/Edit </a>
                              </td>
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