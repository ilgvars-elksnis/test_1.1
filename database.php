<?php

include 'core.php';

$itemsObj = new Database();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $itemsObj->deleteRecord($id);
}

if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `registration` WHERE CONCAT(`id`, `emails`, `date`) LIKE '%".$valueToSearch."%'";
    $itemsObj->displayData($query);
} elseif (isset($_POST['DateASC'])) {
    $query = "SELECT * FROM `registration` ORDER BY date ASC";
    $itemsObj->displayData($query);
} elseif (isset($_POST['DateDESC'])) {
    $query = "SELECT * FROM 'registration' ORDER BY date DESC";
    $itemsObj->displayData($query);
} elseif (isset($_POST['EmailASC'])) {
    $query = "SELECT * FROM 'registration' ORDER BY emails ASC";
    $itemsObj->displayData($query);
} elseif (isset($_POST['EmailDESC'])) {
    $query = "SELECT * FROM 'registration' ORDER BY emails DESC";
    $itemsObj->displayData($query);
} else {
    $query = "SELECT * FROM `registration`";
    $itemsObj->displayData($query);
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title> database </title>
       <style>
            table,tr,th,td
            {
                border: 1px solid black;

            }
        </style>
    </head>
    <body>
     
        <form action="" method="post">
			<label>Date</label>
            <input type="submit" name="DateASC" value="Ascending">
            <input type="submit" name="DateDESC" value="Descending">
			<br>
            <label>Email</label>
            <input type="submit" name="EmailASC" value="Ascending">
            <input type="submit" name="EmailDESC" value="Descending">
			<br>

			<input type="text" name="valueToSearch" placeholder="Value To Search">
            <input type="submit" name="search" value="Filter">
            <br>       
            
            <table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Date</th>
					<th>Delete</th>	
                </tr>
                <!-- populate table from mysql database -->
                <?php
                $items = $itemsObj->displayData($query);
                foreach ($items as $row) {
                    ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['emails']; ?></td>
                    <td><?php echo $row['date']; ?></td>
					<td><a href='database.php?delete=<?php echo $row['id']; ?>'>Delete</a></td>
                </tr>
                <?php
                }?>

                
            </table>
        </form>
     
        
    </body>
</html>