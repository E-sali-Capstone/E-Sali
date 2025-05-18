@extends('dashboard.template.layout')
@section('content')  
<div class="body flex-grow-1">
        @include('dashboard.template.alerts')
        <div class="container-lg px-4">
        <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">New FAQ</h4>
                      <form class="forms-sample" method="post" action="{{route('save-updated-faq')}}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Question</label>
                        <input type="text" class="form-control" id="question" name="question" value="{{$faq->question}}" >
                        <input type="hidden" name="faqId" id="faqId" value="{{$faq->faq_id}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Answer</label>
                        <textarea type="text" class="form-control" id="answer" name="answer">{{$faq->answer}}</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary me-2 btn-sm mt-2"> Submit </button>
                    </form>
                    </div>
                  </div>

              </div>
    
        </div>
      </div>

@endsection