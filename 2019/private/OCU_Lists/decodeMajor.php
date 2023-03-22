<?php
  $a = fopen("cip_codes.csv", "r") or die("file not found.\n");
  $b = fopen("OCU_majors.csv", "r") or die("file not found.\n");
  $c = fopen("ocu_output.csv", "w");

  $header_a = fgetcsv($a);
  $header_b = fgetcsv($b);
  
  $codes = array();

  while($i = fgetcsv($a)) {
    $codes[$i[0]] = $i[1];
  }

  while($i = fgetcsv($b)) {
    if(array_key_exists($i[5], $codes)) {
      $i[6] = $codes[$i[5]];
      fputcsv($c, $i);
    }
    else {
      print($i[5] . " not found\n");
      fputcsv($c, $i);
    }
  }

  fclose($a);
  fclose($b);
  fclose($c);
?>