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
     * 生成二维码
    */
    public function sendEmail(){
        $companyEmail="****@163.com";
        $password="*****";
        $companyName="深圳器宇有限公司";
        $receiveEmail=I('email');
        $receiveUser=I('user');
        $subject="测试";
        $bodyurl="测试20140825";
        $res = sendEmail($companyEmail,$password,$companyName,$receiveEmail,$receiveUser,$subject,$bodyurl);
        $this->assign('res',$res);
        $this->display("/sendEmail");
    }
}