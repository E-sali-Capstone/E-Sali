@extends('dashboard.template.layout')
@section('content')

<style>
  .checked {
    color: orange;
  }
</style>
  <div class="body flex-grow-1">
      @include('dashboard.template.alerts')
        <div class="container-lg">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap  pb-2 mb-3 border-bottom  ">
                <strong>Feedbacks Table</strong>
                <div class="btn-toolbar mb-2 mb-md-0">
                    
            </div>
            </div>
            <div class="card-body">
              <p class="text-body-secondary small">The feedbacks below can include suggestions for improvement, complaints, or positive reinforcement.</p>
              <div class="example">
                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview table-responsive" role="tabpanel" id="preview-1000">
                  <table id="dataTable" class="table text-center table-bordered">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Concerned Office</th>
                            <th>Subject</th>
                            <th>Feedback</th>
                            <th>Star Rating</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($feedbacks as $fb)
                            <tr>
                              <td>{{$fb->name}}</td>
                              <td>{{$fb->email}}</td>
                              <td>{{$fb->office}}</td>
                              <td>{{$fb->subject}}</td>
                              <td style="white-space:normal;">{{$fb->feedback}}</td>

                              <td>
                                  @if($fb->star_rating == NULL)
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span> 
                                  @elseif($fb->star_rating == 0)
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span> 
                                    @elseif($fb->star_rating == 1)
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star"></span>
                                      <span class="fa fa-star"></span>
                                      <span class="fa fa-star"></span> 
                                      @elseif($fb->star_rating == 2)
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star"></span>
                                      <span class="fa fa-star"></span> 
                                      @elseif($fb->star_rating == 3)
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star"></span> 
                                      @elseif($fb->star_rating == 4)
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span> 
                                  @endif

                              </td>

                              <td>{{ date('F d, Y' , strtotime($fb->created_at)) }}</td>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{!! asset('theme/assets/vendors/chart.js/Chart.min.js') !!}"></script>

<script>
  
    jQuery(document).ready(function($) {
      
    $.ajax({
        type: "get",
        url: "/api/get-feedback-sentiments",
        dataType : 'json',
        success: function(data) {

            console.log(data);

            var senti = [];
            var responses = [];
            var backgroundColor = [];
            var borderColor = [];
            var hoverBackgroundColor = [];
            var hoverBorderColor = [];

            for(var i in data) {
              var randomColor = Math.floor(Math.random()*16777215).toString(16);
              senti.push(data[i].sentiment);
              responses.push(data[i].sentiment_count);  
              backgroundColor.push("#"+randomColor)
              borderColor.push("#"+randomColor)
              hoverBackgroundColor.push("#"+randomColor)
              hoverBorderColor.push("#"+randomColor)
            }
            var chartdata = {
                labels: senti,
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

            var ctx = document.querySelector("#myCanvas")

            var barGraph = new Chart(ctx, {
                type: 'pie',
                data: chartdata
            });
        },
        error: function(data) {

        }
    });
  });
</script>