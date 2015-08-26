# thinkphpEmail

##thinkphp+PHPMailer发邮件
###使用方法
1.添加PHPMailer文件夹到Thinkphp/Library/Vendor，PHPMailer这里我只留了三个文件；

2.调用Application/Common/function.php的sendEmail函数

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
 
