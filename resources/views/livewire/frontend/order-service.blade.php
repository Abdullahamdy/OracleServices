<div>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('{{asset('Frontend/assets/img/page-header.jpg')}}');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>اطلب الخدمة</h2>
          <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص</p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="index.html">الرئيسية</a></li>
        <li>اطلب الخدمة</li>
      </ol>
    </div>
  </nav>
</div><!-- End Breadcrumbs -->

<!-- ======= Get a Quote Section ======= -->
<section id="get-a-quote" class="get-a-quote">
  <div class="container" data-aos="">
    <!-- (fade-up) if you use this inside the div hidden in scrolling -->

    <div class="row g-0">

      <div class="col-lg-5 quote-bg" style="background-image: url('{{asset('Frontend/assets/img/quote-bg.jpg')}}');"></div>

      <div class="col-lg-7">
        <form action="#"  wire:submit.prevent="store" method="post" class="php-email-form">
        {{ csrf_field() }}
          <h3>اطلب خدمة</h3>
          <p> لديك مشروع؟ او لديك فكرة مشورع أرسله لنا </p>
          <div class="row gy-4">
          
            <div class="col-md-6">
              <input wire:model.defer="order.servece_type" type="text" class="form-control @error('order.servece_type') is-invalid @enderror" placeholder="نوع الخدمة" >
              @error('order.servece_type')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="col-md-6">
              <input  wire:model.defer="order.country" type="text" class="form-control @error('order.country') is-invalid @enderror" placeholder="البلد" >
              @error('order.country')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="col-md-6">
              <input type="number" wire:model.defer="order.calling_phone" class="form-control @error('order.calling_phone') is-invalid @enderror" placeholder="رقم الاتصال" >
              @error('order.calling_phone')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="col-md-6">
              <input type="number"wire:model.defer="order.whatsapp" name="dimensions" class="form-control @error('order.whatsapp') is-invalid @enderror" placeholder="رقم واتساب" >
              @error('order.whatsapp')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="col-lg-12">
              <h4>تفاصيلك الشخصية</h4>
            </div>

            <div class="col-md-12">
              <input wire:model.defer="order.name"  type="text" name="name" class="form-control @error('order.name') is-invalid @enderror" placeholder="الاسم" >
              @error('order.name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="col-md-12 ">
              <input type="text" wire:model.defer="order.email" class="form-control @error('order.email') is-invalid @enderror" name="email" placeholder="البريد الالكتروني" >
            
              @error('order.email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror</div>

            <div class="col-md-12">
              <input wire:model.defer="order.phone" type="text" class="form-control @error('order.phone') is-invalid @enderror" name="phone" placeholder="الهاتف" >
              @error('order.phone')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            
            </div>

            <div class="col-md-12">
              <textarea wire:model.defer="order.message" class="form-control @error('order.message') is-invalid @enderror" name="message" rows="6" placeholder="الرسالة" ></textarea>
              @error('order.message')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>



            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">تم ارسال الرسالة بنجاح شكرا لك!</div>

              <button type="submit">ارسال</button>
            </div>

          </div>
        </form>
      </div><!-- End Quote Form -->

    </div>

  </div>
</section><!-- End Get a Quote Section -->

</main><!-- End #main -->
</div>