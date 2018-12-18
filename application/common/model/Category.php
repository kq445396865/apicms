<?php 
namespace app\common\model;

use think\Model;


class Category extends Base{


	protected $autoWriteTimestamp = false;

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

	public function getchilrenid($cateid){
		
		$cateres = $this->select();
		return $this->_getchilrenid($cateres,$cateid);
	}


	public function _getchilrenid($cateres,$cateid){
		static $arr = array();

		foreach ($cateres as $k => $v) {
			if($v['parentid'] == $cateid){
				$arr[] = $v['cat_id'];
				$this->_getchilrenid($cateres,$v['cat_id']);
			}
		}

		return $arr;

	}
	
}


 ?>