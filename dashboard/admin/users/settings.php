<?php include '../layout/head.php';
      include '../layout/nav.php' ;
      
      if (!isset($_GET['code']) ) {
        echo '<META HTTP-EQUIV="refresh" CONTENT="0.5;URL=index.php">';
        echo error_page('404 الصفحة غير موجودة') ;
      }else {
        $id = filter_var($_GET['code'], FILTER_SANITIZE_STRING);
      if (NameUser($id) == '' ) {
            echo error_page('404 الصفحة غير موجودة') ;
             }
          }
      ?>

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
                    <p class="mb-0 text-sm">  تغير بيانات المستخدم <strong> : <?=NameUser($id)?></strong> </p>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>الإسم الأول</label>
                          <input class="multisteps-form__input form-control" name="UserID" type="text" value="<?=($id)?>" placeholder="<?=($id)?>" hidden  />
                          <input class="multisteps-form__input form-control" name="NameOne" type="text" value="<?=NameOne($id)?>" placeholder="<?=NameOne($id)?>" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>الإسم الثاني</label>
                          <input class="multisteps-form__input form-control" name="NameTwo"  type="username" value="<?=NameTwo($id)?>" placeholder="<?=NameTwo($id)?>" />
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>اليوزرنيم </label>
                          <input class="multisteps-form__input form-control" name="username" type="username" value="<?=GeUsernameUsers($id)?>" placeholder="<?=GeUsernameUsers($id)?>"  />
                        </div>
                     
                        <div class="col-12 col-sm-6">
                          <label>تغير كلمة المرور  </label>
                          <input class="multisteps-form__input form-control" name="passwordUser"  type="password" value="" placeholder="***"  autocomplete="off" />
                        </div>

                      </div>


                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>البريد الأكتروني</label>
                          <input class="multisteps-form__input form-control" name="email" type="email" value="<?=GetEmail($id)?>" placeholder="<?=GetEmail($id)?>"  />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>رقم الهاتف  </label>
                          <input class="multisteps-form__input form-control" name="number" type="number" value="<?=GetNumber($id)?>" placeholder="<?=GetNumber($id)?>"  />
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>عدد النقاط الصحيحة </label>
                          <input class="multisteps-form__input form-control" name="PointCorrect" type="txt" value="<?=PointCorrect($id)?>" placeholder="<?=PointCorrect($id)?>"   />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>عدد النقاط الخطا</label>
                          <input class="multisteps-form__input form-control" name="PointWrong" type="txt" value="<?=PointWrong($id)?>" placeholder="<?=PointWrong($id)?>"   />
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>مجموع النقاط</label>
                          <input class="multisteps-form__input form-control" name="PointsUser" type="txt" value="<?=PointsUser($id)?>" placeholder="<?=PointsUser($id)?>"   />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>facebook</label>
                          <input class="multisteps-form__input form-control" name="facebook"  type="txt" value="<?=GetFacebook($id)?>" placeholder="<?=GetFacebook($id)?>"  />
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>whatsapp</label>
                          <input class="multisteps-form__input form-control" name="whatsapp" type="txt" value="<?=GetWhatsapp($id)?>" placeholder="<?=GetWhatsapp($id)?>" />
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
      <?php include '../layout/footer.php';?>

      <script>
        $(function() {
            $('#form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: '../../../controller/ajax/admin/updating-data.php',
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