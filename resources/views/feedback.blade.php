@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

  .rating-box {
    position: relative;
    background: #fff;
    padding: 25px 50px 35px;
    border-radius: 25px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
  }
  .rating-box header {
    font-size: 22px;
    color: #dadada;
    font-weight: 500;
    margin-bottom: 20px;
    text-align: center;
  }
  .rating-box .stars {
    display: flex;
    align-items: center;
    gap: 25px;
  }
  .stars i {
    color: #e6e6e6;
    font-size: 35px;
    cursor: pointer;
    transition: color 0.2s ease;
  }
  .stars i.active {
    color: #ff9c1a;
  }
</style>
<div class="untree_co-hero overlay" style="background-image: url(' {{asset('landing_page/images/hero-img-1-min.jpg')}} ');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Feedback</h1>
              <div class="mb-5 text-white desc mx-auto aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                <p>Provide students with a platform to express their thoughts, concerns, and suggestions regarding different facets of the educational environment. We aims to empower students by giving them a voice in shaping their own learning experiences and improving the overall quality of education.</p>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- /.row -->
    </div> <!-- /.container -->

  </div>

  <div class="untree_co-section" id="feedback">
    <div class="container">
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

      <div class="row mb-5">
        <div class="col-lg-7 mr-auto order-1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
          <form action="{{route('save-feedback')}}" method = "post">
             @csrf
            <div class="row">
              <div class="col-6 mb-3">
                <input type="text" class="form-control" placeholder="Your Name" name="name">
              </div>
              <div class="col-6 mb-3">
                <input type="email" class="form-control" placeholder="Your Email" name="email">
              </div>
              <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="Your Position (eg. Student or Parent)" name="position">
              </div>
              <div class="col-12 mb-3">
                <input required class="form-control" placeholder="Concerned Office or Department" name= "department_office">
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
        </div>
      </div>

    </div>
  </div>
@endsection
<script type="module">
   // Select all elements with the "i" tag and store them in a NodeList called "stars"
      const stars = document.querySelectorAll(".stars i");
      var starRating = document.querySelector("#starRating");
      // Loop through the "stars" NodeList
      stars.forEach((star, index1) => {
        // Add an event listener that runs a function when the "click" event is triggered
        star.addEventListener("click", () => {
          // Loop through the "stars" NodeList Again
          stars.forEach((star, index2) => {
            // Add the "active" class to the clicked star and any stars with a lower index
            // and remove the "active" class from any stars with a higher index
            index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
            starRating.value = index1;

          });
        });
      });
</script>
