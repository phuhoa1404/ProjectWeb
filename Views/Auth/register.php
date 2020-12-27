<!DOCTYPE html>
<html>

<head>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <link rel="stylesheet" href="../Public/test.css">
</head>

<body>
   <div class="sidenav">
      <div class="login-main-text">
         <h2>We Go <br> Register</h2>
         <p>Login or register from here to access.</p>
      </div>
   </div>
   <div class="main">
      <div class="col-md-6 col-sm-12">
         <div class="register-form">
            <?php if (isset($messages['success'])): ?>
                <span class="help-block">
                    <p class="message-success"><?=$this->e($messages['success'])?></p>
                </span>
            <?php endif ?>
            <?php if (isset($messages['username'])): ?>
                <span class="help-block">
                    <p class="message"><?=$this->e($messages['username'])?></p>
                </span>
            <?php endif ?>
            <?php if (isset($messages['password'])): ?>
                <span class="help-block">
                    <p class="message"><?=$this->e($messages['password'])?></p>
                </span>
            <?php endif ?>
            <form role="form" method="POST" action="register">
               <div class="form-group">
                    <label>Full name</label>
                  <input type="text" class="form-control" name="hovaten" placeholder="Full name" autofocus>
               </div>
               <div class="form-group">
                    <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="User Name"required>
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
               </div>
               <div class="form-group">
                    <label>Repeat password</label>
                    <input type="password" class="form-control" name="re-password" id="re-password" placeholder="Nhập lại mật khẩu" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Nhập vào email" required>
                </div>
               <button type="submit" class="btn btn-black">Login</button>
               &nbsp;
               &nbsp;
               <a href="/">Already have an account ?</a>
            </form>
         </div>
      </div>
   </div>

</body>
</html>