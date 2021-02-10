<?php

require('model.php'); 

	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM commande');
	$req->execute();
	
	//Fetch all of the rows from our MySQL table.
	$rows = $req->fetchAll(PDO::FETCH_ASSOC);

	//Get the column names.
	$columnNames = array();
	if(!empty($rows)){
		//We only need to loop through the first row of our result
		//in order to collate the column names.
		$firstRow = $rows[0];
		foreach($firstRow as $colName => $val){
			$columnNames[] = $colName;
		}
	}

	//Setup the filename that our CSV will have when it is downloaded.
	$fileName = 'commandes-export.csv';

	//Set the Content-Type and Content-Disposition headers to force the download.
	header('Content-Type: application/excel');
	header('Content-Disposition: attachment; filename="' . $fileName . '"');

	//Open up a file pointer
	$fp = fopen('php://output', 'w');

	//Start off by writing the column names to the file.
	fputcsv($fp, $columnNames);

	//Then, loop through the rows and write them to the CSV file.
	foreach ($rows as $row) {
		fputcsv($fp, $row);
	}

	//Close the file pointer.
	fclose($fp);


    //header("location: info-commande.php?commande_id=".$no_commande."&success=true");
	

?>