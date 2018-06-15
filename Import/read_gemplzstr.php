<?php
echo 'read gemplzstr';

// $fp = fopen(

$in = fopen($argv[1], 'r');
$out = fopen($argv[2], 'w');
if ($in && $out) {

    while (($line = fgets($in)) !== false) {
	$line = trim($line);
        $line = str_replace(["\r\n", "\r", "\n"], '', $line);

	if ($line  == '<datensatz>') {
	    $putstring = '';
	    $counter = 0;
	} elseif (substr($line,0,9)  == '<element>') {
	    $counter++;
	    $putstring .= '$' . str_replace(["<element>", "</element>"], '', $line) . '$' . ($counter < 8 ? ',':'');
	} elseif ($line == '</datensatz>') {
	    $putstring .= "\n";
	    fputs($out, $putstring);
//	    echo $putstring;
	}
    }
    fclose($in);
    fclose($out);
}
