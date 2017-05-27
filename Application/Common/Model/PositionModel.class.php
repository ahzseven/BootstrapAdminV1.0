<?php
namespace Common\Model;
use Think\Model;
/**
 * 用户表操作
 */
class PositionModel extends Model{
	private $_db;
	public function __construct(){
		$this->_db = M('Position');
	}

	//插入数据
	public function insert($data=array()){
		if (!$data || !is_array($data)) {
			throw_exception('没有提交数据');
		}
		$data['create_time'] = time();
		return $this->_db->add($data);
	}
	//获取所有数据
	public function getPosition(){
		$result = $this->_db->where('status=1')->order('id')->select();
		return $result;
	}

	//获取需要编辑的数据
	public function getPositionById($id){
		if(!isset($id) || !is_numeric($id)){
			return 0;
		}
		$where['id'] = $id;
		return $this->_db->where($where)->find();
	}
	//更新数据
	public function updateById($id, $data=array()){
		if (!isset($id) || !is_numeric($id)) {
			throw_exception('没有提交ID');
		}
		if (!isset($data) || !is_array($data)) {
			throw_exception('没有提交数据');
		}
		$where['id'] = $id;
		$data['update_time'] = time();
		return $this->_db->where($where)->save($data);
	}
	//设置状态为-1;
	public function setStatus($id){
		if (!isset($id) || !is_numeric($id)) {
			throw_exception('没有提交ID');
		}
		$data['id'] = $id;
		$data['status']   = -1;
		return $this->_db->save($data);
	}
	//获取推荐位名称
	public function getPositionName(){
		$list = $this->_db->where('status=1')->order('id')->select();
		return $list;
	}

}


