<?php
/**
 * Description: 基于ThinkPHP实现的权限管理系统
 */

class RbacAction extends CommonAction {

    //初始化操作
    function _initialize(){
        if(!IS_AJAX) $this->error('你访问的页面不存在，请稍后再试');
    }


    //用户列表
    public function index(){
        $db = M('user');

        //当前页码
        $pageNum = I('post.pageNum',1,'int');
        //每页显示条数
        $numPerPage = I('post.numPerPage',C("numPerPage"),'int');
        //总页码数
        $totalCount = $db->count();

        $this->totalCount = $totalCount;
        $this->numPerPage = $numPerPage;
        $this->items = D('UserRelation')->relation(true)->page($pageNum, $numPerPage)->select();
        $this->display();
    }

    //添加编辑用户弹层表单
    public function addUser(){
        //如果设置了uid，则为编辑用户，否则为增加用户
        $this->role = M('role')->where('status = 1')->field('id,name')->select();

        if(isset($_GET['uid'])) {
            $this->userinfo = M('user')->where( "id = $_GET[uid]" )->find();
        }
        $this->display();
    }

    //添加及编辑用户表单处理
    public function addUserHandler(){

        $db = M('user');
        if($_POST['id']) {
            //如果存在ID，即表示更新
            $data = array(
                'id' => I('post.id','','int'),
                'username' => I('username', '', 'string'),
                'status' => I('status','', 'int'),
                'remark' => I('remark'),
                'logintime' => time(),
                'loginip' => get_client_ip()
            );

            if($_POST['password']) $data['password'] = I('password','', 'md5');
            if($db->save($data)) {
                $roleuser = M('role_user');

                $roleuser->where("id = $data[id]")->delete();

                $roleuser->add(array(
                    'role_id' => I('role','','intval'),
                    'user_id' => $data[id]
                ));

                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'message' => '更新成功'
                ));
            } else {
                $this->ajaxReturn(array(
                    'statusCode' => 300,
                    'message' => '操作失败'
                ));
            }

