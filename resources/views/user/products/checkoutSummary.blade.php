<!DOCTYPE html>
<html lang="en">

<head>
    <title>GoodWills</title>
    @include('user.include.headerlink')
</head>

<body>
<main>
        @include('user.include.header')
        <section class="form-ADDRESS-in" style="margin-top: 20px;">
            <div class="srcn-container">
                <div class="row row-container ">
                    <!-- @if (Session::has('message'))
                        <div class="alert alert-success">
                            <span>{{ Session::get('message') }}</span>
                        </div>
                    @endif -->
                    <div class="col-md-8">
                        <div class="d-row  -gcol">
                            <article class="g-phvs- img-c card g-bottom-margin ">
                                <header class="card-heading-lR d-row g-col g-conter-items g-phs border-bouttom-h">
                                    <div class="d-row  gap-r g-conter-items gap-hw">
                                        <span class="icon-img">
                                            <img src="{{ asset('/user/assets/images/check.png') }}" alt="" class="" style="width: 15px;">
                                        </span>
                                        <h6>CUSTOMER ADDRESS</h6>
                                    </div>
                                    <a href="{{ route('checkout/address') }}" class="right-text g-conter-items ">

                                        Change
                                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                                    </a>
                                </header>
                                <div class="d-row -gcol padding-p " style="margin-bottom: 10px;">
                                    <span>  {{ $address->userAddress->name }}</span>
                                    
                                    <div class="d-row ">
                                      
                                        <address class="-fs12  -pts">
                                            {{ $address->user->email }}&nbsp;
                                             |
                                      
                                            {{ $address->userAddress->mobile }}&nbsp;
                                             |
                                            {{ $address->userAddress->optional_mobile }}&nbsp;
                                        </address>
                                    </div>

                                </div>

                            </article>
                            <article class="g-phvs- img-c card g-bottom-margin ">
                                <header class="card-heading-lR d-row g-col g-conter-items g-phs border-bouttom-h">
                                    <div class="d-row  gap-r g-conter-items gap-hw ">
                                        <span class="icon-img">
                                            <img src="{{ asset('/user/assets/images/check.png') }}" alt="" class="" style="width: 15px;">
                                        </span>
                                        <h6>DELIVERY DETAILS</h6>
                                    </div>
                                    <a href="{{ route('checkout/address') }}" class="right-text g-conter-items">

                                        Change
                                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                                    </a>
                                </header>
                                <div class="d-row g-col -g-ctr g-phs g-bt " style="margin-bottom: 10px;">
                                    <div class="d-row -gcol  ">

                                        <span class="bdg-b">Shipping Address</span>

                                    </div>
                                    <span>
                                        <img src="img/cargo-truck.png" alt="" class="">
                                    </span>
                                </div>
                                <div class="d-row card-pam  g-phvs-" style="margin: 0 0px 10px 0px ;">
                                    <div class="d-row -gcol">
                                        <span
                                            class="bdg_free ">{{ $address->userAddress->flat_no_building_name }}</span>
                                        <p class="bdg-b">{{ $address->userAddress->area_or_street }} </p>
                                        <p class="bdg-b">{{ $address->userAddress->land_mark }} </p>
                                        <p class="bdg-b">{{ $address->userAddress->city }} </p>
                                        <p class="bdg-b">{{ $address->userAddress->state }} </p>
                                        <p class="bdg-b">{{ $address->userAddress->pincode }} </p>
                                        <p class="bdg-b">Delivery between <em>03 November</em> and <em>07
                                                November</em></p>
                                    </div>
                                    <a href="{{ route('checkout/address') }}" class="right-text d-row -g-ctr -mla"
                                        style="gap: 4px;">

                                        Change
                                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <article class="g-phvs- img-c card g-bottom-margin ">
                            <form action="{{ route('confirm/order') }}" method="POST">
                                @csrf
                                <header class="card-heading-lR d-row g-col -g-ctr g-phs">
                                    <div class="d-row -g-ctr gap-r ">
                                        <span class="icon-img">
                                            <img src="{{ asset('/user/assets/images/check.png') }}" alt="" class="" style="width: 15px;">
                                        </span>
                                        <h6>PAYMENT METHOD</h6>
                                    </div>
                                    <a href="#" class="right-text">

                                        Change
                                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                                    </a>
                                </header>
                                <div class="d-row g-col -g-ctr g-phs g-bt " style="margin-bottom: 10px;">
                                    <div class="d-row -gcol  ">
                                        <h5 class="mb-4">Payment</h5>

                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="cod"
                                                name="payment_mode" name="payment-method" value="cash on delivery"
                                                required>
                                            <label for="cod" class="form-check-label">Cash on Delivery</label>
                                        </div>
                                    </div>
                                </div>
                        </article>
                        <article class="card g-bottom-margin">
                            <h4 class="order-pas">Order summary</h4>
                            <div class="bb_card_in-text g-bt g-phs">
                                <p class="d-row g-col">
                                    Item's total ({{ $totalItem }})
                                    
                                    <span class="prc-tar">₦ {{ $totalValue }}</span>
                                </p>
                            </div>
                            <div class="bb_card_in-text g-bt g-phs">
                                <p class="d-row g-col">
                                    Delivery fee
                                    <span class="prc-tar">₦ 0</span>
                                </p>
                            </div>
                            <div class="d-row g-col g-bt g-phs">
                                <p class=" -ow-a">Total</p>
                                <p class="-plm-tar">₦ {{ $totalValue }}</p>
                            </div>

                            <footer class="g-ft- d-row -gcol g-phvs- ">
                                <button class="btn-g" type="submit">Confirm order</button>
                            </footer>
                            </form>
                        </article>
                        <div class="card card-right-wwbdgv">
                            <p class="card_accepting">By proceeding, you are automatically accepting the&nbsp;<a
                                    class="_more" href="#" target="_blank" rel="noopener">Terms
                                    &amp;Conditions</a></p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
</body>

</html>
