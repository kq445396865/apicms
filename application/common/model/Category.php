<?php 
namespace app\common\model;

use think\Model;


class Category extends Model{


	public function catetree(){

		$cateres = $this->select();
		$this->sort();
	}

	public function sort(){

	}
	
}


 ?>