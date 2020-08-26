<!-- ======= Clients Section ======= -->
<section id="clients" class="clients">
    <div class="container">

      <div class="section-title">
        <h2>Our Visionary Partner</h2>
        <p>We are Growing Together!.</p>
      </div>

      <div class="owl-carousel clients-carousel">
        @foreach ($partners as $p)
          <img src="{{$p->icon}}" alt="{{$p->company}}">    
        @endforeach    
      </div>

    </div>
  </section><!-- End Clients Section -->