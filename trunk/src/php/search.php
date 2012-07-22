<?php
$term = $_POST['term'];
if(strcmp(substr($term,0,1), "#")==0)
  $term = substr($term,1);
  
header("Location: ../../index.php?tag='".$term."'");
?>