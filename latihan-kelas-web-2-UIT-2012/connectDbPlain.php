<?php

	
	try {
		$userName = 'root';
		$password = 'talaso';
		$dbDriver = 'mysql';
		$dbHost = 'localhost';
		$dbname = 'latihan_ak_10';
		$tableName = 'blogs';
		$dbh = new PDO("$dbDriver:$dbHost=localhost;dbname=$dbname",$userName,$password);
		
	//setting error pdo                                 	
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
	
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	$sth = $dbh->query('describe '.$tableName);
	$results = $sth->fetchAll(PDO::FETCH_OBJ);
	
	//print_r($results);
	
	//echo '<pre>';
	$dataFields = array();
	foreach($results as $result){
		//echo ($result->field).'<br />';
		array_push($dataFields,$result->field);
	}
	echo '<pre>';
	print_r($dataFields);
	echo '</pre>';
	
	
	$i=count($dataFields);
	$stringSQL = "SELECT ";
	
	echo $i.'<br />';
	foreach($dataFields as $dataField){
		$stringSQL.= $dataField;
		if($i != 1){
				$stringSQL.= ', ';
		}
		$i--;
		//echo $dataField.'<br />';
	}
	$stringSQL .= " FROM ";
	$stringSQL .= $tableName;
	echo $stringSQL;
	
	$sth = $dbh->query($stringSQL);
	$results = $sth->fetchAll(PDO::FETCH_OBJ);
	echo '<pre>';
	print_r($results);
	echo '</pre>';
	
?>