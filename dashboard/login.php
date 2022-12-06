<?php 
session_start();
include '../controller/function.php';
 if ( LoginDashboard() === true) {
   
  echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=' . URL . 'dashboard/admin/index.php">';
  echo error_page('مسجل بالفعل جاري تحويلك ... ') ;
}else {
  echo HeaderAdminTile ('تسجيل دخول', 1) ;
}

?>
  <!-- End Navbar -->
  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('<?=url_assets()?>img/curved-images/curved14.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">أهلا بعودتك !</h1>
            <!-- <p class="text-lead text-white"> قم بتسجيل دخولك للمنصة  </p> -->
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>تسجيل الدخول </h5>
            </div>
            <div class="card-body">
              <form role="form text-left">
                <div class="mb-3">
                  <input type="text" class="form-control" name="email" placeholder="username or email" aria-label="Name" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                </div>
                <div class="form-check form-check-info text-left">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                  <label class="form-check-label" for="flexCheckDefault">أوافق على <a href="javascript:;" class="text-dark font-weight-bolder"> الشروط والأحكام</a></label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">تسجيل دخول</button>
                </div>
                <p class="text-sm mt-3 mb-0"> لا تمتلك حساب  ؟<a href="registration.php" class="text-dark font-weight-bolder"> سجل الأن </a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Company
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Team
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Products
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Blog
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Pricing
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            جميع الحقوق محفوظة لـ © <script>
              document.write(new Date().getFullYear())
            </script> <?=NameSite?>.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script type="text/javascript" src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script src="<?=url_assets()?>js/core/popper.min.js"></script>
  <script src="<?=url_assets()?>js/core/bootstrap.min.js"></script>
  <script src="<?=url_assets()?>js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=url_assets()?>js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=url_assets()?>js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>


<script>
      $(function () {
        $('form').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=url_ajax()?>dashboard/login.php',
            data: $('form').serialize(),
           dataType: 'json',
           success: function (data) {
                if (data.code == 200 ) {
                  swal(data.msg, "" , "success", { button: "حسنا", });
                    setTimeout(function(){ window.location.href= '<?=URL?>dashboard/login.php';}, 3000);
                 }else {
                  swal(data.msg, "" , "error", { button: "حسنا", });
                 }
                 console.log(data); } 
          });
        });
      });
    </script>