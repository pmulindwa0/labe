<?php
    include '/templates/header.php';
?>
<body>

    <div id="wrapper">

    <?php 
        include '/templates/nav.php';
    ?>

        
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Extract Data to Excel</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a>HLC Forms</a>
                </li>
                <li class="active">
                    <strong>Extract Data</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Extract Basing on Assessment Date</h5>
            </div>
            <div class="ibox-content">
                <form role="form" class="form-inline" method="post" action="excel.php">
                    <div class="form-group" id="data_1">
                        <label class="sr-only">From:</label>
                        <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date_of_assessment" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                    </div>
                    <div class="form-group" id="data_2">
                        <label class="sr-only">To:</label>
                        <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date_of_assessment" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                    </div>
                    <button class="btn btn-white" type="submit">Export</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Export <small>the All database to excel</small></h5>
            </div>
            <div class="ibox-content">
                <div class="text-center">
                <a class="btn btn-primary" href="excel.php">Export Database</a>
            </div>
        </div>
    </div>
</div>
</div>

</div>
        <?php include "/templates/footer.php" ?>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- Data picker -->
   <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>
    <!-- Input Mask-->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

             $('#data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        </script>
</body>

</html>

