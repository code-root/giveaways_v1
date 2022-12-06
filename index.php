<?php
    include 'layout/header.php'; 
    echo HeaderTile ('الرئيسية') ;
    include 'layout/navbar.php'; 
   if (isset($_GET['code'])) {

         $msg = 'جاري تحويلك ';
         $CodeSignup = validateInput($_GET['code']);
         $_SESSION['CodeSignup'] = $CodeSignup; 
         echo '<META HTTP-EQUIV="refresh" CONTENT="2.5;URL=account/signup.php?code=' . $CodeSignup . '&case=1">';
         echo error_page($msg);
   
   }
   ?>
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
   <!--Indicators-->
   <ol class="carousel-indicators">
      <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-2" data-slide-to="1"></li>
      <li data-target="#carousel-example-2" data-slide-to="2"></li>
   </ol>
   <!--/.Indicators-->
   <!--Slides-->
   <div class="carousel-inner" role="listbox">
  
   <?php  $sql = "SELECT * FROM `slider` order by id desc LIMIT 5  ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                          $x = 0 ;
                          $active = null;

                        while($row = $result->fetch_assoc()) { $x++;
                          $functionID = $row['id'];
                          $image = $row['img'];
                          if ($x == 1) {
                            $active = 'active';
                          }else {
                            $active = '';
                          }
                          ?>

   <div class="carousel-item <?=$active?>">
         <div class="view">
            <img class="d-block w-100" src="<?=url_assets()?>upload/slider/<?=get_img($image)?>" width="50%"  width="50%" alt="First slide">
            <div class="mask rgba-black-light"></div>
         </div>
         <div class="carousel-caption">
            <h3 class="h3-responsive" style="color: black;"><?=$row['name']?></h3>
            <p style="color: black;"><?=$row['title']?></p>
         </div>
      </div>
     <?php } } ?>
   </div>
   <!--/.Slides-->
   <!--Controls-->
   <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
   <span class="carousel-control-next-icon" aria-hidden="true"></span>
   <span class="sr-only">Next</span>
   </a>
   <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
<script>
   $(document).ready(function() {
    $("#carousel-example-2").owlCarousel({
        navigation : true, // Show next and prev buttons
        interval: 100,
        slideSpeed : 100,
        paginationSpeed : 100,
        items : 1, 
        itemsDesktop : false,
        itemsDesktopSmall : false,
        itemsTablet: false,
        itemsMobile : false
    });
   
   });
</script>
<!-- Shape Start -->
<div class="position-relative">
   <div class="shape overflow-hidden text-white">
      <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
      </svg>
   </div>
</div>
<?php 
if ( isLoginUser() != true) { ?>
<div class="container mt-100 mt-60">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6 order-2 order-md-1 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="section-title">
                            <h4 class="title mb-4">مرحبا بك سجل دخولك الأن   <span class="text-primary">Win20.</span></h4>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>الدخول للمسابقة </li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>ربح المال</li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>احصائيات للنقاط </li>
                            </ul>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-5 col-md-6 order-1 order-md-2">
                        <div class="card rounded border-0 shadow ms-lg-5">
                            <div class="card-body">
                                <img src="images/illustrator/Mobile_notification_SVG.svg" alt="">

                                <div class="content mt-4 pt-2">
                                <form id="formLogin">
                                <a href=""><img src="<?=url_assets()?>pngegg.png" class="avatar avatar-small mb-4 d-block mx-auto" alt=""></a>
                                <h5 class="mb-3 text-center">الرجاء تسجيل الدخول</h5>
                            
                                <div class="form-floating mb-2">
                                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                                    <label for="floatingInput">البريد الإكتروني</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <label for="floatingPassword">كلمة المرور </label>
                                </div>
                            
                                <div class="d-flex justify-content-between">
                                    <p class="forgot-pass mb-0"><a href="<?=url_acc()?>reset_password.php" class="text-dark small fw-bold">Forgot password ?</a></p>
                                </div>
                
                                <button class="btn btn-primary w-100" type="submit">تسجيل الدخول</button>

                                <div class="col-12 text-center mt-3">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">لاتمتلك حساب ..؟  </small> <a href="<?=url_acc()?>signup.php" class="text-dark fw-bold">تسجيل جديد </a></p>
                                </div><!--end col-->
                            </form>                                 
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
<?php }  ?>

