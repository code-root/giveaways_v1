<script>
            <?php if (!empty($PointsUser)) { ?>
                $("#PointsUser").change(function(){
            PointsUser = $('#PointsUser').val();
        PointsUserTwo = '<?=$PointsUser?>';
        if (PointsUser > PointsUserTwo  ) {
        $('#PointsUser').val(10000);
        }
    });

    function send_points () {
            PointsUser = $('#PointsUser').val();
                 $.ajax({
                    type: 'post',
                    url: '<?=url_ajax()?>account/send_points.php',
                    data: {PointsUser:PointsUser},
                    dataType: 'json',
                    success: function(data) {
                        if (data.code == 200) {
                            swal(data.msg, "", "success", {
                                button: "حسنا ",
                            });
                        } else {
                            swal(data.msg, "", "error", {
                                button: "حسنا ",
                            });
                        }
                        console.log(data);
                    }
                });
  }
          <?php   } ?>
      
  </script>
        
<!-- Footer Start -->
<footer class="footer footer-light">    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-py-60">
                    <div class="row">
                        <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                        <a class="logo" href="<?=URL?>">
            <img src="<?=url_assets()?>pngegg.png" height="50" class="logo-light-mode" alt="">
            <span><?=NameSite?></span>
            </a>
                            <p class="mt-4"></p>
                            <ul class="list-unstyled social-icon social mb-0 mt-4">
                                <li class="list-inline-item"><a href="https://www.facebook.com/win20win/" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li> -->
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li> -->
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li> -->
                            </ul><!--end icon-->
                        </div><!--end col-->
                        
                        <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <h5 class="footer-head">مسابقة 
                            </h5>
                            <ul class="list-unstyled footer-list mt-4">
                                <li><a href="<?=URL?>privacy.php" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> سياسية الخصوصية</a></li>
                                <li><a href="<?=URL?>que.php" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> الدخول للمسابقة</a></li>
                                <li><a href="<?=URL?>explain.php" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> شرح المسابقة</a></li>
                                <li><a href="<?=URL?>poins.php" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> لوجة النقاط</a></li>
                         </ul>
                        </div><!--end col-->
                        
                        <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <h5 class="footer-head">روابط مفيدة </h5>
                            <ul class="list-unstyled footer-list mt-4">
                            <li><a href="<?=url_acc()?>login.php" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> تسجيل الدخول </a></li>
                             <li><a href="<?=url_acc()?>signup.php" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> تسجيل جديد </a></li>
                        
                            </ul>
                        </div>
                        <!--end col-->
    
                        <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <h5 class="footer-head">عن مسابقه win20</h5>
                            <h6 class="mt-4">
                            (كيفية الاشتراك في المسابقة) للاشتراك في موقع win20 موقع المسابقات الأول عربيا يجب عليك شراء بطاقات win20 من الموقع. بطاقة مسابقة win20 تجعلك تشارك في كلا من مسابقات win20 للمعلومات العامه و جوائز السحب ايضا. انت فقط من يحدد متى سوف تشترك ومتى تبدأ الربح بمجرد شرائك لبطاقة موقع win20 . قل وداعا للاتصالات وداعا لارسال الرسائل وداعا لاختيار اشخاص محددين بعينهم للاشتراك في المسابقه. مع موقع win20 القرار قرارك انت والجائزه جائزتك انت. اقرأ المزيد...                            </h6>
                            <!-- <form>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="foot-subscribe foot-white mb-3">
                                            <label class="form-label">Write your email <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" name="email" id="emailsubscribe" class="form-control border ps-5 rounded" placeholder="Your email : " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-grid">
                                            <input type="submit" id="submitsubscribe" name="send" class="btn btn-primary" value="Subscribe">
                                        </div>
                                    </div>
                                </div>
                            </form> -->
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <div class="footer-py-30 bg-footer text-white-50 border-top">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-sm-8">
                    <div class="text-sm-start">
                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script>
                         جميع الحقوق محفوظة لموقع win20  تمت البرمجة من  <a href="https://smartagent-com.com/"> شركة سمارت ايجنت <i class="mdi mdi-heart text-danger"></i> </a> </p>
                    </div>
                </div><!--end col-->

                <!-- <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <ul class="list-unstyled text-sm-end mb-0">
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="<?=url_assets()?>images/payments/american-ex.png" class="avatar avatar-ex-sm" title="American Express" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="<?=url_assets()?>images/payments/discover.png" class="avatar avatar-ex-sm" title="Discover" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="<?=url_assets()?>images/payments/master-card.png" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="<?=url_assets()?>images/payments/paypal.png" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="<?=url_assets()?>images/payments/visa.png" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>
                    </ul>
                </div> -->
                <!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div>
</footer><!--end footer-->
<!-- Footer End -->

<script>

// $(document).ready(function() {

// $(document)[0].oncontextmenu = function() { return false; }

// $(document).mousedown(function(e) {
//     if( e.button == 2 ) {
//         // alert('عذرا ، هذه الوظيفة معطلة!');
//         return false;
//     } else {
//         return true;
//     }
// });
// });

//   document.onkeydown = function(e) {
//   if(event.keyCode == 123) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//      return false;
//   }
// }

// /* To Disable Inspect Element */
// $(document).bind("contextmenu",function(e) {
//  e.preventDefault();
// });

// $(document).keydown(function(e){
//     if(e.which === 123){
//        return false;
//     }
// });

// document.onkeydown = function(e) {
// if(event.keyCode == 123) {
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'F'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
// return false;
// }
// }
</script>
<!-- Offcanvas Start -->
<div class="offcanvas offcanvas-end bg-white shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header p-4 border-bottom">
        <h5 id="offcanvasRightLabel" class="mb-0">
            <img src="<?=url_assets()?>images/logo-dark.png" height="24" class="light-version" alt="">
            <img src="<?=url_assets()?>images/logo-light.png" height="24" class="dark-version" alt="">
        </h5>
        <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
    </div>


    <div class="offcanvas-footer p-4 border-top text-center">
        <ul class="list-unstyled social-icon social mb-0">
            <li class="list-inline-item mb-0"><a href="https://1.envato.market/4n73n" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
            <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
        </ul><!--end icon-->
    </div>
</div>
<!-- Offcanvas End -->


<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
<!-- Back to top -->

<!-- javascript -->
<script src="<?=url_assets()?>js/bootstrap.bundle.min.js"></script> 
<!-- SLIDER -->
<script src="<?=url_assets()?>js/tiny-slider.js "></script>
<!-- Icons -->
<script src="<?=url_assets()?>js/feather.min.js"></script>
<!-- Main Js -->
<script src="<?=url_assets()?>js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
<script src="<?=url_assets()?>js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
</body>
</html>