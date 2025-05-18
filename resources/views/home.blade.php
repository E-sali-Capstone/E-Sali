@extends('layouts.app')
@section('content')
  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <img src="<?= asset('images/'.$web->landing_page_bg.'') ?>" alt="" data-aos="fade-in">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Welcome to Our Website</h2>
            <p data-aos="fade-up" data-aos-delay="200">{{$web->description}}</p>
          </div>
        
        </div>
      </div>
    </section><!-- /Hero Section -->
    <!-- About Section -->
    <section id="about" class="about section light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">
          <div class="col-xl-5 content">
            <h3>About Us</h3>
            <h2>{{$web->description}}</h2>
            <p>{{$web->about}}</p>
          </div>
          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-clipboard-pulse"></i>
                  <h3>Public Health and Safety</h3>
                  <p>Establishment of health regulations, overseeing hospitals, clinics, and public health organizations, and responding to health crises</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-command"></i>
                  <h3>Social Welfare and Public Assistance</h3>
                  <p>Social welfare programs to support vulnerable populations, such as the elderly, low-income families, and people with disabilities</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Taxation and Revenue Collection</h3>
                  <p>The collected revenue is used to finance government operations, including healthcare, education, defense, and infrastructure.</p>
                </div>
              </div> <!-- End Icon Box -->

            </div>
          </div>

        </div>
      </div>

    </section><!-- /About Section -->


    <!-- Portfolio Section -->
    <section id="gallery" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <p>Explore our Government Photo Gallery to witness the vibrant tapestry of public service, community engagement, and historical milestones.</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            @if($gallery)
              @foreach($gallery as $gal)
                <li data-filter=".gal{{$gal->id}}">{{$gal->title}}</li>
              @endforeach
            @endif
          </ul><!-- End Portfolio Filters -->
        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
          @if($gallery_photos)
          @foreach($gallery_photos as $gal_photos)
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item gal{{$gal_photos->gallery_id}}">
              <img src="<?= asset('gallery_images/'.$gal_photos->file_name.'') ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="<?= asset('gallery_images/'.$gal_photos->file_name.'') ?>" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div><!-- End Portfolio Item -->
            @endforeach
            @endif
          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Faq Section -->
    <section id="faqs" class="faq section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="content px-xl-5">
              <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
              <p>
              Get quick answers to common questions about government services, processes, and policies. Whether you need information on permits, registrations, or public programs, this section is here to help you navigate government resources with ease.              </p>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="faq-container">
            @foreach($faqs as $fq)

              <div class="faq-item">
                <h3><span>{{$fq->question}}</span></h3>
                <div class="faq-content">
                  <p>{{$fq->answer}}</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->
            @endforeach
        
            </div>

          </div>
        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <div class="container">

        <div class="row align-items-center">

          <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
            <h3>Feedbacks</h3>
            <p>
            Engage with us through our Community Feedback platform—your voice matters. Share your thoughts, suggestions, and concerns to help shape better public services and policies. 
            </p>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

            <div class="swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>
              <div class="swiper-wrapper">
                @if($feedbacks)
                  @foreach($feedbacks as $fb)
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <img src="https://files.softicons.com/download/web-icons/free-icon-set-by-eclipse-saitex/ico/User.ico" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>{{$fb->name}}</h3>
                        <h4>{{$fb->email}}</h4>
                        <div class="stars">


                           @if($fb->star_rating == NULL)
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                  @elseif($fb->star_rating == 0)
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    @elseif($fb->star_rating == 1)
                                      <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                      @elseif($fb->star_rating == 2)
                                      <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                      @elseif($fb->star_rating == 3)
                                          <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                      @elseif($fb->star_rating == 4)
                                        <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                  @endif
                                  
                        </div>

                        
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>{{$fb->feedback}}</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->
                @endforeach
                @endif
              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Recent Threads</h2>
        <p>Catch up on the latest discussions, questions, and ideas shared by fellow community members. Join the conversation, get inspired, or lend your voice to topics that matter most right now</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          @if($threads)
                @foreach($threads as $th)
            <!-- post start -->
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <article>


              <p class="post-category">{{$th->cat_title}}</p>

              <h2 class="title">
                <a href="{{route('dashboard')}}">{{$th->thread_title}}</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="<?= asset('users-avatar/'.$th->photo.'') ?>" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">{{$th->author_name}}</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">{{ date('F d, Y' , strtotime($th->created_at)) }}</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
              @endforeach
            @endif

        </div><!-- End recent posts list -->

      </div>

    </section><!-- /Recent Posts Section -->

    <!-- Contact Section -->
    <section id="feedback" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Send us Feedback</h2>
        <p>By completing this form, individuals provide valuable insights that help government agencies assess service quality, identify areas for improvement, and enhance overall public service delivery</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
      @if ($errors->any())
                        <div class="alert alert-danger alert-dismissable">
                            <ul>
                               @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                               @endforeach
                               </ul>
                            </div>
                           @else
                                @if (session('success'))
                        <div class="alert alert-success alert-dismissable">
                                                    {{ session('success') }}
                            </div>
                            @endif
                           @if (session('error'))
                     <div class="alert alert-danger alert-dismissable">
                           {{ session('error') }}
                    </div>
             @endif
             @endif

        <div class="row gy-4">
          <div class="col-lg-6">
          <form action="{{route('save-feedback')}}" method = "post" class="">
             @csrf
            <div class="row">
              <div class="col-6 mb-3">
                <input type="text" class="form-control" placeholder="Your Name" name="name">
              </div>
              <div class="col-6 mb-3">
                <input type="email" class="form-control" placeholder="Your Email" name="email">
              </div>
              <div class="col-12 mb-3">
                <input required class="form-control" placeholder="Concerned Government Office" name= "office">
              </div>
              <div class="col-12 mb-3">
                <input required type="text" class="form-control" placeholder="Subject" name="subject">
                <input  type="hidden" class="form-control"  name="starRating" id="starRating">
              </div>
              <div class="col-md-12 mb-3">
                  <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
              </div>
              <div class="col-12 mb-3">
                <textarea required cols="30" rows="7" class="form-control" placeholder="Feedback or Comment" name = "feedback"></textarea>
              </div>
              <div class="col-12">
                <button type="submit" value="Submit your feedback" class="btn btn-primary">Submit Feedback</button>
              </div>
            </div>
          </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>
@endsection
