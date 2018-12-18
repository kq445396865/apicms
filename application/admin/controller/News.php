<?php 
namespace app\admin\controller;

use think\controller;




/**
 * 文章列表
 */

class News extends Base{



	public function index(){

		$news = model('News')->getNews();

		$cateres = model('Category')->catetree();

		return $this->fetch('',[
			'news' => $news,
			'cateres' => $cateres,
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
}



 ?>