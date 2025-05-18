@extends('dashboard.template.layout')
@section('content')
@if(Auth::user()->user_type ==  "Admin")
<div class="body flex-grow-1">
      @include('dashboard.template.alerts')
        <div class="container-lg">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap  pb-2 mb-3 border-bottom  ">
                <strong>Citizens Table</strong>
                <div class="btn-toolbar mb-2 mb-md-0">
                  
            </div>
            </div>
            <div class="card-body">
              <p class="text-body-secondary small">Fostering stronger connections between citizens and enhancing community engagement.</p>
              <div class="example">
                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview table-responsive" role="tabpanel" id="preview-1000">
                  <table id = "dataTable" class="table text-center table-bordered">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Registered</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($citizens as $ct)
                            <tr>
                              <td>{{$ct->name}}</td>
                              <td>{{$ct->email}}</td>
                              <td>{{ date('F d, Y' , strtotime($ct->created_at)) }}</td>
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