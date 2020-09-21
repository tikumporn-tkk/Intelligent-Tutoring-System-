<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <?php
    include 'component/head.php';
    ?>
</head>
<br><br><br><br><br><br><br><br><br>

<body class="hold-transition login-page" >

 

  <div class="login-logo">
  </div>

  <div class="col-md-4 col-md-offset-4 ">
          <!-- Horizontal Form -->
          <div class="box box-info login-box-body" >
          <div class="box-body " style="text-align: center;font-size: 40px;">
          <i class="fa fa-book" aria-hidden="true"></i>
              <a href="#"><b> Tutor C Programing</a> <br>
              </div>

              <div class="form-group">
            <div class="box-header with-border">
              <h3 class="box-title">เข้าสู่ระบบ</h3>
            </div>


            <!-- /.box-header -->
            <!-- form start -->
            <form action="function/checkuser.php" method="post" class="form-horizontal">
              <div class="box-body ">
                <div class="form-group">
                  <label for="inputEmail3"  class="col-sm-3 control-label">อีเมลผู้ใช้งาน</label>

                  <div class="form-group col-sm-8 has-feedback">
                    <input type="email" name="username" class="form-control" id="inputEmail3"  placeholder="TutorialC@hotmail.com">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">รหัสผ่าน</label>

                  <div class="form-group col-sm-8 has-feedback">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="XXXXXXXX">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-6 col-sm-8">
                    
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="register.php" type="button" class="btn btn-default">สมัครสมาชิก</a>
                <button type="submit" class="btn btn-info pull-right">เข้าสู่ระบบ</button>
              </div>
              <!-- /.box-footer -->
            </form>

          </div>
          <!-- /.box -->
        </div>
<!-- /.login-box -->


<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
