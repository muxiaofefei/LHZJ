
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>标签管理</title>
</head>
<body>
<style type="text/css">
*{margin:0;padding:0;list-style-type:none;outline:none;}
a,img{border:0;}
em{font-style:normal;}
body{font-size:12px;font-family:microsoft yahei;}
a,a:visited{color:#5e5e5e;text-decoration:none;}
a:hover{color:#3366cc!important;text-decoration:none;}
.clear{display:block;overflow:hidden;clear:both;height:0;line-height:0;font-size:0;}
.clearfix:after{content:".";display:block;height:0;clear:both;visibility:hidden;}
.clearfix{display:inline-table;}/* Hides from IE-mac \*/
*html .clearfix{height:1%;}
.clearfix{display:block;}/* End hide from IE-mac */
*+html .clearfix{min-height:1%;}
.demo{width:450px;margin:40px auto;position:relative;}
/* Form input */
.Form li{font-size:21px;font-weight:300}
.Form input[type=text],.Form input[type=password],.Form textarea{
	display:inline-block;padding:6px 12px;font-size:18px;font-weight:300;line-height:1.4;color:#221919;background:#fff;border:1px solid #a4a2a2;	
	box-sizing:border-box;
	-moz-box-sizing:border-box;
	-ms-box-sizing:border-box;
	-webkit-box-sizing:border-box;	
	border-radius:6px;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;	
	box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);
	-moz-box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);
	-webkit-box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);	
	-webkit-transition:all .08s ease-in-out;
	-moz-transition:all .08s ease-in-out;
}
.Form textarea{min-height:90px}
.Form label{display:inline-block;line-height:1.4em;font-size:18px}
.Form input[type=text]:focus,.Form input[type=password]:focus,.Form textarea:focus{
	border-color:#006499;
	box-shadow:0 1px rgba(34, 25, 25, 0.15) inset, 0 1px rgba(255, 255, 255, 0.8), 0 0 14px rgba(82, 162, 235, 0.35);
	-moz-box-shadow:0 1px rgba(34, 25, 25, 0.15) inset, 0 1px rgba(255, 255, 255, 0.8), 0 0 14px rgba(82, 162, 235, 0.35);
	-webkit-box-shadow:0 1px rgba(34, 25, 25, 0.15) inset, 0 1px rgba(255, 255, 255, 0.8), 0 0 14px rgba(82, 162, 235, 0.35);
}
.FancyForm li,.FancyForm li .input{position:relative}
.FancyForm input[type=text],.FancyForm input[type=password],.FancyForm textarea{
	position:relative;z-index:3;display:block;width:100%;background:transparent;border:1px solid #a4a2a2;	
	border-radius:6px;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;	
	box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);
	-moz-box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);
	-webkit-box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);
	-webkit-transition:all .08s ease-in-out;
	-moz-transition:all .08s ease-in-out;
}
.FancyForm textarea{min-height:3.95em;line-height:1.3}
.FancyForm label{
	position:absolute;z-index:2;top:7px;left:13px;display:block;color:#BCBCBC;cursor:text;	
	-moz-user-select:none;
	-webkit-user-select:none;	
	-moz-transition:all .16s ease-in-out;
	-webkit-transition:all .16s ease-in-out;
}
.FancyForm .fff{
	position:absolute;z-index:1;top:0;right:0;left:3px;bottom:0;background-color:#fff;	
	border-radius:8px;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
}
.FancyForm input[type=text]:focus+label,.FancyForm input[type=password]:focus+label,.FancyForm textarea:focus+label{opacity:.5;filter:alpha(opacity="50");}
.FancyForm .val label{left:-9999px;opacity:0!important;filter:alpha(opacity="0")!important;}
/* Button base */
.Button{
	position:relative;
	display:inline-block;
	padding:.45em .825em .45em;
	text-align:center;
	line-height:1em; 
	border:1px solid transparent;
	cursor:pointer; 	 
	border-radius:.3em; 
	background:#39F;
	color:#fff;
}
/* tag */
.default-tag a,.default-tag a span,.plus-tag a,.plus-tag a em,.plus-tag-add a{background:url(images/tagbg.png) no-repeat;}
.tagbtn a{color:#333333;display:block;float:left;height:22px;line-height:22px;overflow:hidden;margin:0 10px 10px 0;padding:0 10px 0 5px;white-space:nowrap;}
/* default-tag */
.default-tag{padding:16px 0 0 0;}
.default-tag a{background-position:100% 0;}
.default-tag a:hover{background-position:100% -22px;}
.default-tag a span{padding:0 0 0 11px;background-position:0 -60px;}
.default-tag a:hover span{background-position:0 -98px;}
.default-tag a.selected{opacity:0.6;filter:alpha(opacity=60);}
.default-tag a.selected:hover{background-position:100% 0;cursor:default;}
.default-tag a.selected:hover span{background-position:0 -60px;}
/* plus-tag */
.plus-tag{padding:0 0 10px 0;}
.plus-tag a{background-position:100% -22px;}
.plus-tag a span{float:left;}
.plus-tag a em{display:block;float:left;margin:5px 0 0 8px;width:13px;height:13px;overflow:hidden;background-position:-165px -100px;cursor:pointer;}
.plus-tag a:hover em{background-position:-168px -64px;}
/* plus-tag-add */
.plus-tag-add li{height:56px;position:relative;}
.plus-tag-add li .label{position:absolute;left:-110px;top:7px;display:block;}
.plus-tag-add button{float:left;}
.plus-tag-add a{float:left;margin:12px 0 0 20px;display:inline;font-size:18px;background-position:-289px -59px;padding:0 0 0 16px;}
.plus-tag-add a.plus{background-position:-289px -96px;}
</style>
<div class="demo">	

<a href="../">首页</a>



	<div class="plus-tag-add">
			<ul class="Form FancyForm">
				<li>
					<span class="label">我的标签：</span>
					<input id="" name="" type="text" class="stext" maxlength="20" />
					<label>输入标签</label>
					<span class="fff"></span>
				</li>
				<li>
					<button type="button" class="Button RedButton" style="font-size:22px;">添加标签</button>
					<!-- <a href="javascript:void(0);">展开推荐标签</a> -->
				</li>
			</ul>
	</div>
	

<?php 
include('conn.php');
$stmt = $pdo->query('select tagname from tags'); //返回一个PDOStatement对象
$rows=$stmt->fetchAll(PDO::FETCH_BOTH);//既有索引键也有关联键

 ?>



	<div class="plus-tag tagbtn clearfix" id="myTags">
		<?php foreach ($rows as $k) { ?>
			<a value="-1" title="<?=$k['tagname']?>" href="javascript:void(0);"><span><?=$k['tagname']?></span><em></em></a>
		<?php } ?>		
		
	
	</div>

    <!--plus-tag-add end-->	
	<div id="mycard-plus" style="display:none;">
		<div class="default-tag tagbtn">
			<div class="clearfix">
				<a value="-1" title="互联网" href="javascript:void(0);"><span>站长素材</span><em></em></a>
				<a value="-1" title="移动互联网" href="javascript:void(0);"><span>移动互联网</span><em></em></a>
				<a value="-1" title="it" href="javascript:void(0);"><span>it</span><em></em></a>
				<a value="-1" title="电子商务" href="javascript:void(0);"><span>电子商务</span><em></em></a>
				<a value="-1" title="广告" href="javascript:void(0);"><span>广告</span><em></em></a>
				<a value="-1" title="网络编辑" href="javascript:void(0);"><span>网络编辑</span><em></em></a>
				<a value="-1" title="产品经理" href="javascript:void(0);"><span>产品经理</span><em></em></a>
				<a value="-1" title="程序员" href="javascript:void(0);"><span>程序员</span><em></em></a>
				<a value="-1" title="网管" href="javascript:void(0);"><span>网管</span><em></em></a>
				<a value="-1" title="文案策划" href="javascript:void(0);"><span>文案策划</span><em></em></a>
				<a value="-1" title="java工程师" href="javascript:void(0);"><span>java工程师</span><em></em></a>
				<a value="-1" title="php工程师" href="javascript:void(0);"><span>php工程师</span><em></em></a>
				<a value="-1" title="dreamweaver" href="javascript:void(0);"><span>dreamweaver</span><em></em></a>
				<a value="-1" title="photoshop" href="javascript:void(0);"><span>photoshop</span><em></em></a>
				<a value="-1" title="公文写作" href="javascript:void(0);"><span>公文写作</span><em></em></a>
				<a value="-1" title="70后" href="javascript:void(0);"><span>70后</span><em></em></a>
				<a value="-1" title="80后" href="javascript:void(0);"><span>80后</span><em></em></a>
				<a value="-1" title="加班狂" href="javascript:void(0);"><span>加班狂</span><em></em></a>                   
			</div>
			<div class="clearfix" style="display:none;"><a value="-1" title="媒体" href="javascript:void(0);"><span>媒体</span><em></em></a></div>
			<div class="clearfix" style="display:none;"><a value="-1" title="网络营销" href="javascript:void(0);"><span>网络营销</span><em></em></a></div>
		</div>
		<div align="right"><a href="javascript:void(0);" id="change-tips" style="color:#3366cc;">换一换</a></div>
	</div>
    <!--mycard-plus end-->		
</div>





<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
var FancyForm=function(){
	return{
		inputs:".FancyForm input, .FancyForm textarea",
		setup:function(){
			var a=this;
			this.inputs=$(this.inputs);
			a.inputs.each(function(){
				var c=$(this);
				a.checkVal(c)
			});
			a.inputs.live("keyup blur",function(){
				var c=$(this);
				a.checkVal(c);
			});
		},checkVal:function(a){
			a.val().length>0?a.parent("li").addClass("val"):a.parent("li").removeClass("val")
		}
	}
}();
</script>

<script type="text/javascript">
$(document).ready(function() {
	FancyForm.setup();
});
</script>
<script type="text/javascript">
var searchAjax=function(){};
var G_tocard_maxTips=30;

$(function(){(
	function(){		
		var a=$(".plus-tag");		
		$("a em",a).live("click",function(){

		var c=$(this).parents("a"),b=c.attr("title"),d=c.attr("value");
			delTips(b,d)

				$.ajax({
		            type: "GET",
		            url: "deltag.php?q="+c.attr("title"), 
		            success: function(msg){  
		            //请求成功后的回调函数
		        	}
				});

	
		});		
		hasTips=function(b){
			var d=$("a",a),c=false;
			d.each(function(){
				if($(this).attr("title")==b){
					c=true;
					return false
				}
			});
			return c
		};

		isMaxTips=function(){
			return	
			$("a",a).length>=G_tocard_maxTips
		};

		setTips=function(c,d){
			if(hasTips(c)){
				return false
			}if(isMaxTips()){
				alert("最多添加"+G_tocard_maxTips+"个标签！");
				return false
			}
			var b=d?'value="'+d+'"':"";
			a.append($("<a "+b+' title="'+c+'" href="javascript:void(0);" ><span>'+c+"</span><em></em></a>"));
			searchAjax(c,d,true);
			return true
		};

		delTips=function(b,c){
			if(!hasTips(b)){
				return false
			}
			$("a",a).each(function(){
				var d=$(this);
				if(d.attr("title")==b){
					d.remove();
					return false
				}
			});
			searchAjax(b,c,false);
			return true
		};

		getTips=function(){
			var b=[];
			$("a",a).each(function(){
				b.push($(this).attr("title"))
			});
			return b
		};

		getTipsId=function(){
			var b=[];
			$("a",a).each(function(){
				b.push($(this).attr("value"))
			});
			return b
		};
		
		getTipsIdAndTag=function(){
			var b=[];
			$("a",a).each(function(){
				b.push($(this).attr("value")+"##"+$(this).attr("title"))
			});
			return b
		}
	}
	
)()});
</script>
<script type="text/javascript">
// 更新选中标签标签
$(function(){
	setSelectTips();
	$('.plus-tag').append($('.plus-tag a'));
});
var searchAjax = function(name, id, isAdd){
	setSelectTips();
};


// 搜索
(function(){
	var $b = $('.plus-tag-add button'),$i = $('.plus-tag-add input');

	$i.keyup(function(e){
		if(e.keyCode == 13){
			$b.click();
		}
	});

	$b.click(function(){
		var name = $i.val().toLowerCase(); // toLowerCase() 方法用于把字符串转换为小写
		$.ajax({
            type: "GET",
            url: "addtag.php?q=" + name,  
            success: function(msg){  
            //请求成功后的回调函数
        	}

		});
		
		if(name != '') setTips(name,-1);
		$i.val('');
		$i.select();  //触发被选元素的 select 事件：
	});

})();


// 推荐标签
(function(){
	var str = ['展开推荐标签', '收起推荐标签']
	$('.plus-tag-add a').click(function(){
		var $this = $(this),
				$con = $('#mycard-plus');

		if($this.hasClass('plus')){
			$this.removeClass('plus').text(str[0]);
			$con.hide();
		}else{
			$this.addClass('plus').text(str[1]);
			$con.show();
		}
	});
	$('.default-tag a').live('click', function(){
		var $this = $(this),
				name = $this.attr('title'),
				id = $this.attr('value');
		setTips(name, id);
	});
	// 更新高亮显示
	setSelectTips = function(){
		var arrName = getTips();
		if(arrName.length){
			$('#myTags').show();
		}else{
			$('#myTags').hide();
		}
		$('.default-tag a').removeClass('selected');
		$.each(arrName, function(index,name){
			$('.default-tag a').each(function(){
				var $this = $(this);
				if($this.attr('title') == name){
					$this.addClass('selected');
					return false;
				}
			})
		});
	}

})();
// 更换链接
(function(){
	var $b = $('#change-tips'),
		$d = $('.default-tag div'),
		len = $d.length,
		t = 'nowtips';
	$b.click(function(){
		var i = $d.index($('.default-tag .nowtips'));
		i = (i+1 < len) ? (i+1) : 0;
		$d.hide().removeClass(t);
		$d.eq(i).show().addClass(t);
	});
	$d.eq(0).addClass(t);
})();
</script>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>适用浏览器：IE8、360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗. </p>
<p>来源：<a href="http://sc.chinaz.com/" target="_blank">站长素材</a></p>
</div>
</body>
</html>





