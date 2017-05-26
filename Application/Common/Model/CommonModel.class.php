<?php
namespace Common\Model;
use Think\Model;

/**
 * 公共模型类
 * @author  seven
 */
class CommonModel extends Model {
    private $_uploadObj = '';
    private $_uploadImageData = '';


    public function __construct() {
        $this->_uploadObj = new  \Think\Upload();


    }

    public function upload() {

}
