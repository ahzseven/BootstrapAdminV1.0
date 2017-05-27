<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends CommonController {
    public function index(){
    	$this->assign('data',F('cache_data'));
        $this->display();
    }

    public function add(){
    	if ($_POST) {
    		if (!$_POST['title']) {
    			return show(0,'站点标题为空');
    		}
    		if (!$_POST['keywords']) {
    			return show(0,'站点关键词为空');
    		}
    		if (!$_POST['description']) {
    			return show(0,'站点描述为空');
    		}
    		F('cache_data',$_POST);
    		return show(1,'配置成功');
    	} else {
    		return show(0,'没有提交数据');
    	}

    }
    public function cache(){
    	// $this->assign('')
    }

    public function info(){
        $this->display();
    }

}