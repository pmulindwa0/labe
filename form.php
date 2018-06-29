
<?php 

include '/templates/header.php';
require_once 'core/init.php';

$user = new User();

if (Input::exists()) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'region' => array(
            'required' => true
        ),
        'subcounty' => array(
            'required' => true
        ),
        'village' => array(
            'required' => true
        ),
        'name_pe' => array(
            'required' => true
        ),
        'contact_pe' => array(
            'required' => true
        ),
        'parish' => array(
            'required' => true
        ),
        'name_hlc' => array(
            'required' => true
        )
    ));

    if ($validation->passed()) {
        //register form
        $form = DB::getInstance();
        $insert = $form->insert('hlc_form', array(
            'region' => Input::get('region'),
            'subcounty' => Input::get('subcounty'),
            'village' => Input::get('village'),
            'name_pe' => Input::get('name_pe'),
            'contact_pe' => Input::get('contact_pe'),
            'date_of_assessment' => date('Y-m-d', strtotime(Input::get('date_of_assessment'))),
            'district' => Input::get('district'),
            'name_hlc' => Input::get('name_hlc'),
            'parish' => Input::get('parish'),
            'name_assessor' => Input::get('name_assessor'),
            'contact_assessor' => Input::get('contact_assessor'),
            'period' => Input::get('period'),
            'ecd' => Input::get('ecd'),
            'parenting' => Input::get('parenting'),
            'adult_literacy' => Input::get('adult_literacy'),
            'vsla' => Input::get('vsla'),
            'hlc_granaries' => Input::get('hlc_granaries'),
            'swings' => Input::get('swings'),
            'slide' => Input::get('slide'),
            'bike_model' => Input::get('bike_model'),
            'balancing_log' => Input::get('balancing_log'),
            'skipping_rope' => Input::get('skipping_rope'),
            'balls' => Input::get('balls'),
            'extras' => Input::get('extras'),
            'active_pe' => Input::get('active_pe'),
            'active_hlcmc' => Input::get('active_hlcmc'),
            'parents' => Input::get('parents'),
            'community_willingness' => Input::get('community_willingness'),
            'community_support' => Input::get('community_support'),
            'schools_administration' => Input::get('schools&administration'),
            'clean_safe' => Input::get('clean&safe'),
            'latrine_facilities' => Input::get('latrine_facilities'),
            'shelter' => Input::get('shelter'),
            'complementary_framework' => Input::get('complementary_framework'),
            'ecd_guide' => Input::get('ecd_guide'),
            'sound_wheel' => Input::get('sound_wheel'),
            'picture_books' => Input::get('picture_books'),
            'parenting_charts' => Input::get('parenting_charts'),
            'up_to_date_registers' => Input::get('up-to-date_registers'),
            'enrolment_register' => Input::get('enrolment_register'),
            'attendance_register' => Input::get('attendance_register'),
            'visitors_books' => Input::get('visitors_books'),
            'minute_books' => Input::get('minute_books'),
            'action_plan' => Input::get('action_plan'),
            'technical_support_book' => Input::get('technical_support_book'),
            'info_file' => Input::get('info_file'),
             'submitted_by' => $user->data()->id
        ));
        if ($insert) {
            Session::flash('home', 'You have successful registered.');
            Redirect::to('home.php');
            
        }else {
            print_r($form->error());
        }
       
    

    } else {
        // output errors
        print_r($validation->errors());

    }
}

?>

