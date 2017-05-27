<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 继承公共类
 */
class UsersController extends CommonController {
    public function index(){
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $perPage = 10;
        $count = D('User')->getCountUser();

        $list = D('User')->getUsers($p, $perPage);

        /*实例化分页类*/
        $Page = new  \Think\Page($count, $perPage);
        /*分页样式定制*/
        $Page->setConfig('prev','上页');
        $Page->setConfig('next','下页');
        $Page->setConfig('first','首页');
        $Page->setConfig('last','末页');
        /*分页数据*/
        $show = $Page->show();

        $this->assign('page', $show);
        $this->assign('count',$count);
        $this->assign('data', $list);
        $this->display();
    }

    public function add(){
        if ($_POST) {
            if (!isset($_POST['username']) || !$_POST['username']) {
                return show(0, '账号为空!');
            }
            if (!isset($_POST['password']) || !$_POST['password']) {
                return show(0, '密码为空!');
            }
            if (strlen($_POST['username'])<5 || strlen($_POST['username'])>16) {
                return show(0, '账号长度5-16字符!');
            }
            if (strlen($_POST['password'])<5 || strlen($_POST['password'])>16) {
                return show(0, '密码长度5-16字符!');
            }
            if (!isset($_POST['realname']) || !is_string($_POST['realname'])) {
                return show(0, '姓名为空!');
            }
            if (!isset($_POST['age']) || !is_numeric($_POST['age'])) {
                return show(0, '年龄为空!');
            }
            if ($_POST['age']<15 || $_POST['age']>80) {
                return show(0, '年龄错误!');
            }
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            if (!isset($_POST['email']) || !$email) {
                return show(0, '邮箱错误!');
            }
            $res = D('User')->getAdminByUsername($_POST['username']);
            if ($res) {
                return show(0, '账号已注册!');
            }
            $adminId = D('User')->insert($_POST);
            if ($adminId) {
                $array['role_id'] = $_POST['role_id'];
                $array['user_id'] = $adminId;
                $result = M('Role_user')->where($array)->add();
                if (!$result) {
                    return show(1, '账号注册成功,角色分配错误');
                } else {
                    return show(1, '注册成功-_-');
                }
            }
            return show(0, '注册失败-_-#');
        }
        $this->display();
    }
    public function edit(){
        $id   = $_GET['id'];
        $data = D('User')->getUserById($id);
        $this->assign('data', $data);
        $this->display();
    }
    public function save(){
        if ($_POST) {
            //检查是否更改了密码
            if (strlen($_POST['password'])) {
                if (strlen($_POST['password'])<5 || strlen($_POST['password'])>16) {
                    return show(0, '密码长度5-16字符!');
                }
            } else {
                unset($_POST['password']);
            }
            if (!isset($_POST['realname']) || !is_string($_POST['realname'])) {
                return show(0, '姓名为空!');
            }
            if (!isset($_POST['age']) || !is_numeric($_POST['age'])) {
                return show(0, '年龄为空!');
            }
            if ($_POST['age']<5 || $_POST['age']>120) {
                return show(0, '年龄错误!');
            }
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            if (!isset($_POST['email']) || !$email) {
                return show(0, '邮箱错误!');
            }

            $id = $_POST['admin_id'];
            unset($_POST['admin_id']);
            $res = D('User')->updateById($id, $_POST);
            if ($res===false) {
                return show(0, '编辑失败:(');
            }
            return show(1, '编辑成功^_^');
        }

    }

    public function setStatus(){
        if ($_POST) {
            if (!$_POST['id'] || !isset($_POST['id'])) {
                return show(0, '没有提交数据:(');
            }
            $id = $_POST['id'];
            $result = D('User')->setUserStatus($id, $_POST);
            if ($result) {
                return show(1, '操作成功:)');
            }
            return show(0, '操作失败:(');
        }
    }


}