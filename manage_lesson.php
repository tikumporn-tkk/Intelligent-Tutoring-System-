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
                        <h3 class="box-title">ข้อมูลบทเรียน</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <?php
                                $sql = "SELECT * FROM lesson   ORDER BY ID_lesson ASC";
                                 $result = $conn->query($sql);
                            ?>
                                <div class="box-footer">
                                <a href="#" 
                                                data-toggle        ="modal" 
                                                data-target        ="#Modaladd" 
                                                type               = "button" class="btn btn-success pull-right " >
                                            <i class="fa fa-fw fa-plus">
                                            </i>เพิ่มบทเรียน
                                            </a>
                                </div>

                                    <thead>
                                        <th>จัดการข้อมูล</th>
                                        <th>ชื่อบทเรียน</th>
                                        <th>รหัสผู้สอน</th>
                                        <th>รายละเอียด</th>
                                        <th>ไฟล์บทเรียน</th>
                                        <th>ไฟล์บทเรียน</th>
                                    </thead>
                                    <?php
                                        while( $row = $result->fetch_array(MYSQLI_BOTH) ){
                                        ?>
                                    <tr>
                                        <td >
                                        <div class="btn-group">

                                        <a href="#" 
                                                data-toggle         ="modal" 
                                                data-target         ="#Modalview" 
                                                data-id_lesson      =  "<?php echo $row["ID_lesson"];?>"
                                                data-lessonname     =  "<?php echo  $row["Lessonname"];?>"
                                                data-id_teacher     =  "<?php echo $row["ID_Teacher"];?>"
                                                data-detail         =  "<?php echo $row["Detail"];?>"
                                                data-lessonfile1    =  "<?php echo $row["Lessonfile1"];?>"
                                                data-lessonfile2    =  "<?php echo $row["Lessonfile2"];?>"
                                                type="button" class="btn btn-info open-AddBookDialog">
                                                ดูข้อมูล
                                        </a>
                                        <a href="#" 
                                                data-toggle        ="modal" 
                                                data-target        ="#Modaledit" 
                                                data-id_lesson     =  "<?php echo $row["ID_lesson"];?>"
                                                data-lessonname    =  "<?php echo  $row["Lessonname"];?>"
                                                data-id_teacher    =  "<?php echo $row["ID_Teacher"];?>"
                                                data-detail        =  "<?php echo $row["Detail"];?>"
                                                data-lessonfile1   =  "<?php echo $row["Lessonfile1"];?>"
                                                data-lessonfile2   =  "<?php echo $row["Lessonfile2"];?>"
                                                type="button" class="btn btn-warning open-AddBookDialog2">
                                                แก้ไข
                                        </a>
                                        <a href="JavaScript:if(confirm('ต้องการลบข้อมูล?') == true)
                                                {window.location='function/lesson_del.php?ID_lesson=
                                                <?php echo $row["ID_lesson"];?>';}" class="btn btn-danger">
                                        ลบ</a>
                                        </div>

                                        </td>
                                        <td><?php echo $row["Lessonname"];?></td>
                                        <td><?php echo $row["ID_Teacher"];?></td>
                                        <td> <?php echo $row["Detail"];?></td>
                                        <td><?php echo $row["Lessonfile1"];?></td>
                                        <td><?php echo $row["Lessonfile2"];?></td>                                                                          
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                        
                        </table>
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

<!-- คำสั่งเรียกดูข้อมูลในแว่นขยาย -->
<form method="post" action="">
    <div class="modal modal-default fade" id="Modalview" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>ดูข้อมูล</h3>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-6 ">
                                <label for="ID_lesson" >รหัสบทเรียน</label>
                                <input  type="text" class="form-control" id="ID_lesson" name="ID_lesson" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Lessonname">ชื่อบทเรียน</label>
                                <input type="text" class="form-control" id="Lessonname" name="Lessonname" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_Teacher">รหัสผู้สอน</label>
                                <input type="text" class="form-control"  id="ID_Teacher" name="ID_Teacher" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Detail">รายละเอียด</label>
                                <input type="text" class="form-control" id="Detail" name="Detail" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Lessonfile1">ไฟล์บทเรียน</label>
                                <input type="file"  id="Lessonfile1" name="Lessonfile1" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Lessonfile2">ไฟล์บทเรียน</label>
                                <input type="file"  id="Lessonfile2" name="Lessonfile2" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="button" class="btn btn-primary"  data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->

<!-- คำสั่งเรียกแก้ไขข้อมูลในแว่นขยาย -->
<form method="post" action="function/lesson_edit.php">
    <div class="modal modal-default fade" id="Modaledit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>แก้ไขข้อมูล</h3>
                </div>
                <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-6 ">
                                <label for="ID_lesson" >รหัสบทเรียน</label>
                                <input  type="text" class="form-control" id="ID_lesson" name="ID_lesson" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Lessonname">ชื่อบทเรียน</label>
                                <input type="text" class="form-control" id="Lessonname" name="Lessonname" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_Teacher">รหัสผู้สอน</label>
                                <input type="text" class="form-control"  id="ID_Teacher" name="ID_Teacher" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Detail">รายละเอียด</label>
                                <input type="text" class="form-control" id="Detail" name="Detail" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Lessonfile1">ไฟล์บทเรียน</label>
                                <input type="file"  id="Lessonfile1" name="Lessonfile1" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Lessonfile2">ไฟล์บทเรียน</label>
                                <input type="file"  id="Lessonfile2" name="Lessonfile2">
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

<?php
/* คำสั่งเพิ่มข้อมูลในตาราง lesson */
if(isset($_POST['Submit']) && isset($_FILES['upfile'])){
if($_FILES['upfile']['size']>0) {
    $name = $_FILES['upfile']['name'];
    $type = $_FILES['upfile']['type'];
    $size = $_FILES['upfile']['size'];
    $upfile = $_FILES['upfile']['tmp_name'];
    $file = fopen($upfile,"r");
    $content = fread($file, filesize($upfile));
    $content = addslashes($content);
    fclose($file);
    $sql = "INSERT INTO lessonuploadfile VALUES(0,'$name','$type','$size','$content');";
if ($conn->query($sql) === TRUE) {
                echo "<script language=\"JavaScript\">";
                echo "alert('เพิ่มข้อมูลบทเรียนเรียบร้อย');";	
                echo "</script>";
            
        }
            }else{ echo "<script language=\"JavaScript\">";
                echo "alert('ไม่สามารถเพิ่มข้อมูลบทเรียน');";
                echo "history.go(-1);";
                echo "</script>";
                }echo "<meta http-equiv=\"Refresh\" content=\"1; url=manage_lesson.php\">";
            $conn->close();			
        } 
?>

<!-- คำสั่งเรียกเพิ่มข้อมูลในแว่นขยาย -->
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="modal modal-default fade" id="Modaladd" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>เพิ่มข้อมูล</h3>
                </div>
                <div class="modal-body">
                        <div class="box-body">
                           <!-- <div class="form-group col-md-6 ">
                                <label for="Lessonname">ชื่อบทเรียน</label>
                                <input type="text" class="form-control" id="Lessonname" name="Lessonname" required>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_Teacher">รหัสผู้สอน</label>
                                <input type="text" class="form-control"  id="ID_Teacher" name="ID_Teacher" required>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Detail">รายละเอียด</label>
                                <textarea type="text" class="form-control" id="Detail" name="Detail" row="5" ></textarea>
                            </div>-->
                            <div class="form-group col-md-6 ">
                                <label for="upfile">ไฟล์บทเรียน (ขนาดไฟล์ไม่เกิน 4 MB)</label>
                                <input type="file"  id="upfile" name="upfile" required>
                            </div>
                           <!-- <div class="form-group col-md-6 ">
                                <label for="Lessonfile2">ไฟล์บทเรียน  (ขนาดไฟล์ไม่เกิน 4 MB)</label>
                                <input type="file"  id="Lessonfile2" name="Lessonfile2" >
                            </div>-->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="submit" name="Submit" class="btn btn-success"  >อัปโหลดข้อมูล</button>
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
</script>

<script>
    /* คำสั่งเรียกดูข้อมูลในแว่นขยาย */
        $(document).on("click", ".open-AddBookDialog", function () {

          var ID_lesson           = $(this).data('id_lesson');
          $(".modal-body #ID_lesson").val( ID_lesson );

          var Lessonname            = $(this).data('lessonname');
          $(".modal-body #Lessonname").val(Lessonname );

          var ID_Teacher           = $(this).data('id_teacher');
          $(".modal-body #ID_Teacher").val( ID_Teacher  );

          var Detail         = $(this).data('detail');
          $(".modal-body #Detail").val( Detail  );

          var Lessonfile1   = $(this).data('lessonfile1');
          $(".modal-body #Lessonfile1").val( Lessonfile1 );
			
          var Lessonfile2    = $(this).data('lessonfile2');
          $(".modal-body #Lessonfile2 ").val(Lessonfile2);
            
            $('#Modalview').modal('show');
        });

        /* คำสั่งเรียกแก้ไขข้อมูลในแว่นขยาย */
        $(document).on("click", ".open-AddBookDialog2", function () {

          var ID_lesson           = $(this).data('id_lesson');
          $(".modal-body #ID_lesson").val( ID_lesson );

          var Lessonname            = $(this).data('lessonname');
          $(".modal-body #Lessonname").val(Lessonname );

          var ID_Teacher           = $(this).data('id_teacher');
          $(".modal-body #ID_Teacher").val( ID_Teacher  );

          var Detail         = $(this).data('detail');
          $(".modal-body #Detail").val( Detail  );

          var Lessonfile1   = $(this).data('lessonfile1');
          $(".modal-body #Lessonfile1").val( Lessonfile1 );
			
          var Lessonfile2    = $(this).data('lessonfile2');
          $(".modal-body #Lessonfile2 ").val(Lessonfile2);

            $('#Modaledit').modal('show');
        });    
</script>
</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>