<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends CommonController {
    public function index(){
    	$id = intval($_GET['id']);
        $news = M('News')->find($id);
        $count = intval($news['count']) + 1;
        M('News')->where('news_id='.$id)->setField('count',$count);
        $content = D('News_content')->getContentById($id);
        $news['content'] = htmlspecialchars_decode($content['content']);

        $this->assign('list', $news);
        $this->display();
    }
}