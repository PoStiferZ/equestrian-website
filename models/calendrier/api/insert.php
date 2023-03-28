<?php
include("../config.php");

if (isset($_POST['title'])) {
    //collect data
    $error      = null;
    $title      = $_POST['title'];
    $start      = $_POST['startDate'];
    $end        = $_POST['endDate'];
    $color      = $_POST['color'];
    $text_color = $_POST['text_color'];
    $nb_Recurrence = $_POST['selectedRecurrence'];

    //validation
    if ($title == '') {
        $error['title'] = 'Title is required';
    }

    if ($start == '') {
        $error['start'] = 'Start date is required';
    }

    if ($end == '') {
        $error['end'] = 'End date is required';
    }

    //if there are no errors, carry on
    if (!isset($error)) {

        /* Convertir en date en lettre */
        $day = date('l', strtotime($start));

        //format date
        $start = date('Y-m-d H:i:s', strtotime($start));
        $end = date('Y-m-d H:i:s', strtotime($end));

        $data['success'] = true;
        $data['message'] = 'Success!';

        $i = 0;
        while ($i <= $nb_Recurrence * 4) {
            if ($i == 0) {
                //store
                $insert = [
                    'title'       => $title,
                    'start_event' => $start,
                    'end_event'   => $end,
                    'color'       => $color,
                    'text_color'  => $text_color
                ];
                $db->insert('events', $insert);
                $start = date('Y-m-d H:i:s', strtotime($start . ' + 7 days'));
                $end = date('Y-m-d H:i:s', strtotime($end . ' + 7 days'));

                $idRec = $db->run("SELECT LAST_INSERT_ID() AS 'idRec'")->fetch();
                $ID_Recurrence = $idRec['idRec'];


                $update['ID_Recurrence'] = $ID_Recurrence;
                //set the where condition ie where id = 2
                $where = ['id' => $ID_Recurrence];
                //update database
                $db->update('events', $update, $where);
            } else {
                //store
                $insert = [
                    'title'       => $title,
                    'start_event' => $start,
                    'end_event'   => $end,
                    'color'       => $color,
                    'text_color'  => $text_color,
                    'ID_Recurrence' => $ID_Recurrence
                ];
                $db->insert('events', $insert);
                $start = date('Y-m-d H:i:s', strtotime($start . ' + 7 days'));
                $end = date('Y-m-d H:i:s', strtotime($end . ' + 7 days'));
            }
            $i++;
        }
    } else {

        $data['success'] = false;
        $data['errors'] = $error;
    }

    echo json_encode($data);
}
