<?php
return array(
    //'配置项'   =>'配置值'
    'DB_TYPE'    => 'mysql',
    'DB_HOST'    => '127.0.0.1',
    'DB_USER'    => 'root',
    'DB_PWD'     => '',
    'DB_PORT'    => 3306,
    'DB_NAME'    => 'admin_cms',
    'DB_CHARSET' => 'utf8',
    'DB_PREFIX'  =>'cms_',

     //Rbac配置信息
    "ADMIN_AUTH_KEY"      => 'superadmin',       //超级管理员识别号(必配)
    "RBAC_SUPERADMIN"     => 'admin',            //超级管理员名称,用户表中的username
    "USER_AUTH_ON"        => true,               //是否开启权限验证(必配)
    "USER_AUTH_TYPE"      => 1,                  //验证方式（1、登录验证；2、实时验证）

    "USER_AUTH_KEY"       => 'uid',              //用户认证识别号(必配)

    "USER_AUTH_MODEL"     => 'User',             //验证用户表模型
    'USER_AUTH_GATEWAY'   =>  '/login/login',    //用户认证失败，跳转URL

    'AUTH_PWD_ENCODER'    => 'md5',              //默认密码加密方式

    "NOT_AUTH_MODULE"     => 'Index,login',      //无需认证的控制器
    'REQUIRE_AUTH_MODULE' =>  '',                //默认需要认证的模块
    "NOT_AUTH_ACTION"     => 'index,logout',     //无需认证的方法
    'REQUIRE_AUTH_ACTION' =>  '',                //默认需要认证的动作

    'GUEST_AUTH_ON'       =>  false,             //是否开启游客授权访问
    'GUEST_AUTH_ID'       =>  0,                 //游客标记

    "RBAC_ROLE_TABLE"     => 'cms_role',         //角色表名称(必配)
    "RBAC_USER_TABLE"     => 'cms_role_user',    //用户角色中间表名称(必配)
    "RBAC_ACCESS_TABLE"   => 'cms_access',       //权限表名称(必配)
    "RBAC_NODE_TABLE"     => 'cms_node',         //节点表名称(必配)
);