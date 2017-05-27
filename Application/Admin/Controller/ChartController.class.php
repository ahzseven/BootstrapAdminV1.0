<?php
namespace Admin\Controller;
use Think\Controller;
class ChartController extends Controller {
	//显示图形
    public function index(){
        $this->display();
    }
    //获取后台数据返回给前台图表
    public function showData(){
    	//返回的是一个关联数组,数组函数分开两个字段的值
        $data = D('User')->getNameAge();
        $name = array_values($data);
        $age  = array_keys($data);
        if ($data) {
            $array = array(
                0 => $age,
                1 => $name,
                );
            echo json_encode($array);
        }
    }

}