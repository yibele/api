<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->tag->stylesheetLink('css/bootstrap.css') ?>
    <?= $this->tag->stylesheetLink('css/main.css') ?>

    <?= $this->tag->javascriptInclude('js/jquery-3.2.1.min.js') ?>
    <?= $this->tag->javascriptInclude('js/bootstrap.js') ?>
    <title><?= $title ?> - 校园湃</title>
</head>
<body>
<div class="container-fluid">
    <?= $this->tag->image(['img/index1.png', 'class' => 'bakground']) ?>
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
                        type="button"
                        data-toggle="modal"
                        data-target="#login"
                        style="display:inline-block;margin-top:8px;padding-left:40px;padding-right:40px;margin-left:10px;margin-right:20px;padding-top:5px;padding-bottom: 5px;">
                    登陆
                </button>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <div class="col-md-6 col-md-offset-3 brand">
        <div class="brand-title">
            <?= $this->tag->image(['img/logo.png']) ?> <?= $brand_title ?>
        </div>
        <div class="brand-title-ch">
            <?= $brand_title_cn ?>
        </div>
        <div class="brand-content">
            <?= $brand_content ?>
        </div>
        <div class="brand-button">
            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#login" >登陆了解详情</button>
        </div>
    </div>
    <!-- 模态框 -->
    <div class="modal fade" style="margin-top:15%;" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">用户登陆</h4>
                </div>
                <div class="modal-body">
                    <form action="login" method="post">
                        <input type="text" name="username" required class="form-control spacing-btn" placeholder="username">
                        <input type="text" name="password" required class="form-control spacing-btn" placeholder="password">
                        <input type="submit" value="登陆" class="btn btn-success spacing-btn" >
                        <input type="submit" value="注册" class="btn btn-danger spacing-btn">
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
</body>
</html>
