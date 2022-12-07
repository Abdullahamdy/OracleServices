<div>
<main id="main">
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('{{asset('Frontend/assets/img/page-header.jpg')}}');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>{{$model->name}}</h2>
          <p>{{$model->short_description}}.</p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="index.html">الرئيسية</a></li>
        <li>استعرض الخدمات</li>
      </ol>
    </div>
  </nav>
</div><!-- End Breadcrumbs -->

<!-- ======= Service Details Section ======= -->
<section id="service-details" class="service-details">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4">

      <div class="col-lg-4">
        <div class="services-list">
        
        @foreach($model->all_category as $cat)
    
          <a href="#" class="{{$cat->id == $model->category_id ? 'active' : ''}}">{{$cat->name}}</a>
          @endforeach
      

        </div>

        <h4>استعرض الخدمات</h4>
        <p> ابحث عن الخدمة التي تحتاجها باستخدام مربع البحث في الأعلى أو عبر التصنيفات</p>
      </div>

      <div class="col-lg-8">
      @if($image = $model->attachments()->orderBy('id',"DESC")->first())
      <img src="{{ url('storage/'.$image->path) }}" alt="" class="img-fluid services-img">
    @endif
       
        <h3>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد</h3>
        <p>
      {!!$model->full_description!!}
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> <span>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</span></li>
        </ul>
        <p>
           هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة
        </p>
        <p>
           هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة
        </p>
      </div>

    </div>

  </div>
</section><!-- End Service Details Section -->

</main><!-- End #main -->

</div>
