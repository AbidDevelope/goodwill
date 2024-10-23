<!DOCTYPE html>
<html lang="en">
   <head>
      @include('user.include.headerlink')
   </head>
   <body class="body">
      @include('user.include.header')
      <main class="hero-section-page">
         <div class="srcn-container">
            <div class="category-section">
               {{-- Category Section end --}}
               <section class="Deals-section margin-tb">
                  <div class="aim row fleash-salex-pbm">
                     <div id="catalog-listing" class="hook"></div>
                     <div class="col-md-12 card-box-in -2">
                        <section class="card ">
                           <header class="" style="background-color: steelblue; color: #fff;">
                              <div class="d-row g-pvxs g-col -g-ctr g-mh-48px g-bt">
                                 <h4>products</h4>
                              </div>
                           </header>
                           <div class="row g-bt g-phvs-b" style="width: 100%; position: relative; margin-left: 0;">
                              @forelse($products as $product)
                              <article class="c-prd d-row -gcol g-elli-w g-elli-w-h p-l card-bg prd">
                                 <div class="img-c ">
                                    <img src="{{ asset('user/assets/images/sela.jpg') }}" alt="flash-sales"
                                       class="fleash-salex-im">
                                 </div>
                                 <div class="info g-phvs-">
                                    <!-- <div class="bdg _mall _xs">Official Store</div> -->
                                    <h3 class="name">{{ $product->name }}</h3>
                                    <div class="prc">₦ {{ $product->selling_price }}</div>
                                    <div class="g-prc-w d-row -g-ctr">
                                       <div class="old">₦ {{ $product->original_price }}</div>
                                       <!-- <div class="bdg _dsct _sm d-row">30%</div> -->
                                    </div>
                                    <div class="g-rev d-row -g-ctr">
                                       <div class="stars _s d-row">
                                          <div class="in" style="width:91.99999999999999%"></div>
                                       </div>
                                    </div>
                                 </div>
                                 </a>
                              </article>
                              @empty
                              <h3 style="text-align:center;">No result founds.</h3>
                              @endforelse
                           </div>
                        </section>
                     </div>
                  </div>
               </section>
               <section class="Deals-section margin-tb">
                  <div class="aim row fleash-salex-pbm">
                     <div id="catalog-listing" class="hook"></div>
                     <div class="col-md-12 card-box-in -2">
                        <section class="card ">
                           <header class="" style="background-color: bisque;">
                              <div class="d-row g-pvxs g-col -g-ctr g-mh-48px g-bt">
                                 <h1>408 products found</h1>
                              </div>
                           </header>
                           <div class="row g-bt g-phvs-b" style="width: 100%; position: relative; margin-left: 0;">
                              <article class="c-prd d-row -gcol g-elli-w g-elli-w-h p-l card-bg prd">
                                 <a href="#" class="core">
                                    <div class="img-c ">
                                       <img src="img/sela.jpg" alt="flash-sales" class="fleash-salex-im">
                                    </div>
                                    <div class="info g-phvs-">
                                       <div class="bdg _mall _xs">Official Store</div>
                                       <h3 class="name">NIVEA Flash Sales Deep Anti-Perspirant Roll-on For
                                          Men,
                                          48h
                                          -
                                          50ml (Pack Of 3)
                                       </h3>
                                       <div class="prc">₦ 3,160</div>
                                       <div class="g-prc-w d-row -g-ctr">
                                          <div class="old">₦ 4,500</div>
                                          <div class="bdg _dsct _sm d-row">30%</div>
                                       </div>
                                       <div class="g-rev d-row -g-ctr">
                                          <div class="stars _s d-row">
                                             <div class="in" style="width:91.99999999999999%"></div>
                                          </div>
                                          (223)
                                       </div>
                                    </div>
                                 </a>
                                 <footer class="g-ft- d-row -gcol g-phvs- ">
                                    <form action="">
                                       <button class="btn-g" type="button">Add To Cart</button>
                                    </form>
                                 </footer>
                              </article>
                              <article class="c-prd d-row -gcol g-elli-w g-elli-w-h p-l card-bg prd">
                                 <a href="#" class="core">
                                    <div class="img-c">
                                       <img src="img/sela2.jpg" alt="flash-sales" class="fleash-salex-im">
                                    </div>
                                    <div class="info g-phvs-">
                                       <div class="bdg _mall _xs">Official Store</div>
                                       <h3 class="name">NIVEA Flash Sales Deep Anti-Perspirant Roll-on For
                                          Men,
                                          48h
                                          -
                                          50ml (Pack Of 3)
                                       </h3>
                                       <div class="prc">₦ 3,160</div>
                                       <div class="g-prc-w d-row -g-ctr">
                                          <div class="old">₦ 4,500</div>
                                          <div class="bdg _dsct _sm d-row">30%</div>
                                       </div>
                                       <div class="g-rev d-row -g-ctr">
                                          <div class="stars _s d-row">
                                             <div class="in" style="width:91.99999999999999%"></div>
                                          </div>
                                          (223)
                                       </div>
                                    </div>
                                 </a>
                                 <footer class="g-ft- d-row -gcol g-phvs- ">
                                    <form action="">
                                       <button class="btn-g" type="button">Add To Cart</button>
                                    </form>
                                 </footer>
                              </article>
                              <article class="c-prd d-row -gcol g-elli-w g-elli-w-h p-l card-bg prd">
                                 <a href="#" class="core">
                                    <div class="img-c">
                                       <img src="img/sela3.jpg" alt="flash-sales" class="fleash-salex-im">
                                    </div>
                                    <div class="info g-phvs-">
                                       <div class="bdg _mall _xs">Official Store</div>
                                       <h3 class="name">NIVEA Flash Sales Deep Anti-Perspirant Roll-on For
                                          Men,
                                          48h
                                          -
                                          50ml (Pack Of 3)
                                       </h3>
                                       <div class="prc">₦ 3,160</div>
                                       <div class="g-prc-w d-row -g-ctr">
                                          <div class="old">₦ 4,500</div>
                                          <div class="bdg _dsct _sm d-row">30%</div>
                                       </div>
                                       <div class="g-rev d-row -g-ctr">
                                          <div class="stars _s d-row">
                                             <div class="in" style="width:91.99999999999999%"></div>
                                          </div>
                                          (223)
                                       </div>
                                    </div>
                                 </a>
                                 <footer class="g-ft- d-row -gcol g-phvs- ">
                                    <form action="">
                                       <button class="btn-g" type="button">Add To Cart</button>
                                    </form>
                                 </footer>
                              </article>
                              <article class="c-prd d-row -gcol g-elli-w g-elli-w-h p-l card-bg prd">
                                 <a href="#" class="core">
                                    <div class="img-c">
                                       <img src="img/sela4.jpg" alt="flash-sales" class="fleash-salex-im">
                                    </div>
                                    <div class="info g-phvs-">
                                       <div class="bdg _mall _xs">Official Store</div>
                                       <h3 class="name">NIVEA Flash Sales Deep Anti-Perspirant Roll-on For
                                          Men,
                                          48h
                                          -
                                          50ml (Pack Of 3)
                                       </h3>
                                       <div class="prc">₦ 3,160</div>
                                       <div class="g-prc-w d-row -g-ctr">
                                          <div class="old">₦ 4,500</div>
                                          <div class="bdg _dsct _sm d-row">30%</div>
                                       </div>
                                       <div class="g-rev d-row -g-ctr">
                                          <div class="stars _s d-row">
                                             <div class="in" style="width:91.99999999999999%"></div>
                                          </div>
                                          (223)
                                       </div>
                                    </div>
                                 </a>
                                 <footer class="g-ft- d-row -gcol g-phvs- ">
                                    <form action="">
                                       <button class="btn-g" type="button">Add To Cart</button>
                                    </form>
                                 </footer>
                              </article>
                           </div>
                        </section>
                     </div>
                  </div>
               </section>
               <section class=" card col-md-12">
                  <div class="g-phs g-pvxs">
                     <h1 class="heading-goodwill-in g-phs"><strong>Goodwill – The Biggest Online Shopping
                        Website</strong>
                     </h1>
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
                        from the comfort of your home or during work breaks and get everything delivered fast
                        without
                        you having to stress or move an inch. Be it <a href="#"><strong>fashion</strong></a>,
                        <a href="#"><strong>electronics</strong></a>, <a href="#"><strong>mobile
                        phones</strong></a>,
                        <a href="#"><strong>computers</strong></a>, or your everyday
                        <a href="#"><strong>groceries</strong></a> you can get
                        everything you need on goodwill
                        online store.
                     </p>
                     <p class="g-phs">Have you used the goodwill online store today? Shop now on goodwill to enjoy
                        a
                        seamless online
                        shopping
                        experience. With fast delivery, free returns, and flexible payment options, you are certain
                        to
                        enjoy the convenience of shopping online.
                     </p>
                     <h2 class="heading-goodwill-w g-phs"><strong>Experience Fast Delivery and Online Shopping
                        Convenience</strong>
                     </h2>
                     <p class="g-phs">Get your cart delivered to you within 24 hrs when you buy items with the <a
                        href="#"><strong>goodwill Express</strong></a> tag,
                        for selected products, you are also assured of free delivery and have your products
                        delivered to
                        you at no extra cost! Also, we have products that you can ship from abroad under the <a
                           href="#"><strong>goodwill Global</strong></a>
                        catalog. This means that you can order various items from outside the country and get them
                        delivered to your doorstep without hassles.&nbsp;
                     </p>
                  </div>
               </section>
            </div>
         </div>
      </main>
      {{--
      <section class="hero-section ">
         <div class="scrn-container">
            <div class=" d-row hero-container">
               <div class=" hero-pt" style="width: 20%;">
                  <div class="flyout-w  d-row">
                     <div class="flyout" role="menu">
                        @foreach ($categories as $category)
                        <a class="itm d-row h-w-row-gap " role="menuitem">
                        <span class="text">{{ $category->name }}</span>
                        </a>
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="hero-pt-in">
                  <div class="swiper-container">
                     <!-- Additional required wrapper -->
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="swiper-img active">
                              <img class="img-fluid" src="{{ asset('user/assets/images/banner2.png') }}" alt="Image">
                           </div>
                        </div>
                     </div>
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="swiper-img active">
                              <img class="img-fluid" src="{{ asset('user/assets/images/banner3.png') }}" alt="Image">
                           </div>
                        </div>
                     </div>
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="swiper-img active">
                              <img class="img-fluid" src="{{ asset('user/assets/images/banner4.png') }}" alt="Image">
                           </div>
                        </div>
                     </div>
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="swiper-img active">
                              <img class="img-fluid" src="{{ asset('user/assets/images/hero.jpg') }}" alt="Image">
                           </div>
                        </div>
                     </div>
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="swiper-img active">
                              <img class="img-fluid" src="{{ asset('user/assets/images/banner5.png') }}" alt="Image">
                           </div>
                        </div>
                     </div>
                     <div class="swiper-pagination"></div>
                     <div class="prev">
                        <span class="fa fa-long-arrow-right" aria-hidden="true"></span>
                     </div>
                     <div class="next">
                        <span class="fa fa-long-arrow-left" aria-hidden="true"></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="Brand-Festival-scetion">
         <div class="srcn-container ">
            <div class="card-box-heading">
               <h2 class="card-heding">Shop From Our Collectionsss</h2>
            </div>
            <div class="card-container">
               @foreach ($products as $product)
               <div class=" card-box-bg">
                  <div class="cat-item-in card-box-Featured-bg">
                     <a href="{{ route('product/details', $product->id) }}" class="cat-img-ng">
                     <img src="{{ asset('upload/products/' . $product->image) }}" alt="" width="150"
                        height="150">
                     </a>
                     <div class="cardbox-text">
                        <div class="prc">
                           <span class="nd">
                           {{ $product->selling_price }}
                           </span>
                           <span class="line">&#8358&nbsp;{{ $product->original_price }}</span>
                           <a href="#" class="float-right"> <span>
                           {{ $product->name }}
                           </span></a>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
      <section class="Brand-Festival-scetion" style="margin-top: 20px;">
         <div class="srcn-container ">
            <div class="card-box-heading">
               <h2 class="card-heding">Electronic Deals </h2>
            </div>
            <div class="card-container">
               @foreach ($products as $product)
               <div class=" card-box-bg">
                  <div class="cat-item-in card-box-Featured-bg">
                     <a href="" class="cat-img-ng">
                     <img src="{{ asset('upload/products/' . $product->image) }}" alt="" width="150"
                        height="150">
                     </a>
                     <div class="bdg_dsct_btn">
                        <span>
                        {{ $product->name }}
                        </span>
                     </div>
                     <div class="cardbox-text">
                        <div class="prc">
                           <span class="nd">
                           {{ $product->selling_price }}
                           </span>
                           <span class="line">₦ {{ $product->original_price }}</span>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
      <section class="Products-section">
         <div class="srcn-container ">
            <div class="Featured-bg-card">
               <div class="d-row ">
                  <div class="card-box-generater">
                     <div class="cat-item-generater">
                        <a href="" class="cat-img-ge-gn">
                        <img class="card-img-fluid" src="{{ asset('images/slider.gif') }}" alt="">
                        </a>
                        <h5 class="card-text">Men's dresses</h5>
                     </div>
                  </div>
                  <div class="card-box-generater">
                     <div class="cat-item-generater">
                        <a href="" class="cat-img-ng">
                        <img src="{{ asset('upload/products/' . $product->image) }}" alt="" width="150"
                           height="150">
                        </a>
                        <h5 class="card-text">phones-tablets</h5>
                     </div>
                  </div>
                  <div class="card-box-generater">
                     <div class="cat-item-generater">
                        <a href="" class="cat-img-ng">
                        <img src="{{ asset('upload/products/' . $product->image) }}" alt="" width="150"
                           height="150">
                        </a>
                        <h5 class="card-text">televisions</h5>
                     </div>
                  </div>
                  <div class="card-box-generater">
                     <div class="cat-item-generater">
                        <a href="" class="cat-img-ge-gn">
                        <img class="card-img-fluid" src="{{ asset('images/generic.jpg') }}" alt="">
                        </a>
                        <h5 class="card-text">Computing Deals</h5>
                     </div>
                  </div>
                  <div class="card-box-generater">
                     <div class="cat-item-generater">
                        <a href="" class="cat-img-ge-gn">
                        <img class="card-img-fluid" src="{{ asset('images/store.png') }}" alt="">
                        </a>
                        <h5 class="card-text">#5,000 Store</h5>
                     </div>
                  </div>
                  <div class="card-box-generater">
                     <div class="cat-item-generater ">
                        <a href="" class="cat-img-ge-gn">
                        <img class="card-img-fluid" src="{{ asset('images/cat-6.jpg') }}" alt="">
                        </a>
                        <h5 class="card-text">Shoes</h5>
                     </div>
                  </div>
                  <div class="card-box-generater">
                     <div class="cat-item-generater">
                        <a href="" class="cat-img-ge-gn">
                        <img class="card-img-fluid" src="{{ asset('images/refrigerators.png') }}" alt="">
                        </a>
                        <h5 class="card-text">Refrigerators</h5>
                     </div>
                  </div>
                  <div class="card-box-generater">
                     <div class="cat-item-generater">
                        <a href="" class="cat-img-ge-gn">
                        <img class="card-img-fluid" src="{{ asset('images/earphones.png') }}" alt="">
                        </a>
                        <h5 class="card-text">Mobile Accessories</h5>
                     </div>
                  </div>
                  <div class="card-box-generater">
                     <div class="cat-item-generater">
                        <a href="" class="cat-img-ge-gn">
                        <img class="card-img-fluid" src="{{ asset('images/fashion.png') }}" alt="">
                        </a>
                        <h5 class="card-text">Men's Sneakers
                        </h5>
                     </div>
                  </div>
                  <div class="card-box-generater">
                     <div class="cat-item-generater">
                        <a href="" class="cat-img-ge-gn">
                        <img class="card-img-fluid" src="{{ asset('images/generator.gif') }}" alt="">
                        </a>
                        <h5 class="card-text">Generator</h5>
                     </div>
                  </div>
                  <div class="card-box-generater">
                     <div class="cat-item-generater">
                        <a href="" class="cat-img-ge-gn">
                        <img class="card-img-fluid" src="{{ asset('images/watches.png') }}" alt="">
                        </a>
                        <h5 class="card-text">watches</h5>
                     </div>
                  </div>
                  <div class="card-box-generater">
                     <div class="cat-item-generater ">
                        <a href="" class="cat-img-ge-gn">
                        <img class="card-img-fluid" src="{{ asset('images/Clearance.gif') }}" alt="">
                        </a>
                        <h5 class="card-text">Clearance</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>


      <section class="Brand-Festival-scetion">
         <div class="srcn-container">
            <div class="card-box-heading">
               <h2 class="card-heding">Categories</h2>
            </div>
            <div class="card-container">
               @foreach ($categories as $category)
               <div class=" card-box-bg">
                  <div class="cat-item-in card-box-Featured-bg">
                     <a href="" class="cat-img-ng">
                     <img class="card-img-fluid"
                        src="{{ asset('uploads/categoryimage/' . $category->category_image) }}"
                        height="150px" width="150px" alt="">
                     </a>
                     <div class="bdg_dsct_btn">
                        <span>
                        {{ $category->name }}
                        </span>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
      --}}
      <!-- Online Shopping Website -->
      {{--
      <section>
         <div class="srcn-container">
            <div class="Online-bg">
               <div class="online-website-text">
                  <h1><strong>goodwill Online store – The Biggest Online Shopping Website</strong></h1>
                  <h2><strong>Shop for Everything You Need on goodwill Online store</strong></h2>
                  <p>goodwill Nigeria is the largest online shopping website in Nigeria. We offer a platform where
                     customers in any part of Nigeria can find and shop for all they need in one online store and
                     that platform is the goodwill shopping website. On the goodwill mobile app or website, you
                     can shop from the comfort of your home or during work breaks and get everything delivered
                     fast without you having to stress or move an inch. Be it
                     <a href="#">
                     <strong>fashion</strong></a>, <a href="#"><strong>electronics</strong>
                     </a>, <a href="#"><strong>mobile phones</strong></a>,
                     <a href="#"><strong>computers</strong></a>, or your everyday
                     <a href="#"><strong>groceries</strong>
                     </a> you can get everything you need on goodwill online store.
                  </p>
                  <p>Have you used thegoodwill online store today? Shop now ongoodwill to enjoy a seamless online
                     shopping experience. With fast delivery, free returns, and flexible payment options,
                     you are certain to enjoy the convenience of shopping online.
                  </p>
               </div>
            </div>
         </div>
      </section>
      --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>
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
      <script>
         document.addEventListener("DOMContentLoaded", function() {

             var cards = document.querySelectorAll(".card-box-bg");


             cards.forEach(function(card) {
                 card.addEventListener("click", function() {

                     card.style.backgroundColor = "lightblue";
                 });
             });
         });
      </script>
      {{-- @include('user.include.footer') --}}
   </body>
</html>