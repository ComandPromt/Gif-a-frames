<?php
if(!file_exists("frames")){
	mkdir("frames");
}
error_reporting(0);
    include_once ( str_replace('\\','/',dirname(__FILE__) ) ."/GIFDecoder.class.php" );

	$animation = 'picture.gif';

  	$gifDecoder = new GIFDecoder ( fread ( fopen ( $animation, "rb" ), filesize ( $animation ) ) );

	$i = 1;
	foreach ( $gifDecoder -> GIFGetFrames ( ) as $frame ) {
		if ( $i < 10 ) {
			fwrite ( fopen ( "frames/frame0$i.png" , "wb" ), $frame );
		}
		else {
			fwrite ( fopen ( "frames/frame$i.png" , "wb" ), $frame );
		}
		$i++;
	}
?>
