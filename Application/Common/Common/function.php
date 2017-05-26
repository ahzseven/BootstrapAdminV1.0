<?php
/**
 * 公用的方法
 */
function show($status, $message, $data=array()){
	$array = array(
		'status'  => $status,
		'message' => $message,
		'data'    => $data,
		);
	exit(json_encode($array));
}
function getMd5Password($password){
	return md5($password.C('MD5_PRE'));
}
function getsex($sex){
	return $sex == 1?'男':'女';
}
function status($status){
	if ($status == 0) {
		$string = '<div style="color: red;">关闭</div>';
	} elseif($status == 1) {
		$string = '<div style="color:green;">正常</div>';
	}elseif($status == -1){
		$string = '删除';
	}
	return $string;
}
function gettime($date){
	return date('Y/m/d H:i',$date);
}

function level($level){
	switch ($level) {
		case 1:
			return '<div style="color:purple; font-weight:700">项目</div>';
			break;
		case 2:
			return '<div style="color:blue;">模块</div>';
			break;
		case 3:
			return '方法';
			break;
	}
}
//返回数据到前台
function showKind($status,$data) {
    header('Content-type:application/json;charset=UTF-8');
    if($status==0) {
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>'上传失败')));
}

//获取登录的用户名
function getLoginUsername(){
	$name = $_SESSION['adminUser']['username'] ? $_SESSION['adminUser']['username'] :'';
	return $name;
}
//获取登录的用户ID
function getLoginUserId(){
	return $_SESSION['adminUser']['id'] ? $_SESSION['adminUser']['id'] : '';
}
function getThumb($thumb){
	return $thumb ? "有" : "无";
}



 ?>