<body>

    <div id="wrapper">

    <?php 
        include '/templates/nav.php';
    ?>

        
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>HLC Status Assessment Form</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a>HLC Forms</a>
                </li>
                <li class="active">
                    <strong>Entry Form</strong>
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
        <h5>Note: <small>Complete the form before submiting.</small></h5>
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
        <form method="post" class="form-horizontal" action="">
            <div class="row">
            <div class="col-sm-1">
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Region *</label>
                            <select class="select3 form-control" id="select3" name="region">
                                <option></option>
                                <option value="West Nile">West Nile</option>
                                <option value="Northan Uganda">Northan Uganda</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Subcounty *</label>
                            <input name="subcounty" type="text" class="form-control required input-sm">
                        </div>
                        <div class="form-group">
                            <label>Village *</label>
                            <input id="village" name="village" type="text" class="form-control required input-sm">
                        </div>
                        <div class="form-group">
                            <label>Name of the PE *</label>
                            <input name="name_pe" type="text" class="form-control required input-sm">
                        </div>
                        <div class="form-group">
                            <label>Contact of the PE *</label>
                            <input name="contact_pe" type="text" class="form-control required input-sm" data-mask="(999) 999-9999">
                        </div>
                        <div class="form-group" id="data_1">
                            <label class="font-normal">Date of Assessment *</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date_of_assessment" class="form-control input-sm" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>District *</label>
                            <select class="select4 form-control" name="district">
                                <option></option>
                                <option value="Koboko">Koboko</option>
                                <option value="Moyo">Moyo</option>
                                <option value="Gulu">Gulu</option>
                                <option value="Nwoya">Nwoya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Parish *</label>
                            <input name="parish" type="text" class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label>Name of HLC *</label>
                            <input name="name_hlc" type="text" class="form-control required input-sm">
                        </div>
                        <div class="form-group">
                            <label>Name of Assessor *</label>
                            <input name="name_assessor" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Contact of Assessor *</label>
                            <input  name="contact_assessor" type="text" class="form-control required input-sm" data-mask="(999) 999-9999" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Period *</label>
                            <select class="select5 form-control" name="period">
                                <option></option>
                                <option value="2017 Qtr1">2017 Qtr1</option>
                                <option value="2017 Qtr2">2017 Qtr2</option>
                                <option value="2017 Qtr3">2017 Qtr3</option>
                                <option value="2017 Qtr4">2017 Qtr4</option>

                                <option value="2018 Qtr1">2018 Qtr1</option>
                                <option value="2018 Qtr2">2018 Qtr2</option>
                                <option value="2018 Qtr3">2018 Qtr3</option>
                                <option value="2018 Qtr4">2018 Qtr4</option>

                                <option value="2019 Qtr1">2019 Qtr1</option>
                                <option value="2019 Qtr2">2019 Qtr2</option>
                                <option value="2019 Qtr3">2019 Qtr3</option>
                                <option value="2019 Qtr4">2019 Qtr4</option>

                                <option value="2020 Qtr1">2020 Qtr1</option>
                                <option value="2020 Qtr2">2020 Qtr2</option>
                                <option value="2020 Qtr3">2020 Qtr3</option>
                                <option value="2020 Qtr4">2020 Qtr4</option>
                            </select>
                        </div>
                    </div>
                </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">INTERVENTIONS</label>

                <div class="col-sm-10">
                    <div class="row m-b">
                        <div class="col-md-4">
                            <label class="help-block m-b-none"><small>ECD:</small></label>
                            <input type="number" min="0" max="10" name="ecd" class="form-control input-sm">
                        </div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Parenting:</small></label>
                        <input type="number" min="0" max="10" name="parenting" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Adult Literacy:</small></label>
                        <input type="number" min="0" max="10" name="adult_literacy" class="form-control input-sm"></div>
                    </div>
                    <div class="row m-b">
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>VSLA:</small></label>
                        <input type="number" min="0" max="10" name="vsla" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>HLC Granaries:</small></label>
                        <input type="number" min="0" max="10" name="hlc_granaries" class="form-control input-sm"></div>
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">OUTDOOR PLAY MATERIALS</label>

                <div class="col-sm-10">
                    <div class="row m-b">
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>2X2 Swings:</small></label>
                        <input type="number" min="0" max="10" name="swings" class="form-control input-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="help-block m-b-none"><small>Slide/Climber:</small></label>
                            <input type="number" min="0" max="10" name="slide" class="form-control input-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="help-block m-b-none"><small>Bike Model:</small></label>
                            <input type="number" min="0" max="10" name="bike_model" class="form-control input-sm">
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-md-4">
                            <label class="help-block m-b-none"><small>Balancing Log:</small></label>
                            <input type="number" min="0" max="10" name="balancing_log" class="form-control input-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="help-block m-b-none"><small>Skipping Rope:</small></label>
                            <input type="number" min="0" max="10" name="skipping_rope" class="form-control input-sm"> 
                        </div>
                        <div class="col-md-4">
                            <label class="help-block m-b-none"><small>Balls:</small></label>
                            <input type="number" min="0" max="10" name="balls" class="form-control input-sm">
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-md-4">
                            <label class="help-block m-b-none"><small>Extras:</small></label>
                            <input type="number" min="0" max="10" name="extras" placeholder="Extras" class="form-control input-sm">
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">PERSONEL / BENEFICIARIES</label>

                <div class="col-sm-10">
                    <div class="row m-b">
                        <div class="col-md-4">
                            <label class="help-block m-b-none"><small>Active PE:</small></label>
                            <input type="number" min="0" max="10" name="active_pe"class="form-control input-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="help-block m-b-none"><small>Active HLCMC:</small></label>
                            <input type="number" min="0" max="10" name="active_hlcmc" class="form-control input-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="help-block m-b-none"><small>Parents:</small></label>
                            <input type="number" min="0" max="10" name="parents" class="form-control">
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-md-4">
                            <label class="help-block m-b-none"><small>Community Willingness:</small></label>
                            <input type="number" min="0" max="10" name="community_willingness" class="form-control input-sm">
                        </div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Community Support:</small></label>
                        <input type="number" min="0" max="10" name="community_support" class="form-control input-sm">
                        </div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Schools & Administration:</small></label>
                        <input type="number" min="0" max="10" name="schools&administration" class="form-control input-sm"></div>
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">HCL ENVIRONMENT</label>

                <div class="col-sm-10">
                    <div class="row m-b">
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Clean & Safe:</small></label>
                        <input type="number" min="0" max="10" name="clean&safe" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Latrine & Handwashing Facilities:</small></label>
                        <input type="number" min="0" max="10" name="latrine_facilities" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Shelter:</small></label>
                        <input type="number" min="0" max="10" name="shelter" class="form-control input-sm"></div>
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">INSTRUCTIONAL MATERIAL</label>

                <div class="col-sm-10">
                    <div class="row m-b">
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Complementary Framework:</small></label>
                        <input type="number" min="0" max="10" name="complementary_framework" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>ECD Guide:</small></label>
                        <input type="number" min="0" max="10" name="ecd_guide" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Sound Wheel:</small></label>
                        <input type="number" min="0" max="10" name="sound_wheel" class="form-control input-sm"></div>
                    </div>
                    <div class="row m-b">
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Picture Books:</small></label>
                        <input type="number" min="0" max="10" name="picture_books" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Parenting Charts:</small></label>
                        <input type="number" min="0" max="10" name="parenting_charts" class="form-control input-sm"></div>
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">RECORDS</label>

                <div class="col-sm-10">
                    <div class="row m-b">
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Up-to-date registers:</small></label>
                        <input type="number" min="0" max="10" name="up-to-date_registers" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Enrolment Register:</small></label>
                        <input type="number" min="0" max="10" name="enrolment_register" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Attendence Register:</small></label>
                        <input type="number" min="0" max="10" name="attendance_register" class="form-control input-sm"></div>
                    </div>
                    <div class="row m-b">
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Visitor's Books:</small></label>
                        <input type="number" min="0" max="10" name="visitors_books" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Minute Books:</small></label>
                        <input type="number" min="0" max="10" name="minute_books" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Action Plan:</small></label>
                        <input type="number" min="0" max="10" name="action_plan" class="form-control input-sminput-sm"></div>
                    </div>
                    <div class="row m-b">
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>PO Technical Support Book:</small></label>
                        <input type="number" min="0" max="10" name="technical_support_book" class="form-control input-sm"></div>
                        <div class="col-md-4">
                        <label class="help-block m-b-none"><small>Information File:</small></label>
                        <input type="number" min="0" max="10" name="info_file" class="form-control input-sm"></div>
                    </div>
                </div>
            </div>
            
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </div>
        </form>
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

             $(".select3").select2({
                placeholder: "Select Region",
                allowClear: true
             });

            $(".select4").select2({
                placeholder: "Select District",
                allowClear: true
            });
            $(".select5").select2({
                placeholder: "Select Period",
                allowClear: true
            });
        </script>
</body>

</html>

