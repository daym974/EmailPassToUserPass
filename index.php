<?php
  ini_set('memory_limit', '-1');

  function delete_all_between($beginning, $end, $string) {
  $beginningPos = strpos($string, $beginning);
  $endPos = strpos($string, $end);
  if ($beginningPos === false || $endPos === false) {
    return $string;
  }

  $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos -1);

  return str_replace($textToDelete, '', $string);
}

  $ptr = fopen("file.txt", "r");
  $contenu = fread($ptr, filesize("file.txt"));
    
  fclose($ptr);
 
  $contenu = explode(PHP_EOL, $contenu); 
	for($i = 0;$i<count($contenu);$i++) {
$contenu[$i] = delete_all_between('@', ':', $contenu[$i]);


}

   $contenu = array_values($contenu); 
   $contenu = implode(PHP_EOL, $contenu);
   $ptr = fopen("file.txt", "w+");
   fwrite($ptr, $contenu);
   echo "Finished !";

?>
