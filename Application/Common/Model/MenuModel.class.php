<?php
namespace Common\Model;
use Think\Model;
/**
 * 菜单方法
 */
class MenuModel extends Model {
	private $_db;
	public function __construct(){
		$this->_db = M('Menu');
	}
	//获取所有菜单
	public function getMenus($p, $perPage){
		if (!$perPage || !is_numeric($perPage)) {
			return 0;
		}
		$list = $this->_db->where('status=1')
			->order('menu_id')
			->page($p, $perPage)
			->select();
		return $list;
	}
	//统计所有正常菜单
	public function getCountMenus(){
		return $this->_db->where('status=1')->count();
	}
	//新增菜单
	public function insertMenu($data=array()){
		if (!$data || !isset($data)) {
			return 0;
		}
		$data['edittime'] = time();
		return $this->_db->add($data);
	}
	//获取对应菜单信息
	public function getMenuById($id){
		if (!$id || !isset($id)) {
			return 0;
		}
		return $this->_db->where('menu_id='.$id)->find();
	}
	//更新菜单
	public function updateMenu($id, $data){
		if (!$id || !is_numeric($id)) {
			throw_exception('没有提交ID');
		}
		if (!$data || !isset($data)) {
			throw_exception('没有提交数据');
		}
		$data['edittime'] = time();
		return $this->_db->where('menu_id='.$id)->save($data);
	}

	 public function setMenuStatus($id){
	 	if (!$id || !isset($id)) {
	 		return 0;
	 	}
	 	$data['status'] = -1;
	 	return $this->_db->where('menu_id='.$id)->save($data);
	 }
	 public function getMenusHome(){
		$list = $this->_db->where('status=1')
			->order('menu_id')
			->select();
		return $list;
	}
}
