<?php 
require_once 'core/init.php';

$user = new User();

if (Input::exists()) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'children_male' => array(
            'required' => true
        ),
        'adult_literacy_male' => array(
            'required' => true
        ),
        'parenting_male' => array(
            'required' => true
        ),
        'vslas_male' => array(
            'required' => true
        ),
        'children_female' => array(
            'required' => true
        ),
        'adult_literacy_female' => array(
            'required' => true
        ),
        'parenting_female' => array(
            'required' => true
        )
    ));

    if ($validation->passed()) {
        //register form
        $form = DB::getInstance();
        $insert = $form->insert('enrolment_form', array(
            'children_male' => Input::get('children_male'),
            'adult_literacy_male' => Input::get('adult_literacy_male'),
            'parenting_male' => Input::get('parenting_male'),
            'vslas_male' => Input::get('vslas_male'),
            'children_female' => Input::get('children_female'),
            'submitted_on' => date('Y-m-d'),
            'adult_literacy_female' => Input::get('adult_literacy_female'),
            'parenting_female' => Input::get('parenting_female'),
            'vslas_female' => Input::get('vslas_female'),
            'hlc_name' => Input::get('hlc_name'),
             'submitted_by' => $user->data()->id
        ));
        if ($insert) {
            Session::flash('home', 'You have successful registered.');
            Redirect::to('form.php');
            
        }else {
            print_r($form->error());
        }
       
    

    } else {
        // output errors
        print_r($validation->errors());

    }
}
