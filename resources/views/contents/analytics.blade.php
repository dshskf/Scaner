<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">
      <div class="row portfolio-container">

        @foreach ($analytics as $a)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{$a->image}}" class="img-fluid" alt="" style="width:100% !important;height:15rem !important;">
              <div class="portfolio-info">
                <h4>{{$a->title}}</h4>                
                <div class="portfolio-links">
                  <a href="{{$a->image}}" data-gall="portfolioGallery" class="venobox"
                    title="{{$a->title}}"><i class="bx bx-search"></i></a>                  
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
      </div>

    </div>
  </section><!-- End Portfolio Section -->