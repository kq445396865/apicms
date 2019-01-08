<?php 

namespace app\common\validate;

use think\Validate;



class Banner extends Validate{

	protected $rule = [

		'title' => 'unique:banner|require',
		'thumb' => 'require',

	];

	protected $field = [

		'title' => '图片名称',
		'thumb' => 'banner图片',
	];
}



 ?>