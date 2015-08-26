<?php
/**
 * 打印数据，用于调试
 * @param var 打印对象
 */
function p($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";

}

/** 
 * author:10xjzheng
 * 发生邮件，服务器用smtp.163.com，可以在$mail->Host改配置
 * @param companyEmail string 公司邮箱/发生人邮箱
 * @param password  string 邮箱密码
 * @param companyName  string 公司名称
 * @param receiveEmail  string 收件人邮箱
 * @param receiveUser  string 收件人用户名
 * @param subject  string 主题
 * @param bodyurl  string 邮件内容
 * @return res  string 成功或失败
 */
function sendEmail($companyEmail,$password,$companyName,$receiveEmail,$receiveUser,$subject, $bodyurl){
    Vendor('PHPMailer.classphpmailer');
    $verify=explode("@",$companyEmail);
    $mail = new PHPMailer();    
    $mail->SMTPDebug=false ;
    $mail->IsSMTP();                  // send via SMTP    
    $mail->Host = "smtp.163.com";   // SMTP servers    
    $mail->SMTPAuth = true;           // turn on SMTP authentication    
    $mail->Username = $verify[0];     // SMTP username  注意：普通邮件认证不需要加 @域名  这里是我的163邮箱
    $mail->Password = $password ;// SMTP password    在这里输入邮箱的密码
    $mail->From = $companyEmail;      // 发件人邮箱    
    $mail->FromName = $receiveUser;  // 发件人    
    $mail->CharSet = "UTF-8";   // 这里指定字符集！    指定UTF-8后邮件的标题和发件人等等不会乱码，如果是GB2312标题会乱码   
    $mail->Encoding = "base64";    
    $mail->AddAddress($receiveEmail, $receiveUser);  // 收件人邮箱和姓名  
    $mail->AddReplyTo($companyEmail, $companyName);   
    $mail->IsHTML(true);  // send as HTML    
    // 邮件主题    
    $mail->Subject = $subject;
    // 邮件内容    
    $mail->Body =$bodyurl ;
    $mail->AltBody = "text/html";
    
    if (!$mail->Send()){
        $mail->ClearAddresses();
        $res= "邮件错误信息: " . $mail->ErrorInfo;
        return $res;
    }else{
        $mail->ClearAddresses();
        $res="发送成功";
        return $res;
    }
}  