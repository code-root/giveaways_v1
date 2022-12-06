<?php
session_start();
include '../function.php';
include '../security-ajax.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $message = '';
    $code = 0;
    $status = 0;
    
    if (!filter_var($_POST['email'], FILTER_SANITIZE_STRING)) {
        $message = 'لم تقم بإضافة  البريد الأكتروني ';
        $code = 3;
        $status = 1;
    } else {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    }

    $sql = "SELECT * FROM users  where email = '$email' ";
    $result = $conn->query($sql);
    if ($result->num_rows ==  0) {
        $message = 'الإميل غير مسجل .. تأكد من الإميل ثم عاود المحاولة ';
        $code = 2;
        $status = 1;
    }

    if ($status == 0) {
        $get = $result->fetch_assoc();
        $rand_user =  $get['id'];
        $email =  $get['email'];
        $username =  $get['username'];
        $now =  strtotime("+12 hours");
        $key = md5(2418 * 2);
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = $key . $addKey;

        $sql = "INSERT INTO password_reset_temp (UserID, kay, ex_date ,status)
                                        VALUES ('$rand_user', '$key', '$now' , 0)";

        if ($conn->query($sql) === TRUE) {
            $message = 'تم إرسال رسالة إعادة تغير كلمة المرور على البريد من فضلك قم بفتح البريد الأكتروني وإعادة الباسورد';
            $code = 200;
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
                                <a href="'.url_acc().'change-Password.php?code='.$key.'" style="padding: 8px 20px; outline: none; text-decoration: none; font-size: 16px; letter-spacing: 0.5px; transition: all 0.3s; font-weight: 600; border-radius: 6px; background-color: #2f55d4; border: 1px solid #2f55d4; color: #ffffff;">إضغط هنا لتغير كلمة المرور</a>
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
            // PHPMailer True
            $to = $email;

            $from = $EmailFrom;
            $name = 'win20 - Reset ';
            $from = $EmailFrom;
            $sub = 'رسالة إستعادة كلمة المرور - win20';
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
        }
    }
    
    echo json_encode(['code' => $code, 'msg' => $message]);

} else {

    echo '<meta http-equiv="refresh" content="2;url='.URL.'">';
    echo error_page('جاري تحويلك ') ;
}


function adopt($text)
{
    return '=?UTF-8?B?' . Base64_encode($text) . '?=';
}
