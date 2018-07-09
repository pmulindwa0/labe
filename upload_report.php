<?php 
require_once 'core/init.php';

$user = new User();

if (Input::exists()) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'name' => array(
            'required' => true
        )
    ));

    if ($validation->passed()) {

        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];

            /*file property*/
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];
            $file_error = $file['error'];

            /*file extension*/
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));
            $allowed = array('pdf','doc','docx');

            if (in_array($file_ext, $allowed)) {
                if ($file_error === 0) {
                    if ($file_size <= 20971520) {
                        $file_name_new = uniqid('', true) . '.' . $file_ext;
                        $file_destination = "reports/" . $file_name_new;

                        if (move_uploaded_file($file_tmp, $file_destination)) {

                            $type = Input::get('name');
                            $date = date('Y-m-d');
                            $uid = $user->data()->id;

                            $report = DB::getInstance();
                            $insert = $report->insert('reports', array(
                                'name' => Input::get('name'),
                                'uploaded_by' => $uid,
                                'upload_date' => $date,
                                'report' =>  $file_name_new
                                )
                            );

                            if ($insert) {
                                Session::flash('info', 'Report uploaded successfully');
                            } else {
                                Session::flash('info', 'Oops!, Unable to upload report');
                            }
                        }
                    } else {
                        Session::flash('info', 'The upload file should not exceed 5Mbs');
                    }
                }
            } else {
                Session::flash('info', 'The upload file should be a pdf, a doc or a docx format');
            }
        } else {
            Session::flash('info', 'Select file to be uploaded');
        }

    } else {
        // output errors
        Session::flash('info', $validation->errors()[0]);

    }
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LABE UGANDA | REPORT PORTAL</title>
    <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/codemirror/codemirror.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
    <?php 
        include '/templates/nav.php';
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
                    <a>Reports</a>
                </li>
                <li class="active">
                    <strong>File upload</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
<div class="wrapper wrapper-content animated fadeIn">
    
    
    <div class="row">
    
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Upload Report</h5>
                </div>
                <div class="ibox-content">
                <form role="form" class="form-inline" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="report_type" class="sr-only">Report Name:</label>
                        <input type="text" placeholder="Report Name" id="report_type"
                                class="form-control input-sm" name="name">
                    </div>
                    <div class="form-group"> </div>
                    <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span>
                            <span class="fileinput-exists">Change</span><input type="file" name="file"/></span>
                            <span class="fileinput-filename"></span>
                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                        </div> 
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Uploaded Reports</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <table class="table">
                    <thead>
                    <tr>
                        <th>File Name</th>
                        <th>Upload Date</th>
                        <th>Uploaded By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $ureports = DB::getInstance()->query("SELECT * FROM reports ORDER BY upload_date DESC");

                        foreach ($ureports->results() as $data) {
                    ?>
                    <tr>
                        <td><?php echo $data->name; ?></td>
                        
                        <td><?php echo date('Y M jS', strtotime($data->upload_date)); ?></td>
                        <td><?php echo $data->uploaded_by; ?></td>
                        <td><a href="#"><i class="fa fa-trash text-navy"></i></a></td>
                    </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>
    </div>
    <?php 
        include '/templates/footer.php';
    ?>

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

    <!-- Jasny -->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>

    <!-- CodeMirror -->
    <script src="js/plugins/codemirror/codemirror.js"></script>
    <script src="js/plugins/codemirror/mode/xml/xml.js"></script>


    <script>
        Dropzone.options.dropzoneForm = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 20, // MB
            dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> <small>(The file should not exceed 2Mbs.) </small>"
        };

        function submitForm() {
            document.getElementById("dropzoneForm").submit();
        }
    </script>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>

</html>

