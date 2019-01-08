<?php 

namespace app\api\controller\v1;

use think\Controller;

//use app\admin\controller\Category;

use app\common\lib\exception\ApiException;


class Category extends Controller {

	public function index(){

		$data['cat_id'] = input('get.cat_id');
		//var_dump($data);exit;
		$piclist = model('News')->where($data)->order('news_id desc')->limit(6)->select();

		foreach ($piclist as $k => $v) {
			$result['piclist'][] = [
				'title' => $v['title'],
				'thumb' => $v['thumb'],
				'news_id' => $v['news_id']
			];
		}

		return show(1, 'OK', $result, 200);
		//echo json_encode(array('status'=>1,'list' => $result));
		//exit;

	}
}



 ?>