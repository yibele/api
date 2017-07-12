<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{ stylesheet_link("css/bootstrap.css") }}
    {{ stylesheet_link("css/main.css") }}

    {{ javascript_include("js/jquery-3.2.1.min.js") }}
    {{ javascript_include("js/bootstrap.js") }}
    <title>{{title}} - 校园湃</title>
</head>
<body>
<div class="container-fluid">
    {{ image("img/index1.png","class":"bakground") }}
    <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">WHAT WE DO</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">CONTACT US</a></li>
                <button class="btn btn-default"
                        style="display:inline-block;margin-top:8px;padding-left:40px;padding-right:40px;margin-left:10px;margin-right:20px;padding-top:5px;padding-bottom: 5px;">
                    登陆
                </button>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <div class="col-md-6 col-md-offset-3 brand">
        <div class="brand-title">
            {{image("img/logo.png")}} {{brand_title}}
        </div>
        <div class="brand-title-ch">
            {{brand_title_cn}}
        </div>
        <div class="brand-content">
            {{brand_content}}
        </div>
        <div class="brand-button">
            <button class="btn btn-default">登陆了解详情</button>
        </div>
    </div>
</div>
</body>
</html>
