<?php
//Export lists from itunes as plaintext then import the sorted playlists at the end
$year = date( 'Y' );
$bill = fopen( "/Users/karp/Documents/git/top200/billnewtop200_{$year}.txt", "r" );

$line = fgets( $bill );
$blines = explode( "\r", $line );

fclose( $bill );

$rob = fopen( "/Users/karp/Documents/git/top200/robnewtop200_{$year}.txt", "r" );

$line = fgets( $rob );
$rlines = explode( "\r", $line );

fclose( $rob );

$billfirst = $blines[0] . "\r";
$robfirst  = $blines[0] . "\r";

for ($i=200; $i >= 1; $i-- ) 
{ 
	$billfirst .= $blines[$i] . "\r" . $rlines[$i] . "\r";
	$robfirst  .= $rlines[$i] . "\r" . $blines[$i] . "\r";
 }

$billfirstf = fopen( "/Users/karp/Documents/git/top200/billfirsttop200_{$year}.txt", "w" );

fwrite( $billfirstf, $billfirst );
fclose( $billfirstf );

$robfirstf = fopen( "/Users/karp/Documents/git/top200/robfirsttop200_{$year}.txt", "w" );

fwrite( $robfirstf, $robfirst );
fclose( $robfirstf );


?>
