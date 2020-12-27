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
         <h2>We Go <br> Login</h2>
         <p>Login or register from here to access.</p>
      </div>
   </div>
   <div class="main">
      <div class="col-md-6 col-sm-12">
         <div class="login-form">
            <?php if (isset($errors['username'])): ?>
               <span class="help-block">
                  <p class="message"><?=$this->e($errors['username'])?></p>
               </span>
            <?php endif ?> 
            <?php if (isset($errors['password'])): ?>
               <span class="help-block">
                  <p class="message"><?=$this->e($errors['password'])?></p>
               </span>
            <?php endif ?> 
            <form role="form" method="POST" action="login">
               <div class="form-group">
                  <label>User Name</label>
                  <input type="text" class="form-control" name="username" placeholder="User Name" required autofocus>
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
               </div>
               <button type="submit" class="btn btn-black">Login</button>
               <a class="btn btn-secondary" href="register">Register</a>
            </form>
         </div>
      </div>
   </div>

</body>
</html>