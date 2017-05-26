<?php
namespace Common\Model;
use Think\Model;
/**
 * 用户表操作
 */
class PositionContentModel extends Model{
	private $_db;
	public function __construct(){
		$this->_db = M('Position_content');
	}
	//获取用户名
	// public function getAdminByUsername($username=''){
	// 	$result = $this->_db->where('username="'.$username.'"')->find();
	// 	return $result;
	// }
	//插入数据
	public function insert($data=array()){
		if (!$data || !is_array($data)) {
			return 0;
		}
		if(!$data['create_time']){
			$data['create_time'] = time();
		}
		return $this->_db->add($data);
	}
	//获取所有数据
	public function getArticle($p, $perPage){
		if (!isset($perPage) || !is_numeric($perPage)) {
			return 0;
		}
		$where['status'] = array('neq', -1);
		$result = $this->_db->where($where)->order('id')->page($p, $perPage)->select();
		return $result;
	}
	//统计数据
	public function getCount(){
		return $this->_db->where('status=1')->count();
	}
	// //获取需要编辑的数据
	// public function getUserById($id){
	// 	if(!isset($id) || !is_numeric($id)){
	// 		return 0;
	// 	}
	// 	$where['admin_id'] = $id;
	// 	return $this->_db->where($where)->find();
	// }
	// //更新数据
	// public function upDate($id, $data=array()){
	// 	if (!isset($id) || !is_numeric($id)) {
	// 		return 0;
	// 	}
	// 	if (!isset($data) || !is_array($data)) {
	// 		return 0;
	// 	}
	// 	$where['admin_id'] = $id;
	// 	$data['password']  = getMd5Password($data['password'].C('MD5_PRE'));
	// 	//$data['lastloginip']   = $_SERVER["REMOTE_ADDR"];
	// 	//$data['lastlogintime'] = time();
	// 	return $this->_db->where($where)->save($data);
	// }
	// //删除用户
	// public function deleteUsername($id){
	// 	if (!isset($id) || !is_numeric($id)) {
	// 		return 0;
	// 	}
	// 	$data['admin_id'] = $id;
	// 	$data['status']   = -1;
	// 	return $this->_db->save($data);
	// }

}


