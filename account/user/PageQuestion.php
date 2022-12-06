<?php include '../../layout/header.php' ; 
include 'layout/isLoginUser.php';
include '../../layout/navbar.php'; 
include 'layout/s.php'; 
$code = null ;
$code = filter_var($_GET['code'], FILTER_SANITIZE_STRING);
$case = filter_var($_GET['case'], FILTER_SANITIZE_STRING);
$CountQuestionDB =  CountQuestion($customerId , $code);
$CountQuestion =  $MaximumShare - $CountQuestionDB  ;

$msg5 = 'تم إجتياز هذة المسابقة بنجاح <span style="color: #e43f52ad;" >' . $CountQuestionDB . '</span> مرة <br>';
$msg5 .= 'مسموح بإجتيار المسابقة  (<span style="color: #e43f52ad;" >'.$MaximumShare.'</span>) مرة كل 24 ساعه'; 


?>
        
                    <div class="col-lg-8 col-12">
                    <div class="back"><?=$ads['ads_3']?></div>
                        <div class="back2"> <?=$ads['ads_3']?></div>

                        <div class="rounded shadow p-4" style="position: relative;height: 87%;top: -15%;">
                            <div class="d-flex align-items-center justify-content-between"><h5 class="mb-0">    </strong></h5></div>
                            <div class="row">
                            <div class="row mt-4">
                            <?php if ($case == 1 ) { ?>
                                <div class="col-12 text-center" style="margin-top: 19%;background-color: #28a745a6;">
                                        <h5 class="mb-0">إجابات صحيحة</h5>
                                        <p class="text-muted mb-0"></p>
                                    </div><!--end col-->
                            <?php    } ?>

                            <?php if ($case == 2 ) { ?>
                                <div class="col-12 text-center" style="margin-top: 19%; background-color: #e43f52ad;">
                                        <h5 class="mb-0">إجابات خاطئة </h5>
                                    </div><!--end col-->
                            <?php    } ?>
                            <?php if ($case == 5 ) { ?>
                                <div class="col-12 text-center" style="margin-top: 19%; background-color: #28a745a6;">
                                        <h5 class="mb-0"><?=$msg5?></h5>
                                    </div><!--end col-->
                            <?php    } ?>
                            <?php if ($case == 3 ) { ?>
                                <div class="col-12 text-center" style="margin-top: 19%; background-color: #e43f52ad;">
                                        <h5 class="mb-0">إنتهى وقت السؤال</h5>
                                    </div><!--end col-->
                            <?php    } ?>
                            <?php if ($case == 5 ) { ?>
                                <?php if ($CountQuestionDB < $MaximumShare) { ?>
<a href="contest-started.php?code=<?=$code?>" class="btn btn-info" style="margin-top: 4%;">إعادة المسابقة<i class="uil uil-angle-right-b align-middle"></i> </a>
                             <?php   } ?>
<a href="result.php?sectionID=<?=$code?>" class="btn btn-info" style="margin-top: 4%;">معرفة نتيجة المسابقة  <i class="uil uil-angle-right-b align-middle"></i> </a>
<a href="<?=url_acc()?>user/" class="btn btn-primary" style="margin-top: 4%;">الرئيسية <i class="uil uil-angle-right-b align-middle"></i> </a>
<br>
                                 
                            <?php    }else {?>
                                <a href="contest-started.php?code=<?=$code?>" class="btn btn-primary" style="margin-top: 4%;">متابعة <i class="uil uil-angle-right-b align-middle"></i> </a>
                                    <br>
                                    <br>
                          <?php   } ?>
                            <!-- <img class="back2" src="<?=url_assets()?>back2.png" style="width: 100%;right: 3%;top: 4%;"> -->
                
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Profile End -->
        <?php include '../../layout/footer.php';  ?>
