<?php
   session_start();
   include 'function/connect.php';
   if($_SESSION['session_id']!=''&&$_SESSION['session_type']==2){
   
    $session_id     = (isset($_SESSION['session_id'])   ?   $_SESSION['session_id']   : '' );
    
    
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
    include 'component/menu_std.php';
    ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

     <!-- Main content -->
     <section class="content">
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
      <div class="callout callout-info" style="background-image: url(../dist/img/lg.png);" >
        <h1>ยินดีต้อนรับ</h1>
         <h2>สู่เว็บไซต์โปรแกรมภาษา C </h2>
        &nbsp;<br>
        &nbsp;<br>
        &nbsp;<br>
       
      </div>
        <div class="row">

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
                    
                    
                                        $sql_sumcourse = "SELECT count(ID_member) AS sum_course FROM  regis_course  WHERE  ID_member = $session_id AND status='approve' ";
                                        $result_sumcourse     = $conn->query( $sql_sumcourse );
                                        $i=0;
                                            while( $row_sumcourse= $result_sumcourse->fetch_array(MYSQLI_BOTH) ){
                                ?>
                                            <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>จำนวนชั้นเรียนที่ลงทะเบียน</b> <a class="pull-right"><?=$row_sumcourse['sum_course']?></a>
                                            </li>
                                            <?php        
                    $sql_sumcourse = "SELECT count(ID_member) AS sum_course FROM  regis_course  WHERE  ID_member = $session_id AND status='Wait'";
                    $result_sumcourse     = $conn->query( $sql_sumcourse );
                    $i=0;
                        while( $row_sumcourse= $result_sumcourse->fetch_array(MYSQLI_BOTH) ){
            ?>
                        <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>จำนวนที่รอการอนุมัติเข้าชั้นเรียน</b> <a class="pull-right"><?=$row_sumcourse['sum_course']?></a>
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
                    <?php
           $i++;
             }
           ?>

                    <!-- /.box-body -->
                    </div>
                    <!-- /.box --> 
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

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header">
                    <a  class="small-box-footer">
                    <i class="fa fa-bullhorn"></i>
                    <h3 class="box-title">ชั้นเรียนที่เปิดลงทะเบียน</h3>
                    </div>
                   </a>
                    <!--  ไม่ชิดขอบ -->
                    <div class="box-header with-border"> 
                    
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
                    <?php
                         $sql_teacher = "SELECT * FROM member JOIN type_member  ON   member.ID_type = type_member.ID_type 
                         WHERE type_member.ID_type='1'  ";

                         $result_teacher     = $conn->query( $sql_teacher );
                        
                         $i=0;
                           while( $row_teacher = $result_teacher->fetch_array(MYSQLI_BOTH) ){
                            $ID_teacher = $row_teacher['ID_member'];

                        ?>        
                           
                                     
                                   <!-- /.col -->
                                            <div class="col-md-12">
                                              <div class="box box-primary box-solid">
                                                <div class="box-header with-border">
                                                
                                                  <h3 class="box-title"> อาจารย์ : <?=$row_teacher['Firstname']." ".$row_teacher['Lastname']?></h3>

                                                  <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                    </button>
                                                   
                                                  </div>
                                                  <!-- /.box-tools -->
                                                     </div>  
                                                          <?php
                                                             $sql_course = "SELECT * FROM course  WHERE ID_teacher =   $ID_teacher";

                                                            $result_course     = $conn->query( $sql_course );
                                                            
                                                            $i=0;
                                                              while( $row = $result_course->fetch_array(MYSQLI_BOTH) ){
                                                     
                                                            ?>  
                                                            <div class="box-body" >
                                                             <div class="nav-tabs-custom">  

                                                                      <a href="#"
                                                                      data-toggle        ="modal" 
                                                                      data-target="#Modaladd" 
                                                                      data-id_member    =  "<?=$session_id?>"
                                                                      data-id_course    =  "<?=$row["ID_course"]?>"
                                                                      type="button" class="btn btn-info pull-right open-AddBookDialog4 ">
                                                                      <i class="fa   fa-paper-plane-o"> &nbsp;
                                                                      </i>ลงทะเบียนเรียน
                                                                      </a>

                                                                      
                                                                      <i class="fa fa-university"></i>
                                                                      ชื่อชั้นเรียน :  <?=$row['Coursename']?>      
                                                                        </div>
                                                                      </div>
                                                                      <?php
                                                                                  $i++;
                                                                                  }
                                                                              ?> 
                                                                    </div>   
                                                                      <!-- /.box-header -->
                                                                  </div>  
                                                                    <?php
                                                                                  $i++;
                                                                                  }
                                                                              ?>
                                                                    </div>    
                                                   
                                                                    <!-- คำสั่งเรียกเพิ่มข้อมูล -->
                                                                  <form method="post" action="function/std_add_course.php">
                                                                      <div class="modal modal-default fade" id="Modaladd" aria-hidden="true">
                                                                          <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header">
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span></button>
                                                                                      <h3>ยืนยันการลงทะเบียนเรียน</h3> 
                                                                                      <div class="modal-body">
                                                                                      <input  type="hidden" class="form-control" id="ID_course" name="ID_course" >
                                                                                      <input  type="hidden" class="form-control" id="ID_member" name="ID_member" >
                                                                                      <input  type="hidden" value="Wait" class="form-control" id="status" name="status" >
                                                                                      </div>
                                                                                      <div class="modal-footer">
                                                                                      
                                                                                        <button  type="submit" class="btn btn-success"  >ยืนยัน</button>
                                                                                        <button  type="button" class="btn btn-primary"  data-dismiss="modal">ปิด</button>
                                                                                        
                                                                                      </div>
                                                                                  </div>  
                                                                              </div>  
                                                                          </div>  
                                                                      </div>  
                                                                      </div>
                                                                   
                                                                  </form>
                                                                  
                                                                                   

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
 <form method="post" action="function/member_edit_user.php">
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

$(document).on("click", ".open-AddBookDialog4", function () {

var ID_member           = $(this).data('id_member');
$(".modal-body #ID_member").val( ID_member );

var id_course           = $(this).data('id_course');
$(".modal-body #ID_course").val( id_course );

$('#Modaladd').modal('show');
});
        </script>



</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>



