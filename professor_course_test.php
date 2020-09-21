<?php
   session_start();
   include 'function/connect.php';
   if($_SESSION['session_id']!=''&&$_SESSION['session_type']==1){

    $session_id     = (isset($_SESSION['session_id'])   ?   $_SESSION['session_id']   : '' );

        $id_course         = (isset($_GET['id_course']) ? $_GET['id_course'] : '');
        $ID_lesson= (isset($_GET['ID_lesson']) ? $_GET['ID_lesson'] : '');
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
                    <?php
                         $sql_test        = "SELECT * FROM test_detail 
                                             JOIN lesson      ON  lesson.ID_lesson = test_detail.ID_lesson
                                             JOIN course      ON  course.ID_course = lesson.ID_course
                         WHERE 	lesson.ID_lesson   = $ID_lesson ";
                         $result_test     = $conn->query( $sql_test );
                         $row_test        = $result_test->fetch_array(MYSQLI_BOTH);
                    ?>
                    <div class="callout callout-info" style="background-image: url(../dist/img/shutterstock_1060094186.jpg);" >
                        <h1><?=$row_test['Coursename']?></h1><br>
                        <h3><?=$row_test['Detail']?></h3>
                        &nbsp;<br>
                        &nbsp;<br>
                        &nbsp;<br>
                    </div>
     <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
                     <!-- /.แบบทดสอบ -->
                            <div class="box-footer">
                                    <a href="#" 
                                        data-toggle         ="modal" 
                                        data-target         ="#Modaladdtest" 
                                       
                                        type                ="button" class="btn btn-success pull-right " >
                                        <i class="fa fa-fw fa-plus"> </i>เพิ่มแบบทดสอบ
                                    </a>
                            
                                    <a  href    ="professor_course_add.php?id_course=<?php echo$row_test['ID_course'];?>"
                                        type    ="button" 
                                        class   ="btn btn-success" >
                                        <i class="fa fa-fw fa-mail-reply"> </i>ย้อนกลับ
                                    </a>
                            </div>

                            <!-- Post --><!-- แสดงข้อมูลในตาราง -->
            <div class="post">
                <div class="box">
                                <div class="box-header">
                                <i class="fa fa-file-code-o"> </i><h3 class="box-title">ข้อมูลแบบทดสอบ</h3>
                                </div>
            <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table">
                                <?php
                                    $sql_test        = "SELECT * FROM test_detail
                                     WHERE test_detail.ID_lesson = $ID_lesson ";
                                    $result_test = $conn->query($sql_test);
                                ?>

                                <div class="box-footer">
                                    <thead>
                                        <th width="150px">จัดการข้อมูล</th>
                                        <th width="80px">ลำดับข้อ</th>
                                        <th width="100px">คำถาม</th>
                                        <th width="100px">ตัวเลือกที่ 1</th>
                                        <th width="100px">ตัวเลือกที่ 2</th>
                                        <th width="100px">ตัวเลือกที่ 3</th>
                                        <th width="100px">ตัวเลือกที่ 4</th>
                                        <th width="80px">เฉลย</th>
                                    </thead>
                                    <?php
                                         $i=0;
                                         while( $row_test = $result_test->fetch_array(MYSQLI_BOTH) ){
                                         ?>
                                    <tr>
                                        <td >
                                        <a href="#" 
                                                data-toggle      ="modal" 
                                                data-target      ="#Modalview" 
                                                data-id_test     =  "<?php echo $row_test["ID_test"];?>"
                                                data-no          =  "<?php echo  $row_test["No"];?>"
                                                data-question    =  "<?php echo $row_test["Question"];?>"
                                                data-choice1     =  "<?php echo $row_test["Choice1"];?>"
                                                data-choice2     =  "<?php echo $row_test["Choice2"];?>"
                                                data-choice3     =  "<?php echo $row_test["Choice3"];?>"
                                                data-choice4     =  "<?php echo $row_test["Choice4"];?>"
                                                data-answer      =  "<?php echo $row_test["Answer"];?>"
                                                data-id_lesson   =  "<?php echo $row_test["ID_lesson"];?>"
                                                data-id_course   =  "<?php echo $row_test["ID_course"];?>"
                                                data-id_teacher  =  "<?php echo $row_test["ID_teacher"];?>"
                                                data-keyword     =  "<?php echo $row_test["keyword"];?>"
                                                type="button" class="btn btn-info fa fa-search open-AddBookDialog">
                                            
                                        </a>
                                        <a href="#" 
                                                data-toggle         ="modal" 
                                                data-target         ="#Modaledit"
                                                data-id_test        =  "<?php echo $row_test["ID_test"];?>"
                                                data-no             =  "<?php echo  $row_test["No"];?>"
                                                data-question       =  "<?php echo $row_test["Question"];?>"
                                                data-choice1        =  "<?php echo $row_test["Choice1"];?>"
                                                data-choice2        =  "<?php echo $row_test["Choice2"];?>"
                                                data-choice3        =  "<?php echo $row_test["Choice3"];?>"
                                                data-choice4        =  "<?php echo $row_test["Choice4"];?>"
                                                data-answer         =  "<?php echo $row_test["Answer"];?>"
                                                data-id_lesson      =  "<?php echo $row_test["ID_lesson"];?>"
                                                data-id_course      =  "<?php echo $row_test["ID_course"];?>"
                                                data-id_teacher     =  "<?php echo $row_test["ID_teacher"];?>"
                                                data-keyword     =  "<?php echo $row_test["keyword"];?>"
                                                type="button" class="btn btn-warning fa fa-edit open-AddBookDialog2">
                                                
                                        </a>
                                        <a href="JavaScript:if(confirm('ต้องการลบข้อมูล?') == true)
                                                {window.location='function/professor_test_del.php?ID_test=
                                                <?php echo $row_test["ID_test"];?>';}" class="btn btn-danger fa fa-trash-o">
                                    </a>
                                        </a>
                                        </td>
                                        <td><?php echo $row_test["No"];?></td>
                                        <td><?php echo $row_test["Question"];?></td>
                                        <td> <?php echo $row_test["Choice1"];?></td>
                                        <td><?php echo $row_test["Choice2"];?></td>
                                        <td><?php echo $row_test["Choice3"];?></td>
                                        <td><?php echo $row_test["Choice4"];?></td>
                                        <td><?php echo $row_test["Answer"];?></td>                                                                           
                                    </tr>
                                    <?php
                                    $i++;
                                        }
                                    ?>
                             </table>
                 </div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->

        </div>
        <!-- /.post -->
    </div>    
                                
    </div>
        <!-- /.col -->
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

<!-- จัดการข้อมูลแบบทดสอบ เพิ่ม ลบ แก้ไข แสดง -->
<!-- คำสั่งเรียกดูข้อมูลในแว่นขยาย -->
<form method="post" action="">
    <div class="modal modal-default fade" id="Modalview" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h5>ดูข้อมูล</h5>
                </div>
                <div class="modal-body">
                        <div class="box-body">
                        <!-- <input type="hidden" class="form-control" id="ID_course" name="ID_course" value="<?=$id?>" > -->
                            <div class="form-group col-md-6 ">
                                <label for="ID_test">รหัสแบบทดสอบ</label>
                                <input type="text" class="form-control" id="ID_test" name="ID_test" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="No">ลำดับข้อ</label>
                                <input type="text" class="form-control"  id="No" name="No" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Question">คำถาม</label>
                                <textarea cols="20" rows="5" class="form-control" id="Question" name="Question" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice1">ตัวเลือกที่ 1</label>
                                <textarea cols="20" rows="5" class="form-control" id="Choice1" name="Choice1" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice2">ตัวเลือกที่ 2</label>
                                <textarea cols="20" rows="5" class="form-control"  id="Choice2" name="Choice2" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice3">ตัวเลือกที่ 3</label>
                                <textarea cols="20" rows="5" class="form-control" id="Choice3" name="Choice3" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice4">ตัวเลือกที่ 4</label>
                                <textarea cols="20" rows="5" class="form-control" id="Choice4" name="Choice4" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Answer">เฉลย</label>
                                <textarea cols="20" rows="5" class="form-control" id="Answer" name="Answer" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_lesson">รหัสบทเรียน</label>
                                <textarea type="text" class="form-control" id="ID_lesson" name="ID_lesson" readonly></textarea>
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
<form method="post" action="function/professor_test_edit.php">
    <div class="modal modal-default fade" id="Modaledit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h5>แก้ไขข้อมูล</h5>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                        <input type="hidden" class="form-control" id="ID_course" name="ID_course" value="<?=$id?>" >
                        <div class="form-group col-md-6 ">
                                <label for="ID_test">รหัสแบบทดสอบ</label>
                                <input type="text" class="form-control" id="ID_test" name="ID_test" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="No">ลำดับข้อ</label>
                                <input type="text" class="form-control"  id="No" name="No">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Question">คำถาม</label>
                                <textarea cols="20" rows="5" class="form-control" id="Question" name="Question" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice1">ตัวเลือกที่ 1</label>
                                <textarea cols="20" rows="5" class="form-control" id="Choice1" name="Choice1" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice2">ตัวเลือกที่ 2</label>
                                <textarea cols="20" rows="5" class="form-control"  id="Choice2" name="Choice2" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice3">ตัวเลือกที่ 3</label>
                                <textarea cols="20" rows="5" class="form-control" id="Choice3" name="Choice3" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice4">ตัวเลือกที่ 4</label>
                                <textarea cols="20" rows="5" class="form-control" id="Choice4" name="Choice4" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Answer">เฉลย</label>
                                <textarea cols="20" rows="5" class="form-control" id="Answer" name="Answer" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_lesson">รหัสบทเรียน</label>
                                <textarea type="text" class="form-control" id="ID_lesson" name="ID_lesson" ></textarea>
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
<form method="post" action="function/professor_test_add.php">
    <div class="modal modal-default fade" id="Modaladdtest" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>เพิ่มข้อมูลแบบทดสอบ</h3>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                        <input type="hidden" class="form-control" id="ID_course" name="ID_course" value="<?=$id?>" >
                            <div class="form-group col-md-12 ">
                                <label for="No">ลำดับข้อ</label>
                                <input type="text" class="form-control"  name="No" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Question">คำถาม</label>
                                <textarea cols="20" rows="5" class="form-control"  name="Question" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice1">ตัวเลือกที่ 1</label>
                                <textarea cols="20" rows="5" class="form-control"  name="Choice1" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice2">ตัวเลือกที่ 2</label>
                                <textarea cols="20" rows="5" class="form-control"  name="Choice2" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice3">ตัวเลือกที่ 3</label>
                                <textarea cols="20" rows="5" class="form-control"  name="Choice3" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice4">ตัวเลือกที่ 4</label>
                                <textarea cols="20" rows="5" class="form-control" name="Choice4" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Answer">เฉลย</label>
                                <textarea cols="20" rows="5" class="form-control"  name="Answer" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_lesson">รหัสบทเรียน</label>
                                <textarea type="text" class="form-control"  name="ID_lesson" readonly><?=$ID_lesson?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_course">รหัสคอร์ส</label>
                                <textarea type="text" class="form-control"  name="ID_course"  readonly><?=$id_course?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_teacher">รหัสอาจารย์</label>
                                <textarea type="text" class="form-control"  name="ID_teacher" readonly><?=$session_id?></textarea>
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

  /* คำสั่งเรียกดูข้อมูลในแว่นขยาย */
  $(document).on("click", ".open-AddBookDialog", function () {


        var ID_test          = $(this).data('id_test');
        $(".modal-body #ID_test").val( ID_test );

        var No               = $(this).data('no');
        $(".modal-body #No").val( No );

        var Question         = $(this).data('question');
        $(".modal-body #Question").val( Question );

        var Choice1         = $(this).data('choice1');
        $(".modal-body #Choice1").val( Choice1 );
            
        var Choice2         = $(this).data('choice2');
        $(".modal-body #Choice2").val(Choice2);
            
        var Choice3         = $(this).data('choice3');
        $(".modal-body #Choice3").val( Choice3 );

        var Choice4         = $(this).data('choice4');
        $(".modal-body #Choice4").val( Choice4 );

        var Answer          = $(this).data('answer');
        $(".modal-body #Answer").val( Answer );

        var ID_lesson       = $(this).data('id_lesson');
            $(".modal-body #ID_lesson").val( ID_lesson );

        var ID_course       = $(this).data('id_course');
        $(".modal-body #ID_course").val( ID_course );

        var ID_teacher      = $(this).data('id_teacher');
        $(".modal-body #ID_teacher").val( ID_teacher );

        var keyword     = $(this).data('keyword');
        $(".modal-body #keyword").val(keyword );


        $('#Modalview').modal('show');
});

/* คำสั่งเรียกแก้ไขข้อมูลในแว่นขยาย */
$(document).on("click", ".open-AddBookDialog2", function () {

        var ID_test          = $(this).data('id_test');
        $(".modal-body #ID_test").val( ID_test );

        var No               = $(this).data('no');
        $(".modal-body #No").val( No );

        var Question         = $(this).data('question');
        $(".modal-body #Question").val( Question );

        var Choice1          = $(this).data('choice1');
        $(".modal-body #Choice1").val( Choice1 );
            
        var Choice2         = $(this).data('choice2');
        $(".modal-body #Choice2").val(Choice2);
            
        var Choice3         = $(this).data('choice3');
        $(".modal-body #Choice3").val( Choice3 );

        var Choice4         = $(this).data('choice4');
        $(".modal-body #Choice4").val( Choice4 );

        var Answer          = $(this).data('answer');
        $(".modal-body #Answer").val( Answer );
        
        var ID_lesson       = $(this).data('id_lesson');
        $(".modal-body #ID_lesson").val( ID_lesson );

        var ID_course       = $(this).data('id_course');
        $(".modal-body #ID_course").val( ID_course );

        var ID_teacher      = $(this).data('id_teacher');
        $(".modal-body #ID_teacher").val( ID_teacher );

        var keyword     = $(this).data('keyword');
        $(".modal-body #keyword").val(keyword );

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