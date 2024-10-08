<?php 

require_once "computerClass.php";
require_once "clean.php";

$obj = new Computer;
$array = $obj->showAllAvailable();

$name = $nameErr = "";
$unit = $unitErr = "";
$status = $statusErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = clean($_POST["name"]);
    $unit = clean($_POST["units"]);
    $status = clean($_POST["status"]);

    if(empty($name)) {
        $nameErr = "Name is required";
    }
    if(empty($unit)) {
        $unitErr = "A computer unit is required";
    }
    if(empty($status)) {
        $statusErr = "Status of unit is required";
    }

    if(empty($nameErr) && empty($unitErr)) {
        $obj->name = $name;
        $obj->unit = $unit;
        $obj->status = $status;

        if($obj->add()) {
            header("location: view.php");
        } else {
            echo "Failed: ";
        }
    }
}

?>
<head>
    <title>Rent A Computer</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <a href="view.php">Check All Units</a>
    <form action="" method="post">
        <label for="name">Name</label><span class="error">*</span><br>
        <input type="text" name="name" value="<?= $name ?>"><br>
        <?php if(!empty($name)): ?>
            <span class="error"><?= $nameErr ?></span>
        <?php endif; ?><br>

        <label for="units">Available Units</label><span class="error">*</span><br>
        <select name="units">
            <option value="">--SELECT AVAILABLE COMPUTER--</option>
            <?php foreach($array as $arr): ?>
                <option value="<?= $arr["id"] ?>" ><?= $arr["unit_name"] ?></option>
            <?php endforeach; ?>
        </select><br>
        <?php if(!empty($unitErr)): ?>
            <span class="error"><?= $unitErr ?></span>
        <?php endif; ?><br>

        <label for="status">Status</label><span class="error">*</span><br>
        <select name="status">
            <option value="">--SELECT STATUS--</option>
            <option value="In Use" <?= (isset($status) && $status) == "In Use" ? "selected=true" : "" ?> >In Use</option>
            <option value="Completed" <?= (isset($status) && $status) == "Completed" ? "selected=true" : "" ?> >Completed</option>
        </select><br>
        <?php if(!empty($statusErr)): ?>
            <span class="error"><?= $statusErr ?></span>
        <?php endif; ?><br>

        <input type="submit" name="rent" value="Rent this unit">
    </form>
</body>
</html>