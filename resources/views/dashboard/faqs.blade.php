@extends('dashboard.template.layout')
@section('content')
@if(Auth::user()->user_type ==  "Admin")

<div class="body flex-grow-1">
      @include('dashboard.template.alerts')
        <div class="container-lg">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap  pb-2 mb-3 border-bottom  ">
                <strong>Frequently Asked Questions</strong>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a class="btn btn-sm btn-primary" href="{{route('new-faq')}}">Create</a>
                    </div>
            </div>
            </div>
            <div class="card-body">
              <p class="text-body-secondary small">Create quick answers to the most common questions about our services, programs, and procedures. Whether looking for information on permits, public records, benefits, or contact details, this section is here to help citizens navigate government resources with ease.</p>
              <div class="example">
                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview table-responsive" role="tabpanel" id="preview-1000">
                  <table id="dataTable" class="table text-center table-bordered">
                        <thead>
                          <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Created</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($faqs as $faq)
                            <tr>
                              <td>{{$faq->question}}</td>
                              <td>{{$faq->answer}}</td>
                              <td>{{ date('F d, Y' , strtotime($faq->created_at)) }}</td>
                              <td> 
                              @php
                                  $parameter= Crypt::encrypt($faq->faq_id);
                                  @endphp
                                 <a href="{{route('edit-faq' , $parameter)}}" type="button" class="btn btn-success text-white btn-rounded btn-fw btn-sm"> Edit </a>
                                  <a type="button" href="{{route('delete-faq' , $faq->faq_id)}}" class="btn btn-danger btn-rounded btn-fw btn-sm text-white">Delete </a></td>
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