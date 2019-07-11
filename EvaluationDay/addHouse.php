<?php
require_once 'database.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
// echo 'connection succesfull<br>';

$db_name = DB_NAME;
$db_found = mysqli_select_db($conn, $db_name);

//$area2 = IS_INT(44);
//echo $area2;


if (isset($_POST['butty'])) {
    $title = ($_POST['title']);
    $address = ($_POST["address"]);
    $city = ($_POST["city"]);
    $pc = $_POST["postal"];
    $area = $_POST["area"];
    $price = $_POST["price"];
    $type = $_POST['tipo'];
    $description = $_POST['description'];
    //$intAR = IS_INT($area);
    //$intPR = IS_INT($price);
    if (
        strlen($title) > 1
        && strlen($address) > 1
        && strlen($city) > 1
        && isset($pc)
        && strlen($pc) == 5
        && isset($area)
        && isset($price)
        && isset($type)
        && isset($description)
    ) {
        // var_dump($_FILES);
        // Check if there is not errors
        if ($_FILES['myFile']['error'] != UPLOAD_ERR_OK) {
            echo "Some error during upload";
        } else {

            // Check if it's an image
            $extensionArray = array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif'
            );
            // Check if the extension match a value in the array
            $extFile = array_search($_FILES['myFile']['type'], $extensionArray);

            if ($extFile) {
                // Hash the file name
                $shaFile = sha1_file($_FILES['myFile']['tmp_name']);
                // echo "HASH NAME : " . $shaFile;
                $destinationDir = './uploads/';
                $fileNumbers = 0;
                do {
                    $fileName = $shaFile . $fileNumbers . '.' . $extFile;
                    $fullPath = $destinationDir . $fileName;
                    // var_dump($fullPath);
                    $fileNumbers++;
                } while (file_exists($fullPath));

                $moved = move_uploaded_file($_FILES['myFile']['tmp_name'], $fullPath);

                if ($moved)
                    echo "File successfully saved";
                else
                    echo "Error during saving";
            } else {
                echo 'File not an image !';
            }
        }
        $query = "INSERT INTO `housing` (`title`, `address`, `city`,`pc`,`area`,`price`,`type`,`photo`,`description`) VALUES ('$title', '$address','$city','$pc','$area','$price','$type','$fileName','$description')";
        mysqli_query($conn, $query);
    } else {
        echo 'bad';
    }
}
//&& $intAR 
//&& $intPR
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <form enctype="multipart/form-data" action="" method="POST">
        <label for="title">Title:
            <input type="text" name="title" size="40">
        </label>
        <br>
        <label for="address">Address:
            <input type="text" name="address" size="40" placeholder="ex: via Aurelia, 100">
        </label>
        <br>
        <label for="city">City:
            <input type="text" name="city" size="40">
        </label>
        <br>
        <label for="postal">Postal Code:
            <input type="text" name="postal" size="40" placeholder="Must be 5 numbers!">
        </label>
        <br>
        <label for="area">Area:
            <input type="text" name="area" size="40" placeholder="expressed in Meter Squared">
        </label>
        <br>
        <label for="price">Price:
            <input type="text" name="price">€
        </label>
        <br>
        <label for="type">Type:
            <input type="radio" name="tipo" value="Letting" checked="checked">Letting
            <input type="radio" name="tipo" value="Sale">Sale
        </label>
        <br>
        <label for="description">
            <textarea rows="4" cols="50" name="description" placeholder="a brief description of the house"></textarea>
        </label>
        <br>
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
        Select the photo (only images) : <input type="file" name="myFile">
        <br>
        <input type="submit" name='butty' value="Add House" />
    </form>
</body>

</html>