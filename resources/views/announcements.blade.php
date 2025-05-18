@extends('layouts.app')
@section('content')
<main class="main">

<!-- Page Title -->
<div class="page-title mt-4" data-aos="fade">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>Announcements</h1>
          <p class="mb-0">A dedicated space for official updates, public advisories, and essential information from local government units and national agencies.</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{route('landing-page')}}">Home</a></li>
        <li class="current">Announcements</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">
  <div class="container">
    <div class="row gy-4">
    @foreach($announcements as $ann)
      <div class="col-lg-4">
        <article>
          <div class="post-img">
              @php 
                $image = $ann->find($ann->annId)->images->first();
                if($image){
              @endphp
                <img src="<?= asset('images/'.$image->file_name.'') ?>" alt="" class="img-fluid">
              @php
                }
              @endphp

          </div>
          <p class="post-category">{{$ann->category}}</p>
          <h2 class="title">
            <a href="{{route('landing-page/view-announcement' , $ann->annId)}}">{{$ann->title}}</a>
          </h2>
          <div class="d-flex align-items-center">
            <img src="<?= asset('users-avatar/'.$ann->profile_photo.'') ?>" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author">{{$ann->name}}</p>
              <p class="post-date">
                <time>{{ date('F d Y, h:i:s a' , strtotime($ann->announcement_date) ) }}</time>
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
        {{$announcements->links('pagination::bootstrap-4')}}    
    </div>
  </div>

</section><!-- /Blog Pagination Section -->

</main>
@endsection

