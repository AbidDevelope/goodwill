<!DOCTYPE HTML> <html lang="en"> <head> <meta charset="utf-8"> <title>Product Details</title>
@include('vendor.include.headerlink')
</head>

<body> <div class="screen-overlay"></div> <!--=====start sidebar=========-->

    @include('vendor.include.sidebar')
    <!-- ===== end sidebar =========-->


    ain class="main-wrap">
        <!-- ===== start header =========-->
        @include('vendor.include.header')
        <!-- ===== end header =========-->

        <section class="content-main">
        <div class="content-header">
            <div>
            <h2 class="content-title card-title">Product Details</h2>

            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="card mb-4">
                    <header class="card-header">
                    <div class="row gx-3">
                        <div class="col-lg-4 col-md-6 me-auto">
                        <input type="text" placeholder="Search..." class="form-control">
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                    </select>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <select class="form-select">
                            <option>Show 20</option>
                            <option>Show 30</option>
                            <option>Show 40</option>
                        </select>
                    </div>
                </div>
                </header> <!-- card-header end// -->
                <div class="card-body">
                    <div class="pd-wrap">
                        <div class="container">
                            <div class="heading-section">
                                {{-- <h2>Product Details</h2> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="slider" class="owl-carousel product-slider">
                                        @if($product->productImages)
                                        @foreach ($product->productImages as $images)
                                        <div class="item">
                                            <img src="{{ asset('upload/products/'. $images->images) }}" height="300" />
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    <div id="thumb" class="owl-carousel product-thumb">

                                        @if($product->productImages)
                                        @foreach ($product->productImages as $images)
                                        <div class="item">
                                            <img src="{{ asset('upload/products/'. $images->images) }}" />
                                        </div>
                                        @endforeach
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="product-dtl">
                                        <div class="product-info">
                                            <div class="product-name">{{$product->name}}</div>
                                            <div class="reviews-counter">
                                                <div class="rate">
                                                    <input type="radio" id="star5" name="rate" value="5" checked />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="rate" value="4" checked />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="rate" value="3" checked />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="rate" value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="rate" value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                </div>
                                                <span>3 Reviews</span>
                                            </div>
                                            <div class="product-price-discount">
                                                <span>&#x20B9;{{$product->selling_price}}</span><span
                                                    class="line-through">&#x20B9;{{$product->original_price}}</span>
                                            </div>
                                        </div>
                                        <p>{{ $product->small_description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info-tabs">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="description-tab" data-toggle="tab"
                                            href="#description" role="tab" aria-controls="description"
                                            aria-selected="true">Description</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        {{$product->description}}
                                    </div>
                                </div>
                            </div>

                            <!-- <div style="text-align:center;font-size:14px;padding-bottom:20px;">Get free icon packs for your next project at <a href="http://iiicons.in/" target="_blank" style="color:#ff5e63;font-weight:bold;">www.iiicons.in</a></div> -->
                        </div>
                    </div>
                </div> <!-- card-body end// -->
            </div> <!-- card end// -->
        </div>
        </div>
        </section> <!-- content-main end// -->
        <!-- content-main end// -->
        @include('vendor.include.footer')
    </main>
    </body>
    <script>
        $(document).ready(function () {
            var slider = $("#slider");
            var thumb = $("#thumb");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            slider.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200
            }).on('changed.owl.carousel', syncPosition);
            thumb
                .on('initialized.owl.carousel', function () {
                    thumb.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    item: 4,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage,
                    navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);
            function syncPosition(el) {
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                thumb
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = thumb.find('.owl-item.active').length - 1;
                var start = thumb.find('.owl-item.active').first().index();
                var end = thumb.find('.owl-item.active').last().index();
                if (current > end) {
                    thumb.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    thumb.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    slider.data('owl.carousel').to(number, 100, true);
                }
            }
            thumb.on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).index();
                slider.data('owl.carousel').to(number, 300, true);
            });


            $(".qtyminus").on("click", function () {
                var now = $(".qty").val();
                if ($.isNumeric(now)) {
                    if (parseInt(now) - 1 > 0) { now--; }
                    $(".qty").val(now);
                }
            })
            $(".qtyplus").on("click", function () {
                var now = $(".qty").val();
                if ($.isNumeric(now)) {
                    $(".qty").val(parseInt(now) + 1);
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </html>