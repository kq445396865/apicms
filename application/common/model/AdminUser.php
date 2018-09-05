<?php 
namespace app\common\model;

use think\Model;



class AdminUser extends Model{

	protected $autoWriteTimestamp = true;

    //新增管理员入库
	public function add($data=array()){

         if(!is_array($data)){
             exception('传递数据不合法');
         }

         $this->allowField(true)->save($data);
         return $this->id;
	}


	//查询管理员是否存在
	public function getAdminByName($username=[]){
		 $data = [
		 	'username' => $username,
		 	'status' => 1,
		 ];
         
         return $this->where($data)->find();

         


	}
}


 ?>