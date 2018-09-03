<?php 
namespace app\admin\controller;

use think\Controller;


class Admin extends Controller{

	public function add(){
		$jumpUrl = '111';
		//判断是否POST提交
		if(request()->isPost()){
            //打印数据
            //dump(input('post.'));
            $data = input('post.');
            $validate = validate('AdminUser');
            if(!$validate->check($data)){
                 return msg(0,$validate->getError());
            }

            $data['password'] = md5($data['password'].'kq');

		}else{
			return $this->fetch();
		}
		
	}
}


 ?>