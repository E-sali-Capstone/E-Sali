@extends('dashboard.template.layout')
@section('content')

<div class="body flex-grow-1">
      @include('dashboard.template.alerts')
        <div class="container-lg">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap  pb-2 mb-3 border-bottom  ">
                <strong>Announcements Table</strong>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a class="btn btn-sm btn-primary" href="{{route('new-announcement')}}">Create</a>
                    </div>
            </div>
            </div>
            <div class="card-body">
              <p class="text-body-secondary small">Keep the community informed about activities, meetings, opportunities, and other relevant news, fostering connection and engagement among citizens.</p>
              <div class="example">
                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview table-responsive" role="tabpanel" id="preview-1000">
                  <table id="dataTable" class="table text-center table-bordered">
                        <thead>
                          <tr>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Date Created</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($announcements as $ann)
                            <tr>
                              <td>{{$ann->category}}</td>
                              <td>{{$ann->title}}</td>
                              <td>{{$ann->content}}</td>
                              <td>{{$ann->created_at->format('Y-m-d') }}
                              </td>
                                @php
                                  $parameter= Crypt::encrypt($ann->id);
                                  @endphp
                              <td>
                              <a href="{{route('edit-announcement' , $parameter)}}" type="button" class="btn btn-success btn-rounded btn-fw btn-sm text-white">Edit </a>
                              <a href="{{route('delete-announcement' , $parameter)}}" type="button" class="btn btn-danger btn-rounded btn-fw btn-sm text-white"> Delete </a></td>
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
@endsection