<?php
print_r($users);
echo  nl2br ("\n");

echo $users[0]->id;
foreach($users as $value){
    echo $value->id;
  }
?>