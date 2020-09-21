<?php
    session_start();
    include 'function/connect.php';
    if($_SESSION['session_id']!=''&&$_SESSION['session_type']==3){
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
    include 'component/menu.php';
    ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        จัดการข้อมูล
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">ข้อมูลชั้นเรียน</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                    <i class="fa fa-bullhorn"></i>
                    <h3 class="box-title">ชั้นเรียนที่เปิดลงทะเบียน</h3>
                    </div>
                   
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
                                                                         
                                                                      type="button" class="btn btn-info pull-right">
                                                                      <i class="fa    fa-bar-chart"> &nbsp;
                                                                      </i>
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
</script>


</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>
