<?php 

namespace app\api\controller\v1;

use think\Controller;

//use app\admin\controller\Category;

use app\common\lib\exception\ApiException;


class Index extends Controller {

	public function index(){
		
		$cateres = model('Category')->catetree();

		foreach ($cateres as $k => $v) {
			$result['cate'][] = [
				'cat_id' => $v['cat_id'],
				'cat_name' => $v['cat_name'],
			];
		}

		$pic = model('News')->where('cat_id = 2')->order('news_id desc')->limit(6)->select();

		foreach ($pic as $k => $v) {
			$result['pic'][] = [
				'title' => $v['title'],
				'thumb' => $v['thumb'],
				'description' => $v['description'],
				'news_id' => $v['news_id'],
			];
		}

		$banner = model('Banner')->where('type = 1')->order('id desc')->select();

		foreach ($banner as $k => $v) {

			$result['banner'][] = [
				'title' => $v['title'],
				'thumb' => $v['thumb'],
			];
		}

		return show(1, 'OK', $result, 200);
		//echo json_encode(array('status'=>1,'list' => $result));
		//exit;

	}
}



 ?>