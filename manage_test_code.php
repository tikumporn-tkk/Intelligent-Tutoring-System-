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
                <div class="box ">
                    <div class="box-header">
                        <h3 class="box-title">ข้อมูลแบบทดสอบ แบบอัตนัย</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">

                                <?php
                                    $sql = "SELECT * FROM test_command";
                                    $result = $conn->query($sql);
                                ?>

                                <div class="box-footer">
                                <a href="#" 
                                                data-toggle      ="modal" 
                                                data-target      ="#Modaladd" 
                                                data-id          =  "<?php echo $row["ID"];?>"
                                                data-no          =  "<?php echo  $row["No"];?>"
                                                data-id_lesson	 =  "<?php echo  $row["ID_lesson"];?>"
                                                data-question    =  "<?php echo $row["Question"];?>"
                                                data-ex_code     =  "<?php echo $row["Ex_code"];?>"
                                                data-answer      =  "<?php echo $row["Answer"];?>"
                                                data-hint1       =  "<?php echo $row["Hint1"];?>"
                                                data-hint2       =  "<?php echo $row["Hint2"];?>"
                                                data-hint3       =  "<?php echo $row["Hint3"];?>"
                                                data-id_course   =  "<?php echo $row["ID_course"];?>"
                                                data-id_teacher  =  "<?php echo $row["ID_teacher"];?>"
                                                data-keyword     =  "<?php echo $row["keyword"];?>"
                                                type= "button" class="btn btn-success pull-right open-AddBookDialog3" >
                                            <i class="fa fa-fw fa-plus">
                                            </i>เพิ่มแบบทดสอบ
                                            </a>
                                </div>
                                    <thead>
                                        <th width="150px">จัดการข้อมูล</th>
                                        <th width="100px">ลำดับข้อ</th>
                                        <th width="100px">คำถาม</th>
                                        <th width="100px">โค้ดเฉลย</th>
                                        <th width="100px">ผลลัพธ์</th>
                                        <th width="100px">ตัวช่วยที่ 1 </th>
                                        <th width="100px">ตัวช่วยที่ 2</th>
                                        <th width="100px">ตัวช่วยที่ 3</th>
                                    </thead>
                                    <?php
                                        while( $row = $result->fetch_array(MYSQLI_BOTH) ){
                                        ?>
                                    <tr>
                                        <td >
                                        <div class="btn-group">
                                        <a href="#" 
                                                data-toggle      ="modal" 
                                                data-target      ="#Modalview" 
                                                data-id          =  "<?php echo $row["ID"];?>"
                                                data-no          =  "<?php echo $row["No"];?>"
                                                data-id_lesson	 =  "<?php echo $row["ID_lesson"];?>"
                                                data-question    =  "<?php echo $row["Question"];?>"
                                                data-ex_code     =  "<?php echo $row["Ex_code"];?>"
                                                data-answer      =  "<?php echo $row["Answer"];?>"
                                                data-hint1       =  "<?php echo $row["Hint1"];?>"
                                                data-hint2       =  "<?php echo $row["Hint2"];?>"
                                                data-hint3       =  "<?php echo $row["Hint3"];?>"
                                                data-id_course   =  "<?php echo $row["ID_course"];?>"
                                                data-id_teacher  =  "<?php echo $row["ID_teacher"];?>"
                                                data-keyword     =  "<?php echo $row["keyword"];?>"
                                                type="button" class="btn btn-info fa fa-search open-AddBookDialog">
                                                
                                        </a>
                                     
                                        <a href="#" 
                                                data-toggle      ="modal" 
                                                data-target      ="#Modaledit"
                                                data-id          =  "<?php echo $row["ID"];?>"
                                                data-no          =  "<?php echo $row["No"];?>"
                                                data-id_lesson	 =  "<?php echo $row["ID_lesson"];?>"
                                                data-question    =  "<?php echo $row["Question"];?>"
                                                data-ex_code     =  "<?php echo $row["Ex_code"];?>"
                                                data-answer      =  "<?php echo $row["Answer"];?>"
                                                data-hint1       =  "<?php echo $row["Hint1"];?>"
                                                data-hint2       =  "<?php echo $row["Hint2"];?>"
                                                data-hint3       =  "<?php echo $row["Hint3"];?>"
                                                data-id_course   =  "<?php echo $row["ID_course"];?>"
                                                data-id_teacher  =  "<?php echo $row["ID_teacher"];?>"
                                                data-keyword     =  "<?php echo $row["keyword"];?>"
                                                type="button" class="btn btn-warning fa fa-edit open-AddBookDialog2">
                                               
                                        </a>
                              
                                        <a href="JavaScript:if(confirm('ต้องการลบข้อมูล?') == true)
                                                {window.location='function/test_del_code.php?ID=
                                                <?php echo $row["ID"];?>';}" class="btn btn-danger fa fa-trash-o">
                                        </a>
                                        </div>
                                        </td>
                                        <td><?php   echo $row["No"];?></td>
                                        <td><?php   echo $row["Question"];?></td>
                                        <td><?php   echo $row["Ex_code"];?></td>
                                        <td><?php   echo $row["Answer"];?></td>
                                        <td><?php   echo $row["Hint1"];?></td>
                                        <td><?php   echo $row["Hint2"];?></td>
                                        <td><?php   echo $row["Hint3"];?></td>                                                                           
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
                                <label for="ID">รหัสแบบทดสอบ</label>
                                <input type="text" class="form-control" id="ID" name="ID" readonly>
                            </div>
                            
                            <div class="form-group col-md-6 ">
                                <label for="No">ลำดับข้อ</label>
                                <input type="text" class="form-control"  id="No" name="No" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_lesson">รหัสบทเรียน</label>
                                <input type="text" class="form-control"  id="ID_lesson" name="ID_lesson" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Question">คำถาม</label>
                                <textarea cols="20" rows="5" class="form-control" id="Question" name="Question" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Ex_code">โค้ดเฉลย</label>
                                <textarea cols="20" rows="5" class="form-control" id="Ex_code" name="Ex_code" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Answer">ผลลัพธ์</label>
                                <textarea cols="20" rows="5" class="form-control"  id="Answer" name="Answer" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint1">ตัวช่วยที่ 1</label>
                                <textarea cols="20" rows="5" class="form-control" id="Hint1" name="Hint1" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hin2">ตัวช่วยที่ 2</label>
                                <textarea cols="20" rows="5" class="form-control" id="Hint2" name="Hint2" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint3">ตัวช่วยที่ 3</label>
                                <textarea cols="20" rows="5" class="form-control" id="Hint3" name="Hint3" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_course">รหัสชั้นเรียน</label>
                                <textarea type="text" class="form-control" id="ID_course" name="ID_course" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_teacher">รหัสอาจารย์</label>
                                <textarea type="text" class="form-control" id="ID_teacher" name="ID_teacher" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="keyword">คำสำคัญ</label>
                                <textarea type="text" class="form-control" id="keyword" name="keyword" readonly></textarea>
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

<!-- คำสั่งเรียกดูข้อมูลในแว่นขยาย -->
<form method="post" action="function/test_edit_code.php">
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
                                <label for="ID">รหัสแบบทดสอบ</label>
                                <input type="text" class="form-control" id="ID" name="ID" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="No">ลำดับข้อ</label>
                                <input type="text" class="form-control"  id="No" name="No" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_lesson">รหัสบทเรียน</label>
                                <input type="text" class="form-control"  id="ID_lesson" name="ID_lesson" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Question">คำถาม</label>
                                <textarea cols="20" rows="5" class="form-control" id="Question" name="Question" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Ex_code">โค้ดเฉลย</label>
                                <textarea cols="20" rows="5" class="form-control" id="Ex_code" name="Ex_code" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Answer">ผลลัพธ์</label>
                                <textarea cols="20" rows="5" class="form-control"  id="Answer" name="Answer" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint1">ตัวช่วยที่ 1</label>
                                <textarea cols="20" rows="5" class="form-control" id="Hint1" name="Hint1" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hin2">ตัวช่วยที่ 2</label>
                                <textarea cols="20" rows="5" class="form-control" id="Hint2" name="Hint2" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint3">ตัวช่วยที่ 3</label>
                                <textarea cols="20" rows="5" class="form-control" id="Hint3" name="Hint3" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_course">รหัสชั้นเรียน</label>
                                <textarea type="text" class="form-control" id="ID_course" name="ID_course" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_teacher">รหัสอาจารย์</label>
                                <textarea type="text" class="form-control" id="ID_teacher" name="ID_teacher" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="keyword">คำสำคัญ</label>
                                <select id="keyword" name="keyword" class="form-control select2"  >
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

<!-- คำสั่งเรียกเพิ่มข้อมูลในแว่นขยาย -->
<form method="post" action="function/test_add_code.php">
    <div class="modal modal-default fade" id="Modaladd" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4>เพิ่มข้อมูล</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-6 ">
                                <label for="No">ลำดับข้อ</label>
                                <input type="text" class="form-control"  id="No" name="No" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_lesson">รหัสบทเรียน</label>
                                <textarea type="text" class="form-control" id="ID_lesson" name="ID_lesson" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Question">คำถาม</label>
                                <textarea cols="20" rows="5" class="form-control" id="Question" name="Question" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Ex_code">โค้ดเฉลย</label>
                                <textarea cols="20" rows="5" class="form-control" id="Ex_code" name="Ex_code" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Answer">ผลลัพธ์</label>
                                <textarea cols="20" rows="5" class="form-control"  id="Answer" name="Answer" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint1">ตัวช่วยที่ 1</label>
                                <textarea cols="20" rows="5" class="form-control" id="Hint1" name="Hint1" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hin2">ตัวช่วยที่ 2</label>
                                <textarea cols="20" rows="5" class="form-control" id="Hint2" name="Hint2" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint3">ตัวช่วยที่ 3</label>
                                <textarea cols="20" rows="5" class="form-control" id="Hint3" name="Hint3" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_course">รหัสชั้นเรียน</label>
                                <textarea type="text" class="form-control" id="ID_course" name="ID_course" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_teacher">รหัสอาจารย์</label>
                                <textarea type="text" class="form-control" id="ID_teacher" name="ID_teacher" ></textarea>
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
</script>


<script>
/* คำสั่งเรียกดูข้อมูลในแว่นขยาย */
        $(document).on("click", ".open-AddBookDialog", function () {

            var ID          = $(this).data('id');
            $(".modal-body #ID").val( ID );

            var No           = $(this).data('no');
            $(".modal-body #No").val( No );

            var ID_lesson          = $(this).data('id_lesson');
            $(".modal-body #ID_lesson").val( ID_lesson );

            var Question         = $(this).data('question');
            $(".modal-body #Question").val( Question );

            var Ex_code   = $(this).data('ex_code');
            $(".modal-body #Ex_code").val( Ex_code );
                
            var Answer    = $(this).data('answer');
            $(".modal-body #Answer").val(Answer);

            var Hint1     = $(this).data('hint1');
            $(".modal-body #Hint1").val( Hint1 );

            var Hint2     = $(this).data('hint2');
            $(".modal-body #Hint2").val( Hint2 );

            var Hint3     = $(this).data('hint3');
            $(".modal-body #Hint3").val( Hint3 );

            var ID_course   = $(this).data('id_course');
            $(".modal-body #ID_course").val( ID_course );

            var ID_teacher  = $(this).data('id_teacher');
            $(".modal-body #ID_teacher").val( ID_teacher );
            
            var keyword     = $(this).data('keyword');
            $(".modal-body #keyword").val( keyword );

            $('#Modalview').modal('show');
        });

/* คำสั่งเรียกแก้ไขข้อมูลในแว่นขยาย */
        $(document).on("click", ".open-AddBookDialog2", function () {

            var ID          = $(this).data('id');
            $(".modal-body #ID").val( ID );

            var No           = $(this).data('no');
            $(".modal-body #No").val( No );

            var ID_lesson          = $(this).data('id_lesson');
            $(".modal-body #ID_lesson").val( ID_lesson );

            var Question         = $(this).data('question');
            $(".modal-body #Question").val( Question );

            var Ex_code   = $(this).data('ex_code');
            $(".modal-body #Ex_code").val( Ex_code );
                
            var Answer    = $(this).data('answer');
            $(".modal-body #Answer").val(Answer);

            var Hint1     = $(this).data('hint1');
            $(".modal-body #Hint1").val( Hint1 );

            var Hint2     = $(this).data('hint2');
            $(".modal-body #Hint2").val( Hint2 );

            var Hint3     = $(this).data('hint3');
            $(".modal-body #Hint3").val( Hint3 );

            var ID_course     = $(this).data('id_course');
            $(".modal-body #ID_course").val( ID_course );

            var ID_teacher     = $(this).data('id_teacher');
            $(".modal-body #ID_teacher").val( ID_teacher );

            var keyword     = $(this).data('keyword');
            $(".modal-body #keyword").val( keyword );

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
