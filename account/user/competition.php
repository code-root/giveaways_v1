<?php include '../../layout/header.php' ; 
include 'layout/isLoginUser.php';
include '../../layout/navbar.php'; 
include 'layout/s.php'; 
?>


                    <div class="col-lg-8 col-12">
                        <div class="back"><?=$ads['ads_3']?></div>
                        <div class="back2"> <?=$ads['ads_3']?></div>
<!-- <img class="back" src="<?=url_assets()?>back.gif">
<img class="back2" src="<?=url_assets()?>back2.png"> -->
                        <div class="rounded shadow p-4">
                        <h5 class="mt-4 mb-0">أقسام الأسئلة </h5>
                        <div class="row">
                    <?php  
            $sql = "SELECT * FROM `section` where status = 0   ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $functionID =$row['id']; ?>
                            <div class="col-md-6 mt-4 pt-2">
                                <div class="card blog rounded border-0 shadow">
                                    <div class="card-body content">
                                        <h5><a href="javascript:void(0)" class="card-title title text-dark"><?=$row['name']?></a></h5>
                                        <div class="post-meta d-flex justify-content-between mt-3">
                                            <h6>عدد الأسئلة : <?=GetCount($row['rand'])?></h6>
                                    <a href="contest-started.php?code=<?=$row['rand']?>" class="text-muted readmore">دخول  <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                                </div>
                            </div><!--end col-->
                         <?php } } ?>
                        </div><!--end row-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
            
        </section><!--end section-->
        <!-- Profile End -->
        <?php include '../../layout/footer.php'; ?>
