<?php include '../../layout/header.php' ; 
include 'layout/isLoginUser.php';

include '../../layout/navbar.php'; 
include 'layout/section.php'; 
?>

                    <div class="col-lg-8 col-12">
                    <div class="back"><?=$ads['ads_3']?></div>
                        <div class="back2"> <?=$ads['ads_4']?></div>
                        <div class="border-bottom pb-4">
                        <p class="text-muted mb-0"><?php if (isset($info['txt'])) { echo $info['txt']; } else { echo ' '; } ?></p>
                        </div>
                        
                        <div class="border-bottom pb-4">
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="mt-4">
                                <div class="mt-3 text-md-start text-center d-sm-flex">
                                <div class="previewTwo">
                                <form method='post' action=''  enctype="multipart/form-data" class="file-uploder get_file">
                                <input type="file" id='files' name="files[]" class="upload upload-box btn btn-dark" style=" position: absolute; font-size: 100px;opacity: 0;right: 0; top: 0;" >
                                <img src="<?=$img?>" class="img_oldTwo avatar float-md-left avatar-medium rounded-circle shadow me-md-4" alt="">
                                      </form>
                                </div>
                                </div>

                                <form id="acc" onsubmit="return validateForm()">
                                    <div class="row mt-4">
                                    <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">username</label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="users" class="fea icon-sm icons"></i>
                                                            <input name="username" id="username" type="username" class="form-control ps-5" value="<?=$users['username']?>"   placeholder="username">
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">الإسم الأول</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input name="last" id="last" type="text" class="form-control ps-5" value="<?=$users['NameOne']?>" placeholder="First Name :">
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">الإسم الثاني</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user-check" class="fea icon-sm icons"></i>
                                                    <input name="first" id="first" type="text" class="form-control ps-5" value="<?=$users['NameTwo']?>" placeholder="<?=$users['NameTwo']?>">
                                                </div>
                                            </div>
                                    </div><!--end row-->
                                    <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone No. :</label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                                            <input name="number" id="number" type="number" class="form-control ps-5"  value="<?=$users['number']?>" placeholder="Phone :">
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">email:</label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="email" class="fea icon-sm icons"></i>
                                                            <input name="email" id="email" type="email" class="form-control ps-5"  value="<?=$users['email']?>" placeholder="email :">
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="submit" id="submit" name="send" class="btn btn-primary" value="حفظ">
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div>
                        </div>
                        </div>
                        </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Profile Setting End -->

        <?php include '../../layout/footer.php'; ?>
        <script> 
        $(document).ready(function(){
$('input[type=file]').change(function(e){

   console.log('DoneFunction');
var form_data = new FormData();

// Read selected files
var totalfiles = document.getElementById('files').files.length;
for (var index = 0; index < totalfiles; index++) {
  form_data.append("files[]", document.getElementById('files').files[index]);
}

// AJAX request
$.ajax({
  url: '<?=url_ajax()?>account/imgUplode.php',
 type: 'post',
 data: form_data ,
 dataType: 'json',
 contentType: false,
 processData: false,
 success: function (response) {
     var src = response.files_arr;
      console.log(src);
        $('.img_old').hide().fadeOut(3);  
        $('.img_oldTwo').hide().fadeOut(3);  
     $('.preview').append('<a href="<?=url_assets().'profile'?>'+src+'"><img class="avatar float-md-left avatar-medium rounded-circle shadow me-md-4" src="<?=url_assets().'profile/'?>'+src+'"><a/>').fadeIn(2);
     $('.previewTwo').append('<a href="<?=url_assets().'profile'?>'+src+'"><img class="avatar avatar-large rounded-circle shadow d-block mx-auto" src="<?=url_assets().'profile/'?>'+src+'"><a/>').fadeIn(2);
  
     
   console.log(response.src);
 }
});

});

});

        $(function () {
        $('#acc').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '../../controller/ajax/account/profile.php',
            data: $('form').serialize()  ,
           dataType: 'json',
           success: function (data) {
            if (data.code == 200 ) {
                  swal(data.msg, "" , "success", { button: "حسنا ", });
                  setTimeout(function(){ window.location.href= 'index.php';}, 3000);
                 }else {
                  swal(data.msg, "" , "error", { button: "حسنا ", });
                 } 
                 console.log(data);
        } 
          });
        });
      });

    
      </script>
   