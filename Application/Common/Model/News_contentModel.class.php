<?php
namespace Common\Model;
use Think\Model;
/**
 * 用户表操作
 */
class News_contentModel extends Model{
	private $_db;
	public function __construct(){
		$this->_db = M('News_content');
	}
	/**
	 * [insert description]
	 * @htmlspecialchars()  转换html标签
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public function insert($data=array()){
		if (!$data || !is_array($data)) {
			return 0;
		}
		//创建时间
		$data['create_time'] = time();
		//如果编辑器有内容,转换html标签
		if (isset($data['content']) && $data['content']) {
			$data['content'] = htmlspecialchars($data['content']);
		}
		return $this->_db->add($data);
	}
	//获取内容
	public function getContentById($id){
		if (!$id || !is_numeric($id)) {
			return 0;
		}
		return $this->_db->where('news_id='.$id)->find();
	}

	//保存更新的数据
	public function update($id, $data){
		if (!$id || !is_numeric($id)) {
			throw_exception('ID不合法');
		}
		if (!$data || !is_array($data)) {
			throw_exception('更新的数据不合法');
		}
		if (isset($data['content']) && $data['content']) {
			$data['content'] = htmlspecialchars($data['content']);
		}
		$where['news_id'] = $id;
		return $this->_db->where($where)->save($data);
	}

	// public function getId($id){
	// 	if (!$id || !is_numeric($id)) {
	// 		return 0;
	// 	}
	// 	return $this->_db->where('')
	// }
	//
	public function getContentId($array = array()){
		for ($i=0; $i < count($array); $i++) {
			$content = array();
		    $content = $this->_db->where('news_id='.$array[$i])->select();
		}

	}

}


