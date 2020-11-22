<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="سوها- Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>فروشگاه سوها</title>
    <!-- Favicon-->
    <link rel="icon" href="front/img/icons/icon-72x72.png">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="front/img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="front/img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="front/img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="front/img/icons/icon-180x180.png">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="{{url('front/style.css')}}">
    <!-- Web App Manifest-->
    <link rel="manifest" href="{{url('front/manifest.json')}}">
</head>
<body>
<!-- Preloader-->
<div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">بارگذاری...</div>
    </div>
</div>
<!-- Header Area-->
<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="#"><img src="{{url('front/img/core-img/logo-small.png')}}" alt=""></a></div>
        <!-- Search Form-->
        <div class="top-search-form">
            <form action="#" method="">
                <input class="form-control" type="search" placeholder="کلمه کلیدی خود را وارد کنید">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
    </div>
</div>
<!-- Sidenav Black Overlay-->
<div class="sidenav-black-overlay"></div>
<!-- Side Nav Wrapper-->
<div class="suha-sidenav-wrapper" id="sidenavWrapper">

    @auth
        <!-- Sidenav Profile-->
            <div class="sidenav-profile">
                <div class="user-profile"><img src="{{url('front/img/bg-img/9.jpg')}}" alt=""></div>
                <div class="user-info">
                    <h6 class="user-name mb-0">نیلوفر</h6>
                    <p class="available-balance">حساب شما <span><span class="counter">350000</span></span><span> تومان</span></p>
                </div>
            </div>


            @if(Auth::user()->role=='1')
                <ul class="sidenav-nav pl-0">

                    <li><a href="{{route('rebo')}}"><i class="lni lni-cog"></i>مدیریت</a></li>

                </ul>

        @endif
            <!-- Sidenav Nav-->
            <ul class="sidenav-nav pl-0">
                <li><a href="profile.html"><i class="lni lni-user"></i>پروفایل من</a></li>
                <li><a href="notifications.html"><i class="lni lni-alarm lni-tada-effect"></i>اطلاعیه ها <span class="ml-3 badge badge-warning">3</span></a></li>



                <li><a href="settings.html"><i class="lni lni-cog"></i>تنظیمات</a></li>
                <li>
                    <form action="{{route('logout')}}" method="post">

                        @csrf
                        <button class="btn btn-danger" type="submit"><i class="lni lni-power-switch"></i>خروج از سیستم</button>

                    </form>
                </li>
            </ul>




        @else
        <!-- Sidenav Profile-->
            <div class="sidenav-profile">
                <div class="user-profile"><img src="{{url('front/img/core-img/logo-small.png')}}" alt=""></div>
                <div class="user-info">
                    <h6 class="user-name mb-0">ربو تولدی دوباره</h6>
                </div>
            </div>
            <!-- Sidenav Nav-->
            <ul class="sidenav-nav pl-0">
                <li><a href="login"><i class="lni lni-user"></i>ورود</a></li>

            </ul>


        @endauth

    <!-- Go Back Button-->
    <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-right"></i></div>
</div>
<!-- PWA Install Alert-->
<div class="toast pwa-install-alert shadow" id="pwaInstallToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="8000" data-autohide="true">
    <div class="toast-body">
        <button class="ml-3 close" type="button" data-dismiss="toast" aria-label="نزدیک"><span aria-hidden="true">×</span></button>
        <div class="content d-flex align-items-center mb-2"><img src="img/icons/icon-72x72.png" alt="">
            <h6 class="mb-0 text-white">افزودن به صفحه اصلی</h6>
        </div><span class="mb-0 d-block text-white">سوهارا در صفحه اصلی تلفن همراه خود اضافه کنید. بر روی دکمه <strong class="mx-1">"افزودن به صفحه اصلی"</strong> کلیک کنید و مانند یک برنامه معمولی از آن لذت ببرید.</span>
    </div>
