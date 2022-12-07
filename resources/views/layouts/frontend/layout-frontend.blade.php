<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>موقع خدمات</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('Frontend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('Frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('Frontend/assets/vendor/bootstrap/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
  <link href="{{asset('Frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('Frontend/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('Frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('Frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('Frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="{{asset('Frontend/assets/css/main.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @livewireStyles
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img width="150" src="{{asset('Frontend/assets/img/Logo.svg')}}" alt="موقع خدمات">
        <h1 class="d-none">موقع خدمات</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('index')}}" class="active">الرئيسية</a></li>
          <li><a href="#">عن خدمات</a></li>
          <li><a href="{{route('/all-services')}}">خدمات</a></li>
          <li><a href="{{route('/show-price')}}">اسعار خدمات</a></li>

          <li><a href="{{route('/contact-us')}}">اتصل بنا</a></li>
          <li><a class="get-a-quote" href="{{route('/oreder-service')}}">اطلب الخدمة</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->


  {{$slot}}


  <footer id="footer" class="footer">

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-5 col-md-12 footer-info">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{asset('Frontend/assets/img/Logo.svg')}}" alt="">
      </a>
      <p>موقع خدمات هو منصّة تصل بين أصحاب المشاريع والمستقلين في العالم العربي. إن كنت صاحب مشاريع تستطيع استخدام موقع خدمات لانجاز مشاريعك من خلال الانترنت بسهولة  وإضافة عروضك على المشاريع التي تستطيع إنجازها. يضمن موقع خدمات حقوقك كاملة ويعمل كوسيط بين صاحب المشروع والمستقبل.
      </p>
      <div class="social-links d-flex mt-4">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4>روابط مفيدة</h4>
      <ul>
        <li><a href="#">الرئيسية</a></li>
        <li><a href="#">من نحن</a></li>
        <li><a href="#">خدمات</a></li>
        <li><a href="#">الأسئلة الشائعة</a></li>
        <li><a href="#">شروط الاستخدام</a></li>
      </ul>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4>روابط مفيدة</h4>
      <ul>
        <li><a href="#">مركز المساعدة</a></li>
        <li><a href="#">مدونة مستقل</a></li>
        <li><a href="#">معرض الأعمال</a></li>
        <li><a href="#">خدمات للمؤسسات</a></li>
        <li><a href="#">شروط الاستخدام</a></li>
      </ul>
    </div>

    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
      <h4>تواصل معنا</h4>
      <address>
        فلسطين - <br>
        قطاع غزة - <br>
        النصيرات <br><br>
        <a class="text-white mb-3" href="tel:0599555555"><strong>Phone:</strong> 0599555555<br></a>
        <a class="text-white" href="mailto:info@example.com"><strong>Email:</strong> info@example.com<br></a>
      </address>

    </div>

  </div>
</div>
</footer>
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
@livewireScripts
<script>
      window.livewire.on('alertSuccess', (message) => {
        Swal.fire({
            title: '{{ __('Saved successfully') }}',
            text: message,
            icon: 'success',
            confirmButtonText: 'Ok',
            color: '#ddd',
            background: '#5bc0de',
        })

        Livewire.emit("refreshModal");
        $(".modal").modal("hide");
        if (message == "تم تسجيل بياناتك بنجاح سيتم التواصل معكم في اقرب وقت ممكن , شكرا لمشاركتكم معنا مع تحيات فريق درع") {
            setTimeout(function () {
                window.location.href = "https://shieldit.sa";
            }, 3000);
        }
    })
</script>
<script src="{{asset('Frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('Frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('Frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('Frontend/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('Frontend/assets/vendor/php-email-form/validate.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>




<!-- Template Main JS File -->
<script src="{{asset('Frontend/assets/js/main.js')}}"></script>

</body>

</html>