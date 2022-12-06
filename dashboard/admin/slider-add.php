<?php include 'layout/head.php';
      include 'layout/nav.php' ;
      $rand = rand_set() ;
      $_SESSION['files_rand'] = $rand;
      $_SESSION['file'] = 'slider';
      $_SESSION['case'] = $rand;
?>
<!-- End Navbar -->
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
      
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
                    <h6 class="mb-0">إضافة سلايدر</h6>
                </div>
                <div class="card-body p-2">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">بيانات slider</h6>
                    <form id="FormID">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="name" placeholder="name">
                                </div>
                                <div class="form-group">
                                    <input type="txt" class="form-control" name="title" placeholder="title">
                                </div>
                            </div>
 
                            <div class="col-md-6">
                                <div class="form-group">
                            <input type="txt" value="0" name="fileID" id="upload_img" hidden>
                              
                                </div>
                                <div class="form-group">
                                    <form method='post' action='' enctype="multipart/form-data"
                                        class="file-uploder get_file">
                                        <input type="file" id='files' name="files[]" class=" form-control" name="email"
                                            placeholder="إرفاق الملفات" multiple>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <button type="submit" class="add btn bg-gradient-secondary">إضافة </button>
                    </form>
                </div>
            </div>
        </div>

        <?php include 'layout/footer.php'; ?>
        <script>  
                    $(document).ready(function() {

            $('.add').click(function(e) {
            //    alert ('dcs');
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: '../../controller/ajax/dashboard/add-slider.php',
                    data: $('#FormID').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        if (data.code == 200) {
                            swal(data.msg, "", "success", {
                                button: "حسنا ",
                            });
                            // setTimeout(function() {
                            //     window.location.href = 'index.php';
                            // }, 3000);
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

            $(document).ready(function() {
            $('input[type=file]').change(function(e) {
                var form_data = new FormData();
                // Read selected files
                var totalfiles = document.getElementById('files').files.length;
                for (var index = 0; index < totalfiles; index++) {
                    form_data.append("files[]", document.getElementById('files').files[index]);
                }
                // AJAX request
                $.ajax({
                    url: '<?=url_ajax()?>img-uploaded.php',
                    type: 'post',
                    data: form_data,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var rand = response.rand;
                        var src = response.files_arr;
                        $('#upload_img').val(rand);
                        console.log(response.rand);
                    }
                });

            });

        });

        </script>