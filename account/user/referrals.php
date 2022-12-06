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
  <div class="col-lg-8">
                            <?php 
                            if (empty($users['username'])) { ?>
                           <a href="setting.php"><p class="text-muted mb-0"> لإستخراج رابط الإحالة الخاص بك إضغط هنا لتكمة البيانات وإضافة يوزرنيم  </p> </a>
                          <?php }else { ?>
                        <div class="text-center subcribe-form mb-2">
                                <input type="text" class="rounded-pill shadow" id="myInput" placeholder="<?=URL?>?code=<?=$users['username']?>" value="<?=URL?>?code=<?=$users['username']?>"  disabled required="">
                                <button  class="btn btn-pills btn-primary bbt" onclick="myFunction()" >نسخ</button>
                                <div class="divCody" style="color: cadetblue;font-size: 26px;margin: 4%;" > </div>
                        </div>
                        <?php } ?>
                        <div class="table-responsive bg-white shadow rounded mt-4">
                            <table class="table mb-0 table-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col" class="border-bottom p-3 text-center" style="max-width: 150px;">المستخدمين </th>
                                        <th scope="col" class="border-bottom p-3 text-center" style="width: 100px;">النقاط المكتسبة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                   $id =  $users['id'];
                                $sql = "SELECT * FROM referrals where UserId = '$id' AND  status = 1 " ;
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {  ?>
                                    <tr>
                                        <td class="text-center small p-3 h6"><?=NameUser($row['referralsID'])?></td>
                                        <td class="text-center small p-3"><?=$row['points']?></td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Profile Setting End -->

        <script> 
    $('.divCody').hide();

        function copyToClipboard(text) {
    var sampleTextarea = document.createElement("textarea");
    document.body.appendChild(sampleTextarea);
    sampleTextarea.value = text; //save main text in it
    sampleTextarea.select(); //select textarea contenrs
    document.execCommand("copy");
    document.body.removeChild(sampleTextarea);
}

function myFunction(){
    var copyText = document.getElementById("myInput");
    copyToClipboard(copyText.value);
    $('.bbt').hide().fadeOut();
    $('.divCody').html('تم النسخ بنجاح ').fadeIn();
    setTimeout(function() { 
        $('.bbt').show().fadeIn();
        $('.divCody').hide().fadeOut();
    }, 1000);
  

}
      </script>

<?php include '../../layout/footer.php'; ?>

   