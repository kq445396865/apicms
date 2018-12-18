<?php 
namespace app\common\model;

use think\Model;

class News extends Base{
	//入库时间
	protected $autoWriteTimestamp = true;



	public function getNews($data=[]){

		$order = [
			'news_id' => 'desc',
		];
		$result = $this->where($data)->order($order)->paginate(5);
		
		return $result;
	}

    //新增数据入库
	public function add($data=array()){

         if(!is_array($data)){
             exception('传递数据不合法');
         }

         $this->allowField(true)->save($data);
         
         return $this->news_id;//id必须是字段名
	}

	

}



 ?>