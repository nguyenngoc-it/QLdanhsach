<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    img{
        width: 50px;
    }
</style>
<body>
<form action="TH-filter.php" method="post">
    <input type="text" name="sort" placeholder="sort">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="age" placeholder="age">
    <input type="text" name="address" placeholder="address">
    <input type="text" name="img" placeholder="img">
    <button type="submit">Them</button>
</form>

<?php

include('Customer.php');

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $obj = new Customer($_POST["sort"], $_POST["name"], $_POST["age"], $_POST["address"], $_POST["img"]);
    $filename = "filter.json";
    $json = file_get_contents($filename);
    $json_data = json_decode($json);
    array_push($json_data, $obj);
    $jsonData = json_encode($json_data);
    file_put_contents($filename, $jsonData);
}
?>


<?php
$filename="filter.json";
$json = file_get_contents($filename);
$json_data= json_decode($json);

?>
Chon ngay sinh tu:<input type="date" name="$fromDate">Den:<input type="date" name="$toDate">
<button>Loc</button>
<table>
    <caption>Danh sach khach hang</caption>
    <thead>
    <tr>
        <th>STT</th>
        <th>Ten</th>
        <th>Ngay sinh</th>
        <th>Dia chi</th>
        <th>Anh</th>
    </tr>

    </thead>
    <tbody>
    <?php for($i = 0; $i <count($json_data); $i++) { ?>
        <tr>
            <td><?php echo $json_data[$i]->sort ?></td>
            <td><?php echo $json_data[$i]->age ?></td>
            <td><?php echo $json_data[$i]->name ?></td>
            <td><?php echo $json_data[$i]->address ?></td>
            <td><img src="<?php echo $json_data[$i]->img ?>" alt=""></td>
        </tr>
    <?php } ?>

    </tbody>
</table>
<?php
?>











</body>
</html>
