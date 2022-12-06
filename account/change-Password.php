<?php include 'head.php';?>
        <section class="bg-home d-flex align-items-center position-relative" style="background: url('<?=url_assets()?>images/shape01.png') center;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-signin p-4 bg-white rounded shadow">
                        <?=$ads['ads_1']?>
                            <form>
    <?php 
    $code = 1 ;
    $err = '     <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
        <div class="card z-index-0">
        <div class="card-header text-center pt-4">
        <h5>حدث خطأ !   </h5>
      </div>
      <div class="card-body">
            <div class="panel-body">
                <form role="form">
                    <fieldset>
                        <div class="form-group">
                           <p>   صلاحية الرابط الذي تحاول الوصول إلية منتهية علماَ بأن صلاحية الرابط
                           <br> ( نص يوم بعد الطلب تغير كلمة المرور) </p>
                        </div>
                        
                        <a type="submit" href="login.php" class="btn btn-login">الرجوع لتسجيل الدخول</a>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>'; ?>

    <?php 
                        if (empty($_GET['code'])) {
                            echo $err;
                            $code = 0; 
                        }else {
                       $kay = filter_var($_GET["code"], FILTER_SANITIZE_STRING);
                       $sql = "SELECT ex_date , status FROM password_reset_temp where kay = '$kay' ";
                       $result = $conn->query($sql);
                       if ($result->num_rows == 0) { 
                                echo $err;
                                $code = 0 ;
                               }else {
                             $get = $result->fetch_assoc();
                             $ex_date= $get['ex_date'];
                             $now =  strtotime("now");
                            $status= $get['status'];
                           if ($ex_date <= $now or  $status == 1 ) {
                               echo $err;
                                $code = 0;      
                           }
                       }
                   }

         if ($code == 1 ) {?>

                            <div class="mb-3">
                                <input type="password" class="form-control" name="password1"
                                    placeholder="كلمة المرور الجديدة" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password2"
                                    placeholder="إعادة كتابة كلمة المرور" required>
                                <input type="password" name="kay" hidden value="<?=$kay?>">

                            </div>

                            
                                <div class="d-flex justify-content-between">
                                    <!-- <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                        </div>
                                    </div> -->
                                    <p class="forgot-pass mb-0"><a href="reset_password.php" class="text-dark small fw-bold">هل نسيت كلمة المرور  ?</a></p>
                                </div>
                
                                <button class=" submit1 btn btn-primary w-100" type="submit"> تغير كلمة المرور </button>

                                <div class="col-12 text-center mt-3">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">لاتمتلك حساب ..؟  </small> <a href="<?=url_acc()?>signup.php" class="text-dark fw-bold">تسجيل جديد </a></p>
                                </div><!--end col-->
                                <p class="mb-0 text-muted mt-3 text-center">© <script>document.write(new Date().getFullYear())</script> <?=NameSite?>.</p>
                                </form>
                        </div>
                    </div>
                </div>
                <?=$ads['ads_2']?>
            </div>
        </section>
        <?php include 'footer.php'; ?>
<script>
$(function() {
    $('form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '../controller/ajax/change-Password.php',
            data: $('form').serialize(),
            dataType: 'json',
            cache: false,
            success: function(data) {
                if (data.code == 200) {
                    swal(data.msg, "", "success", {
                        button: "حسنا ",
                    });
                    setTimeout(function() {
                        window.location.href = "login.php";
                    }, 3000);
                } else {
                    swal(data.msg, "", "error", {
                        button: "حسنا ",
                    });
                }
                console.log(data);
            }
        });
    });
});
</script>
<?php   }   ?>