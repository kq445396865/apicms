<?php 

namespace app\common\validate;

use think\Validate;


class AdminUser extends Validate{

	protected $rule = [
		'username' => 'require|max:20',
		'password' => 'require|max:8',
	];
	protected $field = [
		'username' => '用户名称',
		'password' => '密码',

	];
}


 ?>