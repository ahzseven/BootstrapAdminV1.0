<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;
/**
 * 用户登录操作
 */
class LoginController extends Controller {
    public function login(){
    	if (session('adminUser')) {
    		$this->redirect('Index/index');
    	}
        $this->display();
    }

    public function check(){
        if ($_POST) {
        	$username = $_POST['username'];
        	$password = $_POST['password'];

        	if (!trim($username)){
        		return show(0, '用户名为空');
        	}
        	if (!trim($password)) {
        		return show(0, '密码为空');
        	}
        	$result = D('User')->getAdminByUsername($username);
        	if ($result['password'] != getMd5Password($password)) {
        		return show(0, '用户名或密码错误?_?');
        	}
            if ($result['status'] != 1) {
                return show(0, '用户关进小黑屋-_-#');
            }
            //更新ip,时间,登录次数
            $arr['lastloginip'] = get_client_ip();
            $arr['lastlogintime'] = time();
            $arr['count'] = intval($result['count']) + 1;
            M('User')->where('id='.$result['id'])->save($arr);

        	session('adminUser', $result);
            //保存uid
            session(C('USER_AUTH_KEY'),$result['id']);
            //识别管理员
            if ($_SESSION['adminUser']['username'] == C('RBAC_SUPERADMIN')) {
                session(C('ADMIN_AUTH_KEY'),true);
            }
            //session保存权限
            Rbac::saveAccessList();

            return show(1, '登录成功^_^');
        } else {
            $this->redirect('Login/login');
        }
    }

    public function logout(){
    	// session('adminUser', null);
        // session_unset();
        $_SESSION = array();
        session_destroy();
    	$this->redirect('Login/login');
    }
}