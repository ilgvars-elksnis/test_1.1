<?php 

    include 'core.php';

    $itemsObj = new Database();

    if (isset($_POST['action']) && $_POST['action'] == "insert") {

		$email = ($_POST['email']);
        $date = date('Y-m-d H:i:s');
		$itemsObj->insertData($email, $date);
	}


?>