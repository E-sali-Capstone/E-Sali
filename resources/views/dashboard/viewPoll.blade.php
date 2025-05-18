@extends('dashboard.template.layout')
@section('content')
@php
                  $date_now = strtotime(date('Y-m-d'));
                  $valid_to = strtotime(date('Y-m-d' , strtotime($poll->valid_to)));
                  $secs = $valid_to - $date_now;
                  $days = $secs / 86400;
            @endphp
@if(Auth::user()->user_type ==  "Admin")
      <div class="body flex-grow-1">
        @include('dashboard.template.alerts')
        <div class="container-lg px-4">
          <div class="row">
          <div class="col-md-6 ">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Poll Details</h4>
                        <form class="forms-sample" method="post" action="{{route('save-updated-poll')}}">
                          @csrf
                          @php
                                  $errorText = "";
                                  $disabled = "";
                                  $readonly = "";

                                  $responded = DB::table('poll_responses')
                                    ->where('question_id', $poll->question_id)
                                    ->count();
                                  
                                  if($responded != 0){

                                    
                                      $errorText = "Only the status can be updated because some users have participated in this poll.";
                                      $disabled = "Disabled";
                                      $readonly = "Readonly";
                                  }

                          @endphp
                          <div class="form-group">
                            <input type="hidden" name="questionId" id="questionId" value="{{$poll->question_id}}">
                            <label for="exampleInputUsername1">Poll Title</label>
                            <select id="pollTitle" name="pollTitle" class="form-control">
                                <option value=""></option>
                                <option value="Local Government Funding Priorities (Education, Healthcare, Infrastructure)">Local Government Funding Priorities (Education, Healthcare, Infrastructure)</option>
                                <option value="Environmental Protection Policies (Stricter carbon emission laws)">Environmental Protection Policies (Stricter carbon emission laws)</option>
                                <option value="Public Transportation Expansion (Investing in better transit options)">Public Transportation Expansion (Investing in better transit options)</option>
                                <option value="Affordable Housing Initiatives (Investment in affordable homes)">Affordable Housing Initiatives (Investment in affordable homes)</option>
                                <option value="Universal Healthcare (Providing healthcare for all citizens)">Universal Healthcare (Providing healthcare for all citizens)</option>
                                <option value="Criminal Justice Reform (Rehabilitation over incarceration)">Criminal Justice Reform (Rehabilitation over incarceration)</option>
                                <option value="Minimum Wage Increase (Raising the minimum wage to a living wage)">Minimum Wage Increase (Raising the minimum wage to a living wage)</option>
                                <option value="Government Transparency (Open access to public spending data)">Government Transparency (Open access to public spending data)</option>
                                <option value="Climate Change Legislation (Comprehensive laws to address climate change)">Climate Change Legislation (Comprehensive laws to address climate change)</option>
                                <option value="Education Curriculum Reform (Including life skills and financial literacy)">Education Curriculum Reform (Including life skills and financial literacy)</option>
                                <option value="Healthcare for Undocumented Immigrants (Providing healthcare to all citizens, regardless of status)">Healthcare for Undocumented Immigrants (Providing healthcare to all citizens, regardless of status)</option>
                                <option value="Gun Control Laws (Implementing stricter gun laws)">Gun Control Laws (Implementing stricter gun laws)</option>
                                <option value="Voting Rights & Access (Improving voter access and making voting easier)">Voting Rights & Access (Improving voter access and making voting easier)</option>
                                <option value="Police Funding and Reform (Redistributing police funding to other community services)">Police Funding and Reform (Redistributing police funding to other community services)</option>
                                <option value="Corporate Taxation (Increasing taxes on large corporations)">Corporate Taxation (Increasing taxes on large corporations)</option>
                                <option value="Legalization of Cannabis (Legalizing cannabis for recreational use)">Legalization of Cannabis (Legalizing cannabis for recreational use)</option>
                                <option value="Social Security & Retirement Programs (Reforming Social Security)">Social Security & Retirement Programs (Reforming Social Security)</option>
                                <option value="Foreign Aid Spending (Reducing foreign aid to focus on domestic issues)">Foreign Aid Spending (Reducing foreign aid to focus on domestic issues)</option>
                                <option value="Public Surveillance & Privacy (Increasing public surveillance or protecting privacy)">Public Surveillance & Privacy (Increasing public surveillance or protecting privacy)</option>
                                <option value="Taxation of Wealthy Individuals (Increasing taxes on the wealthy to address inequality)">Taxation of Wealthy Individuals (Increasing taxes on the wealthy to address inequality)</option>
                            </select> 
                          </div>
                          <div class="form-group">
                            <label for="exampleInputUsername1">Question</label>
                            <input {{$readonly}} type="text" class="form-control" id="question" name="question" value="{{$poll->question}}" >
                            <input type="hidden" name="responded" value="{{$responded}}">
                          </div>

                          <div class="form-group" id="choicesDiv">
                            <label for="exampleInputUsername1">Choices <a href="#" onclick="addChoices()">Add Choices</a> </label>
                            @php

                                  $choices = DB::table('poll_choices')
                                    ->where('question_id', $poll->question_id)
                                    ->get();
                                      if($choices){
                                      foreach ($choices as $c) { 
                                    
                                        @endphp
                                        <input {{$readonly}} type="text" class="form-control mb-2" required  name="choices[]" value="{{$c->choice}}" >
                                        @php
                                      }
                                  } 
                              @endphp
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputUsername1">Valid From</label>
                                <input {{$readonly}}  type="datetime-local" class="form-control" id="validFrom" name="validFrom" value="{{$poll->valid_from}}" >
                              
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputUsername1">Valid To</label>
                                <input {{$readonly}} type="datetime-local" class="form-control" id="validTo" name="validTo" value="{{$poll->valid_to}}" >
                              </div>
                            </div>
                        
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option @if($poll->status == 'Active'){{'selected'}}@endif value="Active">Active</option>
                                    <option @if($poll->status == 'Not Active'){{'selected'}}@endif value="Not Active">Not Active</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <p class="text-warning">{{$errorText}}</p>
                          <button type="submit"  class="btn btn-primary btn-sm"> Submit </button>
                          <a href="{{route('polls')}}" class="btn btn-danger btn-sm text-white">Close</a>
                        </form>
                      </div>
                    </div>
        </div>
           <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Results</h4>
                        @csrf
                        <div class="form-group" id="choicesDiv">
                            <canvas id="pollResult"></canvas>
                        </div>
                    </div>
                  </div>
              </div>
        </div>
      </div>
