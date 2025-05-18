@extends('dashboard.template.layout')
@section('content')
<div class="body flex-grow-1">
      @include('dashboard.template.alerts')
      @if(Auth::user()->user_type ==  "Admin")

        <div class="container-lg">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap  pb-2 mb-3 border-bottom  ">
                <strong>Community Polls Table</strong>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a class="btn btn-sm btn-primary" href="{{route('new-poll')}}">Create</a>
                    </div>
              </div>
            </div>
            <div class="card-body">
              <p class="text-body-secondary small">Transparent voting is crucial for building trust and ensuring fairness in community decision-making processes. Below are key insights from various polls and surveys regarding the implementation and perception of transparent voting in community.</p>
              <div class="example">
                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview table-responsive" role="tabpanel" id="preview-1000">
                  <table id="dataTable" class="table text-center table-bordered">
                        <thead>
                          <tr>
                            <th>Topic</th>
                            <th>Question</th>
                            <th>Valid From</th>
                            <th>Valid To</th>
                            <th>Results</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($polls as $p)
                           @php
                                  $parameter= Crypt::encrypt($p->question_id);
                                  @endphp
                            <tr>
                              <td>{{$p->poll_title}}</td>
                              <td>{{$p->question}}</td>
                                <td>{{ date('F d, Y h:i:s a' , strtotime($p->valid_from)) }}</td>
                              <td>{{ date('F d, Y h:i:s a' , strtotime($p->valid_to)) }}</td>
                              <td><a href="{{route('poll-responses' , $parameter)}}" type="button" class="btn btn-info btn-rounded btn-fw btn-sm text-white"> View Responses </a>
</td>
                              <td> 
                           
                                 <a href="{{route('view-poll' , $parameter)}}" type="button" class="btn btn-success btn-rounded btn-fw btn-sm text-white"> View/Edit </a>
                                 <a type="button" href="{{route('delete-poll' , $p->question_id)}}" class="btn btn-danger btn-rounded btn-fw btn-sm text-white">Delete </a></td>
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

@if(Auth::user()->user_type ==  "Citizen")

        <div class="container-lg">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap  pb-2 mb-3 border-bottom  ">
                <strong>Community Polls Table</strong>
                
            </div>
            <div class="card-body">
              <p class="text-body-secondary small">Transparent voting is crucial for building trust and ensuring fairness in community decision-making processes. Below are key insights from various polls and surveys regarding the implementation and perception of transparent voting in community.</p>
              <div class="example">
                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview table-responsive" role="tabpanel" id="preview-1000">
                  <table class="table text-center table-bordered" id="dataTable">
                        <thead>
                          <tr>
                            <th>Question</th>
                            <th>Valid From</th>
                            <th>Valid To</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($polls as $p)
                            <tr>
                              <td>{{$p->question}} </td>
                              <td>{{ date('F d, Y h:i:s a' , strtotime($p->valid_from)) }}</td>
                              <td>{{ date('F d, Y h:i:s a' , strtotime($p->valid_to)) }}</td>
                              <td> 
                              @php
                                  $parameter= Crypt::encrypt($p->question_id);
                                  @endphp
                                 <a href="{{route('view-poll' , $parameter)}}" type="button" class="btn btn-success btn-rounded btn-fw btn-sm text-white">View/Participate</a>
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