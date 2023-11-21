<?php

include 'view/header.php';

if (isset($_GET['act']) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {

        case 'adddm':
            
            include 'QLDM/add.php';
            break;
        case 'listdm':

            include 'QLDM/list.php';
            break;
        case 'addsp':

            include 'QLSP/add.php';
            break;
        case 'listsp':

            include 'QLSP/list.php';
            break;
    }
}

include 'view/footer.php';
