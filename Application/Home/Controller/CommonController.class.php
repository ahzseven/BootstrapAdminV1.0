<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function __construct(){
    	header("Content-type: text/html; charset=utf-8");
    	parent::__construct();
    	$this->menu = D('Menu')->getMenusHome();
    	$this->result = F('cache_data');

        //获取count,news_id列的值
        $array = M('News')->getField('count,news_id');
        //键名降序
        krsort($array);
        //分割获取前五条news_id
        $result = array_chunk($array,5,true);
        //五条news_id字符串数组
        $res = array_values($result[0]);
        $data = array();
        //获取每个id的记录,放进数组$data
        foreach ($res as $value) {
            $where['news_id'] = intval($value);
            $data[] = M('News')->where($where)->find();
        }
        $this->assign('data',$data);
    }

    //错误页面
    public function error($message=''){
    	$this->message = $message ? $message : '系统发生错误-_-#';
    	$this->display('Index/error');
    }
}