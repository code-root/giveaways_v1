<?php include 'head.php';?>
        <section class="bg-home d-flex align-items-center position-relative" style="background: url('<?=url_assets()?>images/shape01.png') center;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    <?=$ads['ads_2']?>

                        <div class="form-signin p-4 bg-white rounded shadow">
                            <form>
                                <a href=""><img src="<?=url_assets()?>pngegg.png" class="avatar avatar-small mb-4 d-block mx-auto" alt=""></a>
                                <h5 class="mb-3 text-center">الرجاء كتابة البريد الأكتروني لإعادة الكلمة المرور  </h5>
                            
                                <div class="form-floating mb-2">
                                <input class="form-control" placeholder="البريد الالكتروني" name="email" type="email" autofocus="">
                                    <label for="floatingInput">البريد الإكتروني</label>
                                </div>
                
                                <button class="btn btn-primary w-100" type="submit">إرسال</button>

                                <div class="col-12 text-center mt-3">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">لاتمتلك حساب ..؟  </small> <a href="<?=url_acc()?>signup.php" class="text-dark fw-bold">تسجيل جديد </a></p>
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
 $(function() {
        $('form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../controller/ajax/reset_password.php',
                data: $('form').serialize(),
                dataType: 'json',
                cache : false,
                success: function (data) {
            if (data.code == 200 ) {
                  swal(data.msg, "" , "success", { button: "حسنا ", });
                  setTimeout(function(){ window.location.href= "login.php";}, 3000);
                 }else {
                  swal(data.msg, "" , "error", { button: "حسنا ", });
                 } 
                 console.log(data);
        } 
            });
        });
    });
    </script>
