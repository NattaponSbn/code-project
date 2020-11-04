<?php
    session_start();
    // unset($_SESSION['usernameguest']);
    // header( "refresh: 0; url=/homeBD" );
    // session_destroy();
    // $_SESSION['logout'];
    // exit(0);

    isset($_SESSION['usernameguest']);
    session_destroy();
    header( "refresh: 0; url=homeBD?logout=success" );
    exit(0);
    
    
?>