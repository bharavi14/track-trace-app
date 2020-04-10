<?php
	require('Curlcall.php');
	
	class Trackandtrace {

		private $curlcall;

		public function __construct(Curlcall $curlcall) {

			$this->curlcall = $curlcall;
		}

		public function getStatus() {
 
			//connete number : CAAO150201
			$_REQUEST['clientID'] = '1404';
			$url = 'https://api.sampsonexpress.com.au/v3.2/customers/'.$_REQUEST['clientID'].'/tracking/'.trim($_REQUEST['param']);

			$response = $this->curlcall->executeCurl($url);

			header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
			header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
			header('Access-Control-Max-Age: 1000');
			header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

			echo json_encode($response->response);

		}
	}

	$curlcall = new Curlcall();
	$trackObj = new Trackandtrace($curlcall);
	$trackObj->getStatus();

?>

