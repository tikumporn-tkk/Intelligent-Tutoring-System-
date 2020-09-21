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
                        <h3 class="box-title">ข้อมูลสมาชิก</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <?php
                                $sql = "SELECT * FROM member LEFT JOIN  type_member 
                                ON  member.ID_type = type_member.ID_type WHERE member.ID_type = 1 OR member.ID_type= 2 ORDER BY ID_member ASC";
                                 $result = $conn->query($sql);
                            ?>
                                <div class="box-footer">
                                
                                <a href="#" 
                                                data-toggle          ="modal" 
                                                data-target          ="#Modaladd" 
                                                data-id_member      =  "<?php echo  $row["ID_member"]?>"
                                                data-firstname      =  "<?php echo  $row["Firstname"];?>"
                                                data-lastname       =  "<?php echo $row["Lastname"];?>"
                                                data-gender         =  "<?php echo $row["Gender"];?>"
                                                data-school          =  "<?php echo $row["School"];?>"
                                                data-email          =  "<?php echo $row["Email"];?>"
                                                data-password       =  "<?php echo $row["Password"];?>"
                                                data-id_type        =  "<?php echo $row["ID_type"];?>"
                                                type= "button" class="btn btn-success pull-right open-AddBookDialog3" >
                                            <i class="fa fa-user-plus">
                                            </i> &nbsp; เพิ่มข้อมูล
                                            </a>
                                </div>

                                    <thead>
                                        <th width="100px">จัดการข้อมูล</th>
                                        <th width="100px">ชื่อ</th>
                                        <th width="100px">นามสกุล</th>
                                        <th width="100px">เพศ</th>
                                        <th width="100px">สถาบัน</th>
                                        <th width="100px">อีเมล</th>
                                        <th width="100px">ประเภทผู้ใช้งาน</th>
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
                                                data-id_member      =  "<?php echo  $row["ID_member"]?>"
                                                data-firstname      =  "<?php echo  $row["Firstname"];?>"
                                                data-lastname       =  "<?php echo $row["Lastname"];?>"
                                                data-gender         =  "<?php echo $row["Gender"];?>"
                                                data-school          =  "<?php echo $row["School"];?>"
                                                data-email          =  "<?php echo $row["Email"];?>"
                                                data-password       =  "<?php echo $row["Password"];?>"
                                                data-id_type        =  "<?php echo $row["ID_type"];?>"
                                                type="button" class="btn btn-info fa fa-search open-AddBookDialog">
                                                
                                        </a>
                                        
                                        <a href="#" 
                                                data-toggle        ="modal" 
                                                data-target        ="#Modaledit" 
                                                data-id_member      =  "<?php echo  $row["ID_member"]?>"
                                                data-firstname      =  "<?php echo  $row["Firstname"];?>"
                                                data-lastname       =  "<?php echo $row["Lastname"];?>"
                                                data-gender         =  "<?php echo $row["Gender"];?>"
                                                data-school          =  "<?php echo $row["School"];?>"
                                                data-email          =  "<?php echo $row["Email"];?>"
                                                data-password       =  "<?php echo $row["Password"];?>"
                                                data-id_type        =  "<?php echo $row["ID_type"];?>"
                                                type="button" class="btn btn-warning fa fa-edit open-AddBookDialog2">
                                                
                                        </a>

                                        
                                        <a href="JavaScript:if(confirm('ต้องการลบข้อมูล?') == true)
                                                {window.location='function/member_del.php?ID_member=
                                                <?php echo $row["ID_member"];?>';}" class="btn btn-danger fa fa-trash-o">
                                      </a>
                                      </div> 
                                        </td>
                                        <td><?php echo $row["Firstname"];?></td>
                                        <td><?php echo $row["Lastname"];?></td>
                                        <td> <?php echo $row["Gender"];?></td>
                                        <td> <?php echo $row["School"];?></td>
                                        <td><?php echo $row["Email"];?></td>
                                        <td><?php echo $row["Typename"];?></td>                                                                          
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
                            <div class="form-group col-md-6 ">
                                <label for="ID_member" >รหัสสมาชิก</label>
                                <input  type="text" class="form-control" id="ID_member" name="ID_member" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Firstname">ชื่อ</label>
                                <input type="text" class="form-control" id="Firstname" name="Firstname" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Lastname">นามสกุล</label>
                                <input type="text" class="form-control"  id="Lastname" name="Lastname" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Gender">เพศ</label>
                                <select id="Gender" name="Gender" class="form-control select2"readonly>
                                <option selected="selected" value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="School">สถาบัน</label>
                                <input type="text" class="form-control" id="School" name="School" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Email">อีเมล</label>
                                <input type="text" class="form-control" id="Email" name="Email" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Password">รหัสผ่าน</label>
                                <input type="text" class="form-control"  id="Password" name="Password" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_type">ประเภทผู้ใช้งาน</label>
                                <select id="ID_type" name="ID_type" class="form-control select2" readonly>
                                <option selected="selected" value="1">อาจารย์</option>
                                <option value="2">นักศึกษา</option>
                            </select>
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
<form method="post" action="function/member_edit.php">
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
                            <div class="form-group col-md-6 ">
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
                                <label for="School">สถาบัน</label>
                                <input type="text" class="form-control" id="School" name="School" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Email">อีเมล</label>
                                <input type="email" class="form-control" id="Email" name="Email" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Password">รหัสผ่าน</label>
                                <input type="text" class="form-control"  id="Password" name="Password" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_type">ประเภทผู้ใช้งาน</label>
                                <select id="ID_type" name="ID_type" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="1">อาจารย์</option>
                                <option value="2">นักศึกษา</option>
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
<form method="post" action="function/member_add.php">
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
                                <label for="School">สถาบัน</label>
                                <input type="text" class="form-control" id="School" name="School" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Email">อีเมล</label>
                                <input type="email" class="form-control" id="Email" name="Email" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Password">รหัสผ่าน</label>
                                <input type="text" class="form-control"  id="Password" name="Password">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="ID_type">ประเภทผู้ใช้งาน</label>
                                <select id="ID_type" name="ID_type" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="1">อาจารย์</option>
                                <option value="2">นักศึกษา</option>
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

            var ID_member           = $(this).data('id_member');
            $(".modal-body #ID_member").val( ID_member );

            var Firstname           = $(this).data('firstname');
            $(".modal-body #Firstname").val( Firstname );

            var Lastname           = $(this).data('lastname');
            $(".modal-body #Lastname").val( Lastname );

            var Gender         = $(this).data('gender');
            $(".modal-body #Gender").val( Gender );

            var School         = $(this).data('school');
            $(".modal-body #School").val( School );

            var Email   = $(this).data('email');
            $(".modal-body #Email").val( Email );
                
            var Password    = $(this).data('password');
            $(".modal-body #Password").val(Password);
                
            var ID_type     = $(this).data('id_type');
            $(".modal-body #ID_type").val( ID_type );
            
            $('#Modalview').modal('show');
        });

        /* คำสั่งเรียกแก้ไขข้อมูลในแว่นขยาย */
        $(document).on("click", ".open-AddBookDialog2", function () {

            var ID_member           = $(this).data('id_member');
            $(".modal-body #ID_member").val( ID_member );

            var Firstname           = $(this).data('firstname');
            $(".modal-body #Firstname").val( Firstname );

            var Lastname           = $(this).data('lastname');
            $(".modal-body #Lastname").val( Lastname );

            var Gender         = $(this).data('gender');
            $(".modal-body #Gender").val( Gender );

            var School         = $(this).data('school');
            $(".modal-body #School").val( School );

            var Email   = $(this).data('email');
            $(".modal-body #Email").val( Email );
            
            var Password    = $(this).data('password');
            $(".modal-body #Password").val(Password);
            
            var ID_type     = $(this).data('id_type');
            $(".modal-body #ID_type").val( ID_type );

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
