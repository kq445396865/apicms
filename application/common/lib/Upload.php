<?php 
namespace app\common\lib;



//引入鉴权类
use Qiniu\Auth;
//引入上传类
use Qiniu\Storage\UploadManager;
vendor('qiniu.php-sdk.autoload');//引入七牛自动加载类（这个是必要条件，没他闹不成）

class Upload {
	/**
	 * 图片上传
	 */
	public static function image(){

		if(empty($_FILES['file']['tmp_name'])) {

			exception('您提交的数据不合法', 404);
		}
		//要上传的文件
		$file = $_FILES['file']['tmp_name'];

		//$ext = explode('.', $_FILES['file']['name']);
		//$ext = $ext[1];
		$pathinfo = pathinfo($_FILES['file']['name']);
		$ext = $pathinfo['extension'];

		$config = config('qiniu');
		//构建一个鉴权对象
		$auth = new Auth($config['ak'],$config['sk']);
		//生成一个上传的token
		$token = $auth->uploadToken($config['bucket']);
		//上传后保存的文件名称
		$key = date('Y')."/".date('m')."/".substr(md5($file), 0, 5).date('YmdHis').rand(0,9999).'.'.$ext;
		//初始化UploadManager类
		$uploadMag = new UploadManager();
		list($res,$err) = $uploadMag->putFile($token,$key,$file);
		if($err !==null){
			return null;
		}else{
			return $key;
		}
		
	}
}


 ?>