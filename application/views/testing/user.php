<?php
print_r($json);
echo $json;
echo  nl2br ("\n");
$object = json_decode($json);
echo $object->id;
echo  nl2br ("\n");
$array = json_decode($json, true);
echo $array['id'];
echo  nl2br ("\n");
?>