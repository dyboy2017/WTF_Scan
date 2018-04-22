<!-- 
	作者：DYBOY
	博客：http://blog.csdn.net/dyboy2017
	Github:https://github.com/dyboy2017
	QQ:1099718640
 -->

<!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-transform" />

	<title>WTFScan-网络资产指纹在线扫描器V1.0</title>
	<meta name="keywords" content="WTFScan,扫描器,敏感信息,web安全,WEB资产扫描" />
	<meta name="description" content="WTFScan-网络资产指纹在线扫描器V1.0" />
	
	<meta name="apple-mobile-web-app-title" content="InfoScan">
	<meta name="generator" content="Pansousou_1.2" />
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script type="text/javascript" src="./js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script>
	<script type="text/javascript" src="./js/pagination.min.js"></script>
	
</head>
<body>

	<!-- 导航条 -->
	<nav class="navbar navbar-default">
      <div class="container-fluid">
      	<div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="./index.php"><img alt="Brand" width="128px"  src="./images/logo.png"></a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#" target="_blank"><i class="fa fa-bank"></i> 首页</a></li>
	        <li><a href="about.html" target="_blank"><i class="fa fa-user"></i> 关于我们</a></li>
	        <li><a href="https://github.com" target="_blank"><i class="fa fa-github"></i> 开源地址</a></li>
	        <li><a href="http://wpa.qq.com/msgrd?v=3&uin=1099718640&site=qq&menu=yes" target="_blank"><i class="fa fa-qq"></i> QQ联系</a></li>
	      </ul>
	    </div>
      </div>
    </nav>
	<div style="height: 100px" style="clear: both;"></div>


	<!-- 搜索页面 -->
	<div class="container" align="center">
		<div class="header">
			<h1 style="color: #666">WTFScan<span style="font-size:14px;">--挖洞 Soeasy</span></h1>
		</div>
		<div style="height: 10px" style="clear: both;"></div>
	    <div class="search_box">
			<div class="row">
			  <div class="col-lg-7" style="float: none;">
			    <div class="input-group">
			      <input type="text" class="form-control" id="input_word" style="height: 50px;" placeholder="请输入域名...">
			      <span class="input-group-btn">
			        <button class="btn btn-success" id="search_btn" type="button" style="height: 50px;padding: 8px 15px;cursor: pointer;">查询一下</button>
			      </span>
			    </div>
			  </div>
			</div>
	    </div>
	</div>
	
	<div style="height: 25px"></div>
	<div class="container center">

		<!-- 资产显示界面 -->
		<div class="result" style="display: none;">
			<!-- Tab 切换 -->
			<ul id="myTab" class="nav nav-tabs">

				<li class="active"><a href="#base_info" data-toggle="tab">基本信息</a></li>
				<li><a href="#whois" data-toggle="whois">Whois</a></li>
				<li><a href="#ipaddress" data-toggle="ipaddress">IP信息</a></li>
				<li><a href="#son_domain" data-toggle="son_domain">子域名</a></li>
				<li><a href="#side_domain" data-toggle="side_domain">旁站</a></li>
				<li class="dropdown">
					<a href="#" id="myTabDrop1" class="dropdown-toggle" 
					   data-toggle="dropdown">端口扫描 
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
						<li><a href="#part_ports" tabindex="-1" data-toggle="part_ports">常见端口</a></li>
						<li><a href="#all_ports" tabindex="-1" data-toggle="all_ports">全部端口</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" id="myTabDrop2" class="dropdown-toggle" 
					   data-toggle="dropdown">目录扫描
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop2">
						<li><a href="#catalog" tabindex="-1" data-toggle="catalog">目录文件爆破</a></li>
						<li><a href="#short_file" tabindex="-1" data-toggle="short_file">短文件扫描</a></li>
					</ul>
				</li>
				
			</ul>
			<div id="myTabContent" class="tab-content">

				<!-- 基本信息 -->
				<div class="tab-pane fade in active" id="base_info">
					<p>
						<table class="table table-striped">
							<tbody>
								<tr>
									<td>域名</td>
									<td><span class="domain"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
								<tr>
									<td>语言</td>
									<td><span class="language"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
								<tr>
									<td>服务器</td>
									<td><span class="os"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
								<tr>
									<td>中间件</td>
									<td><span class="server"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
								<tr>
									<td>指纹</td>
									<td><span class="cms"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
							</tbody>
						</table>
					</p>
				</div>
				<!-- whois -->
				<div class="tab-pane fade" id="whois">
					<p>
						<table class="table table-striped">
							<tbody>
								<tr>
									<td>顶级域名</td>
									<td><span class="top_domain"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><span class="emails"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
								<tr>
									<td>注册人</td>
									<td><span class="register"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
								<tr>
									<td>DNS解析</td>
									<td><span class="dns"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
								
							</tbody>
						</table>
					</p>
				</div>
				<!-- IP信息 -->
				<div class="tab-pane fade" id="ipaddress">
					<p>
						<table class="table table-striped">
							<tbody>
								<tr>
									<td>IP</td>
									<td><span class="ip"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
								<tr>
									<td>IP定位</td>
									<td><span class="ipaddress"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
							</tbody>
						</table>
					</p>
				</div>
				<!-- 子域名 -->
				<div class="tab-pane fade" id="son_domain">
					<p>
						<table class="table table-striped">
							<tbody class="sub_domain">
								<tr>
									<td>子域名</td>
									<td><span class="son_domain"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
							</tbody>
						</table>
					</p>
				</div>
				<!-- 旁站 -->
				<div class="tab-pane fade" id="side_domain">
					<p style="margin:5px;cursor: pointer;">
						<button class="btn btn-success side_domain">点击查询旁站</button>
					</p>
					<p>
						<table class="table table-striped">
							<tbody class="side_domains">

							</tbody>
						</table>
					</p>
				</div>
				<!-- 部分端口扫描 -->
				<div class="tab-pane fade" id="part_ports">
					<p style="margin:5px;cursor: pointer;">
						<button class="btn btn-success part_ports_btn">点击扫描常见端口</button>
					</p>
					<p>
						<table class="table table-striped part_ports_is" style="display: none;">
							<tbody>
								<tr>
									<td>开放端口</td>
									<td><span class="part_ports"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
							</tbody>
						</table>
					</p>
				</div>
				<!-- 全部端口扫描 -->
				<div class="tab-pane fade" id="all_ports">
					<p style="margin:5px;cursor: pointer;">
						<button class="btn btn-danger all_ports_btn">点击扫描全部端口</button>
					</p>
					<p>
						<table class="table table-striped all_ports_is" style="display: none;">
							<tbody class="all_ports">
								<tr>
									<td>开放端口</td>
									<td><span class="all_ports"><i class="fa fa-spinner load_icon"></i></span></td>
								</tr>
							</tbody>
						</table>
					</p>
				</div>
				<!-- 网站sitemap -->
				<div class="tab-pane fade" id="catalog">
					<p style="margin:5px;cursor: pointer;">
						<button class="btn btn-success catalog_scan">点击扫描敏感目录</button>
						<p>
						  <div class="checkbox">
						  	请选择需要扫描的网站语言类型<br/>
						    <label>
						      <input type="checkbox" value="0">ASP
						    </label>
						    <label>
						      <input type="checkbox" value="1">ASPX
						    </label>
						    <label>
						      <input type="checkbox" value="2">DIR
						    </label>
						    <label>
						      <input type="checkbox" value="3">JSP
						    </label>
						    <label>
						      <input type="checkbox" value="4">MDB
						    </label>
						    <label>
						      <input type="checkbox" value="5">PHP
						    </label>
						  </div>
						</p>
					</p>
					<p>
						<table class="table table-striped">
							<tbody class="catalog">
								
							</tbody>
						</table>
					</p>
				</div>
				
				<!-- 短文件扫描 -->
				<div class="tab-pane fade" id="short_file">
					<p style="margin:5px;cursor: pointer;">
						<input type="text" id="short_input" placeholder="请输入域名"/>
						<button class="btn btn-danger short_file_btn">点击扫描</button>
					</p>
					<p>
						<table class="table table-striped">
							<tbody class="short_file">
								<!-- ..... --->
							</tbody>
						</table>
					</p>
				</div>
				
				
			</div>
		</div>
	</div>

	<div style="height: 250px"></div>
	<div class="footer">
		<div class="description">
			<p>免责申明：本站仅提供搜索服务，不存储任何资源，所有搜索结果均源于网络，若由用户非法使用造成的后果与本站无关！热爱祖国，为人民服务！</p>
		</div>
		<div class="copyright">
			<img src="./images/icon_police.png" width="16px">
			备案号：渝ICP备16008772号
		</div>
	</div>
	
	<script type="text/javascript">
		var check_url = ""; //搜索的url

		//旁站查询
		function side_domains(){
			var ip = $(".ip").text();
			if(ip){
				$.get("api.php?action=side_domain&url="+ip,function(data,status){
					if(status){
						var str = "";
						var i = 0;
						$.each(data,function(index,obj){
							str = str + '<tr><td>'+(++i)+'&nbsp<a href="https://api.dyboy.cn/go/?url='+obj.domain+'" target="_blank">'+obj.domain+'</td><td>'+obj.title+'</td></tr>';
						})
						$(".side_domains").html(str);
					}
					else{
						console.log('旁站获取失败');
						return;
					}
				})
			}
			else{
				$("#side_domain").html('<p>请先获取IP</p>');
				return;
			}
		}
		
		//端口扫描
		function part_ports_scan(url){
			$.get("api.php?action=part_ports&url="+url,function(data,status){
				if(status){
					$(".part_ports").text(data.data);
				}
			})
		}
		
		//端口扫描
		function all_ports_scan(url){
			$.get("api.php?action=all_ports&url="+url,function(data,status){
				if(status){
					$(".all_ports").text(data.data);
				}
			})
		}
		
		//基本信息
		function baseInfo(url){
			if(url){
				$("#search_btn").attr("disabled",'true');
				$(".result").show();
				//获取基本信息
				$(".domain").text(url);
				$.get("api.php?action=base_info&url="+url,function(data,status){
					if(status){
						$(".ip").text(data.data.ip);
						$(".language").text(data.data.language);
						$(".os").text(data.data.os);
						$(".server").text(data.data.server);
					}
					else{
						console.log("服务器正忙,请稍后再试");
						return;
					}
				})

				//whois
				$.get("api.php?action=whois&url="+url,function(data,status){
						if(status){
							$(".top_domain").text(data.data.domain_name);
							$(".emails").text(data.data.emails);
							$(".dns").text(data.data.name_servers);
							$(".register").text(data.data.registrar);
						}
						else{
							console.log('whois请求出错');
							return;
						}
				})

				//IP地址定位
				$.get("api.php?action=ipaddress&url="+url,function(data,status){
					if(status){
						$(".ipaddress").text(data.data.region);
					}
					else{
						console.log('IP地址获取出错');
						return;
					}
				})

				//子域名
				$.get("api.php?action=subdomain&url="+url,function(data,status){
					if(status){
						var str = "";
						var i = 1;
						$.each(data.data,function(index,obj){
							str = str + '<tr><td>子域名'+(i++)+'</td><td><a target="_blank" href="https://api.dyboy.cn/go/?url='+obj+'">'+obj+'</a></td></tr>';
						})
						$(".sub_domain").html(str);
					}
					else{
						console.log("子域名获取出错");
						return;
					}
				})
				
				//指纹信息
				$.get("api.php?action=cms&url="+url,function(data,status){
					if(status){
						console.log(data.data);
						$(".cms").text(data.data.cms_name);
					}
					else{
						console.log("cms请求出错");
						return;
					}
				})

			}
			else{
				alert("请输入正确的查询域名")
				return;
			}
		}
		
		//目录扫描
		function catalog_scan(url,arr){
			$.get("api.php?action=catalog&url="+url+"&type="+arr,function(data,status){
				var i = 0;
				if(status){
					var str200 = "";
					var str403 = "";
					
					$.each(data.data,function(index,obj){
						if(obj[0] == 403){
							str403 = str403 + '<tr style="color:red"><td>'+(++i)+"状态码:"+obj[0]+'</td><td>'+obj[1]+'</td></tr>';
						}
						else{
							str200 = str200+'<tr style="color:#5cb85c"><td>'+(++i)+"状态码:"+obj[0]+'</td><td>'+obj[1]+'</td></tr>';
						}
						$(".catalog").html(str200+str403);
					})
				}
				else{
					console.log('目录爆破出错');
					return;
				}
			})
		}

		//短文件扫描
		function short_file_scan(url){
			if(url){
				$.get("api.php?action=short_file&url="+url,function(data,status){
					if(data.status){
						$.each(data.data.dir,function(index,obj){
							//目录
							$(".short_file").append('<tr><td>目录'+(index+1)+'</td><td>'+obj+'</td></tr>');
						});
						$.each(data.data.file,function(index,obj){
							//目录
							$(".short_file").append('<tr><td>文件'+(index+1)+'</td><td>'+obj+'</td></tr>');
						})
					}
					else{
						$(".short_file").append('<tr><td>结果：</td><td style="color:red">'+data.data+'</td></tr>');
						console.log(data.data);
						
					}
					
					
				})
			}
			else{
				$("#short_input").focus();
			}
			
		}

		$(document).ready(function(){

			//tab切换
			$('#myTab a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})

			//单击搜索按钮
			$("#search_btn").click(function(){
				var search_keyword = $("#input_word").val();
				//判断输入是否完整
				if(search_keyword == ""){
					alert("请输入查询域名");
					$("#input_word").focus();
					return;
				}
				re = new RegExp("^[^\u4e00-\u9fa5]{0,}$");
				if(!re.test(search_keyword) || search_keyword.length < 4){
					alert("请输入正确的查询域名");
					return;
				}

				//过滤不安全字符
				for(var loc = 0;loc<search_keyword.length;loc++){
					if((search_keyword.charAt(loc) == '"')||(search_keyword.charAt(loc) == '&')||(search_keyword.charAt(loc) == ';')||(search_keyword.charAt(loc) == '#')||(search_keyword.charAt(loc) == '%')||(search_keyword.charAt(loc) == '!')||(search_keyword.charAt(loc) == '\'')||(search_keyword.charAt(loc) == '')||(search_keyword.charAt(loc) == '\\')||(search_keyword.charAt(loc) == ';')||(search_keyword.charAt(loc) == '?')||(search_keyword.charAt(loc) == '<')||(search_keyword.charAt(loc) == '>')){
						alert("请不要输入非法参数！");
						return false;
					}
				}


				var urlArr = search_keyword.split("/");
				var realdomain = urlArr[2] ? urlArr[2] : urlArr[0];
				check_url = realdomain;
				
				
				//调用api查询基本信息
				baseInfo(realdomain);
			})


			//旁站查询
			$(".side_domain").click(function(){
				$(this).attr("disabled","true");
				$(this).html('扫描中...<span class="part_ports"><i class="fa fa-spinner load_icon" style="color:#fff;"></i></span>');
				side_domains();
			})

			//常见端口扫描
			$(".part_ports_btn").click(function(){
				$(this).attr("disabled","true");
				$(".part_ports_is").show();
				$(this).text("端口扫描的速度较慢，请耐心等待...");
				$(this).append('<b style="color:red">需要扫描[21,22,23,135,445,443,80,1433,3306,3389,6379,8080,8088]端口</b>');
				part_ports_scan(check_url);
			})


			//全部端口扫描
			$(".all_ports_btn").click(function(){
				$(this).attr("disabled","true");
				$(".all_ports_is").show();
				$(this).text("扫描全部端口的速度较慢，请耐心等待...");
				$(this).append('<b>需要扫描65535个端口</b>');
				all_ports_scan(check_url);
			})

			//扫描敏感目录
			$(".catalog_scan").click(function(){
				var arr =[];
				$.each($("input[type=checkbox]:checked"),function(index,obj){arr.push(obj.value)})
				arr = arr.join(",");
				if(arr != ''){
					$(this).attr("disabled","true");
				    $(this).html('扫描中...<span class="part_ports"><i class="fa fa-spinner load_icon" style="color:#fff;"></i></span>');
					catalog_scan(check_url,arr);
				}
				else{
					alert("还未选择扫描类型！");
					return;
				}
				
			});
			
			//短域名获取
			$(".short_file_btn").click(function(){
				var url = $("#short_input").val();
				//console.log(url);
				short_file_scan(url);
			})


		})
	</script>
	
</body>
</html>
