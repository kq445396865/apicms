<?php 
namespace app\admin\controller;

use think\controller;




/**
 * 文章列表
 */

class News extends Base{



	public function index(){

		$data = input('param.');
		//将获取的内容转化成url的格式
		$query = http_build_query($data);

		//halt($data);
		//条件转换
		$whereData = [];
		if(!empty($data['start_time']) && !empty($data['end_time']) && $data['end_time'] > $data['start_time']){

			$whereData['create_time'] =[
				['gt',strtotime($data['start_time'])],
				['lt',strtotime($data['end_time'])]
			];
		}
		if(!empty($data['cat_id'])){

			$whereData['cat_id'] = intval($data['cat_id']);
		}
		if(!empty($data['title'])){

			$whereData['title'] = ['like','%'.$data['title'].'%'];
		}
		//var_dump($data);exit;
		//模式一
		//$news = model('News')->getNews();
		
		//模式二
		//page  size from  limit(from,size)
		
		//当前页
		$this->getPageAndSize($data);

		//获取数据
		$news = model('News')->getNewsByList($whereData,$this->from,$this->size);
		//获取列表总数
		$total = model('News')->getNewsByCount($whereData);
		//根据总数和每页的数据数算出有多少页   总页数
		$pageTotal = ceil($total/$this->size); //ceil(1.1) => 2 


		$cateres = model('Category')->catetree();

		return $this->fetch('',[
			'news' => $news,
			'cateres' => $cateres,
			'pageTotal' => $pageTotal,
			'curr' => $this->page,
			'start_time' => empty($data['start_time']) ? '' : $data['start_time'],
			'end_time' => empty($data['end_time']) ? '' : $data['end_time'],
			'cat_id' => empty($data['cat_id']) ? '' : $data['cat_id'],
			'title' => empty($data['title']) ? '' : $data['title'],
			'query' => $query,

		]);
	}


	public function add(){
		//是否post提交
		if(request()->isPost()){

			$data = input('post.');

			$validate = validate('News');

			if(!$validate->check($data)){

				return $this->result('',0,$validate->getError());

			}

			$data['thumb'] = str_replace('\\', '/', $data['thumb']);

			try {

			$id = model('News')->add($data);

			} catch (\Exception $e) {
				
				return $this->result('', 0 ,$e->getMessage());
			}

			if($id){
				$NewsContentData['content'] = $data['content'];
				$NewsContentData['news_id'] = $id;
				$ContentId = model('NewsData')->add($NewsContentData);
				if($ContentId){
					return $this->result('',1,'新增成功');	
				}else{
					return $this->result('',1,'主表插入成功,副标插入失败');
				}
			}else{

				return $this->result('', 0 ,'新增失败');
			}
			
		}else{

		$cateres = model('Category')->catetree();

		$this->assign('cateres',$cateres);

			return $this->fetch();
		}

		
	}


	public function edit(){

		if(request()->isPost()){

			$data = input('post.');
			if(isset($data['is_position']) == false){
				$data['is_position'] = 0;
			}
			//var_dump($data);exit;
			$validate = validate('News');

			if(!$validate->check($data)){

				return $this->result('',0,$validate->getError());
			}

			$data['thumb'] = str_replace('\\', '/', $data['thumb']);

			try {

				$id = model('News')->allowField(true)->save($data,['news_id' => $data['news_id']]);

			} catch (\Exception $e) {

				return $this->result('',0,$e->getMessage());
			}


			if($id){

				$NewsContentData['content'] = $data['content'];
				$NewsContentData['news_id'] = $data['news_id'];
				try {

					$ContentId = model('NewsData')
							   ->save($NewsContentData,['news_id' => $NewsContentData['news_id']]);

				} catch (\Exception $e) {

					return $this->result('',0,$e->getMessage());
				}
				
				if($ContentId){

					return $this->result('',1,'文章更新成功');
				}
					return $this->result('',1,'主表更新成功,附表更新失败');

			}

			return $this->result('',0,'更新失败');


			


		}

		$news = model('News')->find(input('id'));
		$newsContent = model('NewsData')->where('news_id',input('id'))->find();
		$news['content'] = $newsContent['content'];
		$cateres = model('Category')->catetree();

		return $this->fetch('',[

			'news' => $news,
			'cateres' => $cateres,
			
		]);
	}



	public function del(){

		$newsId = input('id');

		$del = model('News')->where('news_id',$newsId)->delete();

		if($del){

			return $this->result('',1,'删除成功');
		}

			return $this->result('',0,'删除失败');
	}
}



 ?>