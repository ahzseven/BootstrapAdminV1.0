<?php
namespace Common\Model;
use Think\Model;

/**前面控制器调用relation方法,所以
 * 关联表的话,use Think\Model后面一定要加Relation
 *
 * 对用户表的增删改查
 */
class UserModel extends Model{
	private $_db;

	public function __construct(){
		$this->_db = M('User');
	}
	//获取用户名
	public function getAdminByUsername($username=''){
		$result = $this->_db->where('username="'.$username.'"')->find();
		return $result;
	}
	//插入数据
	public function insert($data=array()){
		if (!$data || !is_array($data)) {
			return 0;
		}
		$data['password']     = getMd5Password($data['password']);
		$data['lastloginip']  = $_SERVER["REMOTE_ADDR"];
		$data['registertime'] = time();
		return $this->_db->add($data);
	}
	//获取所有用户
	public function getUsers($p, $perPage){
		if (!isset($perPage) || !is_numeric($perPage)) {
			return 0;
		}
		$result = $this->_db->table(array(
									C('DB_PREFIX').'user' => 'user',
									C('DB_PREFIX').'role'  => 'role',
									C('DB_PREFIX').'role_user'  => 'middle',
							)
					)
			->where('user.id = middle.user_id and role.id = middle.role_id' )
			->field('user.*,role.name')
			->order('id desc')
			->page($p, $perPage)
			->select();
		return $result;
	}
	//统计用户数量
	public function getCountUser(){
		return $this->_db->where('status=1')->count();
	}
	//获取需要编辑的数据
	public function getUserById($id){
		if(!isset($id) || !is_numeric($id)){
			return 0;
		}
		$where['id'] = $id;
		return $this->_db
			->join('cms_role_user on cms_user.id = cms_role_user.user_id')
			->where('id='.$id)
			->find();
	}
	//更新数据
	public function updateById($id, $data=array()){
		if (!isset($id) || !is_numeric($id)) {
			return 0;
		}
		if (!isset($data) || !is_array($data)) {
			return 0;
		}
		if ($data['password'] && isset($data['password'])) {
			$data['password']  = getMd5Password($data['password']);
		}

		return $this->_db->where('id='.$id)->save($data);
	}
	//设置用户状态
	public function setUserStatus($id, $data){
		if (!isset($id) || !is_numeric($id)) {
			return 0;
		}
		if (!isset($data) || !is_array($data)) {
			return 0;
		}
		return $this->_db->where('id='.$id)->save($data);
	}

	//获取用户名和年龄
	public function getNameAge(){
		return $this->_db->getField('age,username');
	}
}


