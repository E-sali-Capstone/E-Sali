@extends('layouts.app')
@section('content')
<style>
  .truncate {
    width: 250px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: inline-block;
  }
</style>
<div class="untree_co-hero overlay" style="background-image: url(' {{asset('landing_page/images/hero-img-1-min.jpg')}} ');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Reports</h1>
              <div class="mb-5 text-white desc mx-auto aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                <p>Our Commitment to Transparency in Education</p>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- /.row -->
    </div> <!-- /.container -->

  </div>
  <div class="untree_co-section bg-light" id="list">
    <div class="container">
      <div class="row align-items-stretch">

      @foreach($reports as $rep)
        <div class="col-lg-4 mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <div class="media-h d-flex h-100">
            <div class="media-h-body">
              <h2 class="mb-3"><a class="text-success">{{$rep->type}}</a></h2>
              <div class="meta "><span class="icon-calendar mr-2"> Posted</span><span>{{date('F d Y h:i:s a' , strtotime($rep->created_at)) }} </span></div>
              <p>{{$rep->description}}</p>
              <i>Attached Files</i> <br>
              @php
                      $files= App\Models\ReportsUploadModel::where('reports_id', $rep->id)->get();
                            foreach($files as $fl){@endphp
                              <a target="_blank" href="<?= asset('report_files/'.$fl->file_name.'') ?>"> <span class="truncate">{{$fl->file_name}}</span> </a> 
                            @php
                          }
                @endphp
              
            </div>
          </div>
        </div>
      @endforeach
       

      </div>

      <div class="row mt-5">
        <div class="col-12 text-center">
           {{$reports->links('pagination::bootstrap-4')}}
        </div>
      </div>
    </div>
  </div>
@endsection
