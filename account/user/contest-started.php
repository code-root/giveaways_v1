<?php
include '../../layout/header.php';
include 'layout/isLoginUser.php';

if (isset($_SESSION['countQQQ'])) {
    $_SESSION['countQQQ'] + 1;
}else {
    $_SESSION['countQQQ'] = 1 ;
}
// $_SESSION['countQQQ'] = 1;
//  echo strtotime('2021/9/08') ;

if ($users['complete'] == 0) {
    $msg =  'يرجى تفعيل البريد الأكتروني للدخول للمسابقة .. جاري إرسال رسالة التفعيل مرة أخرى ..';
$UniqueMachineID = GETUniqueMachine($users['id']);
$mes = '
<div style="margin-top: 50px;">
<table cellpadding="0" cellspacing="0" style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
   <thead>
       <tr style="background-color: #2f55d4; padding: 3px 0; border: none; line-height: 68px; text-align: center; color: #fff; font-size: 24px; letter-spacing: 1px;">
           <th scope="col"><img src="images/logo-light.png" height="24" alt=""></th>
       </tr>
   </thead>

   <tbody>
       <tr>
           <td style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
             مرحبا '.$users['NameOne'].'
           </td>
       </tr>
       <tr>
           <td style="padding: 15px 24px 15px; color: #8492a6;">
           شكرا لإنشاء حساب win20. للمتابعة ، يرجى تأكيد عنوان بريدك الإلكتروني بالنقر فوق الزر أدناه:
                               </td>
       </tr>

       <tr>
           <td style="padding: 15px 24px;">
               <a href="'.url_acc().'ConfirmEmail.php?code='.$UniqueMachineID.'" style="padding: 8px 20px; outline: none; text-decoration: none; font-size: 16px; letter-spacing: 0.5px; transition: all 0.3s; font-weight: 600; border-radius: 6px; background-color: #2f55d4; border: 1px solid #2f55d4; color: #ffffff;">Confirm Email Address</a>
           </td>
       </tr>

       <tr>
           <td style="padding: 15px 24px 0; color: #8492a6;">
           سيكون هذا الرابط نشطًا لمدة 30 دقيقة من وقت إرسال هذا البريد الإلكتروني.
               </td>
       </tr>

       <tr>
           <td style="padding: 15px 24px 15px; color: #8492a6;">
               Win20 <br> Support Team
           </td>
       </tr>

       <tr>
           <td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
               © <script>document.write(new Date().getFullYear())</script> Win20.
           </td>
       </tr>
   </tbody>
</table>
</div>
<!-- Hero End -->
</body>';
$from = $EmailFrom;
$sub = ' رسالة إعادة تأكيد التسجيل Winn20';
$to = $users['email'];
// PHPMailer True
$headers  = "MIME-Version: 1.0\n";
//// Html Letter 
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//// PHPMailer True
$headers .= "X-Mailer: PHP/" . phpversion();
$headers .= "X-Facebook-Notify: account_reactivation; mailid=9ce6218G2dd50372G0G158G3452e4b1
            X-FACEBOOK-PRIORITY: 0
            X-Auto-Response-Suppress: All" . "\r\n";
$headers .= "X-Mailer: Microsoft Office Outlook, Build 17.551210\n";
$headers .= "X-Mailer: Gmail \n";
$headers .= "X-Mailer: Yahoo \n";
$headers .= "X-Mailer: mail.ru \n";
$headers .= "From: " . ($users['NameOne']) . " <" . $from . ">" . PHP_EOL . "Reply-To: " . $from . "" . PHP_EOL;
@ mail($to, $sub, $mes, $headers);
echo '<META HTTP-EQUIV="refresh" CONTENT="5;URL=index.php">';
echo error_page($msg);
}
if (!isset($_GET['code'])) {
    echo '<META HTTP-EQUIV="refresh" CONTENT="0.5;URL=index.php">';
    echo error_page('404 الصفحة غير موجودة');
} else {
    $code = filter_var($_GET['code'], FILTER_SANITIZE_STRING);
    $status = 0;
    $CountQuestion = 0;
    $CountQuestionDB =  CountQuestion($customerId, $code);
    $CountQuestion =  $MaximumShare - $CountQuestionDB;
    $msg = 'تم إجتياز هذة المسابقة بنجاح ..';
    //$msg .= 'مسموح بإجتيار المسابقة ('.$MaximumShare.') كل 24 ساعه'; 
    $_SESSION['timeRE'] = $timerDB;
    $timerDB =   $_SESSION['timeRE'];
    $customerId = validateInput($_SESSION['customerId']);

    $sql = "SELECT id FROM `question` where  sectionID = '$code' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $status = 1;
        $msg = 'الصفحة غير موجودة';
    }
    $sql_record = "SELECT * FROM record where UserId = '$customerId ' AND  sectionID = '$code' order by id desc ";
    $recordRE = $conn->query($sql_record);
    if ($recordRE->num_rows == 0) {
        $recordID =  InsertRecord($customerId, $code);
        $status = 0;
    } else {
        $record = $recordRE->fetch_assoc();
        $statusRecord = $record['status'];
        $recordID = $record['id'];
        // $DateOne = $record['date'];
        // $dateTWO = strtotime("+1 Day" ,$DateOne);
        // $DateOneDay = strtotime("+1 Day");
        if ($statusRecord == 1) {
            if ($CountQuestion <= 0) {
                $status = 1;
            } else {
                $recordID =  InsertRecord($customerId, $code);
                $status = 0;
            }
        }
        if ($CountQuestion < 0) {
            $status = 1;
        }
        if ($status == 0) {
            $NotQuestion =  NotQuestion($customerId, $recordID);
            $sql_question = "SELECT * FROM question where sectionID = '$code' AND  status = 0   $NotQuestion  ORDER BY rand() LIMIT 1 ";
            $result = $conn->query($sql_question);
            if ($result->num_rows == 0) {
                $status = 1;
            } else {
                include '../../layout/navbar.php';
                include 'layout/s.php';
                $row = $result->fetch_assoc();
            }
        }
    }
    if ($status == 1) {
        $sql = "UPDATE record SET status= 1 WHERE id=$recordID";
        $conn->query($sql);
        echo '<META HTTP-EQUIV="refresh" CONTENT="2.5;URL=PageQuestion.php?code=' . $code . '&case=5">';
        echo error_page($msg);
    }
    $_SESSION['recordID'] = $recordID;
}
if (empty($row['id'])) { 
        echo '<META HTTP-EQUIV="refresh" CONTENT="2.5;URL=contest-started.php?code=' . $code . '&case=9">';
        echo error_page('Win 20');
   }
