<?php
/***********************************************************
 Copyright (C) 2013 University of Nebraska at Omaha.
 
 This program is free software; you can redistribute it and/or
 modify it under the terms of the Apache License, Version 2.0
 as published by the Apache Software Foundation.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 Apache License for more details.
 
 You should have received a copy of the Apache License along
 with this program; if not, contact to the Apache Software Foundation.
***********************************************************/
	$fileSuffix = $_GET['fileSuffix'];
	include('spdx_output_db.php');
  Spdx_output_notice2($fileSuffix);
	$target_path = iconv("UTF-8","gb2312", dirname(__FILE__).'/../output_file/NOTICE2'.$fileSuffix);
	$filename1 = iconv("UTF-8","gb2312",'NOTICE');
	$filename = $target_path;
	//filetype
	header("Content-length: ".filesize($filename));
	header('Content-type:application/octet-stream');
	//download filename
	header('Content-Disposition: attachment; filename='.$filename1); 
	$file = fopen($filename,"r");
	echo fread($file,filesize($filename)); 
	fclose($file); 
	exec('rm -f '.$filename);
	exit();
?>
