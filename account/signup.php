<?php include 'head.php';?>
        <section class="bg-home d-flex align-items-center position-relative" style="background: url('<?=url_assets()?>images/shape01.png') center;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-signin p-4 bg-white rounded shadow">
                            <form>
                            <a href=""><img src="<?=url_assets()?>pngegg.png" class="avatar avatar-small mb-4 d-block mx-auto" alt=""></a>
                                <h5 class="mb-3 text-center">سجل حسابك</h5>
                                <?=$ads['ads_2']?>
                            
                                <div class="form-floating mb-2">
                                <?php if (isset($_GET['code'])) { 
                                $CodeSignup = validateInput($_GET['code']); ?>
                                <input type="text" class="form-control" name="CodeSignup" value="<?=$CodeSignup?>" placeholder="<?=$CodeSignup?>" hidden>
                             <?php }else { ?>
                                <input type="text" class="form-control" name="CodeSignup" value="0" placeholder="0" hidden>
                           <?php  } ?>
                                    <input type="text" class="form-control" name="name" placeholder="Harry">
                                    <label for="floatingInput">الإسم الثلاثي</label>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                                    <label for="floatingEmail">البريد الإكتروني</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <label for="floatingPassword">كلمة المرور</label>
                                </div>
<!--                             
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                </div> -->
                
                                <button class="btn btn-primary w-100" type="submit">تسجيل جديد </button>

                                <div class="col-12 text-center mt-3">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">هل لديك حساب ?</small> <a href="login.php" class="text-dark fw-bold">تسجيل الدخول</a></p>
                                </div><!--end col-->

                                <p class="mb-0 text-muted mt-3 text-center">© <script>document.write(new Date().getFullYear())</script> <?=NameSite?>.</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php include 'footer.php'; ?>
<script>
      $(function () {
        $('form').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=url_ajax()?>account/reg.php',
            data: $('form').serialize(),
           dataType: 'json',
           success: function (data) {
                if (data.code == 200 ) {
                  swal(data.msg, "" , "success", {
                                    button: "حسنا ", });
                    setTimeout(function(){ window.location.href= '<?=URL?>account/login.php';}, 3000);
                 }else {
                  swal(data.msg, "" , "error", {
                                    button: "حسنا ", });
                 }
                 console.log(data); } 
          });
        });
      });
    </script>