<?php 
namespace app\common\model;

use think\Model;

class News extends Base{
	//入库时间
	protected $autoWriteTimestamp = true;



	//分页模式一
/*	public function getNews($data=[]){

		$order = [
			'news_id' => 'desc',
		];
		$result = $this->where($data)->order($order)->paginate(5);
		
		return $result;
	}*/

    //新增数据入库
	public function add($data=array()){

         if(!is_array($data)){
             exception('传递数据不合法');
         }

         $this->allowField(true)->save($data);
         
         return $this->news_id;//id必须是字段名
	}


	/**根据条件获取列表数据
	 * [getNewsByList description]
	 * @param  array  $param [description]
	 * @return [type]        [description]
	 */
	public function getNewsByList($condition = [],$from=0,$size=5){
		
		$order = ['news_id' => 'desc'];

		$result = $this->where($condition)
					   ->limit($from,$size)
			 		   ->order($order)
			 		   ->select();

		//echo $this->getLastSql();
		//
		return $result;
	}

	public function getNewsByCount($condition = []){
		
		 return $this->where($condition)->count();
		 //echo $this->getLastSql();
		//return $result;
	}



	public function getCatByNews($catid =[]){
		
		 $condition['cat_id'] = $catid;
		 return $this->where($condition)->count();
		 //echo $this->getLastSql();
	}

	

}



 ?>