<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container">

      <div class="section-title">
        <h2>Features</h2>
        <p>The way we
          Enlightening through
          Our Vision .</p>
      </div>

      <div class="row">
        @foreach ($features as $f)
          <div class="col-lg-6">
            <div class="testimonial-item mt-4" style="height:12rem;">
              <img src="{{$f->icon}}" style="width:5rem;height:5rem;">
              <h3>{{$f->title}}</h3>
              <p>
                {{$f->description}}
              </p>
            </div>
          </div>
        @endforeach      
      </div>

      

    </div>
  </section><!-- End Testimonials Section -->