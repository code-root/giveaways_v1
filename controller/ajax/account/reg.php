<?php
session_start();

include '../../function.php';
include '../../security-ajax.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $status = 0;

    if (empty($_POST['name']) && strlen($_POST['name'])  < 3 && empty($_POST['name']) == ' ' ) {
        $message = 'من فضلك أكمل الإسم';
        $code = 1;
        $status = 1;
    } else {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }


    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $message = 'لم تقم بإضافة  البريد الأكتروني ';
        $code = 3;
        $status = 1;
    } else {
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    }

    if (empty($_POST['password'])) {
        $message = 'لم تقم بإضافة  كلمة المرور ';
        $code = 4;
        $status = 1;
    } else {
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    }

    if (strlen($password)  < 7) {
        $message = 'يجب أن تكون كلمة المرور أكثر من 8  حروف  ';
        $code = 5;
        $status = 1;
    }

    $password =  sha1($password);
    if (!isset($email) == '') {
        $sql_email = "SELECT email FROM users WHERE email LIKE '%$email%' ";
        $result_email = $conn->query($sql_email);
        if ($result_email->num_rows > 0) {
            $message = 'هذا البريد اللإكتروني مسجل لدينا حاول مره أخرى ببريد إكتروني مختلف ';
            $code = 6;
            $status = 1;
        }
    }

  @ $UniqueMachineID =  UniqueMachineID();
  @ $getUserIP = getUserIP();

    $sql = "SELECT UniqueMachineID  FROM `ddos` where UniqueMachineID = '$UniqueMachineID' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $message = 'لايمكن التسجيل مرتين من نفس الجهاز';
        $code = 7;
        $status = 1;
    }

    $sql = "SELECT id  FROM `ddos` where id = '$getUserIP' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $message = 'لايمكن التسجيل مرتين من نفس IP';
        $code = 8;
        $status = 1;
    }

    if ($status == 0) {
        $TimeCheck = strtotime("now");
        $rand_set = rand_set();
        
        $namEexplode = explode(" ", $name);
        $username = $namEexplode[0]; // George 

        $username2 = validateInput($username).$rand_set; 
        $username = strtolower($username2);
        
        $sql = "SELECT username  FROM `users` where username = '$username' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $username = validateInput($username).$rand_set.'w'; 
        }
 
        $sql = "INSERT INTO `users` (`NameOne`, `NameTwo`, `number`, `email`, `username`, `password`
        , `status`, `date`, `img`, `gender`) 
        VALUES ('$name', '', NULL, '$email', '$username', '$password', 0, '$now', '', NULL);";
            
            if ($conn->query($sql) === TRUE) {
    
            $last_id = $conn->insert_id;   
            if (isset($_POST['CodeSignup'])) { 
                $CodeSignup = validateInput( $_POST['CodeSignup']); 
                if (GetIdOnUsername($CodeSignup) != false)  {
                   $UserIdCode =  GetIdOnUsername($CodeSignup);
                   $PointsUser = PointsUser($UserIdCode);
                   $PointsUser += $ReferralsDB ;
                   $sql = "UPDATE points SET points=$PointsUser WHERE UserId =$UserIdCode ";
                   $conn->query($sql);
             
                   $sql = "INSERT INTO `referrals` (`UserId`, `referralsID`, `points`, `date`, `status`) VALUES ('$UserIdCode', '$last_id', '$ReferralsDB', '$now', 1);";
                   $conn->query($sql);
                }
             }

            $sql = "INSERT INTO `info` ( `UserId`, `instagram`, `facebook`, `whatsapp`, `website`, `txt`) VALUES ('$last_id', NULL, NULL, NULL, NULL, NULL);";
            $conn->query($sql);
            

            $sql = "INSERT INTO `ddos` ( `UserId`, `ip`, `UniqueMachineID`, `date`, `status`) VALUES ('$last_id', '$getUserIP', '$UniqueMachineID', '$now', 1);";
            $conn->query($sql);


            $sql = "INSERT INTO `points` (`UserId`, `correct`, `Wrong`, `points`) VALUES ('$last_id', NULL, NULL, NULL);";
            $conn->query($sql);
            $mes = '<body>
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
                                  مرحبا '.$username.'
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
            </body> ';
            $from = $EmailFrom;
            $sub = ' رسالة تأكيد التسجيل Winn20';
            $to = $email;
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
                    $headers .= "From: " . ($name) . " <" . $from . ">" . PHP_EOL . "Reply-To: " . $from . "" . PHP_EOL;
            mail($to, $sub, $mes, $headers);
            $message = 'تم تسجيل البيانات بنجاح جاري تحويلك لتسجيل الدخول';
            $code = 200;
        } else {
            $code = 9;
            $message = 'ERROR #2';
        }
    }

    echo json_encode(['code' => $code, 'msg' => $message]);
} else {

    $msg = 'You do not have permission to view the content';
    echo json_encode(['code' => 'You do not have powers', 'Message' => $msg]);
    exit;
}
