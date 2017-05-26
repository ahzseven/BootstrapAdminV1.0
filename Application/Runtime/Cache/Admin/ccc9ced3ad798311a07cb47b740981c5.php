<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <title>Bootstrap Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="/demo/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/demo/Public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Social Buttons CSS -->
    <link href="/demo/Public/vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/demo/Public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/demo/Public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <!-- <link href="/demo/Public/vendor/morrisjs/morris.css" rel="stylesheet"> -->

    <!-- DataTables CSS -->
    <!-- <link href="/demo/Public/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet"> -->

    <!-- DataTables Responsive CSS -->
    <!-- <link href="/demo/Public/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet"> -->

    <!-- jQuery Tools / jQ必须在其他引入文件之前-->
    <script src="/demo/Public/vendor/jquery/jquery.min.js"></script>

    <script src="/demo/Public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="/demo/Public/vendor/metisMenu/metisMenu.min.js"></script>

	<script src="/demo/Public/Js/admin/common.js"></script>
   	<script src="/demo/Public/Js/dialog.js"></script>
	<script src="/demo/Public/Js/layer/layer.js"></script>

     <!-- Flot Charts JavaScript -->
   <!--  <script src="/demo/Public/vendor/flot/excanvas.min.js"></script>
    <script src="/demo/Public/vendor/flot/jquery.flot.js"></script>
    <script src="/demo/Public/vendor/flot/jquery.flot.pie.js"></script>
    <script src="/demo/Public/vendor/flot/jquery.flot.resize.js"></script>
    <script src="/demo/Public/vendor/flot/jquery.flot.time.js"></script>
    <script src="/demo/Public/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="/demo/Public/data/flot-data.js"></script> -->

      <!-- Morris Charts JavaScript -->
 <!--    <script src="/demo/Public/vendor/raphael/raphael.min.js"></script>
    <script src="/demo/Public/vendor/morrisjs/morris.min.js"></script>
    <script src="/demo/Public/data/morris-data.js"></script> -->

    <!-- DataTables JavaScript -->
 <!--    <script src="/demo/Public/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/demo/Public/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="/demo/Public/vendor/datatables-responsive/dataTables.responsive.js"></script> -->
     <!-- Custom Theme JavaScript -->
    <script src="/demo/Public/Js/admin/sb-admin-2.js"></script>




</head>
<style type="text/css">
    .breadcrumb > li + li:before {
        color: #CCCCCC;
        content: "/ ";
        padding: 0 5px;
    }
</style>
<?php
 function getname($id){ $result = M('Menu')->where('menu_id='.$id)->find(); return $result['name']; } ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/demo/admin.php?c=Index"><i class="fa fa-home fa-fw"></i> 博客后台Admin v1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               <!--  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['adminUser']['username'] ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/demo/admin.php?c=Users&a=edit&id=<?php echo $_SESSION['adminUser']['id'] ?>"><i class="fa fa-user fa-fw"></i> 个人信息</a>
                        </li>
                        <li class="divider"></li>
                        <li><a class="logout" href="###"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="/demo/admin.php?c=Index"><i class="fa fa-th fa-fw"></i> 首　　页</a>
                        </li>
                        <li>
                            <a href="###"><i class="fa fa-shield fa-fw"></i> 权限管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/demo/admin.php?c=Users">用户列表</a>
                                </li>
                                <li>
                                    <a href="/demo/admin.php?c=Users&a=add">添加用户</a>
                                </li>
                                <li>
                                    <a href="/demo/admin.php?c=Rbac&a=roleList">角色列表</a>
                                </li>
                                <li>
                                    <a href="/demo/admin.php?c=Rbac&a=addRole">添加角色</a>
                                </li>
                                <li>
                                    <a href="/demo/admin.php?c=Rbac&a=nodeList">权限列表</a>
                                </li>
                                <li>
                                    <a href="/demo/admin.php?c=Rbac&a=addNode">添加权限</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/demo/admin.php?c=Chart"><i class="fa fa-bar-chart-o  fa-fw"></i> 数据图表</a>
                        </li>
                        <li>
                            <a href="/demo/admin.php?c=Menu"><i class="fa fa-list fa-fw"></i> 菜单管理</a>
                        </li>

                        <!-- <li>
                            <a href="###"><i class="fa fa-users fa-fw"></i> 用户管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/demo/admin.php?c=Users">查看用户</a>
                                </li>
                                <li>
                                    <a href="/demo/admin.php?c=Users&a=register">注册用户</a>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="###"><i class="fa fa-file-text-o fa-fw"></i> 文章管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/demo/admin.php?c=Content">文章管理</a>
                                </li>
                                <li>
                                    <a href="/demo/admin.php?c=Content&a=add">创作文章</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/demo/admin.php?c=System"><i class="fa fa-cog fa-fw"></i> 系统配置</a>
                        </li>
                        <li>
                            <a href="/demo/admin.php?c=System&a=info"><i class="fa fa-info fa-fw"></i> 系统信息</a>
                        </li>
                        <li>
                            <a href="/demo/index.php?c=index"><i class="fa fa-desktop fa-fw"></i> 前台博客</a>
                        </li>
                        <li>
                            <a class="logout" href="###"><i class="fa fa-sign-out fa-fw"></i> 退　　出</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.navbar-static-side -->
    </nav>
