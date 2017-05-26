<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	$this->userCount = M('User')->count('id');
    	$this->articleCount = M('News')->count('news_id');
    	$this->flowCount = M('News')->sum('count');
    	// $image = new \Think\Image();
     //    $image->open('./Public/test2.jpg');
     //    $image->thumb(744,465,\Think\Image::IMAGE_THUMB_FIXED)->save('./Public/test2.jpg');
        $this->display();
    }

}