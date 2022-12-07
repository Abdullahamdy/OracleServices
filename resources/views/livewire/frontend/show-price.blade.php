<div>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('{{asset('Frontend/assets/img/page-header.jpg')}}');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>سعر الخدمات</h2>
          <p>موقع خدمات هو منصّة تصل بين أصحاب المشاريع والمستقلين في العالم العربي. إن كنت صاحب مشاريع تستطيع استخدام موقع خدمات لانجاز مشاريعك من خلال الانترنت بسهولة وإضافة عروضك على المشاريع التي تستطيع إنجازها
          </p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="{{route('index')}}">الرئيسية</a></li>
        <li>اسعار الخدمات</li>
      </ol>
    </div>
  </nav>
</div><!-- End Breadcrumbs -->

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing pt-4">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <span>عرض سعر</span>
      <h2>عرض سعر</h2>

    </div>

    <div class="row gy-4">
@foreach($showprices as $key => $item)
      <div class="col-lg-4 mb-3" data-aos="fade-up" data-aos-delay="300">
        <div class="pricing-item">
          <h3>{{$item->name}}</h3>
          <h4><sup>{{$item->currency != '' ? $item->currency->symbol : ''}}</sup>{{$item->price}}<span> / {{$item->Time}}</span></h4>
          <ul>
          @foreach($item->priceservices as $el)
            <li class="{{$el->activating == 0 ? 'na' : ''}}"><i class="{{$el->activating == 0 ? 'bi bi-x' : 'bi bi-check'}}"></i> {{$el->name}} </li>
        @endforeach
          </ul>
          <a href="{{route('/oreder-service')}}" class="buy-btn">شراء الان</a>
        </div>
      </div><!-- End Pricing Item -->
@endforeach
    </div>

  </div>
</section><!-- End Pricing Section -->

</main><!-- End #main -->

</div>
