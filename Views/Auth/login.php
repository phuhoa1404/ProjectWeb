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
            <div class="panel-heading">Đăng nhập</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="login">
                    <div class="form-group <?=isset($errors['username']) ? 'has-error' : '' ?>">
                        <label class="control-label col-sm-4" for="username">Tài khoản:</label>
                        <div class="col-sm-5">
                            <input type="username" class="form-control" name="username" id="username" placeholder="Nhập vào tài khoản" required autofocus>
                            <?php if (isset($errors['username'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['username'])?></strong>
                                </span>
                            <?php endif ?>  
                        </div>
                    </div>
                    <div class="form-group <?=isset($errors['password']) ? 'has-error' : '' ?>">
                        <label class="control-label col-sm-4" for="password">Mật khẩu:</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập vào mật khẩu" required>
                            <?php if (isset($errors['password'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['password'])?></strong>
                                </span>
                            <?php endif ?>  
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-5">
                            <button type="submit" name="submit" class="btn btn-info">Đăng nhập</button>
                            &nbsp;
                            &nbsp;
                            <a href="register">Đăng ký</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>