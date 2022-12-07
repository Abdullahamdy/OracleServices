<div>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('{{asset('Frontend/assets/img/page-header.jpg')}}');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>خدمات</h2>
          <p>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق</p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="index.html">الرئيسية</a></li>
        <li>خدمات</li>
      </ol>
    </div>
  </nav>
</div><!-- End Breadcrumbs -->

<!-- ======= Featured Services Section ======= -->
<section id="featured-services" class="featured-services">
  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
        <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
        <div>
          <h4 class="title">استعرض الخدمات</h4>
          <p class="description"> ابحث عن الخدمة التي تحتاجها باستخدام مربع البحث في الأعلى أو عبر التصنيفات.
          </p>
          <a href="service-details.html" class="readmore stretched-link"><span class="me-2">المزيد</span><i class="bi bi-arrow-left"></i></a>
        </div>
      </div>
      <!-- End Service Item -->

      <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
        <div class="icon flex-shrink-0"><i class="fa-solid fa-truck"></i></div>
        <div>
          <h4 class="title">اطلب الخدمة
          </h4>
          <p class="description">راجع وصف الخدمة وتقييمات المشترين ثم اطلبها لفتح تواصل مع البائع.
          </p>
          <a href="service-details.html" class="readmore stretched-link"><span class="me-2">المزيد</span><i class="bi bi-arrow-left"></i></a>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
        <div class="icon flex-shrink-0"><i class="fa-solid fa-truck-ramp-box"></i></div>
        <div>
          <h4 class="title">استلم خدمتك
          </h4>
          <p class="description"> تواصل مع البائع مباشرة داخل موقع خمسات حتى استلام طلبك كاملاً.
          </p>
          <a href="service-details.html" class="readmore stretched-link"><span class="me-2">المزيد</span><i class="bi bi-arrow-left"></i></a>
        </div>
      </div><!-- End Service Item -->

    </div>

  </div>
</section><!-- End Featured Services Section -->

<!-- ======= Services Section ======= -->
<section id="service" class="services pt-0">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <span>خدماتنا</span>
      <h2>خدماتنا</h2>

    </div>

    <div class="row gy-4">

    @foreach($services as $service)

<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
  <div class="card">
    <div class="card-img">
    @if($image = $service->attachments()->orderBy('id',"DESC")->first())
         <img src="{{ url('storage/'.$image->path) }}"alt="" class="img-fluid">
    @endif
    
    </div>
    <h3><a href="{{route('serv-detail',$service->id,$service->id)}}" class="stretched-link">
        
           {{$service->name}}</a>
    </h3>       
    <p>{!! $service->full_description !!}</p>
  </div>


</div><!-- End Card Item -->
@endforeach
  

    </div>

  </div>
</section><!-- End Services Section -->

<!-- ======= Features Section ======= -->



<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <span>أسئلة شائعة</span>
      <h2>أسئلة شائعة</h2>

    </div>

    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-10">

        <div class="accordion accordion-flush" id="faqlist">
        <livewire:frontend.question-and-answer  :key="'key-unique'"><livewire:frontend.question-and-answer>
        </div>

      </div>
    </div>

  </div>
</section><!-- End Frequently Asked Questions Section -->

</main><!-- End #main -->

</div>
