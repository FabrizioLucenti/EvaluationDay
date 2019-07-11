<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Our Houses:</h1>
    <?php
    require_once 'database.php';

    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
    // echo 'connection succesfull<br>';

    $db_name = DB_NAME;
    $db_found = mysqli_select_db($conn, $db_name);
    //var_dump($db_found);
    if ($db_found) {
        $query = 'SELECT * FROM housing order by id_housing';
        $results = mysqli_query($conn, $query);
        while ($db_record = mysqli_fetch_assoc($results)) {
            echo $db_record['title'] . "<br>";
            echo "<img src='uploads/" . $db_record['photo'] . "' height='200px' width='150px'><br>";
            echo "Address: " . $db_record['address'] . "<br>";
            echo "City: " . $db_record['city'] . "<br>";
            echo "Postal Code: " . $db_record['pc'] . "<br>";
            echo "Area (in m squared): " . $db_record['area'] . "m" . "<br>";
            echo "price: " . $db_record['price'] . "€" . "<br>";
            echo "Type: " . $db_record['type'] . "<br>";
            echo "Description: " . $db_record['description'] . "<hr>";
        }
    } else {
        echo '$db_name not found<br>';
    }
    //`title`, `address`, `city`,`pc`,`area`,`price`, `type`, `description`

    mysqli_close($conn);
    ?>
</body>

</html>