@endif
@if(Auth::user()->user_type ==  "Citizen")

<div class="body flex-grow-1">
        @include('dashboard.template.alerts')
        <div class="container-lg px-4">
        <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Poll Participation</h4>
                      <i class="text-warning">
                                @php
                                
                                $datetime1 = new DateTime($poll->valid_to);
                                $datetime2 = new DateTime("now");
                                $interval = $datetime1->diff($datetime2);
                                echo $interval->format('Poll ends after %a days , %h hours and %i minutes');

                                @endphp
                                </i>
                      <form class="forms-sample" method="post" action="{{route('submit-poll-answer')}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername1">Question: {{$poll->question}}</label> 
                          <input type="hidden" name="questionId" id="questionId" value="{{$poll->question_id}}">
                        </div>
                        <div class="form-group" id="choicesDiv">
                          <label for="exampleInputUsername1">Choices </label> <br>
                          @php
                                $errorText = "";
                                $disabled = "";

                                $responded = DB::table('poll_responses')
                                  ->where('question_id', $poll->question_id)
                                  ->where('created_by', Auth::user()->id)
                                  ->first();
                                $remaining = 3;
                                if($responded){
                                    $remaining = 3 - $responded->count;
                                    $errorText = $remaining . " out of 3 Remaining Attempt";
                                    $disabled = "Disabled";
                                }

                                $choices = DB::table('poll_choices')
                                  ->where('question_id', $poll->question_id)
                                  ->get();
                                    if($choices){
                                    foreach ($choices as $c) { 
                                      @endphp
                                      <input type="radio" @if($responded)@if($responded->choice_id ==  $c->choice_id ){{'checked'}} @endif @endif  required  name="choice" value="{{$c->choice_id}}" >
                                      <label for="{{$c->choice}}">{{$c->choice}}</label> <br>
                                      @php
                                    }
                                } 

                            @endphp
                        </div>
                        <p class="text-warning">{{$errorText}}</p>
                        <button type="submit" @if($remaining ==  0 ){{'disabled'}} @endif  class="btn btn-primary me-2 btn-sm"> Submit Answer</button>
                        <a href="{{route('polls')}}" class="btn btn-danger btn-sm text-white">Close</a>
                      </form>
                    </div>
                  </div>

              </div>
    
        </div>
      </div>



@endif


@endsection

<script>
    // var today = new Date().toISOString().slice(0, 16);
    // $("#validFrom").attr("min" , today);
    // $("#validTo").attr("min" , today);
    var num = 0;
    function addChoices(){
      num ++;
      $("#choicesDiv").append('<input type="text" class="form-control mb-2" id="choices'+num+'" name="choices[]" > <a href = "#" id="delete'+num+'" onclick = "deleteChoices('+num+')" class = "mdi mdi-delete text-danger">Remove</a> ') ;
    }
    function deleteChoices(id){
      document.getElementById("choices"+id).remove();
      document.getElementById("delete"+id).remove();
    }
  
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<script>
    jQuery(document).ready(function($) {
    
    var ctx = document.getElementById("pollResult").getContext("2d");


    $.ajax({
        type: "post",
        url: "/api/get-insights",
        data: {'question_id' : $("#questionId").val()},
        dataType : 'json',
        success: function(data) {
            


            var choice = [];
            var responses = [];
            var backgroundColor = [];
            var borderColor = [];
            var hoverBackgroundColor = [];
            var hoverBorderColor = [];

            for(var i in data) {
              var randomColor = Math.floor(Math.random()*16777215).toString(16);
              var randomColor2 = Math.floor(Math.random()*16777215).toString(16);
              var randomColor3 = Math.floor(Math.random()*16777215).toString(16);
              var randomColor4 = Math.floor(Math.random()*16777215).toString(16);

              choice.push(data[i].choice);
              responses.push(data[i].responses);  
              backgroundColor.push("#"+randomColor)
              borderColor.push("#"+randomColor2)
              hoverBackgroundColor.push("#"+randomColor3)
              hoverBorderColor.push("#"+randomColor4)
            }
            var chartdata = {
                labels: choice,
                datasets : [
                    {
                        label: 'Responses',
                        backgroundColor: backgroundColor,
                        borderColor: borderColor,
                        hoverBackgroundColor: hoverBackgroundColor,
                        hoverBorderColor: hoverBorderColor,
                        data: responses
                    }
                ]
            };




            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                  scales: {
                  yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                  }]
        }
          }
            });
        },
        error: function(data) {

        }
    });
  });
</script>

