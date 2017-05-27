<?php if (!defined('THINK_PATH')) exit(); function getname($id){ $result = M('Menu')->where('menu_id='.$id)->find(); return $result['name']; } ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="<?php echo ($result["keywords"]); ?>" />
    <meta name="description" content="<?php echo ($result["description"]); ?>" />

    <title><?php echo ($result["title"]); ?></title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="/demo/Public/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="/demo/Public/vendor/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="/demo/Public/Css/home/style.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-default" style="background-color: #e3f2fd;font-weight: 700;font-size: 16px;" role="navigation">
        <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="/demo/index.php?c=Index"><?php echo ($result["title"]); ?></a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-left">
                <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><!-- <li class="active"><a href="#"><?php echo ($list["name"]); ?></a></li> -->
                    <li class="curr"><a href="/demo/index.php?c=Index&menu_id=<?php echo ($menu["menu_id"]); ?>"><?php echo ($menu["name"]); ?></a></li>
                    <!-- <li><a href="/demo/index.php?c=Index&menu_id=<?php echo ($menu["menu_id"]); ?>" <?php if($menu['menu_id'] == 1): ?>class="current"<?php endif; ?>><?php echo ($menu["name"]); ?></a></li> --><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!--HOME SECTION END-->
    <!-- <script type="text/javascript">
        $(document).ready(
            function(){
                $(".curr").click(function(){
                    // $(this).parent(".navbar-nav").find('li').removeClass("current");
                    $(this).addClass("current");
            });
        });
    </script> -->
    <section>
        <div class="container">
            <div class="row">
                <!-- 博客主体 -->
                <div class="col-md-9">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="blog-main">
                        <div class="blog-info">
                            <!-- 博客新闻图片 -->
                            <div class="blog-left">
                                <a class="thumbnail" href="/demo/index.php?c=Detail&id=<?php echo ($list["news_id"]); ?>">
                                    <img width="280" height="180" src="<?php echo ($list["thumb"]); ?>" class="img-responsive img-rounded" />
                                </a>
                            </div>
                            <!-- 博客新闻标题信息 -->
                            <div class="blog-right">
                                <div class="heading-blog">
                                    <!-- <span class="label label-primary"><?php echo ($list["name"]); ?></span> -->
                                    <span class="label label-primary"><?php echo (getname($list["menu_id"])); ?></span>
                                    <a href="/demo/index.php?c=Detail&id=<?php echo ($list["news_id"]); ?>"><?php echo ($list["title"]); ?></a>
                                </div>
                                <p>
                                <span class="news-info">
                                    <i class="fa fa-user"> <?php echo (getLoginUsername($list["username"])); ?></i>
                                </span>
                                <span class="news-info">
                                    <i class="fa fa-clock-o"> <?php echo (date("Y-m-d H:i",$list["create_time"])); ?></i>
                                </span>
                                <span class="news-info">
                                    <i class="fa fa-eye"> 浏览 <?php echo ($list["count"]); ?></i>
                                </span>
                                </p>
                                <p>
                                <span><?php echo ($list["description"]); ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="blog-txt">
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

                    <nav>
                        <ul class="pagination">
                            <?php echo ($page); ?>
                        </ul>
                    </nav>
                     <!--博客主体 -->
                </div>
                <!--博客右侧栏目-->
                <div class="col-md-3">
    <ul class="list-group">
        <li class="list-group-item">
            <i class="fa fa-file-text"> <strong>热门文章</strong></i>
        </li>
        <?php if(is_array($data)): foreach($data as $key=>$data): ?><li class="list-group-item">
            <span class="badge"><?php echo ($data["count"]); ?></span>
                <a href="/demo/index.php?c=Detail&id=<?php echo ($data["news_id"]); ?>"><?php echo ($data["small_title"]); ?></a>
        </li><?php endforeach; endif; ?>

    </ul>
    <br />

   <!--  <ul class="list-group">
        <li class="list-group-item">
            <i class="fa fa-tag"> 热门标签</i>
        </li>
        <li class="list-group-item">
            <a href="#">
                <img src="assets/img/ad1.jpg" class="img-responsive" />
            </a>
        <br />
            <a href="#">
                <img src="assets/img/ad2.jpg" class="img-responsive" />
            </a>
        </li>
    </ul> -->
    <br />
</div>
            </div>
        </div>
    </section>
    <hr />
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center set-foot">
                &copy 2017 Seven |
                <i class="fa fa-envelope">:<a href="###" target="_blank">ahzseven@outlook.com</a></i>
                <i class="fa fa-github">:<a href="###" target="_blank">ahzseven</a></i>
            </div>
        </div>
    </div>

</body>
</html>