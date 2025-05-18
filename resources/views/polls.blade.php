@extends('layouts.app')
@section('content')
<main class="main">

<!-- Page Title -->
<div class="page-title mt-4" data-aos="fade">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>Polls</h1>
          <p class="mb-0">A dedicated space for official updates, public advisories, and essential information from local government units and national agencies.</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{route('landing-page')}}">Home</a></li>
        <li class="current">Polls</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">
  <div class="container">
    <div class="row gy-4">
    @foreach($polls as $pol)
      <div class="col-lg-4">
        <article>
          <p class="post-category">{{$pol->title}}</p>
          <h2 class="title">
            <a href="{{route('polls')}}">{{$pol->question}}</a>
          </h2>
           <div>
                @php
            
                                
                  $datetime1 = new DateTime($pol->valid_to);
                  $datetime2 = new DateTime("now");
                  $interval = $datetime1->diff($datetime2);
                  $poll_ends =  $interval->format('Voting ends after %a days , %h hours and %i minutes');

                @endphp
                <i>{{$poll_ends}}</i><br>
                <a href="{{route('polls')}}">Click to Vote</a>
            </div>
          <div class="d-flex align-items-center">
            
            <div class="post-meta">
              <p class="post-author">{{$pol->name}}</p>
              <p class="post-date">
                <time>{{ date('F d Y, h:i:s a' , strtotime($pol->created_at) ) }}</time>
              </p>
            </div>
           
          </div>
          
        </article>
      </div>
      @endforeach
    </div>
  </div>
</section><!-- /Blog Posts Section -->

<!-- Blog Pagination Section -->
<section id="blog-pagination" class="blog-pagination section">
  <div class="container">
    <div class="d-flex justify-content-center">
        {{$polls->links('pagination::bootstrap-4')}}    
    </div>
  </div>

</section><!-- /Blog Pagination Section -->

</main>
@endsection
