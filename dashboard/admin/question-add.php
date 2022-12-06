<?php include 'layout/head.php';
      include 'layout/nav.php' ;
    
      if (!isset($_GET['code']) ) {
        echo '<META HTTP-EQUIV="refresh" CONTENT="0.5;URL=index.php">';
        echo error_page('404 الصفحة غير موجودة') ;
      }else {
        $code = filter_var($_GET['code'], FILTER_SANITIZE_STRING);
      if (GetSection($code) == false ) {
            echo error_page('404 الصفحة غير موجودة') ;
             }
          }
?>
<!-- End Navbar -->
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="../assets/img/bruce-mars.jpg" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1"> <?php  if (isset($_SESSION['name'])) {echo($_SESSION['name']); } ?> </h5>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0"> إضافة سؤال للقسم : <?=GetSection($code)?> </h6>
                </div>
                <div class="card-body p-2">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">بيانات السؤال</h6>
                    <form id="Login">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="section"  value="<?=GetSection($code)?>" placeholder="<?=GetSection($code)?>" disabled>
                                    <input type="txt" class="form-control" name="sectionID"  value="<?=GetRandSection($code)?>" placeholder="<?=GetSection($code)?>" hidden>
                                </div>
                            </div>
                         

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="NameQuestion" placeholder="إسم السؤال ">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="">  الإجابة الأولى </label>
                                    <input type="txt" class="form-control" name="One" placeholder="One">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="">  الإجابة الثانية </label>

                                    <input type="txt" class="form-control" name="Two" placeholder="Two">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="">  الإجابة الثالثة </label>

                                    <input type="txt" class="form-control" name="three" placeholder="three">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="">  الإجابة الرابعة </label>

                                    <input type="txt" class="form-control" name="four" placeholder="four">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" hidden value="<?=GetPointsSection($code)?>" name="points" placeholder="points">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">  الإجابة الصحيحة </label>
                                    <select id="EducationalLevel" class="form-control js-example-basic-multiple" name="correct" >
                                     <option value="" disabled>الأجابة الصحيحة </option>
                                     <option value="One">One </option>
                                     <option value="Two">Two </option>
                                     <option value="three">three  </option>
                                     <option value="four">four  </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="Login btn bg-gradient-secondary">إضافة </button>
                    </form>
                </div>
            </div>
        </div>

        <script>

    $(document).ready(function() {
    $('.Login').click(function(e){
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: '../../controller/ajax/dashboard/question-add.php',
        data: $('#Login').serialize(),
        dataType: 'json',
        success: function(data) {
            if (data.code == 200) {
                swal(data.msg, "", "success", {
                    button: "حسنا ",
                });
                setTimeout(function() {
           //         window.location.href = 'index.php';
                }, 3000);
                $("#Login")[0].reset();
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
        <?php include 'layout/footer.php'; ?>
