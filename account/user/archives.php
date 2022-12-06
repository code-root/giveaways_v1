<?php
include '../../layout/header.php' ; 
include 'layout/isLoginUser.php';
include '../../layout/navbar.php'; 
include 'layout/section.php'; 
$x = 0 ;
?>
                    <div class="col-lg-8 col-12">
                        <div class="rounded shadow p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">أرشيف الأسئلة </h5>
                            </div>
                            <div class="row">
            <?php $sql = "SELECT DISTINCT sectionID  FROM record_answers where UserId = '$customerId' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {  $x++ ; ?>
                                <div class="col-md-6 mt-4 pt-2">
                                    <a href="result.php?sectionID=<?=$row['sectionID']?>">
                                        <div class="card rounded shadow bg-light border-0">
                                            <div class="card-body">
                                                <div class="mt-4">
                                                    <h5 class="text-dark"> <?=NameSection($row['sectionID'])?> </h5>
                                                    <h4 class="title mb-0 ">  عرض الأرشيف </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div><!--end col-->
                              <?php }  } ?>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Profile End -->
        <?php include '../../layout/footer.php'; ?>
