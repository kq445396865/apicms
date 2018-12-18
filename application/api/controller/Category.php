<?php 

namespace app\api\controller;

use think\Controller;

//use app\admin\controller\Category;

use app\common\lib\exception\ApiException;


class Category extends Controller {

	public function read(){
		
		$cateres = model('Category')->catetree();

		foreach ($cateres as $k => $v) {
			$result[] = [
				'cat_id' => $v['cat_id'],
				'cat_name' => $v['cat_name'],
			];
		}

		return show(1, 'OK', $result, 200);
		//echo json_encode(array('status'=>1,'list' => $result));
		//exit;

	}
}



 ?>