<?php
    session_start();
    include 'function/connect.php';
    if($_SESSION['session_id']!=''&&$_SESSION['session_type']==1){
    $session_id =  $_SESSION['session_id'];
    $ID_course= (isset($_GET['ID_course']) ? $_GET['ID_course'] : '');
    $ID_member= (isset($_GET['ID_member']) ? $_GET['ID_member'] : '');
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include 'component/head.php';
    ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
   <?php
    include 'component/header.php';
    ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"><!-- Menu -->
    <?php
    include 'component/menu_tch.php';
    ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
      <div class="callout callout-info" style="background-image: url(../dist/img/developement2.png);" >
        <h1>ยินดีต้อนรับ</h1>
        <h2>สู่เว็บไซต์โปรแกรมภาษา C </h2>
        &nbsp;<br>
        &nbsp;<br>
        &nbsp;<br>
        <h3>สวัสดีคุณ : <?=$_SESSION['session_firstname']." ".$_SESSION['session_lastname']?></h3>
      </div>
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">หน้าหลัก</h3>
                    </div> -->

                    <div class="row">
            <!-- <div class="col-md-12"> -->
                <!-- <div class="box"> -->
                    <div class="box-header">
                    <div class="col-md-3">



                     <!-- Profile Image -->
                     <div class="box box-primary">
                                      <div class="box-body box-profile">
                                          <img class="profile-user-img img-responsive img-circle" src="../dist/img/user_icon.png" alt="User profile picture">

                                          <h3 class="profile-username text-center"><?=$_SESSION['session_firstname']." ".$_SESSION['session_lastname']?></h3>
                                          <small><?=$_SESSION['session_school']?></small>
                     <!-- นับจำนวนแถวห้องเรียน-->
                                <?php
                    
                    
                                        $sql_sumcourse = "SELECT count(ID_teacher) AS sum_course FROM course JOIN member WHERE course.ID_teacher = $session_id
                                       AND member.ID_member = $session_id";
                                        $result_sumcourse     = $conn->query( $sql_sumcourse );
                                        $i=0;
                                            while( $row_sumcourse= $result_sumcourse->fetch_array(MYSQLI_BOTH) ){
                                ?>
                                            <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>จำนวนชั้นเรียนที่เปิดสอน</b> <a class="pull-right"><?=$row_sumcourse['sum_course']?></a>
                                            </li>
                        


                         <!-- นับจำนวนแถวบทเรียน-->
                         <?php
                    
                                
                                $sql_sumlesson = "SELECT count(ID_lesson) AS sum_lesson FROM lesson JOIN member WHERE lesson.ID_teacher = $session_id
                              AND member.ID_member = $session_id";
                                $result_sumlesson     = $conn->query( $sql_sumlesson );
                                $i=0;
                                    while( $row_sumlesson= $result_sumlesson->fetch_array(MYSQLI_BOTH) ){
                         ?>
                                <li class="list-group-item">
                                    <b>จำนวนบทเรียน</b> <a class="pull-right"><?=$row_sumlesson['sum_lesson']?></a>
                                </li>
                                <!-- นับจำนวนแถวนักเรียน-->
                                <?php
                                $sql = "SELECT * FROM member WHERE member.ID_member = $session_id";
                                 $result = $conn->query($sql);
                                 $row = $result->fetch_array(MYSQLI_BOTH);
                                ?>
                    
                        <a href="#"            
                                                data-toggle         ="modal" 
                                                data-target         ="#Modalview" 
                                                data-id_member      =  "<?php echo $row["ID_member"]?>"
                                                data-firstname      =  "<?php echo $row["Firstname"];?>"
                                                data-lastname       =  "<?php echo $row["Lastname"];?>"
                                                data-gender         =  "<?php echo $row["Gender"];?>"
                                                data-email          =  "<?php echo $row["Email"];?>"
                                                data-password       =  "<?php echo $row["Password"];?>"
                                                data-id_type        =  "<?php echo $row["ID_type"];?>"
                                                type= "button" class="btn btn-primary btn-block open-AddBookDialog3"> 
                                                <b>ข้อมูลประวัติส่วนตัว</b></a>
                        
                    </div>
                    
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box --> <?php
                                            $i++;
                                          }
                                      ?>
                    <!-- Calendar -->
          <div class="box box-solid bg-blue -gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">ปฏิทิน</h3>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100% " ></div>
            </div>
            <!-- /.box-body -->
            </div>
             
          <!-- /.box -->
          </div>          
          <?php
           $i++;
             }
           ?>
                          
                              <!-- /.col เมนู -->
                                      <div class="col-md-9">
                                          <div class="nav-tabs-custom">
                                          
                                              <!-- ผู้เรียน -->
                                        
                                              <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <a  class="small-box-footer">
                                                <i class="fa fa-bullhorn"></i>
                                                
                                                    <h3 class="box-title">ข้อมูลทั้งหมด</h3>
                                                    
         
                                                      <div class="box-header with-border">
                                                        

                                                        <h3 class="box-title"></h3>
                                                      


                                                      <div class="row">
                                                                  <?php
                                                                  $sql_course = "SELECT * FROM course JOIN member ON  course.ID_teacher = member.ID_member
                                                                  WHERE course.ID_teacher = $session_id";
                                                                  $result_course     = $conn->query( $sql_course );
                                                                  $i=0;
                                                                      while( $row_course = $result_course->fetch_array(MYSQLI_BOTH) ){

                                                                  ?>
                                                      <!-- /.box-header -->
                                                      
                                                      <div class="panel panel-primary">
                                                      <div class="panel-heading"> <i class="fa fa-institution"></i> &nbsp; ชื่อชั้นเรียน :  <?=$row_course['Coursename']?></div>
                                                        <div class="panel-body">รายเอียด : <?=$row_course['Detail']?></div>
                                                        </div>
                                                          <?php
                                                              $i++;
                                                                }
                                                          ?>
                                                        </div> 
                                                          
                                                          
                                                        </div>
                                                      </div>
                                                    </div>
                                                   </a>
                                                         
                                                      <!-- /.box-body -->
                                              </div>
                                                    
                                         </div>
                                                <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php
     include 'component/footer.php';
    ?>
  </footer>

  <!-- Control Sidebar -->
    <?php
     include 'component/Control_Sidebar.php';
    ?>
  <!-- /.control-sidebar -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
   
<?php
    include 'component/class.php';
?>

 <!-- คำสั่งเรียกแก้ไขข้อมูลในแว่นขยาย -->
 <form method="post" action="function/member_edit_pro.php">
    <div class="modal modal-default fade" id="Modalview" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>ข้อมูลประวัติส่วนตัว</h3>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-12 ">
                                <label for="ID_member" >รหัสสมาชิก</label>
                                <input  type="text" class="form-control" id="ID_member" name="ID_member" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Firstname">ชื่อ</label>
                                <input type="text" class="form-control" id="Firstname" name="Firstname" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Lastname">นามสกุล</label>
                                <input type="text" class="form-control"  id="Lastname" name="Lastname" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Gender">เพศ</label>
                                <select id="Gender" name="Gender" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Email">อีเมล</label>
                                <input type="text" class="form-control" id="Email" name="Email" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-success"  >บันทึก</button>
                        <button  type="button" class="btn btn-primary"  data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

    /* คำสั่งเรียกดูข้อมูลในแว่นขยาย */
        $(document).on("click", ".open-AddBookDialog3", function () {

            var ID_member           = $(this).data('id_member');
            $(".modal-body #ID_member").val( ID_member );

            var Firstname           = $(this).data('firstname');
            $(".modal-body #Firstname").val( Firstname );

            var Lastname           = $(this).data('lastname');
            $(".modal-body #Lastname").val( Lastname );

            var Gender         = $(this).data('gender');
            $(".modal-body #Gender").val( Gender );

            var Email   = $(this).data('email');
            $(".modal-body #Email").val( Email );
                
            var Password    = $(this).data('password');
            $(".modal-body #Password").val(Password);
                
            var ID_type     = $(this).data('id_type');
            $(".modal-body #ID_type").val( ID_type );
            
            $('#Modalview').modal('show');
        });
</script>


</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>