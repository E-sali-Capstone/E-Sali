@extends('layouts.app')
@section('content')
<main class="main mt-4">
    <!-- Page Title -->
    <div class="page-title aos-init aos-animate" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Announcement Details</h1>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('landing-page')}}">Home</a></li>
            <li class="current">Announcement Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">

              <article class="article">

                <div class="post-img">
                  <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                </div>

                <h2 class="title">{{$ann->title}}</h2>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> {{$ann->name}}</li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="{{ date('F d, Y h:i:s a' , strtotime($ann->announcement_date)) }}">{{ date('F d, Y h:i:s a' , strtotime($ann->announcement_date)) }}</time></li>
                  </ul>
                </div><!-- End meta top -->

                <div class="content">
                  <p>
                  {{$ann->content}}
                </p>

                

                </div><!-- End post content -->

              </article>

            </div>
          </section><!-- /Blog Details Section -->

  
        </div>

      </div>
    </div>

  </main>
  @endsection