<script>
    var jump = {
        out_url : "admin.php?c=Login&a=logout",
    };
</script>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">文章管理</h3>
                </div>
                <div class="col-sm-2">
                    <ol class="breadcrumb">
                        <li><a href="/demo/admin.php?c=Index">Home</a></li>
                        <li class="active">正文</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <form action="/demo/admin.php?c=Content&a=index" method="POST">
                                    <div class="col-sm-9">
                                        <div class="input-group custom-search-form col-sm-4">

                                            <span class="input-group-addon">类型</span>
                                                <select class="form-control" name="menu_id" id="select-id">
                                                    <option value='0' <?php if($type == 0): ?>selected="selected"<?php endif; ?>>请选择类型</option>
                                                    <?php if(is_array($menu)): foreach($menu as $key=>$menu): ?><option value="<?php echo ($menu["menu_id"]); ?>" <?php if($type == $menu['menu_id']): ?>selected="selected"<?php endif; ?>><?php echo ($menu["name"]); ?></option><?php endforeach; endif; ?>
                                                </select>
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="submit" id="admin-search">
                                                    <i class="fa fa-search"> 搜索</i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-sm-3">
                                    <div class="pull-right">
                                        <button class="btn btn-primary" type="button" id="button-add">
                                            <i class="fa fa-plus"> 添加文章</i>
                                        </button>
                                    </div>
                                </div>
                                    <!-- /input-group -->
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <table width="100%" class="table table-striped table-bordered table-hover" id="">
                                <thead>
                                    <tr>
                                        <th width="3%" >Id       </th>
                                        <th width="24%">标题     </th>
                                        <th width="4%" >缩略图   </th>
                                        <th width="8%" >作者     </th>
                                        <th width="10%">编辑时间 </th>
                                        <th width="8%" >所属分类 </th>
                                        <th width="4%" >状态     </th>
                                        <th width="6%" >操作     </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">
                                        <td><?php echo ($list["news_id"]); ?></td>
                                        <td><?php echo ($list["title"]); ?></td>
                                        <td><?php echo (getThumb($list["thumb"])); ?></td>
                                        <td><?php echo ($list["username"]); ?></td>
                                        <td><?php echo (gettime($list["create_time"])); ?></td>
                                        <td><?php echo (getname($list["menu_id"])); ?></td>
                                        <td><?php echo (status($list["status"])); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs btn-primary edit-btn" edn="<?php echo ($list["news_id"]); ?>">
                                                <i class="fa fa-edit fa-fw"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-xs btn-danger admin-del" name="<?php echo ($list["title"]); ?>" user-id="<?php echo ($list["news_id"]); ?>">
                                                <i class=" fa fa-fw fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                            <?php echo ($page); ?>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script>
    var jumpUrl = {
        add_url    : '/demo/admin.php?c=Content&a=add',
        edit_url   : '/demo/admin.php?c=Content&a=edit',
        delete_url : '/demo/admin.php?c=Content&a=setStatus',
        jump_url   : '/demo/admin.php?c=Content&a=index',
        menu_url   : '/demo/admin.php?c=Content&a=index',
    };
    // $(function(){
    //     $('#admin-search').click(function(){
    //     var id = $('#select-id').val();
    //     if (id == 0) {
    //         return dialog.error('请选择类型');
    //     }
    //     data = {};
    //     data['menu_id'] = id;
    //     var url = jumpUrl.menu_url;
    //     $.post(url, data, function(result){
    //         if (result.status == 0) {
    //             //失败
    //             return dialog.error(result.message);
    //         }
    //         if (result.status == 1) {
    //             //成功
    //             return dialog.success(result.message,jump_url);
    //         }
    //     },"JSON");
    //     });

    // });

</script>

</body>

</html>