<?php
    include 'layout/header.php'; 
    echo HeaderTile ('لوحه النقاط') ;
    include 'layout/navbar.php'; 
   ?>
<div class="container mt-100 mt-60">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
  <?=$ads['ads_2']?>

                <h4 class="title mb-4">لوحه النقاط </h4>
                <p> win20 يتم عرض قائمه المتصدرين في مسابقه </p>
            </div>
        </div>
        <!--end col-->
    </div>
    <?=$ads['ads_4']?>

    <!--end row-->
    <div class="row">
    <?php 
        $sql = "SELECT UserId, points FROM points order by points desc  ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
  // output data of each row
  $x= 0 ;
  while($row = $result->fetch_assoc()) { $x++ ; ?>

                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="d-flex key-feature align-items-center p-3 rounded-pill shadow">
                            <div class="icon text-center rounded-circle me-3">
                            <img src="<?=GetAtarUsers($row['UserId'])?>" width="100%" height="100%" class="rounded-circle shadow d-block mx-auto" alt="">
                            </div>
                            <div class="flex-1">
                                <p><?=$x?></p>
                                <h4 class="title mb-0"> <?=NameUser($row['UserId'])?>  (<?=$row['points']?> نقطة)    </h4>
                            </div>
                        </div>
                    </div><!--end col-->

                    

   <?php }
} else {
  echo "0 results";
} ?>
  </div>
  <?=$ads['ads_3']?>

<!-- 
        <div class="col-12 text-center mt-4 pt-2">
            <a href="job-list-one.html" class="btn btn-primary">رؤيه المذيد من المتنافسين <i
                    class="uil uil-angle-right-b align-middle"></i></a>
        </div> -->
    </div>
    <!--end row-->
</div>
<?=$ads['ads_2']?>

<br>
<br>
<br>
<!--end container-->
<!-- Companies End -->
<?php include 'layout/footer.php'; ?>
