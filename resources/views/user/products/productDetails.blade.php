<!DOCTYPE html>
<html lang="en">
   <head>
      @include('user.include.headerlink')
      <title>Product Details</title>
   </head>
   <body class="body">
      @include('user.include.header')
      <main class="prodact-bnner">
            <section class="prodact-section" style="margin-top: 20px;">
         <div class="srcn-container">
            <div class="row">
               <div class="col-md-8">
                  <section class="  product_lift_bg card">
                     <div class="row card_no-g -fg1 -pas">
                        <div class="col-md-6">
                           <div>
                              <div class="product_cra">
                                 <div class="srcn-container_mg">
                                    <div style="
                                       --swiper-navigation-color: #000;
                                       --swiper-pagination-color: #000;
                                       " class="swiper mySwiper2">

                                       <div class="swiper-wrapper">
                                        @if($product->productImage)
                                          @foreach($product->productImage as $images)
                                          <div class="swiper-slide phone-swiper-slide">
                                             <img src="{{ asset('upload/products/'. $images->images) }}" />
                                          </div>
                                          @endforeach
                                        @endif
                                       </div>

                                       <div class="swiper-button-next"></div>
                                       <div class="swiper-button-prev"></div>
                                    </div>
                                    <div thumbsSlider="" class="swiper mySwiper">
                                       <div class="swiper-wrapper">
                                        @if($product->productImage)
                                          @foreach($product->productImage as $images)

                                          <div class="swiper-slide phone-swiper-slide">
                                             <img src="{{ asset('upload/products/' . $images->images) }}" />
                                          </div>

                                          @endforeach
                                        @endif

                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <section class="product-share">
                              <header class="heading-h-if">
                                 <h2>Share this product</h2>
                              </header>
                              <div class="pvs-product">
                                 <button class="btn-product" type="button">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>

                                 </button>
                                 <button class="btn-product" type="button">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>

                                 </button>
                              </div>
                           </section>
                        </div>
                        <div class="col-md-6">
                           <div class="pvs-hd d-row " style="padding-top:10px ;">
                              <div class="product-hs">
                                 <div class="d-row offic-ng">
                                    <a href="#" class=" bdg _mall _xs"><span>Official Store</span></a>
                                    <a href="#" class="bbdg _mall _xs btn_bg
                                       ">
                                       <span> Official Store</span>
                                    </a>
                                 </div>
                                 <h2 class="heading-h2-text fa_heading ">{{ $product->brand }} {{ $product->name }} {{ $product->productWear->colorName }}</h2>
                              </div>
                              <form class="img_right">
                                 <button class="heart_img" type="button">
                                   <span class="fa fa-heart-o" aria-hidden="true"></span>
                                 </button>
                              </form>
                           </div>
                           <div class="pvs-hd">
                              <div class="similein-">
                                 Brand:
                                 <a class="_more" href="#">{{ $product->brand }}</a>
                                 |
                                 <a class="_more" href="#">Similar products from {{ $product->brand }}</a>
                              </div>
                              <div class="prodPrice_box g-bottom-margin border-bouttom-h">
                                 <div class="s-prcw d-row g-conter-items">
                                    <span class="pvs-ng_jd prc">₦ {{ $product->productWear->selling_price }}</span>
                                    &nbsp;&nbsp;
                                       <span class="tel_nh_fi old">₦ {{ $product->productWear->original_price }}</span>


                                 </div>
                              </div>
                              <p class="name">Few units left</p>
                              <div class="name _more">+ shipping from <em>₦ 250</em> to LEKKI-AJAH (SANGOTEDO)
                              </div>
                              <div class="stars _m _al d-row offic-ng border-bouttom-h">
                                 <div class="stars-img g-bottom-margin">
                                    0 out of 5
                                 </div>
                                 <a class="plsx_ng" href="#">(No verified ratings)</a>
                              </div>
                           </div>
                           <div class="-phxs border-bouttom-h">
                              <div class="var-pahgd padding-pb d-row">
                                 <span class="variation_imn">Variation available</span>
                              </div>

                              <div class="add-to-cart d-row">
                                 <form action="{{ route('add_to_cart', $product->id) }}" method="POST">
                                    @csrf
                                    <button class="add-btn text-center  g-conter-items  offic-ng _prim -pea d-row" type="submit">
                                      <span class="fa fa-cart-plus" aria-hidden="true"></span>
                                      Add to cart
                                    </button>
                                 </form>

                              </div>
                              <!-- <div id="btn-in" style="display: none;">
                                 <button id="decreaseButton" class="btn_add"><i class="fa fa-minus"
                                       aria-hidden="true"></i>
                                 </button>
                                 <span id="counter" class="counter_btn" style="padding: 0 24px;
                              ">0</span>
                                 <button id="increaseButton" class="btn_add"><i class="fa fa-plus"
                                       aria-hidden="true"></i>
                                 </button>
                              </div> -->
                           </div>
                           <section class="ALSO  -phxs">
                              <div class=" also-page-in">
                                 <header class="d-row  g-conter-items g-col border-bouttom-h">

                                        <h5 class="prodact-heading-text">YOU CAN ALSO BUY:</h5>


                                    <button type="button" class="_more" data-bs-toggle="modal"
                                       data-bs-target="#exampleModal" data-bs-whatever="@fat">Details</button>

                                 </header>
                              </div>
                              <div class="modal fade" id="exampleModal" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h2 class="modal-title" id="exampleModalLabel">Details</h2>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body">
                                          <div class="content">
                                             AXA Mansard device insurance covers accidental damages to the screen or
                                             damage to the device as a result of liquid impact.This Insurance is valid
                                             for a period of one (1) year and covers a one-off claim for one&nbsp;screen
                                             damage and one liquid damage.
                                             <br>
                                             <br>
                                          </div>
                                          <div class="logo-img0-ng">
                                             <img src="logo-axamansard.png" class="logo-ing-in">
                                          </div>
                                          <ol>
                                             <li>Insurance against screen (100% coverage of the repair cost) and liquid
                                                damage (100% coverage of the repair cost)</li>
                                             <li>Service is provided by AXA Mansard Insurance</li>
                                             <li>Limited to repair/replacement of 1 screen AND 1 liquid damage within
                                                365
                                                days from the purchase date </li>
                                             <li>Maximum of 2 claims for the year.</li>
                                             <li>
                                                <b class="highlight">MUST BE PURCHASED WITH A RECOMMENDED DEVICE</b>
                                             </li>
                                          </ol>
                                       </div>
                                    </div>

                                 </div>
                              </div>
                           </section>
                        </div>
                        <div class="col-md-12  noopener-ng d-row">
                           <a class="_more" href="#" rel="noopener nofollow" target="_blank">Report incorrect product
                              information</a>
                        </div>
                     </div>
                  </section>
                  <section class="card  -de product_lift_bg crad product_lift_bg-ng " style="margin: 15px 0;">
                     <div id="specifications" class="hook"></div>
                     <header class=" d-row">
                                                    <h5 class="prodact-heading-text">Specifications</h5>
                                                </header>

                     <div class=" d-row  flex-wra g-col">
                           <article class="  col8 pas-card">
                              <div class="card-b border-  g-top-margin ">
                              <header class="border-bouttom-h d-row g-padding-ptlr">
                                                    <h5 class="">Key Features</h5>
                                                </header>

                                 <div class="markup -pam g-padding-ptlr">
                                    <ul class="pvs-Details-page d-row -gcol summary-text">
                                       <li class="-pvxs-in padding-pb name">500nits 6.6” HD+ Waterdrop Sunlight Display</li>
                                       <li class="-pvxs-in padding-pb name">Mega&nbsp;6000mAh Battery + Power Marathon</li>
                                       <li class="-pvxs-in padding-pb name">Fingerprint &amp; Face Unlock&nbsp;</li>
                                       <li class="-pvxs-in padding-pb name">13MP Dual Rear Camera &amp; Dual Flash</li>
                                       <li class="-pvxs-in padding-pb name">DTS Audio Processing+ Beez 2.0</li>
                                       <li class="-pvxs-in padding-pb name">Antibacterial Material</li>
                                    </ul>
                                 </div>
                              </div>
                           </article>
                           <article class="  col8 pas-card">
                              <div class="card-b border-  g-top-margin ">
                              <header class="border-bouttom-h d-row g-padding-ptlr">
                                                    <h5 class="prodact-heading-text">Specifications</h5>
                                                </header>


                             <div class="g-padding-ptlr"> </b>
                             <ul class="pvs-Details-page d-row -gcol summary-text ">
                                    <li class="-pvxs-in padding-pb name"><span class="c"> <b>SKU </b></span>: IN717MP4380ZWNAFAMZ</li>
                                    <li class="-pvxs-in padding-pb name"><span class="-b"> <b>Product Line </b></span>: Infinixmobility</li>
                                    <li class="-pvxs-in padding-pb name"><span class="-b"> <b>Model </b></span>: X6517</li>
                                    <li class="-pvxs-in padding-pb name"><span class="-b"> <b>Production Country </b></span>: China</li>
                                    <li class="-pvxs-in padding-pb name"><span class="-b"> <b>Size (L x W x H cm) </b></span>:
                                       164.20x75.63x8.37mm
                                    </li>
                                    <li class="-pvxs-in padding-pb name"><span class="-b"> <b>Weight (kg) </b></span>: 2.07</li>
                                    <li class="-pvxs-in padding-pb name"><span class="-b"> <b>Color </b></span>: Black</li>
                                    <li class="-pvxs-in padding-pb name"><span class="-b"> <b>Main Material </b></span>: Glass</li>
                                    <li class="-pvxs-in padding-pb name"><span class="-b"> <b>From the Manufacturer </b></span>: Dispose
                                       properly.&amp;nbsp;</li>
                                    <li class="-pvxs-in padding-pb name"><span class="-b"> <b>Care Label </b></span>: Dispose properly.</li>
                                    <li class="-pvxs-in padding-pb name"><span class="-b"> <b>Shop Type </b></span>: Jumia Mall</li>
                                 </ul>
                             </div>
                              </div>
                           </article>
               </div>
      </section>
      <div class="card  -de product_lift_bg crad product_lift_bg-ng " style="margin: 15px 0;">
         <section class="">
         <header class="border-bouttom-h d-row">
                                                    <h5 class="prodact-heading-text">SCustomers who viewed this also viewed</h5>
                                                </header>

            <div>
               <div class="d-row">
                  <div class="swiper cardSlider">
                     <div class="swiper-wrapper">
                        @foreach($combineData['allProduct'] as $product)
                        <div class="swiper-slide phone-swiper-slide  card-siwper-slider">
                           <div class="card crad-box-silder-in padding-0 h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="{{ route('product/details', $product->id) }}">
                                    <img src="{{ asset('upload/products/' . $product->productWear->image) }}" alt="" class="img_slider">
                                    <div class="g-padding-ptlr d-row    -gcol g-conter-items my_account  summary-text">
                                    <div class="name my_account">
                                       {{ $product->name }} {{ $product->productWear->colorName }}
                                    </div>
                                    <div class="g-prc-w d-row g-conter-items gap-hw ">
                                                 <div  class="d-row  g-conter-items">
                                                    <span class="prc">₦ {{ $product->productWear->selling_price }}</span> &nbsp;&nbsp;
                                                     <span class="old"> ₦ {{ $product->productWear->original_price }}</span>
                                                 </div>

                                                <!-- <div class="bdg _dsct _sm d-row">30%</div> -->
                                            </div>
                                    </div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        @endforeach
                     </div>

                     <div class="swiper-button-next"></div>
                     <div class="swiper-button-prev"></div>
                  </div>
               </div>
         </section>
      </div>
      </div>
      <div class="col-md-4  ">
         <section class="card ">

            <header class="border-bouttom-h d-row">
                <h5 class="prodact-heading-text">Delivery &amp; Returns</h5>
          </header>


            <div class="-df card-df-ng">
               <article class="pas-card-if -df-in">
                  <div class="-gcol d-row summary-text gap-hw ">
                     <h3 class="card-fw">
                        <img src="{{ asset('/user/assets/images/exp.png') }}" alt="">
                     </h3>
                     <p class="name d-row summary-text -gcol">
                        Free delivery on thousands of products in Lagos, Ibadan &amp; Abuja&nbsp;
                        <a class="a _more" id="Details-def" rel="def" role="shopExpress">Details</a>
                     </p>
                  </div>
               </article>
            </div>
            <div class="-df card-df-ng -pth">
               <article class="-pvxs-df _bet" style="padding: 8px 0;">
               <header class="border-bouttom-h d-row g-bottom-margin">
                <h5 class="prodact-heading-text"> Choose your location</h5>
          </header>

                  <div class="my_account padding-0 gap-hw d-row ">
                     <div class="padding-pb g-db-margin  d-row g-width">
                        <select required="" class="g-padding-ptlr border- g-width" id="fi-regionId" name="regionId" aria-label="Region">
                           <option value="">Please select</option>
                           <option value="1">Abia</option>
                           <option value="2">Adamawa</option>
                           <option value="3">Akwa Ibom</option>
                           <option value="4">Anambra</option>
                           <option value="5">Bauchi</option>
                        </select>
                     </div>
                     <div class="padding-pb g-db-margin  d-row g-width">
                        <select required="" class="g-padding-ptlr border- g-width" id="fi-cityId" name="cityId" aria-label="City">
                           <option value="">Please select</option>
                           <option value="1329">Abule Egba (Agbado Ijaye Road)</option>
                           <option value="1811">Abule Egba (Ajasa Command Rd)</option>
                           <option value="1336">Abule Egba (Ajegunle)</option>
                           <option value="1324">Abule Egba (Alagbado)</option>

                        </select>
                     </div>
                  </div>


                  <section class="delivery-box pr-" data-delivery-info="true">
                     <div data-delivery-info="true" class="d-row -gcol " style="gap: 5px;">
                        <article class="-pvxs-df _bet delivery-ng-d d-row">
                           <img src="{{ asset('/user/assets/images/delivery.png') }}" alt="" class="icon-img ">
                           <div class="-df card-delivery-box d-row -gcol">
                              <div class=" gap-hw   d-row g-conter-items ">
                                 <h4 class="card-fs4-df">Door Delivery</h4>
                                 <button type="button" class="a _more  mla -me-start" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal1" data-bs-whatever="@mdo">Details</button>

                              </div>
                              <div>
                                 <div class="markup -ptxs">Delivery Fees <em>₦ 620</em></div>
                                 <div class="markup -ptxs card-pr-if">Ready for delivery between <em>04
                                       October</em>
                                    &amp;
                                    <em>05 October</em> when you order within next <em>1hrs 16mins</em>
                                 </div>
                              </div>
                           </div>
                        </article>

                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                           aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delivery Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                       aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                    <h3> Door Delivery </h3>
                                    <p>Delivery time starts from the day you place your order to the day one of
                                       our associates makes a first attempt to deliver to you. Delivery will be
                                       attempted 2 times over 5 days (7.00 am to 5.30 pm) after which the item
                                       will be cancelled, if you are unreachable or unable to receive the
                                       order.</p>
                                    <h3>Delivery Fee Details</h3>

                                 </div>
                                 <div class="d-row also-row ">
                                    <span>Total Delivery Amount</span>
                                    <span>₦ 620</span>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <article class="-pvxs-df _bet delivery-ng-d d-row ">
                           <img src="{{ asset('/user/assets/images/delivery.png') }}" alt="" class="icon-img ">
                           <div class="-df card-delivery-box d-row -gcol">
                              <div class="-df card-fw d-row also-row ">
                                 <h4 class="card-fs4-df">Door Delivery</h4>

                                 <button type="button" class="a _more  mla -me-start" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal2" data-bs-whatever="@getbootstrap">Details</button>
                              </div>
                              <div>
                                 <div class="markup -ptxs">Delivery Fees <em>₦ 620</em></div>
                                 <div class="markup -ptxs card-pr-if">Ready for delivery between <em>04
                                       October</em>
                                    &amp;
                                    <em>05 October</em> when you order within next <em>1hrs 16mins</em>
                                 </div>
                              </div>
                           </div>
                        </article>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                           aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delivery Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                       aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                    <h3> PICKUP STATION </h3>
                                    <p>Delivery time starts from the day you place your order to the day your
                                       order arrives at the pickup station. You will be notified of your
                                       order's arrival, and you have to retrieve it within 5 days. If the order
                                       is not picked up, it will be automatically cancelled..</p>
                                    <h3>DELIVERY FEE DETAILS</h3>

                                 </div>
                                 <div class="d-row also-row ">
                                    <span>Total Delivery Amount</span>
                                    <span>₦ 250</span>
                                 </div>

                              </div>
                           </div>
                        </div>


                     </div>
                  </section>
               </article>
               <article class="-pvxs-df _bet delivery-ng-d d-row" style="padding: 8px 0;">
                  <img src="{{ asset('/user/assets/images/delivery.png') }}" alt="" class="icon-img ">
                  <div class="-df card-delivery-box d-row -gcol">
                     <div class="-df card-fw d-row   -gcol">
                        <h4 class="card-fs4-df">Return Policy</h4>
                        <p class="card-pr-if">
                           Free return within 15 days for Official Store items and 7 days for other eligible
                           items. <button type="button" class="a _more  mla -me-start" data-bs-toggle="modal"
                              data-bs-target="#exampleModal3" data-bs-whatever="@getbootstrap">Details</button>

                        </p>


                     </div>
                  </div>
               </article>

               <article class="-pvxs-df _bet delivery-ng-d d-row">
                  <img src="{{ asset('/user/assets/images/delivery.png') }}" alt="" class="icon-img ">
                  <div class="-df card-delivery-box d-row -gcol">
                     <div class="-df card-fw d-row   -gcol">
                        <h4 class="card-fs4-df">Warranty</h4>
                        <p class="card-pr-if">
                           Mobile Phone
                        </p>


                     </div>
                  </div>
               </article>
            </div>
         </section>
         <div class="-pts card" style="margin: 10px 0;">
            <section class="  -pth">
               <a class="g-conter-items also-row d-row border-bouttom-h g-col" href="#">
               <header class=" d-row">
                <h5 class="">Seller Information</h5>
          </header>
                  <span class=" fa fa-angle-right " aria-hidden="true"></span>
               </a>
               <div class="card-pas -hr  d-row -gcol " style="gap: 10px;">
                  <p>Bafur Store</p>
                  <div class=" d-row also-row card-psf g-conter-items  border-bouttom-h g-col">
                     <div class="d-row -gcol">
                        <p class="name" style="margin: 0;"><bdo dir="ltr" class="-m -prxs" >74%</bdo>Seller Score</p>
                        <p class="name"  data-followers="true" style="margin: 0;"><span class="-m" s>12716 </span><span>Followers</span></p>
                     </div>
                     <button class="btn-g btn_prim" data-follow="Follow" data-unfollow="Following" style="width: 100px; height:40px;">Follow</button>
                  </div>
               </div>
            </section>
            <div class="-pth">
               <h2 class="card-fs4-df d-row gap-hw g-conter-items -df-ing-conter">
                  Seller Performance
                  <button type="button" class="ing-img_in" data-bs-toggle="modal" data-bs-target="#exampleModal4"
                     data-bs-whatever="@getbootstrap">
                     <img src="{{ asset('/user/assets/images/info.png') }}" alt="" class="img-box-ng">
                  </button>

               </h2>
               <div class="d-row -df-ing-conter -pts-in gap-hw g-conter-items">
                  <span>
                        <img src="{{ asset('/user/assets/images/star.png') }}" alt="">
                  </span>
                  <p class="name" style="margin: 0;">Order Fulfillment Rate: Good</p>
               </div>
               <div class="d-row -df-ing-conter -pts-in gap-hw g-conter-items">
                  <span>
                        <img src="{{ asset('/user/assets/images/check.png') }}" alt="">
                  </span>
                  <p class="name" style="margin: 0;">Quality Score: Average</p>
               </div>
               <div class="d-row -df-ing-conter -pts-in gap-hw g-conter-items">
                  <span>
                        <img src="{{ asset('/user/assets/images/star.png') }}" alt="">
                  </span>
                  <p class="name" style="margin: 0;">Customer Rating: Good</p>
               </div>
            </div>

         </div>
         <div class=" card">
            <div class="__ps-to-header -ptm ">
               <nav class="s-menu _sep d-row  -gcol">
                  <a data-visible="true" href="#" class="d-row -df-ing-conter -pth s-menu-list active">
                     <i class="fa fa-file-text-o" aria-hidden="true"></i>
                     Product details
                  </a>
                  <a href="#" class="d-row -df-ing-conter -pth s-menu-list" data-visible="true">
                     <i class="fa fa-bars" aria-hidden="true"></i>
                     Specifications
                  </a>
                  <a href="#" class="d-row -df-ing-conter -pth s-menu-list" data-visible="true">
                     <i class="fa fa-commenting" aria-hidden="true"></i>
                     Verified Customer Feedback
                  </a>
               </nav>
            </div>
         </div>
      </div>
      </div>
      <div class="card  -de product_lift_bg crad product_lift_bg-ng col-md-12 " style="margin: 15px 0;">
         <section class="">
            <header class="d-row Details-page heading-h-if">
               <h2>Customers who viewed this also viewed</h2>
            </header>
            <div>
               <div class="d-row">
                  <div class="swiper cardSlider">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide phone-swiper-slide  card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        <div class="swiper-slide phone-swiper-slide  card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        <div class="swiper-slide phone-swiper-slide  card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        <div class="swiper-slide phone-swiper-slide  card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        <div class="swiper-slide phone-swiper-slide  card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        <div class="swiper-slide phone-swiper-slide  card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        <div class="swiper-slide phone-swiper-slide card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        <div class="swiper-slide phone-swiper-slide card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        <div class="swiper-slide phone-swiper-slide card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        <div class="swiper-slide phone-swiper-slide card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        <div class="swiper-slide phone-swiper-slide card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                        <div class="swiper-slide phone-swiper-slide card-siwper-slider">
                           <div class="card crad-box-silder-in h-border d-row">
                              <article class=" card-boxsilder">
                                 <a class="card-in-if" href="#">
                                    <img src="1.jpg" alt="" class="img_slider">
                                    <div class="name">
                                       Infinix Smart 7 Plus 6.6" HD+ 3GB RAM/64GB ROM Android 12 - Black
                                    </div>
                                    <div class="prc">
                                       ₦ 73,400
                                    </div>
                                    <div class="bdg _dsct"></div>
                                 </a>
                              </article>
                           </div>
                        </div>
                     </div>

                     <div class="swiper-button-next"></div>
                     <div class="swiper-button-prev"></div>
                  </div>
               </div>

         </section>
      </div>

      </div>
      </section>
   </main>

      <script>
         var swiper = new Swiper(".mySwiper", {
             loop: true,
             spaceBetween: 10,
             slidesPerView: 4,
             freeMode: true,
             watchSlidesProgress: true,
         });

         var swiper2 = new Swiper(".mySwiper2", {
             loop: true,
             spaceBetween: 10,
             navigation: {
                 nextEl: ".swiper-button-next",
                 prevEl: ".swiper-button-prev",
             },
             thumbs: {
                 swiper: swiper,
             },
         });

         // <!-- Initialize Swiper -->

         var swiper = new Swiper(".cardSlider", {

             slidesPerView: 5,
             spaceBetween: 30,
             freeMode: true,
             loop: true,
             navigation: {
                 nextEl: ".swiper-button-next",
                 prevEl: ".swiper-button-prev",
             },
             loop: true,
             breakpoints: {
                 0: {
                     slidesPerView: 1,
                     spaceBetween: 0
                 },
                 576: {
                     slidesPerView: 2,
                     spaceBetween: 30,
                 },
                 767: {
                     slidesPerView: 3,
                     spaceBetween: 30,
                 },
                 992: {
                     slidesPerView: 4,
                     spaceBetween: 30,
                 },
             },
         });



         // add to crat
         const decreaseButton = document.getElementById('decreaseButton');
         const increaseButton = document.getElementById('increaseButton');
         const IDbox = document.getElementById('btn-in');
         const counterElement = document.getElementById('counter');
         const modalTop = document.getElementById('myModal');
         const updatecontent = document.getElementById('updatecontent');
         const closeButton = document.getElementById('closeBtncounter');
         const popupMessage = document.getElementById('popupMessage');
         const add = document.getElementById('add-to');
         let counter = 0;

         function closeModal() {
             modalTop.style.display = "none";
         }

         closeButton.addEventListener('click', closeModal)

         function setModel() {
             setTimeout(() => {
                 modalTop.style.display = "none";
             }, 10000);
         }

         add.addEventListener('click', () => {
             counter = 1;
             counterElement.innerHTML = counter;
             IDbox.style.display = 'block';
             add.style.display = "none";
             modalTop.style.display = "block";
             updatecontent.innerHTML = "Product added Succesfully";
             setModel();
         })



         decreaseButton.addEventListener('click', () => {
             counter--;
             counterElement.innerHTML = counter;

             if (counter === 0) {
                 decreaseButton.disabled = true;
                 increaseButton.disabled = false;
                 add.style.display = "block";
                 IDbox.style.display = 'none';
             } else {
                 decreaseButton.disabled = false;
                 increaseButton.disabled = false;
             }
             modalTop.style.display = "block";
             updatecontent.innerHTML = `Product ${counter} Items has been updated Succesfully`;
             setModel();
         });

         increaseButton.addEventListener('click', () => {
             counter++;
             counterElement.innerHTML = counter;

             if (counter === 20) {
                 increaseButton.disabled = true;
                 decreaseButton.disabled = false;
             } else {
                 increaseButton.disabled = false;
                 decreaseButton.disabled = false;
             }
             modalTop.style.display = "block";
             updatecontent.innerHTML = `Product ${counter} Items has been added Succesfully`;
             setModel();
         });

         document.addEventListener('DOMContentLoaded', function() {
             var menuItems = document.querySelectorAll('.s-menu-list');

             menuItems.forEach(function(menuItem) {
                 menuItem.addEventListener('click', function() {

                     menuItems.forEach(function(item) {
                         item.classList.remove('active');
                     });

                     menuItem.classList.add('active');
                 });
             });
         });
      </script>
      @include('user.include.footer')
   </body>
</html>