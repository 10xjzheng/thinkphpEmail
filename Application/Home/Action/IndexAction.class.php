<?php
namespace Home\Action;

class IndexAction extends BaseAction {
	/**
	 * 跳到首页
	 */
    public function index(){
        $this->display("/index");
    }
    /**
     * 发送邮件
    */
    public function sendEmail(){
        $companyEmail="@163.com";
        $password="*****";
        $companyName="****有限公司";
        $receiveEmail=I('email');
        $receiveUser=I('user');
        $subject="测试";
        $bodyurl="测试20140825";
        $res = sendEmail($companyEmail,$password,$companyName,$receiveEmail,$receiveUser,$subject,$bodyurl);
        $this->assign('res',$res);
        $this->display("/sendEmail");
    }
}