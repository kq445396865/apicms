<?php 

namespace app\common\validate;

use think\Validate;


class Category extends Validate {

	protected $rule = [
		'cat_name' => 'require|max:20',
		'type' => 'require',

	];
	protected $field = [
		'cat_name' => '栏目名称',
		'type' => '栏目类型',

	];
}


 ?>