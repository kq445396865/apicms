<?php 
namespace app\admin\controller;

use think\Controller;


/**
 * 商品栏目列表类
 */


class Category extends Base {


	public function index(){
		
		$cateres = model('Category')->select();
		$this->assign('cateres',$cateres);
		return $this->fetch();
	}


	/**
	 * 添加栏目操作
	 */
	public function add(){

		if(request()->isPost()){
			
			$data = input('post.');
			//dump($data);
			$validate = validate('Category');

			if(!$validate->check($data)){

				return msg(0,$validate->getError());
			}

			try {
				
			$res = model('Category')->get(['cat_name' => $data['cat_name']]);

			} catch (\Exception $e) {
				
				return msg(0,$e->getMessage());
			}

			if(!$res){

				$id = model('Category')->save($data);
				if(!$id){

					return msg(0,'error');

				}else{

					return msg(1,'栏目添加成功');
				}

			}else{

				return msg(0,'栏目已存在');
			}

		}

		$cateres = model('Category')->select();
		$this->assign('cateres',$cateres);

			return $this->fetch();

		
	}


}

 ?>