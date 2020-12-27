<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Vé máy bay</title>
    <link rel="stylesheet" href="../Public/layout.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Name</a>
            </div>
            <ul id="tab" class="nav navbar-nav">
                <li><a href="/">Home</a></li>
            </ul>
        </div>
    </nav>

    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Đăng ký</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="register">
                    <div class="form-group" style="text-align: center;">
                        <?php if (isset($messages['success'])): ?>
                            <span class="help-block">
                                <strong class="text-success"><?=$this->e($messages['success'])?></strong>
                            </span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Họ và tên:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="hovaten" id="hovaten" placeholder="Nhập vào email" required autofocus>  
                        </div>
                    </div>
                    <div class="form-group <?=isset($messages['username']) ? ' has-error' : '' ?>">
                        <label class="control-label col-sm-4" for="username">Tài khoản:</label>
                        <div class="col-sm-5">
                            <input type="username" class="form-control" name="username" id="username" placeholder="Nhập vào tài khoản" required autofocus>
                            <?php if (isset($messages['username'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($messages['username'])?></strong>
                                </span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group <?=isset($messages['password']) ? ' has-error' : '' ?>">
                        <label class="control-label col-sm-4" for="password">Mật khẩu:</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập vào mật khẩu" required autofocus>
                            <?php if (isset($messages['password'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($messages['password'])?></strong>
                                </span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="password">Nhập lại mật khẩu:</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="re-password" id="re-password" placeholder="Nhập lại mật khẩu" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Email:</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Nhập vào email" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Ngày sinh:</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-5">
                            <button type="submit" name="submit" class="btn btn-info">Đăng ký</button>
                            &nbsp;
                            &nbsp;
                            <a href="/">Đăng nhập</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>