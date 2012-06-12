<?php
$mode=$_GET['mode']; 
$tags = $_GET['tag'];

switch($mode) {
  case 'first':
    $str = "ORDER BY id DESC LIMIT 10";
    break;
  case 'second':
    $str = "AND events.id < '$last_msg_id' ORDER BY events.id DESC LIMIT 5";
    break;
  case 'new':
    $str = "AND events.id > '$last_msg_id' ORDER BY events.id DESC LIMIT 5";
    break;
}

$sql = mysql_query("SELECT events.id, events.name, events.location FROM events, tags, tagLookup
                    WHERE tags.tag=$tags AND events.id=tagLookup.eventID AND 
                    tagLookup.tagID = tags.id ".$str);
$_GET['sql'] = $sql;
?>