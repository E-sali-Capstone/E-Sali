@extends('dashboard.template.layout')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Posting new Event</h3>
            </div>
            <div class="row">
              <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Event Details</h4>
                      <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{route('save-event')}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername1">Select Program</label>
                          <select name="programId" id="programId" class="form-control">
                            @foreach($programs as $pg)
                              <option value="{{$pg->program_id}}">{{$pg->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                              <label for="exampleInputUsername1">Event Date</label>
                              <input min="{{date('Y-m-d\Th:i')}}" type="datetime-local" class="form-control" id="eventDate" name="eventDate" value="{{old('eventDate')}}" >
                            </div>
                        <div class="form-group">
                          <label for="exampleInputUsername1">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Content</label>
                          <textarea class="form-control" id="content" name="content" value="{{old('content')}}" > </textarea>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Valid From</label>
                              <input min="{{date('Y-m-d\Th:i')}}" type="datetime-local" class="form-control" id="validFrom" name="validFrom" value="{{old('validFrom')}}" >
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Valid To</label>
                              <input min="{{date('Y-m-d\Th:i')}}" type="datetime-local" class="form-control" id="validTo" name="validTo" value="{{old('validTo')}}" >
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Upload Images</label>
                          <input accept="image/png, image/jpg, image/jpeg" type="file" class="form-control" id="fileUploads[]" name="fileUploads[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary me-2"> Submit </button>
                    </div>
                  </div>
              </div>
              <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Attendance Settings</h4>
                      <label for="">Enable Attendance?</label>

                      <div class="row">
                        <div class="col-md-6">
                        <select name="withAttendance" id="withAttendance" class="form-control">
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <br>
                        </div>
                      </div>
                  
                        <label for="">Morning <sup>(<i>Leave Blank if not applicable</i>)</sup>  </label>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Time In</label>
                              <input onblur="checkTimeMorning()" type="time" min="01:00:00" max="12:00:00" class="form-control" id="morningTI" name="morningTI" value="{{old('morningTI')}}" >
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Time Out</label>
                              <input type="time" min="13:00:00" max="12:00:00"  class="form-control" id="morningTO" name="morningTO" value="{{old('morningTO')}}" >
                            </div>
                          </div>

                        </div>
                       
                        <label for="">Afternoon <sup>(<i>Leave Blank if not applicable</i>)</sup>  </label>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Time In</label>
                              <input type="time" class="form-control" id="afternoonTI" name="afternoonTI" value="{{old('afternoonTI')}}" >
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Time Out</label>
                              <input type="time" class="form-control" id="afternoonTO" name="afternoonTO" value="{{old('afternoonTO')}}" >
                            </div>
                          </div>
                        </div>

                        <div class="row">

                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Attendance Validity in Minutes</label>
                              <input type="number" min = "1" class="form-control" id="attendanceValidity" name="attendanceValidity" value="{{old('attendanceValidity')}}" >
                            </div>
                          </div>

                        </div>
                      </form>
                    </div>
                  </div>

              </div>
          
            </div>
          </div>
@endsection

<script>

  // function checkTimeMorning(){
  //   var timeval=document.getElementById("morningTI").value;
  //   alert(timeval);
  //     // if(timeval >= 1 && timeval <= 12){
  //     //   alert("AM");
  //     // }else{
  //     //   alert("PM");
  //     // }
  //   }

</script>