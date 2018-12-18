<?php 
namespace app\common\model;

use think\Model;



class Base extends Model{
	//入库时间
	protected $autoWriteTimestamp = true;

    //新增数据入库
	public function add($data=array()){

         if(!is_array($data)){
             exception('传递数据不合法');
         }

         $this->allowField(true)->save($data);
         //id必须是字段名
         return $this->id;
	}


}


 ?>