<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    $q = $_GET['q'];
    $id = $_GET['id'];
    include'../Models/DisplayAll.php';
    include'../Models/Session_Mark.php';
    $Disp = new DisplayAll();
    $session_mark = new beingOnline();
    $session_mark->set_session();
    $SeID = $session_mark->getSeID();
    $ID = $Disp->sqlQuote($id);
    $Rank = $Disp->sqlQuote($q);
    $session_mark->UpdateSession($Rank,$ID,$SeID);
    $session_mark->insertMark($Rank,$ID);
    $session_mark->UpdateMarkProd($ID);
    for($i=0;$i<$Rank;$i++){
?>
   <img src="Image/Star.png"  width="25"/>
<?php
    }
       
?>