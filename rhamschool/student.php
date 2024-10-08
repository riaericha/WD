<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>
    <?php 
        include_once "student.class.php";
        $obj = new Student;

        $arr = $obj->viewAll();
    ?>
    <a href="addCourse.php">View Course</a>
    <a href="addStudent.php">Add student</a>
    <table border="1px">
        <tr>
            <th>no.</th>
            <th>name</th>
            <th>course code</th>
            <th>course Description</th>
        </tr>
        <?php 
        $i = 1;
        foreach($arr as $ar){
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $ar["name"] ?></td>
            <td><?= $ar["code"] ?></td>
            <td><?= $ar["course_name"] ?></td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>
</body>
</html>