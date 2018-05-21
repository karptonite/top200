<?php

$name= $argv[1];
$year = date( 'Y' );
$lastyear = $year - 1;

$fp = fopen( "{$name}top200csv_{$year}.csv", "r" );

while ( $lines[] = fgetcsv( $fp ) )
{
}

fclose( $fp );

$fp = fopen( "/Users/karp/Documents/git/top200/{$name}_{$lastyear}plus.txt", "r" );

$line = fgets( $fp );
fclose( $fp );
$blines = explode( "\r", $line );


$newlist = $blines[0] . "\r";

$i = 0;
for ($i=0; $i <= 199; $i++ ) 
{ 
	$lastindex = trim( $lines[$i][3] );
	if( is_numeric( $lastindex ) )
	{
		$newlist .= $blines[$lastindex] . "\r";
	}
 }

$newlistf = fopen( "/Users/karp/Documents/git/top200/{$name}newtop200_{$year}.txt", "w" );

fwrite( $newlistf, $newlist );
fclose( $newlistf );
