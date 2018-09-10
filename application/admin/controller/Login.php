<?php 

namespace app\admin\controller;

use think\Controller;

use app\common\lib\IAuth;


class Login extends Base{

	public function _initialize(){}

	public function index(){

		$islogin = $this->islogin();
		//判断用户是否已经登陆
		if($islogin){

			return $this->redirect('index/index');
			
		}else{

			return $this->fetch();
		}
		
	}


	public function check(){

		if(request()->isPost()){
			//获取提交的账号数据
			//dump('post.');
			$data = input('post.');
 			//判断验证码是否正确
			if(!captcha_check($data['code'])){

                 return msg(0,'验证码不正确!');
			}
			$validate = validate('AdminUser');

            if(!$validate->check($data)){

                 return msg(0,$validate->getError());
            }

			try {
					//username password
					$user = model('AdminUser')->get(['username' => $data['username']]);

			} catch (\Exception $e) {

					return msg(0,$e->getMessage());
			}

			if(!$user || $user->status != config('code.status_normal')){
						return msg(0,'用户不存在');
			}

			if(IAuth::getMd5Password($data['password']) != $user['password']){

						return msg(0,'密码不正确');
			}
			//更新数据库 更新登录时间 ip
			$userdata = [
						'last_login_time' => time(),
						'last_login_ip' => request()->ip(),
			];
			try {

			model('AdminUser')->save($userdata,['id' => $user->id]);

			} catch (\Exception $e) {
				
				return msg(0,$e->getMessage());
			}
			//保存session信息
			session(config('admin.session_user'),$user,config('admin.session_user_scope'));

			return msg(1,'登录成功');	
			
		}else{

			return msg(0,'请求不合法');
		}
	}

	/**
	 * 退出登录
	 */

	public function loginout(){
		session(null,config('admin.session_user_scope'));
		//跳转
		$this->redirect('login/index');
	}
}

 ?>