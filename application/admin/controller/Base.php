<?php 

namespace app\admin\controller;

use think\Controller;

/**
 * 后台基础库类
 */
class Base extends Controller{

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
}


 ?>