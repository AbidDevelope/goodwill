<!DOCTYPE html>
<html>
   <head>

      @include('user.include.headerlink')

   </head>
   <body>

      
      <main style=" ">
         @include('user.include.header')
         <section class="" style="margin-top: 20px;">
         <div class="srcn-container">
         <div class="d-row row-container gap g-width">
         <div class="col_pas-my_account-list card   col-md-2">
            <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
               <ul class="sidebar_menu_btg d-row  g-width -gcol">
                  <li>
                     <button class="nav-link  g-padding-ptlr  g-height  g-width  itm   active my_account my_account-text " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <div class="irsch">
                           <ion-icon name="person" class="img_icon_ng"></ion-icon>
                           My Goodwill Account
                        </div>
                     </button>
                  </li>
                  <li>
                     <button class="nav-link  g-padding-ptlr  g-height  g-width  itm my_account my_account-text" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                        <div class="irsch">
                           <ion-icon name="person" class="img_icon_ng"></ion-icon>
                           Orders
                        </div>
                     </button>
                  </li>
                  <li>
                     <button class="nav-link  g-padding-ptlr  g-height  g-width  itm my_account my_account-text" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="true">
                        <div class="irsch">
                           <ion-icon name="person" class="img_icon_ng"></ion-icon>
                           Inbox
                        </div>
                     </button>
                  </li>
                  <li>
                     <button class="nav-link  g-padding-ptlr  g-height  g-width  itm my_account my_account-text" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <div class="irsch">
                           <ion-icon name="person" class="img_icon_ng"></ion-icon>
                           Pending Reviews
                        </div>
                     </button>
                  </li>
                  <li>
                     <button class="nav-link  g-padding-ptlr  g-height  g-width  itm my_account my_account-text" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <div class="irsch">
                           <ion-icon name="person" class="img_icon_ng"></ion-icon>
                           Voucher
                        </div>
                     </button>
                  </li>
                  <li>
                     <button class="nav-link  g-padding-ptlr  g-height  g-width  itm my_account my_account-text" id="v-pills-settings-tab1" data-bs-toggle="pill" data-bs-target="#v-pills-settings1" type="button" role="tab" aria-controls="v-pills-settings1" aria-selected="false">
                        <div class="irsch">
                           <ion-icon name="person" class="img_icon_ng"></ion-icon>
                           Saved Items
                        </div>
                     </button>
                  </li>
                  <li>
                     <button class="nav-link  g-padding-ptlr  g-height  g-width  itm my_account my_account-text" id="v-pills-settings-tab2" data-bs-toggle="pill" data-bs-target="#v-pills-settings2" type="button" role="tab" aria-controls="v-pills-settings2" aria-selected="false">
                        <div class="irsch">
                           <ion-icon name="person" class="img_icon_ng"></ion-icon>
                           Recently Viewed
                        </div>
                     </button>
                  </li>
                  <li>
                     <button class="nav-link  g-padding-ptlr  g-height  g-width  itm my_account my_account-text" id="v-pills-settings-tab3" data-bs-toggle="pill" data-bs-target="#v-pills-settings3" type="button" role="tab" aria-controls="v-pills-settings3" aria-selected="false"style="   border-top: 1px solid #d4d4d6;">
                        <div class="irsch">
                           <ion-icon name="person" class="img_icon_ng"></ion-icon>
                           Account Management
                        </div>
                     </button>
                  </li>
                  <li>
                     <button class="nav-link  g-padding-ptlr  g-height  g-width  itm my_account my_account-text" id="v-pills-settings-tab4" data-bs-toggle="pill" data-bs-target="#v-pills-settings4" type="button" role="tab" aria-controls="v-pills-settings4" aria-selected="false">
                        <div class="irsch">
                           <ion-icon name="person" class="img_icon_ng"></ion-icon>
                           Address Book
                        </div>
                     </button>
                  </li>
                  <li>
                     <button class="nav-link  g-padding-ptlr  g-height  g-width  itm my_account my_account-text" id="v-pills-settings-tab5" data-bs-toggle="pill" data-bs-target="#v-pills-settings5" type="button" role="tab" aria-controls="v-pills-settings5" aria-selected="false">
                        <div class="irsch">
                           <ion-icon name="person" class="img_icon_ng"></ion-icon>
                           Newsletter Preferences
                        </div>
                     </button>
                  </li>
                  <li>
                     <button class="nav-link  g-padding-ptlr  g-height  g-width  itm my_account my_account-text" id="v-pills-settings-tab6" data-bs-toggle="pill" data-bs-target="#v-pills-settings6" type="button" role="tab" aria-controls="v-pills-settings6" aria-selected="true">
                        <div class="irsch">
                           <ion-icon name="person" class="img_icon_ng"></ion-icon>
                           Close Account
                        </div>
                     </button>
                  </li>
                <li>
               <form method="get" class="my_account-pam" action="{{ route('user/logout') }}">
                  <button class="my_account_btn-ng my_account_btn">Logout</button>
               </form>
