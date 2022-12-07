<div>
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">أكبر سوق عربي لبيع وشراء الخدمات </h2>
          <p data-aos="fade-up" data-aos-delay="100"> أنجز أعمالك بسهولة وأمان بأسعار مميزة ومنافسة</p>

          <form action="#" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
            <input type="text" name="search" class="form-control"  placeholder="ابحث عن خدمتك"  value="{{ $search }}">
            <button type="submit" class="btn btn-primary">بحث</button>
          </form>

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{$countservices}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>خدمات</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{$category}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>الأقسام</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{$contact_us}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>الدعم</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{$users}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>مستخدمين</p>
              </div>
            </div><!-- End Stats Item -->

          </div>
        </div>

        <div class="col-lg-5 order-lg-2 order-1  hero-img" data-aos="zoom-out">
          <img src="{{asset('Frontend/assets/img/hero-img.svg')}}" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

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

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about pt-0">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <img src="{{asset('Frontend/assets/img/about.jpg')}}" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=ILX3thHnTBY" class="glightbox play-btn"></a>
          </div>
          <div class="col-lg-6 content order-last  order-lg-first">
            <h3>معلومات عن موقع خدمات</h3>
            <p>
             ,أنجز أعمالك بسهولة وأمان بأسعار مميزة ومنافسة , أنجز خدماتك عبر الإنترنت بسهولة وأمان
            </p>
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bi bi-diagram-3"></i>
                <div>
                  <h5>نفّذ مشاريعك بسهولة</h5>
                  <p>اطرح مشروعك واترك مهمة تنفيذه لأفضل خبراء الوطن العربي
                  </p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-fullscreen-exit"></i>
                <div>
                  <h5>وظّف أفضل المستقلين</h5>
                  <p>زُر ملفات المستقلين، اطلع على أعمالهم السابقة وظف الأفضل
                  </p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-broadcast"></i>
                <div>
                  <h5>ادفع بكل أريحية</h5>
                  <p>لن تدفع سوى مقابل ما يتم إنجازه من وظائف
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>خدماتنا</span>
          <h2>خدماتنا</h2>

        </div>


        @livewire('frontend.services', ['collection' => $services])
      

     
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
      <div class="container" data-aos="zoom-out">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h3>خدمة تطبيق جاهز وسهل الاستخدام</h3>
            <p>   هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة.</p>
            <a class="cta-btn" href="{{route('/oreder-service')}}">أطلب خدمتك</a>
            </div>
          </div>

        </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Features Section ======= -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>عرض سعر</span>
          <h2>عرض سعر</h2>

        </div>

        <div class="row gy-4">

   
      @livewire('frontend.show-price')
        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Testimonials Section ======= -->
    <div class="container">
      <div class="section-header">
          <span>اراء العملاء</span>
          <h2>اراء العملاء</h2>
        </div>
    </div>
  
@livewire('frontend.reviews')
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