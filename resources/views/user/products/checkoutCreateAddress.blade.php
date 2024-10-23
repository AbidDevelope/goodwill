<!DOCTYPE html>
<html lang="en">

<head>
    <title>GoodWills</title>
    @include('user.include.headerlink')
   
</head>
<body>
    <main>
        @include('user.include.header')
        <section class="form-ADDRESS-in" style="padding-top: 10px;">
            <div class="srcn-container">
                <div class="row row-container ">

                    <div class=" col-md-8">
                        <div class="card" style="margin-bottom: 10px; padding: 10px;">
                            <header class="header_heading">
                                <h1 class="footer-herading-in">CUSTOMER ADDRESS</h1>
                            </header>
                            <div class="log_in_form hr ">
                                <div class="-fs12 -upp -gy7 -pbm -b -pam" style="margin-bottom: 5px;">Add new address
                                </div>
                                <article class="">
                                    <form action="{{ route('checkout/create/address') }}" method="post" id="login-form">
                                        @csrf
                                        <div class="sign_box_in d-row gap g-col">
                                            <div class="sign_box_col g-width">
                                                <div class="form-outline mb-3">
                                                    <input type="text" name="name" value=""
                                                        id="typeEmailX-2" class="form-control form-control-lg"
                                                        placeholder="Enter your Name" />
                                                    <label class="form-label" for="typeEmailX-2"> Name</label>
                                                </div>
                                                <div class="erro-mess">
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="sign_box_col g-width">
                                                <div class="form-outline mb-3">
                                                    <input type="text" name="city" id="typeEmailX-2"
                                                        class="form-control form-control-lg"
                                                        placeholder="Enter your city" />

                                                    <label class="form-label" for="typeEmailX-2">City</label>
                                                </div>
                                                <div class="erro-mess">
                                                    @if ($errors->has('city'))
                                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="sign_box_in d-row gap g-col">
                                            <div class="sign_box_col g-width">
                                                <div class="form-outline mb-3">
                                                    <input type="text" name="area_or_street" value=""
                                                        id="Delivery" class="form-control form-control-lg"
                                                        placeholder="Enter your Area or Street Address" />
                                                    <label class="form-label" for="typeEmailX-2"> Area or Street
                                                    </label>
                                                </div>
                                                <div class="erro-mess">
                                                    @if ($errors->has('area_or_street'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('area_or_street') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="sign_box_col g-width">
                                                <div class="form-outline mb-3">
                                                    <input type="text" name="flat_no_building_name" value=""
                                                        id="Additional-Information" class="form-control form-control-lg"
                                                        placeholder="Enter your flat No Building Name" />
                                                    <label class="form-label" for="typeEmailX-2"> Flat No Building Name
                                                    </label>
                                                </div>
                                                <div class="erro-mess">
                                                    @if ($errors->has('flat_no_building_name'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('flat_no_building_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sign_box_col">
                                            <div class="form-outline mb-3">
                                                <input type="text" name="pincode" value="" id="Delivery"
                                                    class="form-control form-control-lg"
                                                    placeholder="Enter your pincode " />

                                                <label class="form-label" for="typeEmailX-2"> pincode
                                                </label>
                                            </div>
                                            <div class="erro-mess">
                                                @if ($errors->has('pincode'))
                                                    <span class="text-danger">{{ $errors->first('pincode') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="sign_box_col">
                                            <div class="form-outline mb-3">
                                                <input type="text" name="state" value=""
                                                    id="Additional-Information" class="form-control form-control-lg"
                                                    placeholder="Enter your state " />
                                                <label class="form-label" for="typeEmailX-2">state
                                                </label>
                                            </div>
                                            <div class="erro-mess">
                                                @if ($errors->has('state'))
                                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                                @endif
                                            </div>

                                        </div>
                            </div>
                            <div class="sign_box_col">
                                <div class="form-outline mb-3">
                                    <input type="text" name="land_mark" value="" id="Delivery"
                                        class="form-control form-control-lg" placeholder="Enter your land Mark" />
                                    <label class="form-label" for="typeEmailX-2"> land Mark
                                    </label>

                                </div>
                                <div class="erro-mess">
                                    @if ($errors->has('land_mark'))
                                        <span class="text-danger">{{ $errors->first('land_mark') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="sign_box_col">
                                <div class="form-outline mb-3">
                                    <input type="text" name="mobile" value="" id="Delivery"
                                        class="form-control form-control-lg" placeholder="Enter your  Mobile No." />
                                    <label class="form-label" for="typeEmailX-2"> Mobile No.
                                    </label>

                                </div>
                                <div class="erro-mess">
                                    @if ($errors->has('mobile'))
                                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                    @endif
                                </div>

                            </div>

                            <div class="sign_box_col">
                                <div class="form-outline mb-3">
                                    <input type="text" name="optional_mobile" value="" id="Delivery"
                                        class="form-control form-control-lg"
                                        placeholder="Enter your  optional_mobile No." />
                                    <label class="form-label" for="typeEmailX-2"> Optional_Mobile No.
                                    </label>

                                </div>
                                <div class="erro-mess">
                                    @if ($errors->has('optional_mobile'))
                                        <span class="text-danger">{{ $errors->first('optional_mobile') }}</span>
                                    @endif
                                </div>

                            </div>


                            <div class="d-row g-gcol-h padding-pb g-bt  gap g-conter-items g-col-end" style="justify-content: end;">
                                <div class=" form-outline_in ">
                                    <a href="{{ route('checkout/address') }}" class="btn-g _def -mrm btn-Cancel" >Back</a>
                                </div>
                                <div class=" form-outline_in ">
                                <button class="btn-g btn_prim" style="cursor: default;" type="submit" style="width: 200px;">SAVE</button>
                                   
                                </div>
                            </div>
                            </form>
                            </article>
                        </div>

                        <article class="card card_text-in " style="margin-bottom: 10px; padding: 10px;">
                            <header class="if_dd-h">
                                <div class="  card_text-in">
                                    <span class="fa fa-check-circle-o" aria-hidden="true"></span>
                                    <span class="">2.DELIVERY DETAILS</span>
                                </div>
                            </header>
                        </article>
                        <article class="card card_text-in" style="margin-bottom: 10px; padding: 10px;">
                            <header class="if_dd-h">
                                <div class=" card_text-in">
                                    <span class="fa fa-check-circle-o" aria-hidden="true"></span>
                                    <span class="">2.DELIVERY DETAILS</span>
                                </div>
                            </header>
                        </article>
                        <a href="{{ route('/') }}" class="home_link">
                            <span class="fa fa-angle-left" aria-hidden="true">

                            </span> Go back &amp; continue
                            shopping</a>
                    </div>


                    <div class="col-md-4">
                        <article class="card " style="padding: 10px;">
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

                            <footer class="g-ft- d-row -gcol g-phvs-" > 
                                <button button class="btn-g" style="cursor: default; background-color: #6c757d;" type="button">Confirm order</button>
                            </footer>
                        </article>
                        <div class="card card-right-wwbdgv g-top-margin" >
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
