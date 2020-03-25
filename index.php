<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>李培培</title>
		<link rel="icon" href="images/git.png" type="image/x-icon" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap.css">
		<script src="jquery.js"></script>
		<script src="bootstrap.js"></script>
		<script src="vue.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/animate.css@3.5.1" rel="stylesheet" type="text/css">
		<style type="text/css">
			#div0 {
				background:url("images/b1.jpg");
				background-size: 100% 100%;
				background-repeat: no-repeat;
			}

			#div1{
				z-index: 3;
				background:url("images/map.jpg");
				background-repeat: no-repeat;
				background-size: contain;
				background-position:right;
				box-shadow: 10px 5px 5px #aaaaaa;
			}
		  	#div2{
		  		z-index: 2;
				background:url("images/gitcolor.png");
				background-repeat: no-repeat;
				background-size: contain;
				background-position:right;
				box-shadow: 10px 5px 5px #aaaaaa;
			}
			#div3{
				z-index: 1;
				background:url("images/photo.jpg");
				background-repeat: no-repeat;
				background-size: contain;
				background-position:right;
				box-shadow: 10px 5px 5px #aaaaaa;
			}

			#div1:hover,#div2:hover,#div3:hover{
				transform:translate(0px,-12px);
				/*transition-timing-function:ease-in-out; */
				transition-duration: 0.8s;
			}
			
			#stock_img,#bing_img{
				width:100%;
				box-shadow: 10px 10px 5px #aaaaaa;
			}
			#stock_img:hover{
				transform: scale(1.1,1.1);
				transition-duration: 2s;
			}
			#bing_img:hover{
				transform: rotate(360deg);
				transition-duration: 3s;
			}
		    }
		    .li{
		    	width: 80%;
		    	margin-top: 0px;
			    margin-right: auto;
			    margin-bottom: 20px;
			    margin-left: auto;
			    float: none;
			    list-style: none;
			    padding-top: 0px;
			    padding-right: 19px;
			    padding-bottom: 0px;
			    padding-left: 19px;
			    box-sizing: border-box;
			    list-style: none;

		    }
	    .span_red{
		color:red;
			
		}
		.span_green{
			font-weight:bold;
			color: green;
		}
  		</style>
	</head>
	<body>
	
