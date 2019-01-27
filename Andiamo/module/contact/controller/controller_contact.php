<?php

    switch($_GET['op']){
        case 'view':
            include("module/contact/view/contact.php");
        break;

        default;
            include("view/inc/error404.php");
        break;
    }
