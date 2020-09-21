<?php
    session_start();
    include 'function/connect.php';
    if($_SESSION['session_id']!=''&&$_SESSION['session_type']==3){
    $id = (isset($_GET['id']) ? $_GET['id'] : '');   
    $id_course         = (isset($_GET['id']) ? $_GET['id'] : '');
    $ID_member     = (isset($_SESSION['session_id'])   ?   $_SESSION['session_id']   : '' );
    $ID_lesson     = (isset($_GET['ID_lesson']) ? $_GET['ID_lesson'] : '');
    $Lessonfile1   = (isset($_GET['Lessonfile1']) ? $_GET['Lessonfile1'] : '');
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
                                $sql = "SELECT * FROM lesson ";
                                 $result = $conn->query($sql);
                            ?>
                                <div class="box-footer">
                                <a href="#" 
                                                data-toggle        ="modal" 
                                                data-target        ="#Modaladdlesson" 
                                                type= "button" class="btn btn-success pull-right " >
                                            <i class="fa fa-upload">
                                            </i>&nbsp;เพิ่มบทเรียน
                                            </a>
                                </div>
                                    <thead>
                                        <th width="100px">จัดการข้อมูล</th>
                                        <th width="100px">ชื่อบทเรียน</th>
                                        <th width="100px">คำสำคัญ</th>
                                        <th width="100px">รหัสผู้สอน</th>
                                        <th width="100px">รายละเอียด</th>
                                        <th width="100px">ไฟล์บทเรียน</th>
                                    </thead>
                                    <?php
                                        while( $row = $result->fetch_array(MYSQLI_BOTH) ){
                                        ?>
                                    <tr>
                                        <td >
                                        <div class="btn-group">
                                        <a href="#" 
                                                data-toggle            ="modal" 
                                                data-target            ="#Modalview" 
                                                data-id_lesson         ="<?php echo  $row["ID_lesson"];?>"
                                                data-lessonname        ="<?php echo  $row["Lessonname"];?>"
                                                data-keyword           ="<?php echo  $row["keyword"];?>"
                                                data-id_course         ="<?php echo  $row["ID_course"];?>"
                                                data-id_teacher        ="<?php echo  $row["ID_Teacher"];?>"
                                                data-detail            ="<?php echo  $row["Detail"];?>"
                                                data-lessonfile1       ="<?php echo  $row["Lessonfile1"];?>"
                                                type                   ="button" class="btn btn-info fa fa-search open-AddBookDialog">
                                                
                                        </a>
                                   
                                        <a href="#" 
                                                data-toggle         ="modal" 
                                                data-target         ="#Modaledit" 
                                                data-id_lesson      = "<?=$row["ID_lesson"]?>"
                                                data-lessonname     = "<?=$row["Lessonname"]?>"
                                                data-keyword        = "<?=$row["keyword"]?>"
                                                data-id_course      = "<?=$row["ID_course"]?>"
                                                data-id_teacher     = "<?=$row["ID_Teacher"]?>"
                                                data-detail         = "<?=$row["Detail"]?>"
                                                data-lessonfile1    = "<?=$row["Lessonfile1"]?>"
                                                data-banner         = "<?=$row["banner"]?>"
                                                type                ="button" class="btn btn-warning fa fa-edit  open-AddBookDialog2" >
                                        </a>
                           
                                        <a href="JavaScript:if(confirm('ต้องการลบข้อมูล?') == true)
                                                {window.location='function/lesson_del.php?ID_lesson=<?=$row['ID_lesson']?>';}" class="btn btn-danger fa fa-trash-o">
                                       </a>
                                       </div>
                                        </td>
                                        <td><?php echo $row["Lessonname"];?></td>
                                        <td><?php echo $row["keyword"];?></td>
                                        <td><?php echo $row["ID_Teacher"];?></td>
                                        <td><?php echo $row["Detail"];?></td>
                                        <td><a href="showfile.php?ID_lesson=<?=$row['ID_lesson']?>&id_course=<?=$id_course?>"><?php echo $row["Lessonfile1"];?> </td>                                                                     
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
                    <h4>ดูข้อมูล</h4>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                        <div class="form-group col-md-12 ">
                                <label for="ID_lesson" >รหัสบทเรียน</label>
                                <input  type="text" class="form-control" id="ID_lesson" name="ID_lesson" readonly>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="Lessonname">ชื่อบทเรียน</label>
                                <input type="text" class="form-control" id="Lessonname" name="Lessonname" readonly>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="keyword">คำสำคัญ</label>
                                <input type="text" class="form-control" id="keyword" name="keyword" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_course">รหัสชั้นเรียน</label>
                                <input type="text" class="form-control"  id="ID_course" name="ID_course" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_Teacher">รหัสผู้สอน</label>
                                <input type="text" class="form-control"  id="ID_Teacher" name="ID_Teacher" readonly>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="Detail">รายละเอียด</label>
                                <textarea cols="30" rows="10" class="form-control" id="Detail" name="Detail" readonly> </textarea>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="banner">ไฟล์บทเรียน (ขนาดไฟล์ไม่เกิน 2 MB)</label>
                                <input type="file"  id="banner" name="banner" required>
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
<form method="post" enctype="multipart/form-data"  action="function/lesson_edit.php">
    <div class="modal modal-default fade" id="Modaledit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4>แก้ไขข้อมูล</h4>
                </div>
                <div class="modal-body">
                        <div class="box-body">
                        <div class="form-group col-md-12 ">
                                <label for="ID_lesson" >รหัสบทเรียน</label>
                                <input  type="text" class="form-control" id="ID_lesson" name="ID_lesson" readonly>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="Lessonname">ชื่อบทเรียน</label>
                                <input type="text" class="form-control" id="Lessonname" name="Lessonname" >
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="keyword">คำสำคัญ</label>
                                <select id="keyword" name="keyword"  class="form-control select2"  >
                                <option selected="selected" value="พื้นฐาน">พื้นฐาน</option>
                                <option value="การแสดงผล">การแสดงผล</option>
                                <option value="ชนิดข้อมูล">ชนิดข้อมูล</option>
                                <option value="การกำหนดเงื่อนไข">การกำหนดเงื่อนไข</option>
                                <option value="การวนทำซ้ำ">การวนทำซ้ำ</option>
                                <option value="ตัวแปรเเถวลำดับ">ตัวแปรเเถวลำดับ</option>
                                <option value="ตัวแปรโครงสร้าง">ตัวแปรโครงสร้าง</option>
                                <option value="ตัวแปรงชี้ตำแหน่ง">ตัวแปรงชี้ตำแหน่ง</option>
                                <option value="ฟังก์ชัน">ฟังก์ชัน</option>
                                <option value="ไฟล์">ไฟล์</option>
                                </select>
                             </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_course">รหัสชั้นเรียน</label>
                                <input type="text" class="form-control"  id="ID_course" name="ID_course" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_Teacher">รหัสผู้สอน</label>
                                <input type="text" class="form-control"  id="ID_Teacher" name="ID_Teacher" >
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="Detail">รายละเอียด</label>
                                <textarea cols="30" rows="10" class="form-control" id="Detail" name="Detail" > </textarea>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="banner">ไฟล์บทเรียน (ขนาดไฟล์ไม่เกิน 2 MB)</label>
                                <input type="file"  id="banner" name="banner" required>
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


<form method="post" enctype="multipart/form-data" action="function/lesson_add.php">
    <div class="modal modal-default fade" id="Modaladdlesson" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4>เพิ่มบทเรียน</h4>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                        <div class="form-group col-md-12 ">
                                <label for="ID_lesson" >รหัสบทเรียน</label>
                                <input  type="text" class="form-control" id="ID_lesson" name="ID_lesson" >
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="Lessonname">ชื่อบทเรียน</label>
                                <input type="text" class="form-control" id="Lessonname" name="Lessonname" >
                            </div>
                            <div class="form-group col-md-6 has-feedback">
                                <label for="keyword">คำสำคัญ</label>
                                <select id="keyword" name="keyword" class="form-control select2"  >
                                <option value="0">กรุณาเลือกคำสำคัญ</option>
                                <option value="พื้นฐาน">พื้นฐาน</option>
                                <option value="การแสดงผล">การแสดงผล</option>
                                <option value="ชนิดข้อมูล">ชนิดข้อมูล</option>
                                <option value="การกำหนดเงื่อนไข">การกำหนดเงื่อนไข</option>
                                <option value="การวนทำซ้ำ">การวนทำซ้ำ</option>
                                <option value="ตัวแปรเเถวลำดับ">ตัวแปรเเถวลำดับ</option>
                                <option value="ตัวแปรโครงสร้าง">ตัวแปรโครงสร้าง</option>
                                <option value="ตัวแปรงชี้ตำแหน่ง">ตัวแปรงชี้ตำแหน่ง</option>
                                <option value="ฟังก์ชัน">ฟังก์ชัน</option>
                                <option value="ไฟล์">ไฟล์</option>
                                </select>
                             </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_course">รหัสชั้นเรียน</label>
                                <input type="text" class="form-control"  id="ID_course" name="ID_course" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_Teacher">รหัสผู้สอน</label>
                                <input type="text" class="form-control"  id="ID_Teacher" name="ID_Teacher" >
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="Detail">รายละเอียด</label>
                                <textarea cols="30" rows="10" class="form-control" id="Detail" name="Detail" > </textarea>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="banner">ไฟล์บทเรียน (ขนาดไฟล์ไม่เกิน 2 MB)</label>
                                <input type="file"  id="banner" name="banner" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button   type="submit" name="Submit" class="btn btn-success" > อัปโหลดข้อมูล</button>
                        <button  type="button" class="btn btn-primary"  data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

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

          var keyword            = $(this).data('keyword');
          $(".modal-body #keyword").val(keyword );

          var ID_course           = $(this).data('id_course');
          $(".modal-body #ID_course").val( ID_course  );

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

          var keyword            = $(this).data('keyword');
          $(".modal-body #keyword").val(keyword );

          var ID_course           = $(this).data('id_course');
          $(".modal-body #ID_course").val( ID_course  );

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