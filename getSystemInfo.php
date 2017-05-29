<?php
	include "php/routes.php";
	session_start();
	$conn = connect();	
	if (isset($_GET['system'])) {
		$prepared = $conn->prepare("SELECT COUNT(*) AS sigCount FROM signatures WHERE system_id = ? AND sig_type = ?"); 
		$var = "Relic Site";
		$prepared->bind_param('ss', $_GET['system'], $var);    
		$prepared->execute();
		$result = get_result($prepared);
		while ($row = array_shift($result)) {
	        $relicSites = $row['sigCount'];
	    }

	    $prepared = $conn->prepare("SELECT COUNT(*) AS sigCount FROM signatures WHERE system_id = ? AND sig_type = ?"); 
	    $var = "Data Site";
		$prepared->bind_param('ss', $_GET['system'], $var);    
		$prepared->execute();
		$result = get_result($prepared);
		while ($row = array_shift($result)) {
	        $dataSites = $row['sigCount'];
	    }

	    $prepared = $conn->prepare("SELECT COUNT(*) AS sigCount FROM signatures WHERE system_id = ? AND sig_type = ?"); 
	    $var = "Combat Site";
		$prepared->bind_param('ss', $_GET['system'], $var);    
		$prepared->execute();
		$result = get_result($prepared);
		while ($row = array_shift($result)) {
	        $combatSites = $row['sigCount'];
	    }

	    $prepared = $conn->prepare("SELECT COUNT(*) AS sigCount FROM signatures WHERE system_id = ? AND sig_type = ?"); 
	    $var = "Gas Site";
		$prepared->bind_param('ss', $_GET['system'], $var);    
		$prepared->execute();
		$result = get_result($prepared);
		while ($row = array_shift($result)) {
	        $gasSites = $row['sigCount'];
	    }

	    $prepared = $conn->prepare("SELECT COUNT(*) AS sigCount FROM signatures WHERE system_id = ? AND sig_type = ?"); 
	    $var = "Wormhole";
		$prepared->bind_param('ss', $_GET['system'], $var);    
		$prepared->execute();
		$result = get_result($prepared);
		while ($row = array_shift($result)) {
	        $wormhole = $row['sigCount'];
	    }

	    // echo $count;

	    echo '
		      <h6>'.$relicSites.' Relic Site(s)</h6>
		      <h6>'.$dataSites.' Data Site(s)</h6>
		      <h6>'.$combatSites.' Combat Site(s)</h6>
		      <h6>'.$gasSites.' Gas Site(s)</h6>
		      <h6>'.$wormhole.' Wormhole(s)</h6>
		      ';
	}	
?>