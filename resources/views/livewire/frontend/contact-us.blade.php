<main id="main">
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('{{asset('Frontend/assets/img/page-header.jpg')}}');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>اتصل بنا</h2>
          <p>موقع خدمات هو منصّة تصل بين أصحاب المشاريع والمستقلين في العالم العربي. إن كنت صاحب مشاريع تستطيع استخدام موقع خدمات لانجاز مشاريعك من خلال الانترنت بسهولة وإضافة عروضك على المشاريع التي تستطيع إنجازها
          </p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="index.html">الرئيسية</a></li>
        <li>اتصل بنا</li>
      </ol>
    </div>
  </nav>
</div><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="">
  <!-- add this the container will be hidden in scroll (fade-up) -->
    <div>
      <iframe style="border:0; width: 100%; height: 340px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
    </div><!-- End Google Maps -->

    <div class="row gy-4 mt-4">

      <div class="col-lg-4">

        <div class="info-item d-flex">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h4>العنوان:</h4>
            <p>فلسطين - غزة - مفترق السرايا</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h4>البريد الالكتروني:</h4>
            <p>info@example.com</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex">
          <i class="bi bi-phone flex-shrink-0"></i>
          <div>
            <h4>اتصال:</h4>
            <p>0598555555</p>
          </div>
        </div><!-- End Info Item -->

      </div>

      <div  wire:ignore.self class="col-lg-8">
        <form  wire:ignore.self method="post" wire:submit.prevent="store" role="form" class="php-email-form">
        {{ csrf_field() }}
        <div class="row">
            <div  class="col-md-6 form-group">
              <input type="text" name="name" wire:model.defer="contact.name" class="form-control   @error('contact.name') is-invalid @enderror" id="name" placeholder="الاسم" >
              @error('contact.name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control @error('contact.email') is-invalid @enderror" wire:model.defer="contact.email" name="email" id="email" placeholder="البريد الالكتروني" >
              @error('contact.email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control @error('contact.subject') is-invalid @enderror"wire:model.defer="contact.subject" name="subject" id="subject" placeholder="الموضوع" >
            @error('contact.subject')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
        </div>
          <div class="form-group mt-3">
            <textarea class="form-control @error('contact.message') is-invalid @enderror" name="message" wire:model.defer="contact.message" rows="5" placeholder="الرسالة" ></textarea>
            @error('contact.message')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
        </div>
          <div class="my-3">
            <div class="loading">تحميل</div>
            <div class="error-message"></div>
            <div class="sent-message">جاري ارسال الرسالة !</div>
          </div>
          <div class="text-center"><button  type="submit">ارسال</button></div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->

