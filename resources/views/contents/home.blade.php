<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background: url({{$home->image}}) no-repeat;background-size: cover;background-position:center;">
          <div class="carousel-container">
            <div class="carousel-content">
              <h2 class="animate__animated animate__fadeInDown"><span>{{$home->title}}</span></h2>
              <p class="animate__animated animate__fadeInUp">
                {{$home->description}}
              </p>
              <a href="" class="btn-get-started animate__animated animate__fadeInUp">{{$home->button}}</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section><!-- End Hero -->