<div class="jumbotron text-center" id="div0" @click="show=!show">
		<h1>李培培的个人网站</h1>
		<transition
		name="custom-classes-transition"
		enter-active-class="animated tada"
		leave-active-class="animated bounceOutRight">
		<p v-if="show">记录学习历程，分享心得体会</p>
		</transition>
	</div>

	<div class="container">
		<div class="row" id="div01">
		<div class="col-sm-4" id="div1" >
	    	<a href="map.html">
	    	 	<h3>第一项</h3>
				<p class="text-muted">地图</p>
	     	</a>
	    </div>

	    <div class="col-sm-4" id="div2">
	    	<a href="https://github.com/lipeiv">
	    		<h3>第二项</h3>
	      		<p class="text-muted">GitHub</p>
	    	</a>	
	    </div>
	    
	    <div class="col-sm-4" id="div3">	      
	      	<a href="photo.html">
	      		<h3>第三项</h3> 
	      		<p class="text-muted">相册</p>
	      	</a>
	    </div>
	    </div>
	</div>

	<div class="container">		

		<br>
		<iframe height=388 width=100% src='http://player.youku.com/embed/XNDMxNDM2NTU3Ng==' frameborder=0 allowfullscreen></iframe>
	<table class="table">
		
		<thead>
			<tr>
				<th>股票名称</th>
				<th>当前价格</th>
				<th>涨跌幅</th>
			</tr>
		</thead>
		<tbody>
			<tr class="active">
				<td id="name1">1</td>
				<td id="price1"></td>
				<td id="percent1"></td>
			</tr>
			<tr class="active">
				<td id="name2">2</td>
				<td id="price2"></td>
				<td id="percent2"></td>
			</tr>
			<tr class="active">
				<td id="name3">3</td>
				<td id="price3"></td>
				<td id="percent3"></td>
			</tr>
			<tr class="active">
				<td id="name4">4</td>
				<td id="price4"></td>
				<td id="percent4"></td>
				
			</tr>
		</tbody>
	</table>
	<img id="stock_img" src="http://image.sinajs.cn/newchart/daily/n/sh000001.gif">
		<br><br>
		<?php
		$date_str = date("Y年m月d日");
		echo "今天是 ". $date_str . "<br>";
		echo "现在时间是 " . date("ah:i:s")."<br>";
		$d1=strtotime("December 31");
		$d2=ceil(($d1-time())/60/60/24);
		echo "2020年还剩：" . $d2 ." 天。";
		
		//bing图片展示与保存
		$url_1 = file_get_contents("http://guolin.tech/api/bing_pic");
		print "<img id='bing_img' src=$url_1>";
		$url_2 = file_get_contents($url_1);
		$myfile = fopen("bing/$date_str.jpg", "w");
		fwrite($myfile, $url_2);
		fclose($myfile);

		?>

	</div>
	
	<div class="container">
	<table class="table">
			<thead>
				<tr>
					<th>留言</th>
					<th>内容</th>
					<th>日期</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					//连接数据库
					$con = mysql_connect("b-d27lemdbo4rdsc.bch.rds.gz.baidubce.com:3306","b_d27lemdbo4rdsc","lipeipei");
					if (!$con)
					  {
					  die('Could not connect: ' . mysql_error());
					  }
					
					//选择表
					mysql_select_db("b_d27lemdbo4rdsc", $con);
					
					//查询值
					$result = mysql_query("SELECT * FROM Persons");

					while ($row = mysql_fetch_array($result)) {
						echo "<tr class='active'><td>".$row["Name"]."</td><td>".$row["Content"]."</td><td>".$row['Date_Time']."</td></tr>";
					}

					//关闭数据库
					mysql_close($con);

				?>
				
			</tbody>
		</table>
		<form action="insert.php" method="post" >
			<div class="form-group">
				<textarea class="form-control" name="content" placeholder="留言板"></textarea>
				<input type="text" name="name" placeholder="请输入姓名">
			</div>
				<input type="reset" name="重置">
				<input type="submit" name="提交">
		</form>


		<?php
		    if(!file_exists("count.txt")){
		        $one_file=fopen("count.txt","w+"); //建立一个统计文本，如果不存在就创建
		        echo"您是本网站第<font color='red'><b>1</b></font>位访客"; //首次直接输出第一次
		        fwrite("count.txt",1);  //把数字1写入文本
		        fclose($one_file);
		     }
		     else{ //如果不是第一次访问直接读取内容，并+1,写入更新后再显示新的访客数
		        $num=file_get_contents("count.txt");
		        $num++;
		        file_put_contents("count.txt","$num");
		        $newnum=file_get_contents("count.txt");
		        echo"<p align=right>您是本网站第<font color='red'><b>".$newnum."</b></font>位访客</p>";
		    }
		?>

	</div>
	
	<p align="center">版权所有 © 2010-<?php echo date("Y")?></p>
	
	<script type="text/javascript" src="http://hq.sinajs.cn/list=sh000001,sh600050,sh600839,sz000100" charset="UTF-8"></script>
	<script type = "text/javascript">
		new Vue({
			el: '#div0',
			data: {
				show: true
			}
		})
	</script>
	<script>
		function stock(s_id,name_id,price_id,percent_id){
		var element = s_id.split(",");
		name=element[0];
		price=element[3];
		price=Math.round(price*100)/100;
		old_price = element[2];
	    percent = (price-old_price) / old_price;
	    percent = percent * 100;
	    percent = Math.round(percent*100)/100;
	    document.getElementById(name_id).innerHTML=name;
	    if (percent>=0){
	    	 document.getElementById(price_id).innerHTML='<span class="span_red">'+price+"</span>";
	    document.getElementById(percent_id).innerHTML='<span class="span_red">+'+percent+"%</span>";
	    }
	    else{
	    	document.getElementById(price_id).innerHTML='<span class="span_green">'+price+"</span>";
	    document.getElementById(percent_id).innerHTML='<span class="span_green">'+percent+"%</span>";
	    }
	}

		stock(hq_str_sh000001,"name1","price1","percent1");
		stock(hq_str_sh600050,"name2","price2","percent2");
		stock(hq_str_sh600839,"name3","price3","percent3");
		stock(hq_str_sz000100,"name4","price4","percent4");
	</script>
	
	
	</body>
</html>

