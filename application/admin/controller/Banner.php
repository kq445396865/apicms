<?php 
namespace app\admin\controller;

use think\Controller;


class Banner extends Base{



	public function index(){

		$banner = model('Banner')->select();

		//$res = str_replace('\\','/',$banner[1]['thumb']);

		//var_dump($res);exit;

		return $this->fetch('',[

			'banner' => $banner,
		]);
	}


	public function add(){


		if(request()->isPost()){

			$data = input('post.');

			$validate = validate('Banner');

			if(!$validate->check($data)){

				return $this->result('',0,$validate->getError());
			}

			$data['thumb'] = str_replace('\\', '/', $data['thumb']);

			//var_dump($data);exit;

			try {

			$id = model('Banner')->add($data);

			} catch (\Exception $e) {
				
				return $this->result('',0,$e->getMessage());
			}

			if($id){

				return $this->result('',1,'新增成功');
			}

				return $this->result('',0,'新增失败');
			

		}


		return $this->fetch();
	}


	public function edit(){

		if(request()->isPost()){

			$data = input('post.');

		$validate = validate('Banner');

		if(!$validate->check($data)){

			return $this->result('',0,$validate->getError());
		}


		$data['thumb'] = str_replace('\\', '/', $data['thumb']);

		try {

			$id = model('Banner')->allowField(true)->save($data,['id' => $data['id']]);

		} catch (\Exception $e) {
			
			return $this->result('',0,$e->getMessage());
		}

		if($id){

			return $this->result('',1,'修改成功');
		}
		 	return $this->reuslt('',0,'修改失败');

		}


		$banner = model('Banner')->find(input('id'));

		return $this->fetch('',[
			'banner' => $banner,
		]);

	}

}
 ?>
