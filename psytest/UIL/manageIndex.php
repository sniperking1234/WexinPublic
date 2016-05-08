<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <title>心理测评系统后台</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap-social.css" rel="stylesheet">
    <link href="../css/mystyles.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">心理测评系统后台</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html">
                            <span class="glyphicon glyphicon-home"aria-hidden="true"></span>主页</a>
                     </li>

                    <li><a href="setFeedback.html">填写反馈信息</a></li>
                    <li><a href="getProportion.html">查看选项分布结果</a></li>
                    <li><a href="getSelectResult.html">查看用户选择信息</a><li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                         role="button" aria-haspopup="true" aria-expanded="false">
                         查看测试结果 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="find-test-by-user-id.html">根据用户ID查看结果</a></li>
                            <li><a href="find-test-by-user-paper-id.html">根据用户ID和试卷ID查看结果</a></li>
                        </ul>
                    </li>

                    <li><a href="contactus.html">联系我们</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="jumbotron">

        <div class="container">
            <div class="row row-header">
                <div class="col-xs-12 col-sm-8">
                    <h1>心理测评系统后台管理界面</h1>
                    <p style="padding:40px;"></p>
                    <p>是不是觉得自己心理有问题？这就对了，只要做我们的题，没问题才怪！</p>
                </div>
                <div class="col-xs-12 col-sm-4">
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="row row-content">
            <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>
                <h3 align=center>标题1</h3>
            </div>
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
                <h2>标题2</h2>
                <p>内容3.</p>
                <p><a  href="#">More &raquo;</a></p>
            </div>
        </div>


        <div class="row row-content">
            <div class="col-xs-12 col-sm-3">
                <p style="padding:20px;"></p>
                <h3 align=center>标题1</h3>
            </div>
            <div class="col-xs-12 col-sm-9">
                <h2>标题2</h2>
                <p>内容3. </p>
                <p><a href="#">More &raquo;</a></p>
            </div>
        </div>

        <div class="row row-content">
             <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>
                <h3 align=center>标题</h3>
            </div>
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
                <h2>标题</h2>
                <h4>标题</h4>
                <p>内容3.</p>
                <p><a href="#">More &raquo;</a></p>
            </div>
        </div>
    </div>

    <footer class="row-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-5 col-xs-offset-1 col-sm-2 col-sm-offset-1">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">主页</a></li>
                        <li><a href="#">关于</a></li>
                        <li><a href="#">菜单</a></li>
                        <li><a href="#">联系我们</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
                                   中国苏州<br>
  		              中科大苏州研究院<br>
  		              软件学院<br>
		              <i class="fa fa-phone"></i>: 110<br>
		              <i class="fa fa-fax"></i>: 120<br>
		              <i class="fa fa-envelope"></i>:
                        <a href="mailto:chenzhengwei@163.com">chenzhengwei@163.com</a>
		           </address>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="nav navbar-nav" style="padding: 40px 10px;">
                        <a class="btn btn-social-icon btn-google-plus" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon btn-youtube" href="http://youtube.com/"><i class="fa fa-youtube"></i></a>
                        <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
                <div class="col-xs-12">
                    <p style="padding:10px;"></p>
                    <p align=center>© Copyright 2016 中科大苏州研究院</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