            return ;
        }

        //添加表单处理
        $data = array(
            'username' => I('username', '', 'string'),
            'password' => I('password', '', 'md5'),
            'status' => I('status','', 'int'),
            'remark' => I('remark'),
            'logintime' => time(),
            'loginip' => get_client_ip()
        );
        if($uid = M('user')->add($data)) {
            $roleuser = M('role_user');

            $roleuser->where("id = $uid")->delete();

            $roleuser->add(array(
                'role_id' => I('role','','intval'),
                'user_id' => $uid
            ));

            $this->ajaxReturn(array(
                'statusCode' => 200,
                'message' => '操作成功',
                'navTabId' => '',
                'rel' => '',
                'callbackType' => '',
                'forwardUrl' => '',
                'confirmMsg' => ''
            ));
        } else {
            $this->ajaxReturn(array(
                'statusCode' => 300,
                'message' => '操作失败'
            ));
        }
    }

    //启用或禁用用户
    public function resume(){
        $id = I('get.id','0','int');
        $db = M('user');
        $status = $db->where("id = $id")->getField('status');
        $status = ($status == 1)? 0 : 1 ;
        if($db->where("id = $id")->setField('status', $status)){
            $this->ajaxReturn(array(
                'statusCode' => 1,
                'message' => '操作成功',
                'navTabId' =>$_GET['navTabId']
            ));
        } else {
            $this->ajaxReturn(array(
                'statusCode' => 0,
                'message' => '操作失败'
            ));
        }
    }

    //删除用户
    public function deleteUserHandler(){
        $id = I('get.uid',0,'int');
        if( M('user')->delete($id) ) {
            $this->ajaxReturn(array(
                'statusCode' => 1,
                'message' => '删除成功',
                'navTabId' => $_GET['navTabId']
            ));
        } else {
            $this->ajaxReturn(array(
                'statusCode' => 0,
                'message' => '删除成功',
                'navTabId' => $_GET['navTabId']
            ));
        }
    }

    //节点列表
    public function node(){
        $node = M('node')->where(array('status'=>1))->order('sort')->select();
        $this->node = node_merge($node);
        $this->display();
    }

    //添加及编辑节点弹层表单
    public function addNode(){
        //添加表单默认情况
        $this->info = array(
            'level' => I('get.level',1,'int'),
            'pid' => I('get.pid',0,'int'),
            'status' => 1,
            'sort' => 50
        );
        switch ($this->info['level']){
            case 1: {
                $this->label = "应用";
                break;
            }
            case 2: {
                $this->label = "控制器";
                break;
            }
            case 3: {
                $this->label = "方法";
                break;
            }
        }
        if($_GET['id']) {
            //编辑模式
            $this->info = M('node')->where(array('id'=>$_GET['id']))->find();
        }
        $this->display();
    }

    //添加及编辑节点表单处理
    public function addNodeHandler(){
        $id = $_POST['id'];
        $db = M('node');
        if($id) {
            //更新
            if($db->save($_POST)) {
                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'message' => '添加成功',
                    'navTabId' => $_GET['navTabId']
                ));
            } else {
                $this->ajaxReturn(array(
                    'statusCode' => 300,
                    'message' => '更新失败',
                    'navTabId' => $_GET['navTabId']
                ));
            }
        }else {
            //保存
            if($db->add($_POST)) {
                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'message' => '添加成功',
                    'navTabId' => $_GET['navTabId']
                ));
            } else {
                $this->ajaxReturn(array(
                    'statusCode' => 300,
                    'message' => '添加失败',
                    'navTabId' => $_GET['navTabId']
                ));
            }
        }
    }

    //删除节点
    public function deleteNodeHandler(){
        $id = I('get.id','0','int');
        $db = M('node');
        $data = $db->where(array('pid'=>$id))->field('id')->find();
        if($data) {
            $this->ajaxReturn(array(
                'statusCode' => 0,
                'message' => '你请求删除的节点存在子节点，不可直接删除'
            ));
        } else {
            if($db->delete($id)) {
                $this->ajaxReturn(array(
                    'statusCode'=> 1,
                    'message' => '删除成功'
                ));
            } else {
                $this->ajaxReturn(array(
                    'statusCode' => 0,
                    'message' => '删除失败'
                ));
            }
        }
        //if($data['level'] === 3)
    }

    //角色管理
    public function role(){
        $this->role = M('role')->select();
        $this->display();
    }

    //添加及编辑角色
    public function addRole(){
        if($_GET['rid']) {
            $id = I('get.rid',0,'int');
            $this->role = M('role')->find($id);
        }
        $this->display();
    }

    //添加角色表单处理
    public function addRoleHandler(){
        $db = M('role');
        if($_POST['id']) {
            //更新
            if($db->save($_POST)) {
                $this->ajaxReturn(array(
                    'statusCode'=> 200,
                    'message' => "角色信息更新成功"
                ));
            } else {
                $this->ajaxReturn(array(
                    'statusCode' => "300",
                    'message' => '角色信息更新失败'
                ));
            }
        } else {
            //添加表单处理
            if($db ->add($_POST)){
                $this->ajaxReturn(array(
                    'statusCode'=> 200,
                    'message' => "角色添加成功"
                ));
            }else {
                $this->ajaxReturn(array(
                    'statusCode' => 300,
                    'message' => '角色添加失败'
                ));
            }
        }
    }

    //删除角色
    public function deleteRole(){

    }

    //快束启用或楚用用户
    public function resumeRole(){
        $id = I('get.rid',0, 'int');
        $db = M('role');
        $status = $db->where("id = $id")->getField('status');
        $status = ($status == 1)? 0 : 1 ;
        if($db->where("id = $id")->setField('status', $status)){
            $this->ajaxReturn(array(
                'statusCode' => 1,
                'message' => '操作成功',
                'navTabId' =>$_GET['navTabId']
            ));
        } else {
            $this->ajaxReturn(array(
                'statusCode' => 0,
                'message' => '操作失败'
            ));
        }
    }


    //给用户添加节点权限
    public function access(){
        $rid = I('rid',0 ,'intval');
        $node = M('node')->where(array('status'=>1))->field(array('id','title','pid','name','level'))->order('sort')->select();

        //获取原有权限
        $access = M('access')->where("role_id = $rid")->getField('node_id',true);
        $this->node = node_merge($node,$access);
        $this->assign('rid',$rid)->display();
    }

    //添加节点权限表单处理
    public function accessHandler(){
        $rid = I('rid', '', 'intval');
        $db = M('access');
        //清空原有权限
        $db->where("role_id = $rid")->delete();

        //插入新的权限
        $data = array();

        foreach ($_POST['access'] as $v) {
            $tmp = explode('_', $v);
            $data[] = array(
                'role_id'=> $rid,
                'node_id'=> $tmp[0],
                'level'=>$tmp[1]
            );
        }
        if($db->addAll($data)) {
            $this->ajaxReturn(array(
                'statusCode'=> 200,
                'message' => '权限更新成功'
            ));
        } else {
            $this->ajaxReturn(array(
                'statusCode' => 300,
                'message' => '权限更新失败'
            ));
        }

    }
}
ThinkPHP中RBAC类的详解