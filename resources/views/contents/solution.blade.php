<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Enlightening
          through
          vision.</h2>

      </div>

      

      <div class="row">
        @foreach ($solution as $s)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="{{$s->icon}}"></i></div>
              <h4><a href="">{{$s->category}}</a></h4>
              <p>{{$s->description}}</p>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row">
        <div class="col-lg-6">
          <img src="assets/img/mac.png" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content">
          <h3>Scaner. helps you
            reveals insights you
            seek.</h3>
          <p class="font-italic">
            By using our AI Technology makes it
            easier for you to reveal every useful
            data in many of your business.
          </p>
          <ul>
            <li><i class="icofont-check-circled"></i> Effective.</li>
            <li><i class="icofont-check-circled"></i> Efficient.</li>
          </ul>
          <p>
            We will give you our best offers, so lets get started.
          </p>
          <a href="services.html">Get Started!</a>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->