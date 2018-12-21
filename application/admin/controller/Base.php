<?php 

namespace app\admin\controller;

use think\Controller;

/**
 * 后台基础库类
 */
class Base extends Controller{

	//页数
	public $page = '';
	//每页显示多少条
	public $size = '';
	//起始位置
	public $from = 0;
	/**
	 * 初始化方法
	 */
	public function _initialize(){
		//判断用户是否登录
		$islogin = $this->islogin();
		
		if(!$islogin){

			return $this->redirect('login/index');
		}
	}

	/**
	 * 判断是否登录
	 * @return [type] [description]
	 */
	public function islogin(){
		//获取session
		$user = session(config('admin.session_user'),'',config('admin.session_user_scope'));

		if($user && $user->id){

			return true;
		}

		return false;
	}


	public function getPageAndSize($data){

		$this->page = !empty($data['page']) ? $data['page'] : 1;
		$this->size = !empty($data['size']) ? $data['size'] : config('paginate.list_rows');
		$this->from = ($this->page - 1) * $this->size;
	}
}


 ?>