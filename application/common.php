<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

  function msg($status,$message,$data = array()){
       $result = array(
          'status' => $status,
          'message' => $message,
          'data' => $data,
       );
     exit(json_encode($result)); 
  }

  function pagination($obj){
  		if(!$obj){
        
  			return '';
  		}
  		$params = request()->param();

  		return $obj->appends($params)->render();
  }


  function getCatName($cats,$id){

  	foreach ($cats as $cat) {

  		$catlist[$cat['cat_id']] = $cat['cat_name'];
  	}

  	return isset($catlist[$id]) ? $catlist[$id] : '';
  }

  function isYesNo($str){

  		return $str ? '是' : '否';
  }
  
  function isredg($str){

  	return $str ? 'success' : 'error';
  }

  function getTypeForBanner($str){

      return $str ? '小程序' : '大图';
  }

  function getCatByNewsCount($id){
        

        $total = model('News')->getCatByNews($id);
        //echo $id;exit;

      return isset($total) ? $total : '0';
  }


  /**
   * 通用化api接口数据输出
   * int $status 业务状态码
   * srting $message 信息提示
   * [] data 数据
   * int $httpCode http状态码 
   * @return [type] [description]
   */
  function show($status,$message,$data,$httpCode){

      $data = [
        'status' => $status,
        'message' => $message,
        'data' => $data,
      ];

      return json($data,$httpCode);
  }







