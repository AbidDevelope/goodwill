<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add to Cart</title>
    @include('user.include.headerlink') 
</head>

<body>
    @include('user.include.header')
    <main class="cart0section-page" style="margin-top: 20px;">
        <section class="section-add- cart-show">
            <div class="srcn-container">
                <div class="row">
                    <!-- @if (Session::has('message'))
                        <div class="alert alert-success">
                            <span>{{ Session::get('message') }}</span>
                        </div>
                    @endif -->
                    @if (Session('cart'))
                   
                          
                                        <div class="col-md-8   ">
                                            <article class="card card-box-in padding-B" style="margin-bottom: 18px;">
                                                <header class="border-bouttom-h d-row">
                                                    <h5 class="">Cart ({{ $cartItem }})</h5>
                                                </header>
                                                <?php
                                                $total = 0;
                                                ?>
                                                @if (Session('cart'))
                                                    @foreach ($cart as $id => $item)
                                                        <article class="border-bouttom-h padding-B  g-bottom-margin ">
                                                            <a class="g-conter-items card-fi-ng d-row  g-width gap-hw padding-pb ">
                                                                <div class="img-box-widht-h">
                                                                    <img src="{{ asset('upload/products/'. $item['image']) }}"
                                                                        alt="" class="img-fluid" >
                                                                </div>
                                                                <div class="d-row g-col g-width flex-wra g-conter-items ">
                                                                <div class="main " style="margin-left: 10px;">

                                                                        <!-- <p>{{ $id }}</p> -->
                                                                        <p class="name d-row " style="margin: 0;">
                                                                            <span class="label">Product:</span>
                                                                            {{ $item['name'] }}
                                                                        </p>
                                                                        <p class="name" style="margin: 0;">In Stock</p>
                                                                        




                                                                        
                                                                        </div>
                                                                        <div class="sb d-row g-col -gcol text-C">
                                                                        <div class="s-prcw d-row g-conter-items ">
                                                                        <span class="prc">₦ &nbsp{{ $item['selling_price'] }}</span>&nbsp;&nbsp;
                                                                         <span class="old">₦ &nbsp{{ $item['original_price'] }}</span>
                                                                           
                                                                        </div>
                                                                        </div>
                                                                </div>
                                                            </a>
                                                            <footer class="bt d-row g-conter-items g-col"
                                                              >
                                                                <a href="{{ route('cart/removeItem', $id) }}"
                                                                    class="d-row  btn-g  g-conter-items g-top-margin btn-Cancel  add-btn-"
                                                                    type="button" style="    width: 95px; gap:10px;">
                                                                    <i class="fa fa-trash"></i>
                                                                    Remove
                                                                </a>
                                                               
                                                                <hr>
                                                                <div class="d-row  text-C gap">
                                                                    <!-- not live -->
                                                                    <form action="{{ route('items.decrement', $id) }}"
                                                                        method="post" class="inc-add">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn-in-jdgid">
                                                                            <span class="fa fa-minus" aria-hidden="true"></span>
                                                                        </button>

                                                                    </form>
                                                                    <!-- <span class="">0</span> -->
                                                                    <span
                                                                        id="quantity-{{ $id }}" class="quantity-cunter">{{ $cart[$id]['quantity'] }}</span>

                                                                    <form action="{{ route('items.increment', $id) }}"
                                                                        method="post" class="inc-add">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn-in-jdgid">
                                                                           <span class="fa fa-plus" aria-hidden="true"></span>
                                                                        </button>

                                                                    </form>

                                                                    <!-- not live -->
                                                                </div>
                                                        </article>

                                                     
                                                    @endforeach
                                                @endif
                                            </article>
                                        </div>
                                        <div class="col-md-4 " style="margin-bottom: 18px;">
                                            <div class="to_header ">
                                                <article class="card pt-n " style="margin-bottom: 20px;">
                                                <header class="border-bouttom-h d-row">
                                                    <h5 class="">CART SUMMARY</h5>
                                                </header>
                                                   
                                                    <div class="d-row -j-bet-in g-conter-items  g-col-s">
                                                        <p class="name">Price(Item*{{ $totalItem }})</p>&nbsp;
                                                        <p class="prc">₦ {{ $totalValue }}</p>
                                                    </div>
                                                    <div class="d-row -j-bet-in g-conter-items  g-col-s">
                                                        <p class="name">Subtotal</p>
                                                        <!-- <p class="-f20s-par-in">₦ 41,490</p> -->
                                                    </div>
                                                    <p class="name">Delivery fees not included yet.</p>
                                                    <div class="-btn-in ">
                                                        <button class=" btn-g" style="cursor: default; background-color: #6c757d;">
                                                        <a href="{{ route('checkout/address') }}"style="color: #fff;">
                                                            
                                                            Checkout (₦ {{ $totalValue }})
                                                        </a>
                                                        </button>
                                                    </div>
                                                </article>
                                                <div class="card -pas-in pt-n">
                                                    <h2 class="-nd-fs16">Returns are esay</h2>
                                                    <p class="name">Free return within 15 day Official Store itmes and 7 day form
                                                        other
                                                        eliginle itme
                                                        <button class=" _ti-more" type="button" data-bs-toggle="modal"
                                                            data-bs-whatever="@fat" data-bs-target="#exampleModal2">
                                                            <a href="#">Details</a>
                                                        </button>
                                                    </p>
                                                    <div class="modal fade" id="exampleModal2" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h2 class="modal-title" id="exampleModalLabel">
                                                                        Returns
                                                                        are easy
                                                                    </h2>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="content">
                                                                        To know more about our return and refund policy,
                                                                        please visit:
                                                                        https://www.goodwill.com.ng/sp-returns-refunds
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12"></div>
                              
                   
                    @else
                        <div class="col-md-12 col16 empty-product  g-bottom-margin">
                            <div class="empty-pts-nc card  empty-product-ndh">
                                <div class="empty-pts-conter">
                                    <img src="" class="img_product_icon" alt="">
                                    <header class="border-bouttom-h d-row">
                                                    <h5 class="">Your cart is empty!</h5>
                                                </header>
                                   
                                    <p class="pas-vsd">Browse our categories and discover our best deals!</p>
                                    <a href="{{ url('/') }}" class="Start-Shopping-btn">Start Shopping</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12 col16 empty-product">
                        <div class="order_list_product0-x card" pagetype="cart">
                            <div class="cart order_list_product-img show-w">
                                <div class="phs-w order-text row-d row-d-idn card-box-heading"
                                    style="background: transparent!important;">
                                    <header class="border-bouttom-h d-row  g-conter-items g-col padding-p">
                                    <h5 class="card-heding">Recently Viewed      
                                    </h5>
                                    <a href="#" class="right-bsu d-row  gap g-conter-items">
                                        See All
                                       <span class="fa fa-angle-right" aria-hidden="true"></span>
                                    </a>
                                                </header>
                                    
                                </div>
                            </div>
                            <div>
                            <div class="row  g-padding Categories-box-hd" >
                                <article class="card-width-in-col d-row -gcol     box-hover">
                                    <a href="" class="core">
                                        <div class="g-db-margin ">
                                            <img src="" alt="flash-sales" class="fleash-salex-im" height="200px">
                                        </div>
                                        <div class="info g-padding-ptlr">
                                            <div class="bdg _mall _xs">Official Store</div>
                                            <h3 class="name">
                                                -
                                                50ml (Pack Of 3)</h3>
                                            <div class="prc">₦ 469682 </div>
                                            <div class="g-prc-w d-row g-conter-items">
                                                <div class="old">₦ 37947 </div>
                                                <div class="bdg _dsct _sm d-row">30%</div>
                                            </div>
                                            
                                        </div>
                                    </a>
                                    <footer class="g-ft- d-row -gcol g-padding-ptlr ">
                                        <form action="" method="POST">
                                            
                                            <button class="btn-g" type="submit">Add To Cart</button>
                                        </form>
                                    </footer>
                                </article>
                                <article class="card-width-in-col d-row -gcol     box-hover">
                                    <a href="" class="core">
                                        <div class="g-db-margin ">
                                            <img src="" alt="flash-sales" class="fleash-salex-im" height="200px">
                                        </div>
                                        <div class="info g-padding-ptlr">
                                            <div class="bdg _mall _xs">Official Store</div>
                                            <h3 class="name">
                                                -
                                                50ml (Pack Of 3)</h3>
                                            <div class="prc">₦ 469682 </div>
                                            <div class="g-prc-w d-row g-conter-items">
                                                <div class="old">₦ 37947 </div>
                                                <div class="bdg _dsct _sm d-row">30%</div>
                                            </div>
                                            
                                        </div>
                                    </a>
                                    <footer class="g-ft- d-row -gcol g-padding-ptlr ">
                                        <form action="" method="POST">
                                            
                                            <button class="btn-g" type="submit">Add To Cart</button>
                                        </form>
                                    </footer>
                                </article>
                           
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
      
        <!-- include foooter -->
          @include('user.include.footer')
        <!-- include foooter -->
    </main>
    
    <!-- Add To Cart Script -->
</body>

</html>
