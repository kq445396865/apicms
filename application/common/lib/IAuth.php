<?php 
namespace app\common\lib;


class IAuth {

	public static function getMd5Password($data){

			return md5($data.config('app.password_pre_halt'));
	}
}


 ?>