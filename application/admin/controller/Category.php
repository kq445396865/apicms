<?php 
namespace app\admin\controller;

use think\Controller;


/**
 * 文章栏目列表类
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
		//是否post提交
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

				try {

					$id = model('Category')->save($data);

				} catch (\Exception $e) {
					
					return msg(0,$e->getMessage());
				}

				

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
		//var_dump($cateid);exit;
		try {

		$sonid = model('Category')->getchilrenid($cateid);

		//var_dump($sonid);exit;

		} catch (\Exception $e) {

			return msg(0,$e->getMessage());
		}

		

		if(empty($sonid)){

			$del = model('Category')->where('cat_id',$cateid)->delete();

			if($del){

				return msg(1,'栏目删除成功');

			}else{

				return msg(0,'栏目删除失败');
			}

		}else{

			return msg(0,'该栏目下还有子栏目或者文章'); 
		}

	}


}

 ?>