</li>
               </ul>
            </div>
         </div>
         <div class="col-md-10 my_account_detail_box   card col_pas-my_account-list ">
         <div class="tab-content" id="v-pills-tabContent">
         <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
            <div class="my_account_detail d-row -gcol">
               <div class=" d-row  g-padding-ptlr border-bouttom-h border-bouttom-h">
                  <h1 class="heading-goodwill-in">Account Overview</h1>
               </div>
               <div class="row my_account_pas ">
                  <div class="my_account_pav_fn margin-LR g-bottom-margin">
                     <article>
                        <div class="my_account_box_heading">
                           <h2>Account Detail</h2>
                        </div>
                        <div class="my_account_pas-hd">
                           <p  class="name">{{ Auth::guard('user')->user()->name }}</p>
                           <p  class="name">{{ Auth::guard('user')->user()->email }}</p>
                        </div>
                     </article>
                  </div>
                  <div class="my_account_pav_fn margin-LR g-bottom-margin">
                     <article>
                        <div class="my_account_box_heading">
                           <h2>ADDRESS BOOK</h2>
                        </div>
                        <div class="my_account_pas-hd">
                           <p  class="name">Your default shipping address:</p>
                           <p  class="name">No default shipping address available.</p>
                        </div>
                        <a class="my_account_btn-ng" href="#">Add default address</a>
                     </article>
                  </div>
                  <div class="my_account_pav_fn margin-LR g-bottom-margin">
                     <article>
                        <div class="my_account_box_heading">
                           <h2>GOODWILL STORE CREDIT</h2>
                        </div>
                        <div class="my_account_pas-hd">
                           <p  class="name">{{ Auth::guard('user')->user()->name }}</p>
                           <p  class="name">{{ Auth::guard('user')->user()->email }}</p>
                        </div>
                     </article>
                  </div>
                  <div class="my_account_pav_fn margin-LR g-bottom-margin">
                     <article>
                        <div class="my_account_box_heading">
                           <h2>NEWSLETTER PREFERENCES</h2>
                        </div>
                        <div class="my_account_pas-hd">
                           <p  class="name">You are currently not subscribed to any of our newsletters.</p>
                           <!-- <p  class="my_account_email_fild">No default shipping address available.</p> -->
                        </div>
                        <a class="my_account_btn-ng" href="#">Edit Newsletter preferences</a>
                     </article>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
         	<div class="my_account_detail">
                  <header class="d-row  g-padding-ptlr border-bouttom-h border-bouttom-h">
                     <h1 class="heading-goodwill-in">Account Overview</h1>
                  </header>
                  <div class="tab-container">
                     <div class="tab">
                         <ul class="border-bouttom-h d-row">
                             <a class="tablinks  d-row  active padding-LR btn-height" href="#"  onclick="openTab(event, 'tab1')">Open Orders (0)</a>
                         <a class="tablinks d-row padding-LR btn-height" href="#"  onclick="openTab(event, 'tab2')">Closed Orders (0)</a>
                         </ul>

                     </div>
                     <div class="my_account_detail_ind">
                         <div id="tab1" class="tabcontent order_box">
                             <div class="my_account_detail-img">
                                 <img src="Orders.png" class="img_order_icon">
                             </div>
                             <div class="my_account_box_heading">
                                 <h2>You have placed no orders yet!</h2>
                                 <p>All your orders will be saved here for you to access their state anytime.</p>
                             </div>

                             <div class="btn_sumbit"><a href="#" class="btn_prim ">Continue Shopping</a></div>

                         </div>
                         <div id="tab2" class="tabcontent order_box">
                              <div class="my_account_detail-img">
                                 <img src="Orders.png" class="img_order_icon">
                             </div>
                             <!-- <div class="orders_text">
                                 <h2>You have placed no orders yet!</h2>
                                 <p>All your orders will be saved here for you to access their state anytime.</p>
                             </div>

                                  <div class="btn_sumbit"><a href="#" class="btn_prim ">Continue Shopping</a></div> -->
                         </div>

                     </div>
                 </div>
                 </div>
         </div>
    <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">
    	<div class="my_account_detail">
                  <header class="d-row  g-padding-ptlr border-bouttom-h">
                     <h1 class="heading-goodwill-in">Inbox Messages</h1>
                  </header>
                       <div class="my_account_detail_ind">
                       <div class="my_account_detail-img">
                       		<img src="" class="img_order_icon">
                       </div>
                       	<div class="my_account_box_heading">
                                <h2>You don't have any messages!</h2>
                                <p class="name">Here you will be able to see all the messages that we send you. Stay tuned</p>
                      </div>
                       <div class="btn_sumbit"><a href="#" class="btn_prim ">Continue Shopping</a></div>
                       </div>
                 </div>
    </div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
    	<div class="my_account_detail">
                  <header class="d-row  g-padding-ptlr border-bouttom-h">
                     <h1 class="heading-goodwill-in">Pending Reviews</h1>
                  </header>
                      <div class="my_account_detail_ind">
                       <div class="my_account_detail-img">
                       		<img src="" class="img_order_icon">
                       </div>
                       	<div class="my_account_box_heading">
                                <h2>You have no orders waiting for feedback</h2>
                                <p class="name">After getting your products delivered, you will be able to rate and review them. Your feedback will be published on the product page to help all Jumia's users get the best shopping experience!</p>
                      </div>
                      <div class="btn_sumbit"><a href="#" class="btn_prim ">Continue Shopping</a></div>
                       </div>
                 </div>
    </div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
    	<div class="my_account_detail">
                  <header class="d-row  g-padding-ptlr border-bouttom-h">
                     <h1 class="heading-goodwill-in">Voucher</h1>
                  </header>
                      <div class="my_account_detail_ind">
                       <div class="my_account_detail-img">
                       		<img src="" class="img_order_icon">
                       </div>
                       	<div class="my_account_box_heading">
                                <h2>You currently have no available Voucher</h2>
                                <p class="name">All your available Vouchers will be displayed here</p>
                      </div>
                       <div class="btn_sumbit"><a href="#" class="btn_prim ">Continue Shopping</a></div>
                       </div>
                 </div>
    </div>
         <div class="tab-pane fade" id="v-pills-settings1" role="tabpanel" aria-labelledby="v-pills-settings-tab1" tabindex="0">
         	  <div class="my_account_detail">
                  <header class="d-row  g-padding-ptlr border-bouttom-h">
                     <h1 class="heading-goodwill-in">Saved Items</h1>
                  </header>
                     <div class="my_account_detail_ind">
                       <div class="my_account_detail-img">
                       		<img src="" class="img_order_icon">
                       </div>
                       	<div class="my_account_box_heading">
                                <h2>You haven’t saved an item yet!</h2>
                                <p class="name">Found something you like? Tap on the heart shaped icon next to the item to add it to your wishlist! All your saved items will appear here.</p>
                      </div>
                       <div class="btn_sumbit"><a href="#" class="btn_prim ">Continue Shopping</a></div>
                       </div>
                 </div>
            </div>
         <div class="tab-pane fade" id="v-pills-settings2" role="tabpanel" aria-labelledby="v-pills-settings-tab2" tabindex="0">
         	<div class="my_account_detail">
                  <header class="d-row  g-padding-ptlr border-bouttom-h">
                     <h1 class="heading-goodwill-in">Recently Viewed Products</h1>
                  </header>
                      <div class="my_account_detail_ind">
                       <div class="my_account_detail-img">
                       		<img src="" class="img_order_icon">
                       </div>
                       	<div class="my_account_box_heading">
                                <h2>No Recently Viewed Products</h2>
                                <p class="name">You have no recently viewed products at the moment.</p>
                      </div>
                       <div class="btn_sumbit"><a href="#" class="btn_prim ">Continue Shopping</a></div>
                       </div>
                 </div>
         </div>
         <div class="tab-pane fade" id="v-pills-settings3" role="tabpanel" aria-labelledby="v-pills-settings-tab3" tabindex="0">
         	<div class="my_account_detail">
                  <header class="d-row  g-padding-ptlr border-bouttom-h">
                     <h1 class="heading-goodwill-in">Hello Balchandra Balchandra</h1>
                  </header>

                 </div>
         </div>
         <div class="tab-pane fade" id="v-pills-settings4" role="tabpanel" aria-labelledby="v-pills-settings-tab4" tabindex="0">
         	<div class="my_account_detail">
                  <header class="d-row  g-padding-ptlr border-bouttom-h">
                     <h1 class="heading-goodwill-in">Address Book</h1>
                  </header>
                      <div class="my_account_detail_ind">
                       <div class="my_account_detail-img">
                       		<img src="" class="img_order_icon">
                       </div>
                       	<div class="my_account_box_heading">
                                <h2>You have not added any address yet!</h2>
                                <p class="name">Add your shipping addresses here for a fast purchase experience! You will be able to add, modify or delete them at any time.</p>
                      </div>
                       <div class="btn_sumbit"><a href="#" class="btn_prim ">Continue Shopping</a></div>
                       </div>
                 </div>
         </div>
         <div class="tab-pane fade" id="v-pills-settings5" role="tabpanel" aria-labelledby="v-pills-settings-tab5" tabindex="0">
         	<div class="my_account_detail">
                  <header class="d-row  g-padding-ptlr border-bouttom-h">
                     <h1 class="heading-goodwill-in">Newsletter Preferences</h1>
                  </header>
                  <form class="Newsletter_bf d-row">
                     <article>
                        <div class="crad_new_oas">
                           <header class="card_transform border-bouttom-h   " style="padding: 20px;">
                              SUBSCRIBE TO
                           </header>
                           <fieldset class="Newsletter_bf-pasl">
