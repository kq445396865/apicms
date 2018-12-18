<?php 

namespace app\common\lib\exception;

use think\Exception;



class ApiException extends Exception{

		public $message = '';
		public $httpCode = 500;
		public $code = 0;
		/**
		 * [__construct description]
		 * @param string  $message  [description]
		 * @param integer $httpCode [description]
		 * @param integer $code     [description]
		 */
		public function __construct($message='',$httpCode=0,$code=0){

				$this->httpCode = $httpCode;
				$this->message = $message;
				$this->code = $code; 
		}
}



 ?>