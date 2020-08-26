<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

      <div class="row">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Our Address</h3>
            <p>{{$profiles->address}}</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>{{$profiles->email}}</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Call Us</h3>
            <p>{{$profiles->phone}}</p>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-6 ">          
          <iframe class="mb-4 mb-lg-0"
            src="{{$profiles->map_link}}"
            frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6">
          <form id="contact-forms" action="{{route('contact')}}" method="post" class="contact-form-request" >
            {{ csrf_field() }}        
            <div class="form-row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                  data-rule="minlen:4" data-msg="Please enter at least 4 chars" />                
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                  data-rule="email" data-msg="Please enter a valid email" />                {{-- <div class="validate"></div> --}}
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />              {{-- <div class="validate"></div> --}}
            </div>
            <div class="form-group">
              <textarea form="contact-forms" class="form-control" name="message" rows="5" data-rule="required"
                data-msg="Please write something for us" placeholder="Message"></textarea>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->