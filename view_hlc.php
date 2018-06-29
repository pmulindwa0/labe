<?php 
 include_once '/templates/header.php';
?>

<body>

<div id="wrapper">
<?php
    include_once '/templates/nav.php';
?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
        <h2>
        </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a>HLC Forms</a>
                </li>
                <li class="active">
                    <strong>View Data</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>HLC Status Assessment Data</h5>
                </div>
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                        <tr>

                            <th data-toggle="true">Name of HLC</th>
                            <th>Region</th>
                            <th>Subcounty</th>
                            <th>Village</th>
                            <th>Name of PE</th>
                            <th>District</th>
                            <th>Parish</th>
                            <th>Name of Assessor</th>
                            <th data-hide="all">ECD</th>
                            <th data-hide="all">Parenting</th>
                            <th data-hide="all">Adult Literacy</th>
                            <th data-hide="all">VSLA</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            $hform = DB::getInstance()->query("SELECT * FROM hlc_form ORDER BY date_of_assessment DESC");

                            foreach ($hform->results() as $data) {
                        ?>
                        <tr>
                            <td><?php echo $data->name_hlc; ?></td>
                            <td><?php echo $data->region; ?></td>
                            <td><?php echo $data->subcounty; ?></td>
                            <td><?php echo $data->village; ?></td>
                            <td><?php echo $data->name_pe; ?></td>
                            <td><?php echo $data->district; ?></span></td>
                            <td><?php echo $data->parish; ?></td>
                            <td><?php echo $data->name_assessor; ?></td>
                            <td><?php echo $data->ecd; ?></td>
                            <td><?php echo $data->parenting; ?></td>
                            <td><?php echo $data->adult_literacy; ?></td>
                            <td><?php echo $data->vsla; ?></td>
                            <td><a href="#"><i class="fa fa-trash text-navy"></i></a></td>
                        </tr>
                        <?php
                         }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                <ul class="pagination pull-right"></ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once '/templates/footer.php';
?>

</div>
</div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

</body>

</html>

