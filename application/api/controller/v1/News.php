<?php 

namespace app\api\controller\v1;

use think\Controller;

use app\common\lib\exception\ApiException;

class News extends Controller{


	public function index(){

		//获取传过来的ID
		
		$id = input('get.news_id');

		//halt($id);
		$news = model('News')->find($id);
		//halt($news);
		$newsContent = model('NewsData')->where('news_id',$id)->find();

		$news['content'] = $newsContent['content'];


			$result['news'] = [
				'title' => $news['title'],
				'description' => $news['description'],
				'content' => $news['content'],
			];


		return show(1,'OK',$result,200);
	}
}


 ?>