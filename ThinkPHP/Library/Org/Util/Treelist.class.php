<?php
namespace Org\Util;
	/**
	 * 自定义的类,加上命名空间
	 */
	class Treelist {
		//存放无限级分类结果
		static public $treelist = array();

		public function create($data, $pid=0){
			foreach ($data as $k=>$v){
				if ($v['pid'] == $pid) {
					self::$treelist[] = $v;
					unset($data[$k]);
					self::create($data,$v['id']);
				}
			}
			return self::$treelist;
		}
	}