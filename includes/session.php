<?php
    date_default_timezone_set('Asia/Jerusalem');
    if(isset($_SESSION[history][$page_slug])){
        $_SESSION[history][$page_slug]['times_visit']+=1;
        $_SESSION[history][$page_slug]['time_lest_request']= date('d/m/Y - H:i:s');
    }else{
        $_SESSION[history][$page_slug]=['url' => $page_slug,'times_visit' => 1, 'time_lest_request' =>  date('d/m/Y - H:i:s')];
       
    }
?>