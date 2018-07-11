<?php 
require_once '/core/init.php';
 include_once '/templates/header.php';

$avg_children_male = 0;
$avg_adult_literacy_male = 0;
$avg_parenting_male = 0;
$avg_vslas_male = 0;
$avg_children_female = 0;
$avg_adult_literacy_female = 0;
$avg_parenting_female = 0;
$avg_vslas_female = 0;
  
 $numbers = DB::getInstance()->query("SELECT COUNT(hlc_name) AS count, AVG(children_male) AS children_male, AVG(adult_literacy_male) AS adult_literacy_male,
        AVG(parenting_male) AS parenting_male, AVG(vslas_male) AS vslas_male, AVG(children_female) AS children_female, AVG(adult_literacy_female) AS adult_literacy_female,
        AVG(parenting_female) AS parenting_female, AVG(vslas_female) AS vslas_female, MAX(submitted_on) AS last_update FROM enrolment_form"); 
        
        $avg_children_male = $numbers->first()->children_male;
        $avg_adult_literacy_male = $numbers->first()->adult_literacy_male;
        $avg_parenting_male = $numbers->first()->parenting_male;
        $avg_vslas_male = $numbers->first()->vslas_male;
        $avg_children_female = $numbers->first()->children_female;
        $avg_adult_literacy_female = $numbers->first()->adult_literacy_female;
        $avg_parenting_female = $numbers->first()->parenting_female;
        $avg_vslas_female = $numbers->first()->vslas_female;
        $updated = $numbers->first()->last_update;
        $count = $numbers->first()->count;
?>

<body class="fixed-navigation">
    <div id="wrapper">
    <?php 
        include_once '/templates/nav.php'
    ?>

            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                    <div>
                                        <h1 class="m-b-xs"><?php echo $count; ?></h1>
                                        <h3 class="font-bold no-margins">
                                            Home Learning Center(s)
                                        </h3>
                                        <small>Enrolled.</small>
                                    </div>

                                <div>
                                    <canvas id="lineChart" height="70"></canvas>
                                </div>

                                <div class="m-t-md">
                                    <small class="pull-right">
                                        <i class="fa fa-clock-o"> </i>
                                        Update on <?php echo date('jS-M-Y', strtotime($updated));?>
                                    </small>
                                   <small>
                                       <strong>Analysis of Enrolments:</strong> The averages for interventions at different HLC.
                                   </small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                    $enrolment = DB::getInstance()->query("SELECT * FROM enrolment_form ORDER BY submitted_on DESC");
                    foreach ($enrolment->results() as $data) {
                ?>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $data->hlc_name; ?></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <table class="table table-bordered">
                                <tr><th rowspan="2">Enrolment<th colspan="2">Gender
                                    <th rowspan="2">Total
                                <tr><th>Male<th>Female
                                <tr><th>Pre-school children<td><?php echo $data->children_male; ?><td><?php echo $data->children_female; ?><td><?php echo ($data->children_male + $data->children_female); ?>
                                <tr><th>Adult Literacy<td><?php echo $data->adult_literacy_male; ?><td><?php echo $data->adult_literacy_female; ?><td><?php echo ($data->adult_literacy_male + $data->adult_literacy_female); ?>
                                <tr><th>Parenting<td><?php echo $data->parenting_male; ?><td><?php echo $data->parenting_female; ?><td><?php echo ($data->parenting_male + $data->parenting_female); ?>
                                <tr><th>VSLAs<td><?php echo $data->vslas_male; ?><td><?php echo $data->vslas_female; ?><td><?php echo ($data->vslas_male + $data->vslas_female); ?>
                                <caption align="bottom"><em><small>
                                    Enrolment numbers for the interventions at <?php echo $data->hlc_name; ?> as of  <?php echo date('jS-M-Y', strtotime($data->submitted_on));?>
                                </small></em></caption>
                            </table>

                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>

            </div>
            <?php include "/templates/footer.php" ?>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/curvedLines.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <script>
        $(document).ready(function() {
            <?php
               
            ?>

            var lineData = {
                labels: ["Pre-School Children", "Adult Literacy", "Parenting", "VSLAs"],
                datasets: [
                    {
                        label: "Male",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [<?php echo $avg_children_male ?>, <?php echo $avg_adult_literacy_male ?>, <?php echo $avg_parenting_male ?>, <?php echo $avg_vslas_male ?>]
                    },
                    {
                        label: "Female",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [<?php echo $avg_children_female ?>, <?php echo $avg_adult_literacy_female ?>, <?php echo $avg_parenting_female ?>, <?php echo $avg_vslas_female ?>]
                    }
                ]
            };

            var lineOptions = {
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

        });
    </script>
</body>
</html>

