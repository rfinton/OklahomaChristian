<?php
  $base = fopen ("base.csv", "r");
  $target = fopen ("target.csv", "r");
  $output = fopen ("output.csv", "w");
  $uid = [];
  $pid = [];

  while ($data = fgetcsv ($base, 1000, ",")) {
    $uid [$data [6]] = $data;
  }

  var_dump ($uid);

  while ($data = fgetcsv ($target, 1000, ",")) {
    $pid [($data [0] . "-" . $data [1])] = $data;
  }

  foreach ($pid as $key => $value) {
    
    $i = array_key_exists ($key, $uid);
    
    if ($i === true) {
      foreach ($uid [$key] as $d) {
        fwrite ($output, "\"" . $d . "\",");
      }

      fwrite ($output, "\"" . $pid [$key][2] . "\",");
      fwrite ($output, "\"" . $pid [$key][3] . "\",");
      fwrite ($output, "\"" . $pid [$key][4] . "\",");
      fwrite ($output, "\"" . $pid [$key][5] . "\"\n");
    }
  }
?>