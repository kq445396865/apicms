<?php 
namespace app\admin\controller;

use think\Controller;


/**
 * 商品栏目列表类
 */


class Category extends Base {

	//删除前置操作
	//
/*	protected $beforeActionList = [
		//检测子栏目是否存在
		'checklower' => ['only' => 'del'],
	];*/

	

	public function index(){
		
		$cateres = model('Category')->catetree();

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
			//判断栏目是否存在
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

		$cateres = model('Category')->catetree();

		$this->assign('cateres',$cateres);

		return $this->fetch();

	}

	//修改操作
	public function edit(){

		if(request()->isPost()){

			$data = input('post.');

			$validate = validate('Category');

			if(!$validate->check($data)){

				return msg(0,$validate->getError());
			}

			try {

			$id = model('Category')->save($data,['cat_id'=>$data['cat_id']]);

			} catch (\Exception $e) {
				
				return msg(0,$e->getMessage());
			}

			if($id !== false){

				return msg(1,'栏目更新成功');
			}else{

				return msg(0,'栏目更新失败');
			}
			
		}

		$cates = model('Category')->find(input('id'));

		$cateres = model('Category')->catetree();
		$this->assign(array(
			'cates' => $cates,
			'cateres' => $cateres,
		));
		return $this->fetch();
	}

	public function del(){

		$cateid = input('id');

		echo $cateid;die;

		$sonid = model('Category')->getchilrenid($cateid);

		if($sonid !== false){

		}else{

			return msg(0,'该栏目下还有子栏目或者文章'); 
		}

	}


}

 ?>