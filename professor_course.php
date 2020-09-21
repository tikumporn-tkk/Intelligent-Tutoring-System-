<?php
    session_start();
    include 'function/connect.php';
    if($_SESSION['session_id']!=''&&$_SESSION['session_type']==1){
    $session_id =  $_SESSION['session_id'];
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
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                    <a  class="small-box-footer">
                    <i class="fa fa-bank">&nbsp;<h3 class="box-title">ชั้นเรียน</h3></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <?php
                                $sql = "SELECT * FROM course ORDER BY ID_course ASC";
                                 $result = $conn->query($sql);
                            ?>
                                <div class="box-footer">
                                <a href="#" 
                                                data-toggle         ="modal" 
                                                data-target         ="#Modaladd" 
                                                data-id_course      ="<?php echo  $row["ID_course"]?>"
                                                data-coursename     ="<?php echo  $row["Coursename"];?>"
                                                data-detail         ="<?php echo $row["Detail"];?>"
                                                type                ="button" class="btn btn-success pull-right open-AddBookDialog3" >
                                            <i class="fa fa-fw fa-plus">
                                            </i>สร้างชั้นเรียนใหม่
                                            </a>
                                </div>     
                        </table>
                    
                    <!-- Small boxes (Stat box) -->
                    <div class="row" >
                        <?php
                         $sql_course = "SELECT * FROM course JOIN member ON  course.ID_teacher = member.ID_member
                         WHERE course.ID_teacher = $session_id";
                         $result_course     = $conn->query( $sql_course );
                         $i=0;
                            while( $row_course = $result_course->fetch_array(MYSQLI_BOTH) ){

                        ?>
                            <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                                <div class="small-box <?php if($i%2==0){echo "bg-aqua";}else{echo "bg-light-blue-gradient";}?>">
                                <div class="box-tools pull-right">
                                <a href="JavaScript:if(confirm('ต้องการลบข้อมูล?') == true)
                                                {window.location='function/t_course_del.php?ID_course=
                                                <?php echo $row_course["ID_course"];?>';}" type="button" >
                                                <i class="fa fa-remove"></i></a>
                                        </div>   
                                    <div class="inner">
                                        <h1><?=$row_course['Coursename']?></h1>

                                            <p><?=$row_course['Firstname']." ".$row_course['Lastname']?></p>
                                    </div>
                                    <div class="icon">
                                    <i class="fa fa-book"></i>
                                    </div>
                                    <a href="professor_course_add.php?id_course=<?=$row_course['ID_course']?>" class="small-box-footer">
                                    เข้าสู่ชั้นเรียน <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        <?php
                            $i++;
                            }
                        ?>

                    </div> 
                </div>
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

<!-- คำสั่งเรียกเพิ่มข้อมูลในแว่นขยาย -->
<form name="form0" method="post" action="function/course_add.php">
    <div class="modal modal-default fade" id="Modaladd" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>ชั้นเรียนใหม่</h3>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                            
                            <div class="form-group">
                                <label for="Coursename">ชื่อชั้นเรียน</label>
                                <input type="text" class="form-control" id="Coursename" name="Coursename" >
                            </div>
                            <div class="form-group">
                                <label for="Detail">ข้อมูลเกี่ยวกับชั้นเรียน</label>
                                <textarea row="10" type="text" class="form-control"  id="Detail" name="Detail" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="Javascript : check_submit();" class="btn btn-success"  >บันทึก</button>
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

  function check_submit(){
    if($('#Coursename').val()!='' && $('#Detail').val()!=''){

      form0.submit();
    }else{
      alert("กรุณากรอกข้อมูลให้ครบถ้วน");
    }

  }

</script>


</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>