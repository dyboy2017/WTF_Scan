<?php
	error_reporting(0);
	set_time_limit(0);
	header("Content-Type:text/json;charset:utf8");

	$domain = isset($_GET['url'])?addslashes(trim($_GET['url'])):'';
	$action = isset($_GET['action'])?addslashes(trim($_GET['action'])):'';
	$type = isset($_GET['type'])?addslashes(trim($_GET['type'])):'2';
	

	$api_main = "http://127.0.0.1:5000/api/";//暂时未开放外网服务器API，请期待
	function curl_get($url)
	{
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36');
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		$content=curl_exec($ch);
		curl_close($ch);
		return($content);
	}

	switch($action){
		case "base_info":
			//基础信息
			$url = $api_main."baseinfo?target=".$domain;
			break;
		case "whois":
			//whois
			$url = $api_main."whois?target=".$domain;
			break;
		case "cms":
			//cms指纹
			$url = $api_main."cms?target=".$domain;
			break;
		case "ipaddress":
			$url = $api_main."ip2region?target=".$domain;
			break;
		case "subdomain":
			$url = $api_main."subdomain?target=".$domain;
			break;
		case "side_domain":
			$url = "http://www.webscan.cc/?action=query&ip=".$domain;
			break;
		case "part_ports":
			$url = $api_main."simple_portscan?target=".$domain;
			break;
		case "all_ports":
			$url = $api_main."all_portscan?target=".$domain;
			break;
		case "catalog":
			$url = $api_main."dir?target=".$domain."&type=".$type;
			break;
		case "short_file":
			$url = $api_main."shortname?target=".$domain;
			break;
		default:
			$url = "";
	}
	
	//如果参数不合法直接退出
	if($url == ""){
		$response = ['code'=>'0','msg'=>"小伙子，皮这一下你很开心？？？"];
		echo json_encode($response);
		exit();
	}
	

	$file=curl_get($url);
	
	echo $file;

	exit();

?>
