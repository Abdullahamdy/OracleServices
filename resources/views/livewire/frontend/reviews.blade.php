
<div>
@if(count($reviews))
<section id="testimonials" class="testimonials">
      <div class="container">
        <div class="slides-1 swiper" data-aos="fade-up">
          <div class="swiper-wrapper">

           
          
       
       @foreach($reviews as $review)
            <div class="swiper-slide">
              <div class="testimonial-item">

              @if($image = $review->attachments()->orderBy('id',"DESC")->first())
              <img src="{{ url('storage/'.$image->path) }}" class="testimonial-img" alt="">
                 @endif
              
                <h3>{{$review->name}}</h3>
                <h4>{{$review->work}}</h4>
               
                <div class="stars">
                  @if($review->rating >= 1)   
                 @for($i = 0; $i<$review->rating; $i++)    
                  <i class="bi bi-star-fill"></i>
                  @endfor
                  @endif
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
               {{$review->text}}
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
             @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->
@endif
</div>