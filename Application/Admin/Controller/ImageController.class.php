<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
// use Think\Image;

/**
 * 图片相关
 */
class ImageController extends CommonController {
    private $_uploadObj;
    public function __construct() {

    }
    //缩略图上传
    public function ajaxuploadimage() {
        $upload = D("UploadImage");
        $res = $upload->imageUpload();
        if($res===false) {
            return show(0,'上传失败','');
        }else{
            // $image = new \Think\Image();
            // $image->open('./Public/test2.jpg');
            // $image->thumb(744,465,\Think\Image::IMAGE_THUMB_FIXED)->save('./Public/test3.jpg');
            // print_r($res);exit;
            return show(1,'上传成功',$res);
        }

    }
    //富文本上传
    public function kindupload(){
        $upload = D("UploadImage");
        $res = $upload->upload();
        if($res === false) {
            return showKind(1,'上传失败');
        }
        return showKind(0,$res);
    }

}