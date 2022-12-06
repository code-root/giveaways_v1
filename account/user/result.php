<?php include '../../layout/header.php' ; 
include 'layout/isLoginUser.php';



$sectionID = null ;
$sectionID = filter_var($_GET['sectionID'], FILTER_SANITIZE_STRING);
$customerId = validateInput($_SESSION['customerId']);
$sql = "SELECT *  FROM record_answers where UserId = '$customerId' AND sectionID = '$sectionID'  ";
 $result = $conn->query($sql);
if ($result->num_rows == 0) {
    echo '<META HTTP-EQUIV="refresh" CONTENT="0.5;URL=competition.php">';
    echo error_page('404 الصفحة غير موجودة') ;
} else { 
include '../../layout/navbar.php'; 
include 'layout/s.php'; 
$x = 0 ;
$scc = 0 ;
$err = 0 ;
    ?>
        
                    <div class="col-lg-8 col-12">
                    <div class="back"><?=$ads['ads_3']?></div>
                        <div class="back2"> <?=$ads['ads_4']?></div>
                        <div class="rounded shadow p-4">
                            <div class="d-flex align-items-center justify-content-between"><h5 class="mb-0">  نتائج السؤال : <strong> <?=NameSection($sectionID)?>  </strong></h5></div>
                            <div class="row">

                       <?php while($row = $result->fetch_assoc()) {  $x++ ;
                       
     $GetCorrect = GetCorrect($row['questionID']);
     $answer = $row['answer'];
     
         if ($GetCorrect == $answer  ) {
            $style = 'style="background-color: #28a745a6;"';
            $caseAnswer = 1 ;
            $scc ++;
        }else {
            $err ++ ;
            $caseAnswer = 0 ;

            $style = 'style="background-color: #e43f52ad;"';
        }

                      $GetCorrect = GetCorrect($row['questionID']) ;
                        ?>  
    
           <?php  } } $conn->close(); ?>
                         <div class="row mt-4">
                                    <div class="col-6 text-center" style="background-color: #28a745a6;">
                                        <!-- <i data-feather="user-plus" class="fea icon-ex-md text-primary mb-1"></i> -->
                                        <h5 class="mb-0"><?=$scc?></h5>
                                        <p class="text-muted mb-0">إجابات صحيحة</p>
                                    </div><!--end col-->

                                    <div class="col-6 text-center" style="background-color: #e43f52ad;">
                                        <!-- <i data-feather="users" class="fea icon-ex-md text-primary mb-1"></i> -->
                                        <h5 class="mb-0"><?=$err?></h5>
                                        <p class="text-muted mb-0">إجابات خاطئة </p>
                                    </div><!--end col-->
                                    <div class="col-sm-12 mb-3">
                                    <a href="index.php" class="btn btn-primary" style="margin: 46px;"> الرئيسية </a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Profile End -->
        <?php include '../../layout/footer.php';  
        /*
                <!-- <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow" <?=$style?> > 
                    <p><?=$x?></p>
                    <div class="flex-1 ms-3">
                        <h4 class="title mb-0 text-dark"> <?=NameQuestion($row['questionID'])?></h4>
                   <?php if ($caseAnswer == 1 ) { ?>
                        <p class="text-muted mb-0">الإجابة الصحيحة : <strong><?=GetNameQuestion($GetCorrect ,$row['questionID'])?> </strong></p>
                <?php } else { ?>
                    <p class="text-muted mb-0">الإجابة الصحيحة : <strong><?=GetNameQuestion($GetCorrect ,$row['questionID'])?> </strong></p>
                    <p class="text-muted mb-0"> إجابتك : <strong> <?=GetNameQuestion($answer ,$row['questionID'])?> </strong></p>
           <?php  }  ?>
                    </div>
                </div>
        </div> -->
        */?>
