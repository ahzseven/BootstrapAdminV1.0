<?php
namespace Admin\Controller;
use Think\Controller;
class MenuController extends CommonController {
    public function index(){
    	$p = $_GET['p'] ? $_GET['p'] : 1;
        $perPage = 8;
        $count = D('Menu')->getCountMenus();
        $list = D('Menu')->getMenus($p, $perPage);
        /*实例化分页类*/
        $Page = new  \Think\Page($count, $perPage);
        /*分页样式定制*/
        $Page->setConfig('prev','上页');
        $Page->setConfig('next','下页');
        $Page->setConfig('first','首页');
        $Page->setConfig('last','末页');
        /*分页数据*/
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('list', $list);
        $this->display();
    }

    public function add(){
    	if ($_POST) {
    		if (!$_POST['name'] || !isset($_POST['name'])) {
    			return show(0, '名称为空');
    		}
    		if (!$_POST['description'] || !isset($_POST['description'])) {
    			return show(0, '描述为空');
    		}
    		//获取到Id,转到编辑模式
    		if ($_POST['menu_id']) {
    			return $this->save($_POST);
    		}

    		$res = D('Menu')->insertMenu($_POST);
    		if ($res) {
    			return show(1, '新增成功:)');
    		}
    		return show(0, '新增失败:(');
    	}
    	$this->display();
    }

    public function edit(){
    	$id = $_GET['id'];
    	$list = D('Menu')->getMenuById($id);
    	$this->assign('list', $list);
    	$this->display();
    }

    public function save($data){
    	$id = $data['menu_id'];
    	unset($data['menu_id']);

    	try{
	    	$result = D('Menu')->updateMenu($id, $data);
	    	if ($result!==false) {
	    		return show(1, '编辑成功:)');
	    	}
	    	return show(0, '编辑失败:(');
    	} catch (Exception $e){
    		return show(0, $e->getMessage());
    	}
    }

    public function setStatus(){
    	if ($_POST) {
    		$id = $_POST['id'];
    		if (!$id || !isset($id)) {
    			return show(0, '找不到删除的ID');
    		}
    		$result = D('Menu')->setMenuStatus($id);
    		if ($id) {
    			return show(1, '删除成功');
    		}
    		return show(0, '删除失败');
    	}
    }
}