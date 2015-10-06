<aside class="right-side"> 
    <section class="content-header">
        <h1>
            <?php echo $this->router->class . '-หลักสูตรฝึกอบรม'; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ตารางรหัส</a></li>
            <li class="active"><?php echo $this->router->class . '-เพิ่มหลักสูตรฝึกอบรม'; ?></li>
        </ol> 
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">เพิ่มหลักสูตรฝึกอบรม</h3>
                    </div>

                    <form action="<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/insertExc" method="post" enctype="multipart/form-data" id="form1" name="form1" onSubmit="JavaScript:return fncSubmit();">
                        <div class="box-body">
                            <div class="form-group">
                                <table style="width: 100%" >
                                    <tr>
                                        <td style="width: 30%; height: 30px;">ชื่อ-นามสกุล
                                            <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </td>
                                        <td style="width: 70%">

                                            <div id="MEMBER_NAME"></div>
                                            <input type="hidden" class="form-control" id="MEMBER_ID" name="MEMBER_ID">
                                            <input type="hidden" class="form-control" id="TERM_ID" name="TERM_ID" value="<?php echo $TERM_ID; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height: 30px;">เบอร์โทรศัพท์</td>
                                        <td><div id="MEMBER_PHONE"></div></td>
                                    </tr>
                                    <tr>
                                        <td>สถานะการอนุมัติ</td>
                                        <td>
                                            <select class="form-control" name="HISTORY_STATUS_REGIS">
                                                <option value="0">รอพิจารณา</option>
                                                <option value="1" selected="true">อนุมัติ</option>
                                                <option value="2">ไม่ผ่านเกณฑ์</option>
                                                <option value="3">สละสิทธิ์</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>สถานะการฝึกอบรม</td>
                                        <td>
                                            <select class="form-control" name="HISTORY_STATUS_APPROVE">
                                                <option value="" selected="true">รอการผลฝึกอบรม</option>
                                                <option value="0">ไม่ผ่าน</option>
                                                <option value="1" >ผ่านหลักสูตรแล้ว</option>
                                                <option value="2">ไม่เข้าอบรม</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>วันที่รับสมัคร</td>
                                        <td><input type="text" class="form-control" id="sandbox-container" name="HISTORY_TIME_REGIS" value="<?php echo date('d/m/Y'); ?>" ></td>
                                    </tr>
                                </table>
                            </div>
                            <!--                            <div class="form-group has-error">
                                                            <label for="">ชื่อ-นามสกุล * 
                                                                <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal">
                                                                    <i class="fa fa-search"></i>
                                                                </button>
                                                                <span class="btn btn-sm btn-default" title="ค้นหาข้อมูล"><i class="fa fa-search"></i></span>
                             <div id="MEMBER_NAME"></div></label>
                                                            <input type="hidden" class="form-control" id="" name="MEMBER_ID">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="TYPE_SUBJECT">เบอร์โทรศัพท์ <div id="MEMBER_PHONE"></div></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>สถานะการอนุมัติ</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <div>
                                                                <label>
                                                                    <input type="radio" name="HISTORY_STATUS_REGIS" id="HISTORY_STATUS_REGIS" value="0"/>
                                                                    รอพิจารณา 
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <label>
                                                                    <input type="radio" name="HISTORY_STATUS_REGIS" id="HISTORY_STATUS_REGIS" value="1" checked="true"/>
                                                                    อนุมัติ <br>
                                                                </label>
                                                            </div>    
                                                            <div>    
                                                                <label>
                                                                    <input type="radio" name="HISTORY_STATUS_REGIS" id="HISTORY_STATUS_REGIS" value="2"/>
                                                                    ไม่ผ่านเกณฑ์ <br>
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <label>
                                                                    <input type="radio" name="HISTORY_STATUS_REGIS" id="HISTORY_STATUS_REGIS" value="3"/>
                                                                    สละสิทธิ์ <br>
                                                                </label>
                                                            </div>
                                                        </div>
                            
                            
                                                        <div class="form-group">
                                                            <label>สถานะการฝึกอบรม</label>
                                                            <select class="form-control" name="HISTORY_STATUS_APPROVE">
                                                                <option value="0">ไม่ผ่าน</option>
                                                                <option value="1" selected="true">ผ่านหลักสูตรแล้ว</option>
                                                                <option value="2">ไม่เข้าอบรม</option>
                                                            </select>
                                                        </div>-->
                            <div class="form-group">
                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">ค้นหารายชื่อ</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td style="width: 20%">รหัส บัตรประชาชน</td>
                                                            <td style="width: 80%"><input type="text" name="HRS_ID" id="HRS_ID" value="" class="form-control" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ชื่อ</td>
                                                            <td><input type="text" name="firstname" id="firstname" value="" class="form-control" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>นามสกุล</td>
                                                            <td><input type="text" name="lastname" id="lastname" value="" class="form-control"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><button type="button" class="btn btn-primary" id="buttonSearch" onclick="searchMember();">ค้นหา</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                    <div id="showMember"></div>
                                                </div>
                                            </div>
                                            <!--                                      <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                                  </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="span5 col-md-5" id="sandbox-container"></div>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</aside>
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>js/bootstrap.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.th.js" charset="UTF-8"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script>
                                                                $(document).ready(function () {
                                                                    $('body').off('.data-api');
                                                                    $('body').off('.alert.data-api');
                                                                    $(".btn.danger").button("toggle").addClass("fat");
                                                                    $("#myModal").modal()                       // initialized with defaults
                                                                    $("#myModal").modal({keyboard: false})   // initialized with no keyboard
                                                                    $("#myModal").modal('show')
                                                                    var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
                                                                    $.fn.bootstrapBtn = bootstrapButton            // give $().bootstrapBtn the bootstrap functionality

                                                                    $('#myModal').on('show', function (e) {
                                                                        if (!data)
                                                                            return e.preventDefault() // stops modal from being shown
                                                                    })
                                                                    $('#sandbox-container').datepicker({
                                                                        format: 'dd/mm/yyyy',
                                                                    });

                                                                })
                                                                function searchMember() {
                                                                    //document.getElementById('showMember').innerHTML = 'xxxxx<br>xxxx<br>';
                                                                    var HRS_ID = document.getElementById('HRS_ID').value;
                                                                    var firstname = document.getElementById('firstname').value;
                                                                    var lastname = document.getElementById('lastname').value;

                                                                    var e = HRS_ID + '_' + firstname + '_' + lastname;
                                                                    //var e = document.getElementById('HRS_ID').value.toString()+'_'+document.getElementById('firstname').value.toString().'_'.document.getElementById('lastname').value.toString();

                                                                    jQuery.ajax({
                                                                        url: '<?php echo base_url(); ?>index.php/<?php echo $this->router->class; ?>/searchMember/' + e,
                                                                        async: false,
                                                                        success: function (data) {
                                                                            //var arrData = new Array();
                                                                            //arrData = data.split(',');
                                                                            document.getElementById("showMember").innerHTML = data;
                                                                        },
                                                                        error: function (xhr, desc, exceptionobj) {
                                                                            alert("ERROR:" + xhr.responseText);
                                                                        }
                                                                    });
                                                                }
                                                                function showdata(MEMBER_ID, FIRST_NAME, LAST_NAME, HOME_TEL) {
                                                                    //alert(MEMBER_NAME);MEMBER_PHONE
                                                                    document.getElementById('MEMBER_ID').value = MEMBER_ID;
                                                                    document.getElementById('MEMBER_NAME').innerHTML = FIRST_NAME + ' ' + LAST_NAME;
                                                                    document.getElementById('MEMBER_PHONE').innerHTML = HOME_TEL
                                                                }

                                                                function fncSubmit() {
                                                                    if (document.form1.MEMBER_ID.value == '')
                                                                    {
                                                                        alert('กรุณาเลือก ชื่อ-นามสกุล');
                                                                        return false;
                                                                    }
                                                                }
</script>


