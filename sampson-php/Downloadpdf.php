<?php
	require('Curlcall.php');
	
	class Downloadpdf {

		private $curlcall;

		public function __construct(Curlcall $curlcall) {

			$this->curlcall = $curlcall;
		}

		public function getPdf() {

			//connete number : CAAO150201
			//echo $_REQUEST['cno'];exit;
			$_REQUEST['clientID'] = '1404';
			$url = 'https://api.sampsonexpress.com.au/v3.2/customers/'.$_REQUEST['clientID'].'/pod/'.$_REQUEST['cno'];
			$response = $this->curlcall->executeCurl($url);
			//var_dump($response->response->filename);exit;
			//header("Content-Type: application/octet-stream"); 
  
			$fileContent = $response->response->fileContent; 
			$filename = $response->response->filename;

			$binary = base64_decode($fileContent);
			//header('Content-Type: bitmap; charset=utf-8');
			$fileContent = fopen('pdf/'.$filename, 'wb');
			fwrite($fileContent, $binary);
			fclose($fileContent);
 
		    /*$file = ("pdf/".$filename);
		    $filetype = filetype($file);
		    $filename = basename($file);
		    header("Content-type:application/json");
		    header ("Content-Length: ".filesize($file));
		    header ("Content-Disposition: attachment; filename=".$filename);
		    header('Access-Control-Allow-Origin: *');
		
		    readfile($file);*/
		    header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
			header('Access-Control-Max-Age: 1000');
			header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
			
		    echo json_encode(array('filename' => $response->response->filename));
		}

	}

	$curlcall = new Curlcall();
	$pdfObj = new Downloadpdf($curlcall);
	$pdfObj->getPdf();

?>

