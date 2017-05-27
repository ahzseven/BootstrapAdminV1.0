<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;

class CommonController extends Controller {

    public function _initialize(){
        // parent::__construct();
        // $this->_init();
        if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
            $this->redirect('Login/login');
        }

        //获取角色名称赋值给变量,前台显示
        $this->list = D('Role')->getRoleList();

        $notAuth = in_array(MODULE_NAME, explode(',',C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME,C('NOT_AUTH_ACTION'));
        //验证权限
        if (C('USER_AUTH_ON') && !$notAuth) {
            if(!Rbac::AccessDecision()){
                $this->error('没有权限-_-##联系管理员',U('Login/login'));
            }
        }
    }

    /**
     * 初始化
     */
    private function _init(){
    	//如果已经登录
    	$isLogin = $this->isLogin();
    	if(!$isLogin){
    		//跳转到登录页面
    		$this->redirect('Login/login');
    	}
    }
    /**
     * 获取用户session信息
     */
    public function getLoginUser(){
    	return session('adminUser');
    }
    /**
     * 判断是否登录过
     */
    public function isLogin(){
    	$user = $this->getLoginUser();
    	if($user && is_array($user)){
    		return true;
    	}
    	return false;
    }

}