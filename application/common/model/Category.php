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

	public function getchilrenid($cateid){
		$catres = $this->select();
		return $this->_getchilrenid($catres,$cateid);
	}


	public function _getchilrenid($catres,$cateid){
		static $arr = array();

		foreach ($catres as $k => $v) {
			if($v['pid'] == $cateid){
				$arr[] = $v['id'];
				$this->_getchilrenid($catres,$v['id']);
			}
		}

		return $arr;

	}
	
}


 ?>