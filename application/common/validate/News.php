<?php 

namespace app\common\validate;

use think\Validate;


class News extends Validate{

	protected $rule = [
		'title' => 'unique:news|require',
		'cat_id' => 'require',
		'content' => 'require',
	];
	protected $field = [

		'title' => '文章名称',
		'cat_id' => '所属栏目ID',
		'content' => '文章内容',
	];
}







 ?>