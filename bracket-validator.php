<?php

$openersClosers = [
  "(" => ")", 
  "{" => "}", 
  "[" => "]",
];

$openers = array_keys($openersClosers);
$closers = array_values($openersClosers);

$input = "{ [ }";

$seq = "";
$valid = true;

for ($i = 0; $i < strlen($input); $i++) {
  $char = $input[$i];
  
  if (in_array($char, $openers) === true) {
    $seq.=$char;
    continue;
  }
  if (in_array($char, $closers) === true) {
    $lastOpener  = $seq[strlen($seq)-1];
    $validCloser = $openersClosers[$lastOpener];
    
    if ($char !== $validCloser) {
      $valid = false;
      break;
    } else {  
      $seq = substr($seq, 0, -1);
    }
  }
}

var_dump($valid);