</div>
<div class="page-content-wrapper">
    <!-- Hero Slides-->
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide-->
        <div class="single-hero-slide" style="background-image: url('front/img/bg-img/1.jpg')">
            <div class="slide-content h-100 d-flex align-items-center">
                <div class="container">
                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">آمازون اکو</h4>
                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">نسل 3 ، ذغال سنگی</p><a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">خرید</a>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide-->
        <div class="single-hero-slide" style="background-image: url('front/img/bg-img/2.jpg')">
            <div class="slide-content h-100 d-flex align-items-center">
                <div class="container">
                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms"> شمع  تزیینی</h4>
                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">اکنون فقط 22 تومان</p><a class="btn btn-success btn-sm" href="#" data-animation="fadeInUp" data-delay="500ms" data-wow-duration="1000ms">خرید</a>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide-->
        <div class="single-hero-slide" style="background-image: url('front/img/bg-img/3.jpg')">
            <div class="slide-content h-100 d-flex align-items-center">
                <div class="container">
                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">بهترین مبلمان</h4>
                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">  دارای  ضمانت </p><a class="btn btn-danger btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">خرید</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Catagories-->
    <div class="product-catagories-wrapper py-3">
        <div class="container">
            <div class="section-heading">
                <h6 class="ml-1">دسته بندی محصولات</h6>
            </div>
            <div class="product-catagory-wrap">
                <div class="row g-3">
                    <!-- Single Catagory Card-->
                    <div class="col-4">
                        <div class="card catagory-card">
                            <div class="card-body"><a href="catagory.html"><i class="lni lni-heart"></i><span>زنانه</span></a></div>
                        </div>
                    </div>
                    <!-- Single Catagory Card-->
                    <div class="col-4">
                        <div class="card catagory-card">
                            <div class="card-body"><a href="catagory.html"><i class="lni lni-juice"></i><span>آب میوه</span></a></div>
                        </div>
                    </div>
                    <!-- Single Catagory Card-->
                    <div class="col-4">
                        <div class="card catagory-card">
                            <div class="card-body"><a href="catagory.html"><i class="lni lni-pizza"></i><span>خوراکی ها</span></a></div>
                        </div>
                    </div>
                    <!-- Single Catagory Card-->
                    <div class="col-4">
                        <div class="card catagory-card">
                            <div class="card-body"><a href="catagory.html"><i class="lni lni-basketball"></i><span>ورزش ها</span></a></div>
                        </div>
                    </div>
                    <!-- Single Catagory Card-->
                    <div class="col-4">
                        <div class="card catagory-card">
                            <div class="card-body"><a href="catagory.html"><i class="lni lni-tshirt"></i><span>مردان</span></a></div>
                        </div>
                    </div>
                    <!-- Single Catagory Card-->
                    <div class="col-4">
                        <div class="card catagory-card">
                            <div class="card-body"><a href="catagory.html"><i class="lni lni-island"></i><span>مسافرت </span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Flash Sale Slide-->
    <div class="flash-sale-wrapper">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1">فروش فلش</h6><a class="btn btn-primary btn-sm" href="flash-sale.html">مشاهده همه</a>
            </div>
            <!-- Flash Sale Slide-->
            <div class="flash-sale-slide owl-carousel">
                <!-- Single Flash Sale Card-->
                <div class="card flash-sale-card">
                    <div class="card-body"><a href="single-product.html"><img src="front/img/product/1.png" alt=""><span class="product-title">لامپ میز سیاه</span>
                            <p class="sale-price">40 تومان <span class="real-price"> 55 تومان</span></p><span class="progress-title">33٪ فروخته شده</span>
                            <!-- Progress Bar-->
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                            </div></a></div>
                </div>
                <!-- Single Flash Sale Card-->
                <div class="card flash-sale-card">
                    <div class="card-body"><a href="single-product.html"><img src="front/img/product/2.png" alt=""><span class="product-title">مبل مدرن</span>
                            <p class="sale-price">36 تومان <span class="real-price"> 65 تومان</span></p><span class="progress-title">57٪ فروخته شده</span>
                            <!-- Progress Bar-->
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                            </div></a></div>
                </div>
                <!-- Single Flash Sale Card-->
                <div class="card flash-sale-card">
                    <div class="card-body"><a href="single-product.html"><img src="front/img/product/3.png" alt=""><span class="product-title">صندلی کلاسیک</span>
                            <p class="sale-price">36 تومان <span class="real-price"> 55 تومان</span></p><span class="progress-title">99٪ فروخته شده</span>
                            <!-- Progress Bar-->
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div></a></div>
                </div>
                <!-- Single Flash Sale Card-->
                <div class="card flash-sale-card">
                    <div class="card-body"><a href="single-product.html"><img src="front/img/product/1.png" alt=""><span class="product-title">لامپ میز سیاه</span>
                            <p class="sale-price">40 تومان <span class="real-price"> 55 تومان</span></p><span class="progress-title">33٪ فروخته شده</span>
                            <!-- Progress Bar-->
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                            </div></a></div>
                </div>
                <!-- Single Flash Sale Card-->
                <div class="card flash-sale-card">
                    <div class="card-body"><a href="single-product.html"><img src="front/img/product/2.png" alt=""><span class="product-title">مبل مدرن</span>
                            <p class="sale-price">36 تومان <span class="real-price"> 65 تومان</span></p><span class="progress-title">57٪ فروخته شده</span>
                            <!-- Progress Bar-->
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                            </div></a></div>
                </div>
                <!-- Single Flash Sale Card-->
                <div class="card flash-sale-card">
                    <div class="card-body"><a href="single-product.html"><img src="front/img/product/3.png" alt=""><span class="product-title">صندلی کلاسیک</span>
                            <p class="sale-price">36 تومان <span class="real-price"> 55 تومان</span></p><span class="progress-title">99٪ فروخته شده</span>
                            <!-- Progress Bar-->
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Products-->
    <div class="top-products-area clearfix py-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1">محصولات برتر</h6><a class="btn btn-danger btn-sm" href="shop-grid.html">مشاهده همه</a>
            </div>
            <div class="row g-3">
                <!-- Single Top Product Card-->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card top-product-card">
                        <div class="card-body"><span class="badge badge-success">فروش</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="front/img/product/11.png" alt=""></a><a class="product-title d-block" href="single-product.html">نام محصول</a>
                            <p class="sale-price">36 تومان <span class="real-price"> 65 تومان</span></p>
                            <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div><a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Single Top Product Card-->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card top-product-card">
                        <div class="card-body"><span class="badge badge-primary">جدید</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="front/img/product/5.png" alt=""></a><a class="product-title d-block" href="single-product.html">مبل چوبی</a>
                            <p class="sale-price">46 تومان <span class="real-price"> 65 تومان</span></p>
                            <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div><a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Single Top Product Card-->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card top-product-card">
                        <div class="card-body"><span class="badge badge-success">فروش</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="front/img/product/6.png" alt=""></a><a class="product-title d-block" href="single-product.html">لامپ سقفی</a>
                            <p class="sale-price">46 تومان <span class="real-price"> 75 تومان</span></p>
                            <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div><a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Single Top Product Card-->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card top-product-card">
                        <div class="card-body"><span class="badge badge-danger">%14</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="front/img/product/9.png" alt=""></a><a class="product-title d-block" href="single-product.html">کفش کتانی</a>
                            <p class="sale-price">65 تومان <span class="real-price"> 95 تومان</span></p>
                            <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div><a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Single Top Product Card-->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card top-product-card">
                        <div class="card-body"><span class="badge badge-danger">%11</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="front/img/product/8.png" alt=""></a><a class="product-title d-block" href="single-product.html">صندلی چوبی</a>
                            <p class="sale-price">46 تومان <span class="real-price"> 75 تومان</span></p>
                            <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div><a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Single Top Product Card-->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card top-product-card">
                        <div class="card-body"><span class="badge badge-warning">داغ</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img class="mb-2" src="front/img/product/4.png" alt=""></a><a class="product-title d-block" href="single-product.html">پیراهن چوگان</a>
                            <p class="sale-price">46 تومان <span class="real-price"> 75 تومان</span></p>
                            <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div><a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cool Facts Area-->
    <div class="cta-area">
        <div class="container">
            <div class="cta-text p-4 p-lg-5" style="background-image: url(front/img/bg-img/24.jpg)">
                <h4>فروش زمستانی 50٪ تخفیف</h4>
                <p>سوها <br>الگوی تلفن همراه چند منظوره ، خلاق و مدرن است.</p><a class="btn btn-danger" href="#">خرید امروز</a>
            </div>
        </div>
    </div>
    <!-- Weekly Best Sellers-->
    <div class="weekly-best-seller-area py-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="pl-1">هفتگی بهترین فروشندگان</h6><a class="btn btn-success btn-sm" href="shop-list.html">مشاهده همه</a>
            </div>
            <div class="row g-3">
                <!-- Single Weekly Product Card-->
                <div class="col-12 col-md-6">
                    <div class="card weekly-product-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="product-thumbnail-side"><span class="badge badge-success">فروش</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="front/img/product/10.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.html">مبل قرمز مدرن</a>
                                <p class="sale-price"><i class="lni lni-dollar"></i>50 تومان <span>90 تومان</span></p>
                                <div class="product-rating"><i class="lni lni-star-filled"></i>4.88 (39)</div><a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="mr-1 lni lni-cart"></i>خرید</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Weekly Product Card-->
                <div class="col-12 col-md-6">
                    <div class="card weekly-product-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="product-thumbnail-side"><span class="badge badge-primary">فروش</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="front/img/product/7.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.html">صندلی اداری</a>
                                <p class="sale-price"><i class="lni lni-dollar"></i>50 تومان <span>90 تومان</span></p>
                                <div class="product-rating"><i class="lni lni-star-filled"></i>4.82 (125)</div><a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="mr-1 lni lni-cart"></i>خرید</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Weekly Product Card-->
                <div class="col-12 col-md-6">
                    <div class="card weekly-product-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="product-thumbnail-side"><span class="badge badge-danger">-10٪</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="front/img/product/12.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.html">عینک آفتابی</a>
                                <p class="sale-price"><i class="lni lni-dollar"></i>40 تومان <span>60 تومان</span></p>
                                <div class="product-rating"><i class="lni lni-star-filled"></i>4.79 (63)</div><a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="mr-1 lni lni-cart"></i>خرید</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Weekly Product Card-->
                <div class="col-12 col-md-6">
                    <div class="card weekly-product-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="product-thumbnail-side"><span class="badge badge-warning">جدید</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="front/img/product/13.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.html">ساعت دیواری</a>
                                <p class="sale-price"><i class="lni lni-dollar"></i>40 تومان <span>60 تومان</span></p>
                                <div class="product-rating"><i class="lni lni-star-filled"></i>4.99 (7)</div><a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="mr-1 lni lni-cart"></i>خرید</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Discount Coupon Card-->
    <div class="container">
        <div class="card discount-coupon-card border-0">
            <div class="card-body">
                <div class="coupon-text-wrap d-flex align-items-center p-3">
                    <h5 class="text-white pr-3 mb-0">%20 <br>تخفیف دریافت کنید</h5>
                    <p class="text-white pl-3 mb-0">برای دریافت تخفیف ، کد <strong class="px-1">GET20</strong> را در صفحه پرداخت وارد کنید .</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Products Wrapper-->
    <div class="featured-products-wrapper py-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="pl-1">محصولات برجسته</h6><a class="btn btn-warning btn-sm" href="featured-products.html">مشاهده همه</a>
            </div>
            <div class="row g-3">
                <!-- Featured Product Card-->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card featured-product-card">
                        <div class="card-body"><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                            <div class="product-thumbnail-side"><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="front/img/product/14.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.html">اسکیت بورد آبی</a>
                                <p class="sale-price">20 تومان <span>70 تومان</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Featured Product Card-->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card featured-product-card">
                        <div class="card-body"><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                            <div class="product-thumbnail-side"><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="front/img/product/15.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.html">کیف مسافرتی</a>
                                <p class="sale-price">20 تومان <span>70 تومان</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Featured Product Card-->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card featured-product-card">
                        <div class="card-body"><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                            <div class="product-thumbnail-side"><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="front/img/product/16.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.html">تی شرت های پنبه ای</a>
                                <p class="sale-price">20 تومان <span>70 تومان</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Featured Product Card-->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card featured-product-card">
                        <div class="card-body"><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                            <div class="product-thumbnail-side"><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="single-product.html"><img src="front/img/product/6.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.html">لامپ سقفی </a>
                                <p class="sale-price">20 تومان <span>70 تومان</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Night Mode View Card-->
    <div class="night-mode-view-card pb-3">
        <div class="container">
            <div class="card settings-card">
                <div class="card-body">
                    <div class="single-settings d-flex align-items-center justify-content-between">
                        <div class="title"><i class="lni lni-night"></i><span>حالت شب</span></div>
                        <div class="data-content">
                            <div class="toggle-button-cover">
                                <div class="button r">
                                    <input class="checkbox" id="darkSwitch" type="checkbox">
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Internet Connection Status-->
<div class="internet-connection-status" id="internetStatus"></div>
<!-- Footer Nav-->
<div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
            <ul class="h-100 d-flex align-items-center justify-content-between pl-0">
                <li class="active"><a href="home.html"><i class="lni lni-home"></i>خانه</a></li>
                <li><a href="message.html"><i class="lni lni-life-ring"></i>حمایت کردن</a></li>
                <li><a href="cart.html"><i class="lni lni-shopping-basket"></i>سبد خرید</a></li>
                <li><a href="pages.html"><i class="lni lni-heart"></i>صفحات</a></li>
                <li><a href="settings.html"><i class="lni lni-cog"></i>تنظیمات</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- All JavaScript Files-->
<script src="front/js/jquery.min.js"></script>
<script src="front/js/bootstrap.bundle.min.js"></script>
<script src="front/js/waypoints.min.js"></script>
<script src="front/js/jquery.easing.min.js"></script>
<script src="front/js/owl.carousel.min.js"></script>
<script src="front/js/jquery.counterup.min.js"></script>
<script src="front/js/jquery.countdown.min.js"></script>
<script src="front/js/default/jquery.passwordstrength.js"></script>
<script src="front/js/wow.min.js"></script>
<script src="front/js/jarallax.min.js"></script>
<script src="front/js/jarallax-video.min.js"></script>
<script src="front/js/default/dark-mode-switch.js"></script>
<script src="front/js/default/no-internet.js"></script>
<script src="front/js/default/active.js"></script>
<script src="front/js/pwa.js"></script>

</body>
</html>
