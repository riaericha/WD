<?php 

require_once "computerClass.php";
require_once "clean.php";
$obj = new Computer;
$array = $obj->showAll();

?>
<head>
    <title>Document</title>
</head>
<body>
    <a href="rent.php">Rent a computer</a>
    <form action="" method="post">
        <label for="cusName">Cusomer Name</label>
        <input type="text" name="cusName">

        <label for="unitName">Unit Name</label>
        <input type="text" name="unitName">

        <input type="submit" name="search" value="Search">
    </form>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Unit Name</th>
            <th>Availability</th>
            <th>Starting Time</th>
            <th>Ending Time</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
        <?php
            $i = 1;
            foreach($array as $arr):
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $arr["unit_name"] ?></td>
                <td><?= $arr["is_available"] ? "True" : "False" ?></td>
                <td><?= $arr["start_time"] ?></td>;
                <td><?= $arr["end_time"] ?></td>
                <td><?= $arr["remarks"] ?></td>
                <td>
                    <a href="end.php">End Time</a>
                </td>
            </tr>
        <?php
            $i++;
            endforeach;
        ?>
    </table>
</body>
</html>