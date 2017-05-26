<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 权限管理类
 * author: seven
 */
class RbacController extends CommonController {
    /**
     * 处理角色相关数据
     */
    //处理*添加角色*表单数据
    public function addrole(){
        if($_POST){
            if(!$_POST['name'] || !isset($_POST['name'])){
                return show(0, '角色名称为空-_-#');
            }
            if(!$_POST['remark'] || !isset($_POST['remark'])){
                return show(0, '角色描述为空-_-#');
            }
            //检测到id,进入编辑模式;
            if ($_POST['id']) {
                return $this->saveEditRole($_POST);
            }
            $effect = D('Role')->insertRole($_POST);
            if ($effect) {
                return show(1, '新增角色成功');
            } else {
                return show(0, '新增角色失败');
            }
        }
        $this->display();
    }
    //显示角色列表
    public function rolelist(){
        $data = D('Role')->getAllRole();
        $this->assign('data',$data);
        $this->display();
    }
    //编辑角色
    public function editrole(){
        $id = $_GET['id'];
        if ($id) {
            $this->data = D('Role')->getRoleById($id);
            $this->display();
        } else {
            $this->error('页面不存在,稍后再试');
        }
    }
    //保存编辑角色
    public function saveEditRole($data){
        $id = $data['id'];
        unset($data['id']);
        $effect = D('Role')->updateRoleById($id, $data);
        if ($effect) {
            return show(1, '编辑角色成功');
        } else {
            return show(0, '编辑角色失败');
        }

    }
    //设置角色状态
    public function setStatus(){
        $id = $_POST['id'];
        unset($_POST['id']);
        if ($id) {
            $effect = D('Role')->updateRoleById($id, $_POST);
            if ($effect) {
                return show(1, '操作成功');
            } else {
                return show(0, '操作失败');
            }
        } else {
            return show(0, '操作失败,稍后再试');
        }
    }

   /**
    * 处理权限相关数据
    * @Author Seven
    * @Date   2017-05-01
    * @return [type]     [description]
    */
   //显示权限列表
    public function nodelist(){
        $data = D('Node')->getAllNode();

        //引用自定义无限极分类
        $tree = new \Org\Util\Treelist;
        $list = $tree->create($data);
        $this->assign('data', $list);
        $this->display();
    }
    //处理'添加权限'表单
    public function addnode(){
        if ($_POST) {
            if (!$_POST['name'] || !isset($_POST['name'])) {
                return show(0, '权限名称为空');
            }
            if (!$_POST['title'] || !isset($_POST['title'])) {
                return show(0, '中文名称为空');
            }
            if (!$_POST['sort'] || !is_numeric($_POST['sort'])) {
                return show(0, '类型顺序为空');
            }
            $effect = D('Node')->insertNode($_POST);
            if ($effect) {
                return show(1, '添加权限成功');
            } else {
                return show(0, '添加权限失败');
            }

        }
        $list = D('Node')->getNodeList();
        $this->assign('list', $list);
        $this->display();
    }
    //设置权限(节点)状态
    public function setNodeStatus(){
            $id = $_POST['id'];
            unset($_POST['id']);
            if ($id) {
                $effect = D('Node')->updateNodeById($id,$_POST);
                if ($effect) {
                    return show(1, '操作成功');
                } else {
                    return show(0, '操作失败');
                }
            } else {
                return show(0, '操作失败,稍后再试');
            }
    }
    //给角色配置权限
    public function access(){
        $id = $_GET['id'];
        //角色信息
        $role = D('Role')->getRoleById($id);
        //获取状态正常的权限(节点)
        $menu = D('Node')->getNodeByStatus();
        /**实例化自定义的类,定义类的时候加上namespace
          *引用的时候实例化类
          */
        $tree = new \Org\Util\Treelist;
        $array = $tree->create($menu);

        $data = array();//临时存放最新权限数组,包含选取权限的值
        $access = M('Access');
        foreach ($array as $value) {
            $where['role_id'] = $id;
            $where['node_id'] = $value['id'];
            $count = $access->where($where)->count();
            if ($count) {
                $value['access'] = 1;
            } else {
                $value['access'] = 0;
            }
            $data[]=$value;

        }

        $this->assign('data', $data);
        $this->assign('role', $role);
        $this->display();

    }

    public function saveAccess(){
        $id = $_POST['role_id'];
        $data = array();
        $access = M('Access');
        if (isset($_POST['access'])) {
            //添加新的权限之前先删除之前对应的权限
            $access->where('role_id='.$id)->delete();
            //遍历参数的值
            foreach ($_POST['access'] as $value) {
                //explode清除参数中的'_',拆分为数组
                $array = explode('_', $value);
                //role_id,node_id,level赋值到一个数组
                $data[] = array(
                    'role_id' => $id,
                    'node_id' => $array[0],
                    'level'   => $array[1],
                    );
            }
            //addAll保存转换后的多条数据;
            if($access->addAll($data)){
                return show(1,'配置成功');
            } else {
                return show('配置失败');
            }
        } else {
            return show('配置失败');
        }
    }
}