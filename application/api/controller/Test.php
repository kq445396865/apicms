<?php 
namespace app\api\controller;

use think\Controller;

use app\common\lib\exception\ApiException;

class Test extends Controller{

	public function index(){
		return [
			'ssss',
			'kqkqkq',
		];
	}



	public function save(){
		$data = input('post.');
		if($data['ads'] !=1){
			throw new ApiException('你提交的拘数据错误',400);
		}


		//return show(1,'OK',input('post.'),201);
		/*return  [
			'status' => 1,
			'message' => 'ok',
			'data' => input('post.'),
		];*/
	}
}

 ?>