<!--Shape End-->
<!-- Candidates Start -->
<div class="container mt-100 mt-60">
   <div class="row justify-content-center">
      <div class="col-12 text-center">
         <div class="section-title mb-0 pb-2">
            <h1><?=NameSite?></h1>
            <h5> لتحصيل اكبر عدد من النقاط وتصدر قائمه الفائزين  <?=NameSite?> اشترك الان في اكبر مسابقه بالعالم العربي </h5>
         </div>
      </div>
      <!--end col-->
   </div>
   <!--end row-->
   
   <div class="row">
            <!--end col-->
            <div class="col-lg-3 col-md-6 mt-4 pt-2">
         <div class="card team text-center border-0">
            <div class="card-body">
            <a href="<?=url_acc()?>login.php" >
               <div class="position-relative">
                  <img src="https://www.dolomitisuperfly.com/wp-content/uploads/2016/12/click.png" class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
               </div>
               <div class="content pt-3 pb-3">
                  <h5 class="mb-0"><a href="<?=url_acc()?>login.php" class="name text-dark"> الدخول للمسابقه</a></h5>
               </div>
            </a>
            </div>
         </div>
      </div>
      <!--end col-->
      <div class="col-lg-3 col-md-6 mt-4 pt-2">
         <div class="card team text-center border-0">
            <div class="card-body">
            <a href="<?=URL?>explain.php" >
               <div class="position-relative">
                  <img src="https://enhelion.com/assets_web/test-series/question.png" class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
               </div>
               <div class="content pt-3 pb-3">
                  <h5 class="mb-0"><a href="<?=URL?>explain.php" class="name text-dark">شرح المسابقة</a></h5>
               </div>
               </a>
            </div>
         </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-4 pt-2">
         <div class="card team text-center border-0">
            <div class="card-body">
               <div class="position-relative">
                  <img src="https://icon-library.com/images/blue-phone-icon-png/blue-phone-icon-png-3.jpg" class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
               </div>
               <div class="content pt-3 pb-3">
                  <h5 class="mb-0"><a href="https://www.facebook.com/win20win/" class="name text-dark">تواصل معنا </a></h5>
               </div>
            </div>
         </div>
      </div>
      <!--end col-->
      <div class="col-lg-3 col-md-6 mt-4 pt-2">
         <div class="card team text-center border-0">
            <div class="card-body">
      <a href="<?=URL?>explain.php">

               <div class="position-relative">
                  <img src="https://bubsinarms.files.wordpress.com/2011/05/baby-gift-box-blue.jpg?w=390" class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
               </div>
               <div class="content pt-3 pb-3">
                  <h5 class="mb-0"><a href="<?=URL?>explain.php" class="name text-dark">جوائز المسابقة</a></h5>
               </div>
      </a>

            </div>
         </div>
      </div>
      <!--end col-->
   </div>
   <!--end row-->
</div>
<!--end container-->
<!-- Candidates End -->
<!-- Testi start -->
<div class="container mt-100 mt-60">
   <div class="row justify-content-center">
      <?php //=$ads['ads_1']?>
   </div>
   <!--end row-->
</div>
<!--end container-->
<div class="container pt-5">
   <div class="row justify-content-center">
      <div class="col-lg-2 col-md-2 col-6 text-center">
         <img src="<?=url_assets()?>images/client/amazon.svg" class="avatar avatar-ex-sm" alt="">
      </div>
      <!--end col-->
      <div class="col-lg-2 col-md-2 col-6 text-center">
         <img src="<?=url_assets()?>images/client/google.svg" class="avatar avatar-ex-sm" alt="">
      </div>
      <!--end col-->
      <div class="col-lg-2 col-md-2 col-6 text-center mt-4 mt-sm-0">
         <img src="<?=url_assets()?>images/client/lenovo.svg" class="avatar avatar-ex-sm" alt="">
      </div>
      <!--end col-->
      <div class="col-lg-2 col-md-2 col-6 text-center mt-4 mt-sm-0">
         <img src="<?=url_assets()?>images/client/paypal.svg" class="avatar avatar-ex-sm" alt="">
      </div>
      <!--end col-->
      <div class="col-lg-2 col-md-2 col-6 text-center mt-4 mt-sm-0">
         <img src="<?=url_assets()?>images/client/shopify.svg" class="avatar avatar-ex-sm" alt="">
      </div>
      <!--end col-->
      <div class="col-lg-2 col-md-2 col-6 text-center mt-4 mt-sm-0">
         <img src="<?=url_assets()?>images/client/spotify.svg" class="avatar avatar-ex-sm" alt="">
      </div>
      <!--end col-->
   </div>
   <!--end row-->
</div>
<!--end container-->
<!-- Testi end -->
</section><!--end section-->
<!-- End -->
<!-- Shape Start -->
<div class="position-relative">
   <div class="shape overflow-hidden text-light">
      <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
      </svg>
   </div>
</div>
<!--Shape End-->
<?php include 'layout/footer.php'; ?>
<script>
      $(function () {
        $('#formLogin').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=url_ajax()?>account/login.php',
            data: $('#formLogin').serialize(),
           dataType: 'json',
           success: function (data) {
                if (data.code == 200 ) {
                  swal(data.msg, "" , "success", { button: "حسنا", });
                    setTimeout(function(){ window.location.href= '<?=URL?>account/login.php';}, 3000);
                 }else {
                  swal(data.msg, "" , "error", { button: "حسنا", });
                 }
                 console.log(data); } 
          });
        });
      });
    </script>