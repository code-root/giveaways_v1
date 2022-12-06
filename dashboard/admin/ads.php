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
                    <p class="mb-0 text-sm">التحكم بإعلانات الموقع </p>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label> الإعلان الأول </label>
                          <textarea class="multisteps-form__input form-control" name="ads_1" type="text" value="<?=$ads['ads_1']?>" placeholder="<?=$ads['ads_1']?>" ><?=$ads['ads_1']?></textarea>
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>الإعلان الثاني </label>
                          <textarea class="multisteps-form__input form-control" name="ads_2" type="text" value="<?=$ads['ads_2']?>" placeholder="<?=$ads['ads_1']?>" ><?=$ads['ads_2']?></textarea>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>الإعلان الثالث  </label>
                          <textarea class="multisteps-form__input form-control" name="ads_3" type="text" value="<?=$ads['ads_3']?>" placeholder="<?=$ads['ads_3']?>" ><?=$ads['ads_3']?></textarea>
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>الرابع   </label>
                          <textarea class="multisteps-form__input form-control" name="ads_4" type="text" value="<?=$ads['ads_4']?>" placeholder="<?=$ads['ads_4']?>" ><?=$ads['ads_4']?></textarea>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>الإعلان الخامس</label>
                          <textarea class="multisteps-form__input form-control" name="ads_5" type="text" value="<?=$ads['ads_5']?>" placeholder="<?=$ads['ads_5']?>" ><?=$ads['ads_5']?></textarea>
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>الإعلان السادس</label>
                          <textarea class="multisteps-form__input form-control" name="ads_6" type="text" value="<?=$ads['ads_6']?>" placeholder="<?=$ads['ads_6']?>" ><?=$ads['ads_6']?></textarea>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>الإعلان السابع </label>
                          <textarea class="multisteps-form__input form-control" name="ads_7" type="text" value="<?=$ads['ads_7']?>" placeholder="<?=$ads['ads_7']?>" ><?=$ads['ads_7']?></textarea>
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>الإعلان الثامن</label>
                          <textarea class="multisteps-form__input form-control" name="ads_8" type="text" value="<?=$ads['ads_8']?>" placeholder="<?=$ads['ads_8']?>" ><?=$ads['ads_8']?></textarea>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>الإعلان التاسع </label>
                          <textarea class="multisteps-form__input form-control" name="ads_9" type="text" value="<?=$ads['ads_9']?>" placeholder="<?=$ads['ads_9']?>" ><?=$ads['ads_9']?></textarea>
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
                    url: '../../controller/ajax/admin/ads.php',
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