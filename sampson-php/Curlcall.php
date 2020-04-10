<?php
	class Curlcall {

		public function executeCurl($url) {

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


			$headers = array();
			$headers[] = 'Accept: */*';
			$headers[] = 'Accept-Encoding: gzip, deflate';
			$headers[] = 'Authorization: Basic YXBpX3Rlc3Q6UmdYSktRUXNMRjVYN2FMb2Y5ZkRsbW9pelF2VWJ1WmM=';
			$headers[] = 'Cache-Control: no-cache';
			$headers[] = 'Connection: keep-alive';
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			$headers[] = 'Host: api.sampsonexpress.com.au';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			return json_decode($result);

			if (curl_errno($ch)) {
			    echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);

		}
	}
?>