?>
<link href="acc.css" rel="stylesheet" type="text/css" />
<div class="col-lg-8 col-12">
<div class="back"><?=$ads['ads_3']?></div>
                        <div class="back2"> <?=$ads['ads_3']?></div>
    <form id='contest-started'>
        <div class="rounded shadow mt-4" style="background: #dee2e6;">
            <div class="p-4 border-bottom">
                <input class="Count " type="txt" value="<?= $row['count'] ?>" name="Count" hidden>
                <input class="questionID" type="txt" value="<?= $row['id'] ?>" name="questionID" hidden>
                <input class="code" type="txt" value="<?= $code ?>" name="code" hidden>
                <p style="background: #c3c7ca;text-align: center;"><strong class="str1"><?=$_SESSION['countQQQ']?></strong>/10</p>
                <p style="text-align: center; color:#198754 "> عدد مرات المتبقية للمشاركة اليومية في المسابقة <strong> <?= $CountQuestion ?> </strong></p>
                <!-- <p style="text-align: center; color:brown "> إسم القسم : <strong> <?= GetNameSection($code) ?> </strong></p> -->
                <h5 class="mb-0 NameQuestion" style="text-align: center; "> <strong class="str1" ><?=$_SESSION['countQQQ']?></strong> . <?= $row['name'] ?> .. ؟ </h5>
            </div>
            <div id="countdown">
                <div id="countdown-number"></div>
                <svg>
                    <circle r="18" cx="20" cy="20"></circle>
                </svg>
            </div>
            <div class="p-4 qn">

            <label class="d-flex justify-content-between  qu pb-4 labl">
                    <input class="form-check-input" class="clickable" type="radio" value="One" name="radioID" hidden>
                    <div>
                        <h6 class="mb-0 NameOne"><?= $row['One'] ?>&nbsp; &nbsp; &nbsp; <strong class="spanA">A</strong></h6>
                    </div>
                </label>

                <label class="d-flex justify-content-between  qu pb-4 labl">
                    <input class="form-check-input" class="clickable" type="radio" value="Two" name="radioID" hidden>
                    <div>
                        <h6 class="mb-0 NameOne"><?= $row['Two'] ?>&nbsp; &nbsp; &nbsp; <strong class="spanA">B</strong></h6>
                    </div>
                </label>

                <label class="d-flex justify-content-between  qu pb-4 labl">
                    <input class="form-check-input" class="clickable" type="radio" value="three" name="radioID" hidden>
                    <div>
                        <h6 class="mb-0 NameOne"><?= $row['three'] ?>&nbsp; &nbsp; &nbsp; <strong class="spanA">C</strong></h6>
                    </div>
                </label>

                <label class="d-flex justify-content-between  qu pb-4 labl">
                    <input class="form-check-input" class="clickable" type="radio" value="four" name="radioID" hidden>
                    <div>
                        <h6 class="mb-0 NameOne"><?= $row['four'] ?>&nbsp; &nbsp; &nbsp; <strong class="spanA">B</strong></h6>
                    </div>
                </label>

                <button type="submit" class="btn btn-primary">السؤال التالي <i class="uil uil-angle-right-b align-middle"></i>
                </button>
            </div>
    </form>
