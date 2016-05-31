<?php
session_start();
// store session data
$_SESSION['paperName'] = $_GET["paperName"];
?>
<!DOCTYPE html>
<html>
<head>
<title>题目内容</title>
<meta charset="UTF-8">
<meta name="keywords" content="">
<meta name="description" content="要知道很多事情都是命呐~" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui"
	id="device" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no, email=no" />
<!--demo展示所用css end-->
<link rel="stylesheet"
	href="http://static.wezeit.com/wzn/public/css/reset.css">
<link rel="stylesheet"
	href="http://static.wezeit.com/wzn/css/h5style.css">
<link rel="stylesheet"
	href="http://static.wezeit.com/wzn/public/css/font.css">
<script type="text/javascript"
	src="http://static.wezeit.com/wzn/h5/js/zepto.min.js"></script>
<script type="text/javascript"
	src="http://static.wezeit.com/wzn/h5/js/zepto.lazyload.js?725"></script>
<style>
.content-article {
	padding-bottom: 0
}
</style>
</head>
<body>
	<div class="wrapper">
		<div class="content content-article" id="articleWrap">
			<!-- article -->
			<article class="singlPost">
				<section class="singleHeader">

					<div class="articleTit">

						<h1 class="spTitle"><?php echo $_GET["paperName"]?></h1>
					</div>
				</section>
				<section class="singleArticle">
					<div class="wz_question wzq_single">
						<div class="Quiz_quiz judge_quiz">
							<!-- 投票文字 -->
							<ol class="Quiz_list">
							 <?php
                                include_once '../Bll/creatPaperBll.php';
                                include_once '../Bll/commonFunction.php';
                                $abcd = array(
                                    'A',
                                    'B',
                                    'C',
                                    'D',
                                    'E',
                                    'F'
                                );
                                $paperName = $_GET["paperName"];
                                echo "<script> var paperName =\"$paperName\";</script>";
                                
                                $result = FindPaperQuestion($paperName);
                                $qn = 0;
                                // 循环读取所有试题
                                foreach ($result as $single) {
                                    $questionNum = $single[2];
                                    $questionInfo = $single[3];
                                    $questionSelect = $single[5];
                                    $selectCollection = SplitBySemicolon($questionSelect);
                                    echo "<li class=\"Quiz_listItem ColumnNoimg\">";
                                    echo "<div class=\"Quiz_question\">";
                                    echo "<div class=\"Quiz_question_text\">";
                                    echo "<h4>$questionNum  $questionInfo  </h4>";
                                    echo "</div>";
                                    echo "<ul class=\"Quiz_questionList\" data-map=\"$qn\">";
                                    
                                    //echo $questionNum . "." . $questionInfo . "<br>";
                                    $num = 0;
                                    foreach ($selectCollection as $singleSelect) {
                                        echo "<li class=\"Quiz_questionListItem\" data-map=\"$abcd[$num]\"><span>$abcd[$num]. $singleSelect</span>";
                                        echo "</li>";
                                        //echo "<input type=\"radio\" name=\"$questionNum\" value=\"$abcd[$num]\" /> $abcd[$num]. $singleSelect";
                                        //echo "<br>";
                                        $num ++;
                                    }
                                    echo "</ul>";
                                    echo "</div>";
                                    echo "<div style=\"clear: both;\"></div>";
                                    echo "</li>";
                                    $qn ++;
                                }
                               ?>
							</ol>
							<div class="resultBtns">
								<div class="qBtnWrap">
									<a href="javascript:;" class="wzBtn QuestionButton">提交!</a>
								</div>
							</div>
						</div>
					</div>
				<script>
                    function imgratio(obj){
                        var objTw = $("#articleWrap").width();
                        var metaH = objTw * 0.67;
                        obj.width(objTw);
                        obj.height(metaH);
                    };
				</script>
				
				<script>

				function GetQueryString(name)
				{
				     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
				     var r = window.location.search.substr(1).match(reg);
				     if(r!=null)return  unescape(r[2]); return null;
				}
			
			var x;
			var url = "../Action/writeQuestionAction.php?";
            var question_key =  new Object();
            var answer_index = -1;
            var question_index = 0;
            var checked = false;
            var myArray=new Array();
            Zepto(function($) {
                $('.Quiz_questionListItem').click(function() {
                    if(checked) {
                        return false;
                    }
                    $(this).parent('.Quiz_questionList').find('li').removeClass('qzfocus');
                    $(this).addClass('qzfocus');
                    answer_index = $(this).data('map');
                    question_index = $(this).parent('.Quiz_questionList').data('map');
                    myArray[question_index] = answer_index;
                });
                $('.QuestionButton').click(function() {
                    if(answer_index==-1) {
                        alert('未选择答案！');
                        return false;
                    }  
                    for (x in myArray)
                    {
                        url = url +x+"="+myArray[x]+"&";
                    	//document.write(myArray[x] + "<br />");
                    }	
                    url = url + "paperName="+paperName;
                    window.location.href = url;
            });
        });

					</script>
				</section>
			</article>
		</div>
	</div>