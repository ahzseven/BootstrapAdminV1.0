<?php
namespace Admin\Controller;
use Think\Controller;
class ContentController extends CommonController {
    public function index(){
        $data = array();
        //menu_id为真,作为搜索条件
        if (!empty($_REQUEST['menu_id'])) {
            $data['menu_id'] = intval($_REQUEST['menu_id']);
            $this->assign('type', $data['menu_id']);
            $perPage = 100;
        } else {
            $this->assign('type', 0);
            $perPage = 10;
        }
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $list = D('News')->getNews($p, $perPage, $data);
        $count = D('News')->getNewsCount($data);
        /*实例化分页类*/
        $Page = new  \Think\Page($count, $perPage);
        /*分页样式定制*/
        $Page->setConfig('prev','上页');
        $Page->setConfig('next','下页');
        $Page->setConfig('first','首页');
        $Page->setConfig('last','末页');
        /*分页数据*/
        $show = $Page->show();

        $this->assign('menu', D('Menu')->getMenusHome());
        $this->assign('page', $show);
        $this->assign('list', $list);
        $this->display();
    }

	public function add(){
		if ($_POST) {
			if (!isset($_POST['title']) || !$_POST['title']) {
				return show(0, '标题为空');
			}
			if (!isset($_POST['small_title']) || !$_POST['small_title']) {
				return show(0, '短标题为空');
			}
			if (!isset($_POST['keywords']) || !$_POST['keywords']) {
				return show(0, '关键字为空');
			}
            if (!isset($_POST['description']) || !$_POST['description']) {
                return show(0, '描述为空');
            }
            if (!isset($_POST['content']) || !$_POST['content']) {
                return show(0, '内容为空');
            }
			//转到编辑后保存
			if ($_POST['news_id']) {
				return $this->save($_POST);
			}

			$newsId = D('News')->insert($_POST);
			if ($newsId) {
				$newsContentData['content'] = $_POST['content'];
				$newsContentData['news_id'] = $newsId;
				$conId = D('News_content')->insert($newsContentData);
				if ($conId) {
					return show(1, '新增成功:)');
				} else {
					return show(1, '主表插入成功,副表插入失败');
				}
			} else {
				return show(0, '新增失败:(');
			}
		}
        $menu = D('Menu')->getMenusHome();
        $this->assign('menu',$menu);
        $this->display();
    }

    public function edit(){
		$id = $_GET['id'];
		if (!$id) {
			$this->redirect('__APP__?c=Content');
		}

		$list = D('News')->getNewsById($id);
		if (!$list) {
			$this->redirect('__APP__?c=Content');
		}
		$newsContent = D('News_content')->getContentById($id);
		if ($newsContent) {
			$list['content'] = $newsContent['content'];
		}
        $menu = D('Menu')->getMenusHome();
        $this->assign('menu',$menu);
		$this->assign('list', $list);
        $this->display();
    }

    public function save($data){
    	$id = $data['news_id'];
    	unset($data['news_id']);

    	try {
    		$res = D('News')->update($id, $data);
			$resContent['content'] = $data['content'];
            // $newsId = D('News_content')->getId($id);
			$contentId = D('News_content')->update($id, $resContent);
			if ($res !== false && $contentId !== false) {
				return show(1, '更新成功:)');
			}

			return show(0, '更新失败ha:(');
		} catch (Exception $e){
			return show(0, $e->getMessage());
		}
    }

    public function setStatus(){
    	try {
    		$id = $_POST['id'];
    		if (!$id) {
    			return show(0, '删除的Id不存在');
    		}
    		$res = D('News')->updateStatusById($id);
    		if ($res) {
    			return show(1, '删除成功');
    		} else {
    			return show(0, '删除失败');
    		}
    	} catch (Exception $e) {
    		return show(0, $e->getMessage());
    	}
    }

    public function push(){
    	$jumpUrl = $_SERVER['HTTP_REFERER'];
    	$positionId = intval($_POST['position_id']);
    	$articleId = $_POST['push'];

    	if (!$articleId || !is_array($articleId)) {
    		return show(0, '没有选择文章ID');
    	}
    	if (!$positionId) {
    		return show(0, '没有选择推荐位');
    	}

    	try{
    		$news = D('News')->getNewsByNewsId($articleId);
    		if (!$news) {
    			return show(0, '没有相关内容');
    		}
    		foreach ($news as $new) {
    			$data = array(
					'position_id' => $positionId,
					'title'       => $new['title'],
					'thumb'       => $new['thumb'],
					'news_id'     => $new['news_id'],
					'status'      => 1,
					'create_time' => $new['create_time'],
    				);
    			$position = D('PositionContent')->insert($data);
    		}
    	} catch(Exception $e) {
    		return show(0, $e->getMessage());
    	}
    	return show(1, '推送成功', array('jump_url'=>$jumpUrl));
    }


}