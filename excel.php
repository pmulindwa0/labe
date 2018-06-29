<?php

require_once 'core/init.php';
// $account = new User();

/****************************************************************/
// if (Input::exists()) {
//     $d_from = strtotime(Input::get('from'));
//     $from = date("Y-m-d h:i:sa", $d_from);
//     $d_to = strtotime(Input::get('to'));
//     $to = date("Y-m-d h:i:sa", $d_to);
    $result = DB::getInstance()->query("SELECT * FROM hlc_form");
    // $result = DB::getInstance()->query("SELECT * FROM hlc_form WHERE date_of_assessment BETWEEN '$from' AND '$to'");

    $filename = "Report_". uniqid();

    $file_ending = "xls";
//header info for browser
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=$filename.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    /*******Start of Formatting for Excel *******/
//define separator (defines columns in excel & tabs in word)
    $sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields 


    print("Region") . "\t";
    print("Subcounty") . "\t";
    print("Village") . "\t";
    print("Name of the PE") . "\t";
    print("Contact of the PE") . "\t";
    print("Date of Assessment") . "\t";
    print("District") . "\t";
    print("Parish") . "\t";
    print("Name of HLC") . "\t";
    print("Name of Assessor") . "\t";
    print("Contact of Assessor") . "\t";
    print("Period") . "\t";
    print("ECD") . "\t";
    print("Parenting") . "\t";
    print("Adult Literacy") . "\t";
    print("VSLA") . "\t";
    print("HLC Granaries") . "\t";
    print("2X2 Swings") . "\t";
    print("Slide/Climber") . "\t";
    print("Bike Model") . "\t";
    print("Balancing Log") . "\t";
    print("Skipping Rope") . "\t";
    print("Balls") . "\t";
    print("Extras") . "\t";
    print("Active PE") . "\t";
    print("Active HLCMC") . "\t";
    print("Parents") . "\t";
    print("Community Willingness") . "\t";
    print("Community Support") . "\t";
    print("Schools & Administration") . "\t";
    print("Clean & Safe") . "\t";
    print("Latrine & Handwashing facilities") . "\t";
    print("Shelter") . "\t";
    print("Complementary Framework") . "\t";
    print("ECD Guide") . "\t";
    print("Sound Wheel") . "\t";
    print("Picture Books") . "\t";
    print("Parenting Charts") . "\t";
    print("Up-to-date registers") . "\t";
    print("Enrolment Register") . "\t";
    print("Attendance Register") . "\t";
    print("Visitor's Books") . "\t";
    print("Minute Books") . "\t";
    print("Action Plan") . "\t";
    print("PO Technical Support Book") . "\t";
    print("Information File") . "\t";

    print("\n");
//end of printing column names  
//start while loop to get data
    foreach ($result->results() as $result) {
        $schema_insert = "";
        
        $schema_insert .= "$result->region" . $sep;
        $schema_insert .= "$result->subcounty" . $sep;
        $schema_insert .= "$result->village" . $sep;
        $schema_insert .= "$result->name_pe" . $sep;
        $schema_insert .= "$result->contact_pe" . $sep;
        $schema_insert .= "$result->date_of_assessment" . $sep;
        $schema_insert .= "$result->district" . $sep;
        $schema_insert .= "$result->parish" . $sep;
        $schema_insert .= "$result->name_hlc" . $sep;
        $schema_insert .= "$result->name_assessor" . $sep;
        $schema_insert .= "$result->contact_assessor" . $sep;
        $schema_insert .= "$result->period" . $sep;
        $schema_insert .= "$result->ecd" . $sep;
        $schema_insert .= "$result->parenting" . $sep;
        $schema_insert .= "$result->adult_literacy" . $sep;
        $schema_insert .= "$result->vsla" . $sep;
        $schema_insert .= "$result->hlc_granaries" . $sep;
        $schema_insert .= "$result->swings" . $sep;
        $schema_insert .= "$result->slide" . $sep;
        $schema_insert .= "$result->bike_model" . $sep;
        $schema_insert .= "$result->balancing_log" . $sep;
        $schema_insert .= "$result->skipping_rope" . $sep;
        $schema_insert .= "$result->balls" . $sep;
        $schema_insert .= "$result->extras" . $sep;
        $schema_insert .= "$result->active_pe" . $sep;
        $schema_insert .= "$result->active_hlcmc" . $sep;
        $schema_insert .= "$result->parents" . $sep;
        $schema_insert .= "$result->community_willingness" . $sep;
        $schema_insert .= "$result->community_support" . $sep;
        $schema_insert .= "$result->schools_administration" . $sep;
        $schema_insert .= "$result->clean_safe" . $sep;
        $schema_insert .= "$result->latrine_facilities" . $sep;
        $schema_insert .= "$result->shelter" . $sep;
        $schema_insert .= "$result->complementary_framework" . $sep;
        $schema_insert .= "$result->ecd_guide" . $sep;
        $schema_insert .= "$result->sound_wheel" . $sep;
        $schema_insert .= "$result->picture_books" . $sep;
        $schema_insert .= "$result->parenting_charts" . $sep;
        $schema_insert .= "$result->up_to_date_registers" . $sep;
        $schema_insert .= "$result->enrolment_register" . $sep;
        $schema_insert .= "$result->attendance_register" . $sep;
        $schema_insert .= "$result->visitors_books" . $sep;
        $schema_insert .= "$result->minute_books" . $sep;
        $schema_insert .= "$result->action_plan" . $sep;
        $schema_insert .= "$result->technical_support_book" . $sep;
        $schema_insert .= "$result->info_file" . $sep;

        $schema_insert = str_replace($sep . "$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
      

    }
// }

/****************************************************************/   
