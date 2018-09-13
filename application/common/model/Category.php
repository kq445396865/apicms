<?php 
namespace app\common\model;

use think\Model;


class Category extends Model{


	public function catetree(){

		$cateres = $this->select();
		return $this->sort($cateres);
	}

	public function sort($data,$pid=0,$level=0){
		static $arr = array();
		foreach ($data as $k => $v) {
			if($v['parentid'] == $pid){
				$v['level'] = $level;
				$arr[] = $v;
				$this->sort($data,$v['cat_id'],$level+1);
			}
		}
		return $arr;

	}
	
}


 ?>