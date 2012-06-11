<?php
$temp2 = $_GET['time'];
$currentCounter = $_GET['id'];
?>

GetCount(<?php echo "new Date(".date("Y",$temp2).","
                              .date("m",$temp2).","
                              .date("d",$temp2).","
                              .date("H",$temp2).","
                              .date("i",$temp2).","
                              .date("s",$temp2).",0),'timer_'$currentCounter'"; ?>);
