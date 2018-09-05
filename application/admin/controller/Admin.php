<?php 
namespace app\admin\controller;

use think\Controller;


class Admin extends Controller{

	public function index(){
		$this->fetch();
	}

	public function add(){
		//判断是否POST提交
		if(request()->isPost()){
            //打印数据
            //dump(input('post.'));
            $data = input('post.');
            $validate = validate('AdminUser');
            if(!$validate->check($data)){
                 return msg(0,$validate->getError());
            }

            $res = model('AdminUser')->getAdminByName($data['username']);

            if(!$res){

 				    //md5加密
 					$data['password'] = getMd5Password($data['password']);
		            $data['status'] = 1;
		 
		            try {
		            	$id = model('AdminUser')->add($data);
		            	//print_r($id);exit;
		            	if(!$id){
		                    return msg(0,'error');
		            	}else{
		            		return msg(1,'id='.$id.'的用户新增成功');
		            	}

		            } catch (Exception $e) {

		            	return msg(0,$e->getMessage());
		            }

            }else{

					return msg(0,'用户已存在');

            }

            

		}else{

			return $this->fetch();
		}
		
	}
}


 ?>