<div class="Newsletter_ks_box">
 <div class=" gap  g-padding-ptlr g-conter-items d-row ">
     <input value="female" id="fi-communicon-1" name="gender" required="" type="radio" class="Newsletter-rad">
     <label class="lbl" for="fi-communicon-1">daily newsletters for her</label>
 </div>
 <div class=" gap  g-padding-ptlr g-conter-items d-row">
     <input value="female" id="fi-communicon-2" name="gender" required="" type="radio" class="Newsletter-rad">
     <label class="lbl" for="fi-communicon-2">daily newsletters for him</label>
 </div>

 <div class=" gap  g-padding-ptlr g-conter-items d-row">
     <input value="female" id="fi-communicon-4" name="gender" required="" type="radio" class="Newsletter-rad"  checked>
     <label class="lbl" for="fi-communicon-4">I don't want to receive daily newsletters</label>
 </div>
</div>
</fieldset>

                        </div>
                     </article>

                </form>
                <footer class="newsletters_footer_b">
                  <button class="btn _save_bdk">Save</button>
                  <div class="-tac -pvm">
                     <a href="#" class="btn _defni my_account_btn-ng my_account_btn">Unsubscribe from all communications</a>
                  </div>
      </footer>
                 </div>
               </div>
         <div class="tab-pane fade" id="v-pills-settings6" role="tabpanel" aria-labelledby="v-pills-settings-tab6" tabindex="0"><div class="my_account_detail">
                  <header class="d-row  g-padding-ptlr border-bouttom-h">
                     <h1>Hello Balchandra Balchandra</h1>
                  </header>

                 </div></div>
               </main>
               @include('user.include.footer')
   </body>
   <script>
         const links = document.querySelectorAll('.my_account');

         links.forEach(link => {
         link.addEventListener('click', function(event) {

             event.preventDefault();

             links.forEach(link => {
                 link.classList.remove('active');
             });


             this.classList.add('active');
         });
         });
         document.getElementById('tab1').style.display = 'block';

         function openTab(event, tabName) {
             var i, tabcontent, tablinks;

             tabcontent = document.getElementsByClassName('tabcontent');
             for (i = 0; i < tabcontent.length; i++) {
                 tabcontent[i].style.display = 'none';
             }


             tablinks = document.getElementsByClassName('tablinks');
             for (i = 0; i < tablinks.length; i++) {
                 tablinks[i].classList.remove('active');
             }


             document.getElementById(tabName).style.display = 'block';


             event.currentTarget.classList.add('active');

         }

         const radioButtons = document.querySelectorAll('.Newsletter-rad');

radioButtons.forEach((radioButton) => {
    radioButton.addEventListener('click', () => {
        const label = radioButton.nextElementSibling;
        label.style.color = '#f68b1e';
    });

    radioButton.addEventListener('mouseenter', () => {
        const label = radioButton.nextElementSibling;
        label.style.color = '#f68b1e';
    });

    radioButton.addEventListener('mouseleave', () => {
        const label = radioButton.nextElementSibling;
        label.style.color = ''
    });
});
         </script>
</html>