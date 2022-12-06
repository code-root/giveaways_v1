<?php include 'layout/head.php';
      include 'layout/nav.php' ; ?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="multisteps-form mb-5">
            <!--progress bar-->
            <div class="row">
              <div class="col-12 col-lg-8 mx-auto my-5">
              </div>
            </div>
            <!--form panels-->
            <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8" id="form" method="POST">
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder mb-0">الإعدادات</h5>
                    <p class="mb-0 text-sm">التحكم بإعدادات الموقع </p>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>الإسم بالكامل</label>
                          <input class="multisteps-form__input form-control" name="FullName" type="text" value="<?=$info['FullName']?>" placeholder="<?=$info['username']?>" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>username</label>
                          <input class="multisteps-form__input form-control" name="username"  type="username" value="<?=$info['username']?>" placeholder="<?=$info['username']?>" />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>الوقت التنازلي للأقسام </label>
                          <input class="multisteps-form__input form-control" name="timer" type="number" value="<?=$settings['timer']?>" placeholder="<?=$settings['timer']?>"  />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>عدد مرات الإختبار كل 24 ساعة  </label>
                          <input class="multisteps-form__input form-control" name="MaximumShare" type="number" value="<?=$settings['MaximumShare']?>" placeholder="<?=$settings['MaximumShare']?>"  />
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>البريد الإكتروني</label>
                          <input class="multisteps-form__input form-control" name="email" type="email" value="<?=$info['email']?>" placeholder="<?=$info['username']?>"  />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>instagram</label>
                          <input class="multisteps-form__input form-control" name="instagram"  type="txt" value="<?=$settings['instagram']?>" placeholder="<?=$settings['instagram']?>"  />
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>facebook</label>
                          <input class="multisteps-form__input form-control" name="facebook" type="txt" value="<?=$settings['facebook']?>" placeholder="<?=$settings['facebook']?>"   />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>snapchat</label>
                          <input class="multisteps-form__input form-control" name="snapchat"  type="txt" value="<?=$settings['snapchat']?>" placeholder="<?=$settings['snapchat']?>"  />
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>whatsapp</label>
                          <input class="multisteps-form__input form-control" name="wa" type="txt" value="<?=$settings['wa']?>" placeholder="<?=$settings['wa']?>" />
                        </div>
                        <div class="col-12 col-sm-6">
                          <label>Password old  </label>
                          <input class="multisteps-form__input form-control" name="passwordOLD"  type="password" value="" placeholder="***"  />
                        </div>
                      </div>
                      
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>نقاط الإحالات </label>
                          <input class="multisteps-form__input form-control" name="Referrals" type="txt" value="<?=$settings['Referrals']?>" placeholder="<?=$settings['Referrals']?>"  />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>Repeat Password</label>
                          <input class="multisteps-form__input form-control" name="RePassword" type="password" value="" placeholder="****"  />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>Password</label>
                          <input class="multisteps-form__input form-control" name="password" type="password" value="" placeholder="***"  />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>Repeat Password</label>
                          <input class="multisteps-form__input form-control" name="RePassword" type="password" value="" placeholder="****"  />
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"  type="submit" title="Next">حفظ</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'layout/footer.php';?>

      <script>
        $(function() {
            $('#form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: '../../controller/ajax/admin/settings.php',
                    data: $('#form').serialize(),
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
            });
        });
        </script>