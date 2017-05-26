<?php
namespace Common\Model;
use Think\Model;

/**
 * 角色类
 * @author  seven
 */
class RoleModel extends Model {
    private $_db;
    public function __construct(){
        $this->_db = M('Role');
    }

    //添加角色
    public function insertRole($data = array()){
        if (!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    //获取所有角色
    public function getAllRole(){
        return $this->_db->order('id desc')->select();
    }

    //获取状态正常的角色
    public function getRoleList(){
        return $this->_db->where('status=1')->order('id desc')->select();
    }

    //ID获取角色
    public function getRoleById($id){
        return $this->_db->where('id='.$id)->find();
    }

    //更新角色数据
    public function updateRoleById($id, $data=array()){
        if (!$id || !is_numeric($id)) {
            return 0;
        }
        if (!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->where('id='.$id)->save($data);
    }

}
