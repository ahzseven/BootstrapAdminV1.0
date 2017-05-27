<?php
namespace Common\Model;
use Think\Model;

/**
 * 权限类
 * @author  seven
 */
class NodeModel extends Model {
    private $_db;

    public function __construct(){
        $this->_db = M('Node');
    }

    //添加权限(节点)
    public function insertNode($data=array()){
        if (!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    //获取所有权限(节点)
    public function getAllNode(){
        return $this->_db->select();
    }

    //获取level != 3的层级
    public function getNodeList(){
        return $this->_db->where('level!=3')->order('sort')->select();
    }

    //设置权限(节点)状态
    public function updateNodeById($id, $data=array()){
        if (!$id || !is_numeric($id)) {
            return 0;
        }
        if (!$data || !is_array($data)) {
            return 0;
        }
        return  $this->_db->where('id='.$id)->save($data);
    }

    //获取status=1的权限(节点)
    public function getNodeByStatus(){
        return $this->_db->where('status=1')->order('sort')->select();
    }

}
