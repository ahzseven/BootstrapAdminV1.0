<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	$p = $_GET['p'] ? $_GET['p'] : 1;
        $perPage = 6;
        $data = array();
        if ($_GET['menu_id']) {
        	$data['menu_id'] = $_GET['menu_id'];
        }
        $list = D('News')->getNews($p, $perPage, $data);
        $count = D('News')->getNewsCount($data);
        /**
         * 实例化分页类
         * 分页样式定制
         */
        $Page = new  \Think\Page($count, $perPage);
        $Page->setConfig('prev','上页');
        $Page->setConfig('next','下页');
        $Page->setConfig('first','首页');
        $Page->setConfig('last','末页');
        $show = $Page->show();
        $this->assign('page', $show);

        $this->assign('list', $list);
        $this->display();
    }
}