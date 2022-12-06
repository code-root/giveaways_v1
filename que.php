<?php
    include 'layout/header.php'; 
    echo HeaderTile ('بنك الاسئلة') ;
    include 'layout/navbar.php'; 
   
   ?>
<!-- Shape Start -->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!--Shape End-->
    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
  <?=$ads['ads_3']?>

                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4">بنك الاسئلة </h4>
                        <p> win 20 اكبر بنك اسئله في العالم العربي فقط اختار المجموعه المناسبه لك لتحصيل اكبر عدد من النقاط ولتتمكن من الربح </p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
            <?php  $sql = "SELECT * FROM `section` where status = 0   ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $functionID =$row['id']; ?>
                            <div class="col-md-3 mt-4 pt-2">
                                <div class="card blog rounded border-0 shadow">
                                    <div class="card-body content">
                                        <h5><a href="javascript:void(0)" class="card-title title text-dark"><?=$row['name']?></a></h5>
                                        <div class="post-meta d-flex justify-content-between mt-3">
                                            <h6>عدد الأسئلة : <?=GetCount($row['rand'])?></h6>
                                    <a href="account/user/contest-started.php?code=<?=$row['rand']?>" class="text-muted readmore">دخول  <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                                </div>
                            </div><!--end col-->
                         <?php } } ?>
                </div>
                <!--end col-->


                <?=$ads['ads_3']?>

            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    
<?php include 'layout/footer.php'; ?>
      