<?php 

namespace app\admin\controller;

use think\controller;

use think\Request;

use app\common\lib\Upload;
/**
 *	后台图片上传相关逻辑
 *
 * 
 */

class Image extends Base {

	/**
	 * 图片上传
	 * @return [type] [description]
	 */
	public function upload(){

		$file =  Request::instance()->file('file');
		//上传图片到指定文件夹中
		$info = $file->move('upload');

		if($info && $info->getPathname()){

			$data = [
				'status' => 1,
				'message' => 'OK',
				'data' => '/'.$info->getPathname(),

			];

			echo json_encode($data);exit;
		}

		echo json_encode(['status' => 0,'message' => '上传失败']);
	}


	public function upload0(){
		try {
			$image = Upload::image();
		} catch (\Exception $e) {

			echo json_encode(['status' => 0,'message' => $e->getMessage()]);
		}
		
		if($image){
			$data = [
				'status' => 1,
				'message' => 'OK',
				'data' => config('qiniu.image_url').'/'.$image,
			];
			echo json_encode($data);exit;
		}else{

			echo json_encode(['status' => 0,'message' => '上传失败']);
		}
	}



}


 ?>