</div>

</div>
<!--end col-->
</div>
<!--end row-->

</div>
<!--end container-->

</section>
<!--end section-->
<!-- Profile End -->
<?php include '../../layout/footer.php'; ?>
<script>

$('#contest-started').on("cut copy paste", function (e) {
      e.preventDefault();
  });

    $(function() {

        
        $('#contest-started').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../../controller/ajax/account/contest-started.php',
                data: $('#contest-started').serialize(),
                dataType: 'json',
                success: function(data) {

                    if (data.case == 1) {
                        window.location.href = 'PageQuestion.php?code=<?= $code ?>&case=1';
                    } else {
                        window.location.href = 'PageQuestion.php?code=<?= $code ?>&case=2';
                    }

                    if (data.code == 5) {
                        swal(data.msg, data.msgEND, "success", {
                            button: "حسنا ",
                        });
                        setTimeout(function() {
                            window.location.href = 'result.php?sectionID=' + data
                                .sectionID;
                        }, 1000);


                    }

                    $('.str1').html(data.countQQQ).fadeIn(3);
                    $('.NameOne').html(data.NameOne).fadeIn(3);
                    $('.NameTwo').html(data.NameTwo).fadeIn(3);
                    $('.NameThree').html(data.NameThree).fadeIn(3);
                    $('.NameFour').html(data.NameFour).fadeIn(3);
                    $('.questionID').val(data.questionID);
                    $('.NameQuestion').html(data.NameQuestion).fadeIn(3);
                    $('.Count').val(data.Count);
                    $('.code').val(data.sectionID);

                    console.log(data);
                }
            });
        });
    });


    var countdownNumberEl = document.getElementById('countdown-number');
    var countdown = <?= $timerDB ?>;
    var countTime = <?= $timerDB ?>;
    countdownNumberEl.textContent = countdown;
    setInterval(function() {
        countdown = --countdown <= 0 ? countTime : countdown;
        if (countdown <= 1) {
            window.location.href = 'PageQuestion.php?code=<?= $code ?>&case=3';
            $.ajax({
                type: 'post',
                url: '../../controller/ajax/account/contest-started.php',
                data: $('#contest-started').serialize(),
                dataType: 'json'
            })
        }
        countdownNumberEl.textContent = countdown;
    }, 1000);
</script>