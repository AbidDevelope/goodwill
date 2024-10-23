<!DOCTYPE html>
<html lang="en">
    <head>
     @include('user.include.headerlink')
</head>
<body class="body">
    <!-- Header Start -->
    @include('user.include.header')
    <!-- Header End -->

    <main>
        <div class="srcn-container">
            <!-- Slider Banner start -->
                <section class="hero-section scrtion-bottom-margin">
                    <div class="srcn-container-in ">
                        <div class="row">
                            @if(Session::has('message'))
                              <div class="alert alert-success">
                                  <span>{{ Session::get('message') }}</span>
                              </div>
                            @endif
                            <div class="col-md-2 ">
                                <div class="card menu-bar-in-hin padding-0" >
                                    <div class="list d-flex -gcol ">
                                    @foreach($categories as $category)
                                        <a href="#" class="itm d-flex g-phs padding-LR  g-bottom-margin">
                                            <span class="categories-text">{{ $category->name }}</span>
                                        </a>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-10 ">
                                <div class="card-silder">
                                    <div class=" padding-0">
                                        <div class="swiper mySwiper">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="slider-img-in">
                                                        <img src="{{asset('user/assets/images/banner/banner1.jpeg')}}" alt="" class="fleash-salex-im">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="slider-img-in">
                                                        <img src="{{asset('user/assets/images/banner/banner2.jpeg')}}" alt="" class="fleash-salex-im">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="slider-img-in">
                                                        <img src="{{asset('user/assets/images/hero.jpg')}}" alt="" class="fleash-salex-im">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="slider-img-in">
                                                        <img src="{{asset('user/assets/images/banner5.png')}}" alt="" class="fleash-salex-im">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <!-- Slider Banner end -->

            <!-- Category Start -->
            <section class="Products-section">
                    <div class="margin-tb col-md-12 card-box-in -2">
                        <div class="Featured-bg-card card padding-0">
                            <header class="top-card-heading-bg" >
                                <div class="d-row padding-LR g-col g-conter-items g-height ">
                                    <h4>Categories</h4>
                                </div>
                            </header>
                            <div class=" row g-col Categories-box-hd margin-auto">
                                @foreach($categories as $category)
                                <article class="card-box-generater card-box-generater-w box-hover d-row  ">
                                    <div class="cat-item-generater g-conter-items -gcol d-row g-padding ">
                                        <a href="" class="cat-img-ge-gn">
                                            <img class="img-fluid" src="{{asset('/uploads/categoryimage/'. $category->category_image)}}" alt="">
                                        </a>
                                        <h6 class="card-text padding-pb">{{ $category->name }}</h6>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            <!-- Category end -->

            <!-- Product start -->
            <section class="Deals-section margin-tb">
                <div class="aim fleash-salex-pbm">
                    <div class="col-md-12 card-box-in -2">
                        <section class="card padding-0">
                            <header class="top-card-heading-bg" >
                                <div class="d-row padding-LR g-col g-conter-items g-height ">
                                    <h4>Shop From Our Collections</h4>
                                </div>
                            </header>
                            <div class="row  g-padding Categories-box-hd margin-auto gap-hw" >
                             @foreach($combineData['products'] as $product)
                                <article class="card-width-in-col d-row -gcol     box-hover">
                                    <a href="{{ route('product/details', $product->id) }}" class="core">
                                        <div class="g-db-margin ">
                                            <img src="{{ asset('upload/products/'. $product->productWear->image) }}" alt="flash-sales" class="fleash-salex-im" height="200px">
                                        </div>
                                        <div class="info g-padding-ptlr">
                                            <div class="bdg _mall _xs">Official Store</div>
                                            <h3 class="name">{{ $product->name }}
                                                -
                                                50ml (Pack Of 3)</h3>

                                                <div class="g-prc-w d-row g-conter-items gap-hw ">
                                                 <div  class="d-row  g-conter-items">
                                                    <span class="prc">₦ {{ $product->productWear->selling_price }}</span> &nbsp;&nbsp;
                                                     <span class="old"> ₦ {{ $product->productWear->original_price }}</span>
                                                 </div>

                                                <div class="bdg _dsct _sm d-row">30%</div>
                                            </div>

                                        </div>
                                    </a>
                                    <footer class="g-ft- d-row -gcol g-padding-ptlr ">
                                        <form action="{{ route('add_to_cart', $product->id) }}" method="POST">
                                            @csrf
                                            <button class="btn-g" type="submit">Add To Cart</button>
                                        </form>
                                    </footer>
                                </article>
                             @endforeach
                            </div>
                        </section>
                    </div>
                </div>
            </section>
            <!-- Product start -->

            <!-- Electronics start -->
            <section class="Deals-section margin-tb">
                <div class="aim row fleash-salex-pbm">

                    <div class="col-md-12 card-box-in -2">
                        <section class="card padding-0">
                            <header class="top-card-heading-bg" >
                                <div class="d-row padding-LR g-col g-conter-items g-height ">
                                    <h4>Electronic Deals</h4>
                                </div>
                            </header>
                            <div class="row  g-padding Categories-box-hd margin-auto gap-hw">
                             @foreach($combineData['electronicsData'] as $product)
                                <article class="card-width-in-col d-row -gcol  -h  box-hover">
                                    <a href="{{ route('product/details', $product->id) }}" class="core">
                                        <div class="g-db-margin ">
                                            <img src="{{ asset('upload/products/'. $product->productWear->image) }}" alt="flash-sales" class="fleash-salex-im" height="200px">
                                        </div>
                                        <div class="info g-padding-ptlr">
                                            <div class="bdg _mall _xs">Official Store</div>
                                            <h3 class="name">{{ $product->name }}
                                                -
                                                50ml (Pack Of 3)</h3>

                                            <div class="g-prc-w d-row g-conter-items gap-hw ">
                                                 <div  class="d-row  g-conter-items">
                                                    <span class="prc">₦ {{ $product->productWear->selling_price }}</span> &nbsp;&nbsp;
                                                     <span class="old"> ₦ {{ $product->productWear->original_price }}</span>
                                                 </div>

                                                <div class="bdg _dsct _sm d-row">30%</div>
                                            </div>

                                        </div>
                                    </a>
                                    <footer class="g-ft- d-row -gcol g-padding-ptlr ">
                                        <form action="">
                                            <button class="btn-g" type="button">Add To Cart</button>
                                        </form>
                                    </footer>
                                </article>
                             @endforeach
                            </div>
                        </section>
                    </div>
                </div>
            </section>
            <!-- Electronics start -->

            <!-- Product Details start -->
            <section class=" card col-md-12 padding-0">
                <div class="g-phs padding-LR">
                    <h1 class="heading-goodwill-in g-phs"><strong>Goodwill – The Biggest Online Shopping
                            Website</strong></h1>
                    <h2 class="heading-goodwill-w g-phs"><strong>Shop for Everything You Need on Goodwill
                            Nigeria</strong>
                    </h2>
                    <p class="g-phs">goodwill
                        Nigeria is the largest online shopping website in Nigeria. We offer a platform where
                        customers in any part of Nigeria can find and shop for all they need in one online store and
                        that platform is the goodwill
                        shopping website. On the goodwill
                        mobile app or website, you can
                        shop
                        from the comfort of your home or during work breaks and get everything delivered fast without
                        you having to stress or move an inch. Be it <a href="#"><strong>fashion</strong></a>, <a
                            href="#"><strong>electronics</strong></a>, <a href="#"><strong>mobile phones</strong></a>,
                        <a href="#"><strong>computers</strong></a>, or your everyday
                        <a href="#"><strong>groceries</strong></a> you can get
                        everything you need on goodwill
                        online store.
                    </p>
                    <p class="g-phs">Have you used the goodwill online store today? Shop now on goodwill to enjoy a
                        seamless online
                        shopping
                        experience. With fast delivery, free returns, and flexible payment options, you are certain to
                        enjoy the convenience of shopping online.</p>
                    <h2 class="heading-goodwill-w g-phs"><strong>Experience Fast Delivery and Online Shopping
                            Convenience</strong></h2>
                    <p class="g-phs">Get your cart delivered to you within 24 hrs when you buy items with the <a
                            href="#"><strong>goodwill Express</strong></a> tag,
                        for selected products, you are also assured of free delivery and have your products delivered to
                        you at no extra cost! Also, we have products that you can ship from abroad under the <a
                            href="#"><strong>goodwill Global</strong></a>
                        catalog. This means that you can order various items from outside the country and get them
                        delivered to your doorstep without hassles.&nbsp;</p>
                </div>
            </section>
            <!-- Product Details end -->

        </div>
        <!-- Footer Start -->
         @include('user.include.footer')
        <!-- Footer End -->
    </main>



    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

</body>

</html>