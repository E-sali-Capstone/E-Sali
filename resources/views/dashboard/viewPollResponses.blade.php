@extends('dashboard.template.layout')
@section('content')

<div class="body flex-grow-1">
      @include('dashboard.template.alerts')
        <div class="container-lg">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap  pb-2 mb-3 border-bottom  ">
                <strong>Poll Responses</strong>
            </div>
            <div class="card-body">
              <div class="example">
                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview table-responsive" role="tabpanel" id="preview-1000">
                 <table id  = "dataTable" class="table text-center table-bordered display">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Answer</th>
                            <th>Date Responded</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($poll_responses as $pr)
                            <tr>
                              <td>{{$pr->citizen_name}}</td>
                              <td>{{$pr->choice}}</td>
                              <td>{{ date('F d, Y h:i:s a' , strtotime($pr->response_date)) }}</td>
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