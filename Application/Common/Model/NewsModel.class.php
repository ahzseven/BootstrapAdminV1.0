<?php
namespace Common\Model;
use Think\Model;
/**
 * 用户表操作
 */
class NewsModel extends Model{
	private $_db;
	public function __construct(){
		$this->_db = M('News');
	}
	//插入文章
	public function insert($data=array()){
		if (!$data || !is_array($data)) {
			return 0;
		}
		$data['create_time'] = time();
		$data['username'] = getLoginUsername();
		return $this->_db->add($data);
	}
	/**
	 * 获取所有文章
	 */
	public function getNews($page, $pageSize=10, $data=array()){
		$data['status'] = 1;
		$list = $this->_db
			->where($data)
			->order('news_id desc')
			->page($page, $pageSize)
			->select();
			return $list;
	}
	//统计所有数据
	public function getNewsCount($data=array()){
		$data['status'] = 1;
		return $this->_db->where($data)->count();
	}
	//根据Id获取对应数据
	public function getNewsById($id){
		if (!$id || !is_numeric($id)) {
			return 0;
		}
		return $this->_db->where('news_id='.$id)->find();
	}

	//保存编辑的内容
	public function update($id, $data){
		if (!$id || !is_numeric($id)) {
			throw_exception('Id不合法');
		}
		if (!$data || !is_array($data)) {
			throw_exception('更新的数据不合法');
		}
		$where['news_id'] = $id;
		return $this->_db->where($where)->save($data);
	}
	//删除数据
	public function updateStatusById($id){
		if (!$id || !is_numeric($id)) {
			throw_exception('没有提交删除的数据');
		}
		$data['status'] = -1;
		return $this->_db->where('news_id='.$id)->save($data);
	}

	public function getNewsByNewsId($data){
		if (!is_array($data)) {
			throw_exception('参数错误');
		}
		$array = array(
			'news_id' => array('in',implode(',',$data)),
			);
		return $this->_db->where($array)->select();
	}

	//前台获取数据
	public function getNewsId(){

		$list = $this->_db->where('status=1')
			->order('news_id')
			->select();
		return $news_id = array_column($list, 'news_id');

    }
    //获取同类型的news
   //  public function getTypeNews($data, $page, $pageSize){
   //  	if (!$id || !is_numeric($id)) {
   //  		return 0;
   //  	}
   //  	$where['menu_id'] = $data;
   //  	$where['status'] = 1;
   //  	return $this->_db->where($where)
   //  		->order('news_id desc')
			// ->page($page, $pageSize)
   //  		->select();
    // }

    /**
     * [getNewsByMenu_id description]
     * @Author Seven
     * @Date   2017-05-09
     * @param  [type]     $param [description]
     * @return [type]            [description]
     */
    public function getNewsByMenu_id($param){
    	$list = $this->_db->where('menu_id='.$param)->select();
			return $list;
    }
}


