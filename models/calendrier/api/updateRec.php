<?php
include("../config.php");


if (isset($_POST['ID_Recurrence'])) {

    //collect data
    $error      = null;
    $id         = $_POST['id'];


    //optional fields
    $title      = isset($_POST['title']) ? $_POST['title'] : '';
    $color      = isset($_POST['color']) ? $_POST['color'] : '';
    $text_color = isset($_POST['text_color']) ? $_POST['text_color'] : '';
    $ID_Recurrence = isset($_POST['ID_Recurrence']) ? $_POST['ID_Recurrence'] : '';


    //if there are no errors, carry on
    if (!isset($error)) {

        $data['success'] = true;
        $data['message'] = 'Success!';

        //check for additional fields, and add to $update array if they exist
        if ($title != '') {
            $update['title'] = $title;
        }

        if ($color != '') {
            $update['color'] = $color;
        }

        if ($text_color != '') {
            $update['text_color'] = $text_color;
        }


        //set the where condition ie where id = 2
        $where = ['ID_Recurrence' => $_POST['ID_Recurrence']];

        //update database
        $db->update('events', $update, $where);
    } else {

        $data['success'] = false;
        $data['errors'] = $error;
    }

    echo json_encode($data);
}
