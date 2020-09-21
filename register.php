<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration</title>
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
<body class="hold-transition register-page" >

  <div class="register-logo">
  </div>

  <div class="col-md-6 col-md-offset-4 ">
          <!-- Horizontal Form -->
          <div class="box box-info login-box-body" >
          <div class="box-body " style="text-align: center;font-size: 30px;">
          <i class="fa fa-book" aria-hidden="true"></i>
              <a href="#"><b> Tutor C Programing</a> <br>
              </div>

              <div class="form-group">
            <div class="box-header with-border">
            <h3 class="box-title">ลงทะเบียนเป็นสมาชิกใหม่</h3>
    </div>

    <form name="form0" action="function/register_add.php" method="post">
    <div class="box-body ">
    <div class="form-group col-md-6 has-feedback">
    <label for="Firstname">ชื่อ</label>
        <input type="text" class="form-control" id="Firstname" name="Firstname" placeholder="กรุณากรอกชื่อ">
       
      </div>
      <div class="form-group col-md-6 has-feedback">
      <label for="Lastname">นามสกุล</label>
        <input type="text" class="form-control"  id="Lastname" name="Lastname" placeholder="กรุณากรอกนามสกุล">
  
      </div>
      <div class="form-group col-md-6 has-feedback">
      <label for="Gender">เพศ</label>
          <select id="Gender" name="Gender" class="form-control select2" > 
                                <option value="0">กรุณาเลือกเพศ</option>
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
          </select>
      </div>
      
      <div class="form-group col-md-6 has-feedback">
      <label for="School">สถาบัน</label>
        <input type="text" class="form-control"  id="School" name="School" placeholder="กรุณากรอกสถาบัน">
   
      </div>

      <div class="form-group col-md-6 has-feedback">
        <label for="Email">อีเมล</label>
        <input type="email" class="form-control" id="Email" name="Email" placeholder="กรุณากรอก Email">
       
      </div>
      <div class="form-group col-md-6 has-feedback">
        <label for="Password">รหัสผ่าน</label>
        <input type="password" class="form-control" id="Password" name="Password" placeholder="กรุณากรอก Password">

      </div>
      <div class="form-group col-md-6 has-feedback">
      <label for="ID_type">ประเภทผู้ใช้งาน</label>
          <select id="ID_type" name="ID_type" class="form-control select2"  >
                                <option value="0">กรุณาเลือกประเภทผู้ใช้งาน</option>
                                <option value="1">อาจารย์</option>
                                <option value="2">นักศึกษา</option>
          </select>
          
      </div>

      <div class="form-group">
                  <div class="col-sm-offset-6 col-sm-8">
                    
                  </div>
                </div>
              </div>
              
      <div class="box-footer">
                <a href="login.php" type="button" class="btn btn-default">เข้าสู่ระบบ</a>
                <button name="ADD" type="button" onclick="Javascript : check_submit();" class="btn btn-info pull-right">
                <i class="fa fa-check">&nbsp;
                      </i>ยืนยันการสมัคร</button>
              </div>
      
        <!-- /.col -->
       
        </div>
    </form>
  
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  function check_submit(){
    if($('#Email').val()!='' && $('#Password').val()!='' && $('#ID_type').val()!=''  && $('#Gender').val()!=''  
    && $('#Lastname').val()!='' && $('#Firstname').val()!='' ){

      form0.submit();
    }else{
      alert("กรุณากรอกข้อมูลให้ครบถ้วน");
    }

  }
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
