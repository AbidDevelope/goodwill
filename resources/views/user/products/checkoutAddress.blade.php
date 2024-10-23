<head>
    @include('user.include.headerlink')
</head>
<body>
    <main>
        @include('user.include.header')
        <section class="form-ADDRESS-in" style="    padding-top:13px;">
            <div class="srcn-container">
                <div class="row row-container ">

                    <div class="col-md-8">
                        <div class="">
                            <div class="row">
    
                                <article class="img-c card">
                                    <header class=" d-row padding-pb border-bouttom-h">
                                        <div class="d-row text-C gap g-conter-items ">
                                            <span class="fa fa-check-circle" aria-hidden="true"></span>
                                            <h5 class="gphs-lR">Customer Address</h5>
                                        </div>
                                    </header>
                                    <form action="{{ route('checkoutAddress') }}"  method="POST" class="g-bt">
                                        @csrf
                                        <div class="padding-pb">Address book</div>
                                        <span id="selectedValue"></span>
                                        <div class="" >
                                            <fieldset class="g-padding ">
                                                @foreach($addressGet as $address)
                                                <div class="d-row  g-col  g-padding-ptlr img-bottom g-width border-  g-bottom-margin ">
                                                  <input type="radio" class="rad edit-d" value="{{ $address->id }}" data-address-id="{{ $address->id }}"
                                                   checked="" id="addressId" name="selectAddress" required>

                                                    <label for="" class="d-row text-C card-lift-p my_account">
                                                        <span class="d-row -gcol">
                                                            <span class="bdg_dfl-m img-c">{{ $address->user->name }}</span>
                                                            <span class="bdg_dfl img-c"> {{ $address->flat_no_building_name }} |
                                                                {{ $address->city  }} | {{ $address->area_or_street }} |
                                                                {{ $address->state }} | {{ $address->pincode }}
                                                            </span>
                                                            <span class="bdg_dfl img-c">{{ $address->user->mobile }}</span>
                                                        </span>
                                                    </label>
                                                    <a href="#" class="d-row edit-d -i-start  lift-out">
                                                        Edit
                                                        <span class="fa fa-pencil" aria-hidden="true"></span>
                                                    </a>
                                                </div>
                                                @endforeach
                                            </fieldset>
                                            <a class="d-row  btn-g  g-conter-items g-top-margin btn-Cancel  add-btn-" href="{{ route('checkout/create/address') }}" style="width: 120px;" >
                                                <span class="fa fa-plus" aria-hidden="true"></span>Add address
                                            </a>
                                        </div>
                                        <div class="d-row g-gcol-h padding-pb g-bt  gap g-conter-items g-col-end">
                                            <a class="btn-g _def -mrm btn-Cancel" href="#">Cancel</a>
                                          
                                            <button type="submit" class="btn-g btn_prim "style="width: 200px;"> Select address</button>
                                           
                                           
                                        </div>
                                    </form>
                                </article>
    
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <article class="card " style="padding: 10px;">
                            <h4 class="order-pas">Order summary</h4>
                            <div class="bb_card_in-text g-bt padding-pb">
                                <p class="d-row g-col">
                                    Item's total ({{ $totalItem }})
                                    <span class="prc-tar">₦ {{ $totalValue }}</span>
                                </p>
                            </div>
                            <div class="bb_card_in-text g-bt padding-pb">
                                <p class="d-row g-col">
                                    Delivery fee
                                    <span class="prc-tar">₦ 0</span>
                                </p>
                            </div>
                            <div class="d-row g-col g-bt padding-pb">
                                <p class=" -ow-a">Total</p>
                                <p class="-plm-tar">₦ {{ $totalValue }}</p>
                            </div>




                            <footer class="g-ft- d-row -gcol g-padding-ptlr  ">                                  
                                <button class="btn-g" style="cursor: default; background-color: #6c757d;" type="button">Confirm order</button>
                            </footer>
                        </article>
                        <div class="card card-right-wwbdgv g-top-margin">
                            <p class="card_accepting">By proceeding, you are automatically accepting the&nbsp;<a
                                    class="_more" href="#" target="_blank" rel="noopener">Terms
                                    &amp;Conditions</a></p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- Footer Start -->
        @include('user.include.footer')
        <!-- Footer End -->
    </main>
  

    <script>
       $(document).ready(function() {
            $('input[type=radio][name=selectAddress]').change(function() {
                $selectedValue = $(this).data('address-id');
            $('#selectedValue').text($selectedValue);
            });
        });
    </script>
</body>