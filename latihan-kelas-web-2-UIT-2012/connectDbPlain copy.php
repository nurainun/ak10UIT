<?php
	/*
	try {
		$userName = 'root';
		$password = 'talaso';
		$dbh = new PDO("mysql:host=localhost;dbname=latihan_ak_10",$userName,$password);
		
	//setting error pdo                                 	
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
	
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	*/
	
	//PDO exec
	/*
	$results = $dbh->exec("
		INSERT INTO blogs (
			title,
			body,
			created_by,
			modified_by,
			created,
			modified)
		VALUES (
			'test 3',
			'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
			1,
			1,
			now(),
			now()
			)
		");
	echo '<pre>'.$results.'</pre>';
	*/
	
	
	//$dbh->setFetchMode(PDO::FETCH_ASSOC);
	//get all data from table
	/*
	$results = $dbh->query("SELECT * FROM blogs");
	if(!empty($results)){
		echo '<pre>';
		print_r($results->fetch());
		echo '</pre>';
	}
	else{
		echo 'there is no result query';
	}
	*/
	
	// setting the fetch mode in array association
	//$sth = $dbh->query("SELECT * FROM blogs");
	//$i=0;
	//echo $sth->rowCount();
	//$sth->fetch(PDO::FETCH_ASSOC);
	/*
	while($i < $sth->rowCount()){
		echo '<pre>'; 
		print_r($sth->fetch(PDO::FETCH_ASSOC));
		echo '</pre>';
		$i++;
	}
	*/
	/*
	for($i=0;$i<$sth->rowCount();$i++){
		echo '<pre>'; 
		print_r($sth->fetch(PDO::FETCH_ASSOC));
		echo '</pre>';
	}
	*/
	/*
	$i=0;
	if($sth->rowCount() != 0 ){
		do{
			echo '<pre>'; 
			print_r($sth->fetch(PDO::FETCH_ASSOC));
			echo '</pre>';
			$i++;
		}while($i<$sth->rowCount());
	}*/
	
	//$sth = $dbh->query("SELECT * FROM blogs");
	//$results = $sth->fetchAll(PDO::FETCH_ASSOC);
	
	//echo '<pre>';
	//print_r($results);
	//echo '</pre>';
	
	// setting the fetch mode in array association
	/*
	$sth = $dbh->query("SELECT title,body,created_by,modified_by,created,modified FROM blogs");
	$results = $sth->fetchAll(PDO::FETCH_ASSOC);
	echo '<pre>';
	print_r($results);
	echo '</pre>';
	*/
	/*
	$sth = $dbh->query("SELECT title,body,created_by,modified_by,created,modified FROM blogs");
	$results = $sth->fetchAll(PDO::FETCH_OBJ);
	echo '<pre>';
	//print_r($results);
	foreach($results as $result){
		echo $result->title;
		echo $result->body;
		echo '<br />';
	}
	echo '</pre>';
	*/
	try {
		$userName = 'root';
		$password = '';
		$dbh = new PDO("mysql:host=localhost;dbname=latihan_ak_10",$userName,$password);
		
	//setting error pdo                                 	
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
	
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	$sth = $dbh->query("SELECT title,body,created_by,modified_by,created,modified FROM blogs");
	$results = $sth->fetchAll(PDO::FETCH_OBJ);
	echo '<pre>';
	print_r($results);
	/*
	foreach($results as $result){
		echo $result->title;
		echo $result->body;
		echo '<br />';
	}*/
	
	echo '</pre>';
?>


<html>
	<body>
		<?php if(!empty($results)): ?>
			<?php foreach($results as $result):?>
				<p>Judul : <?php echo $result->title;?></p>
				<p>Isi : <?php echo $result->body;?></p>
			<?php endforeach;?>
		<?php else: ?>
			<p>Tidak Ada Data</p>
		<?php endif;?>
	</body>
</html>