<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
</head>
<body>
    <?php 
    include_once "function.php";
    include_once "student.class.php";
    $obj = new Student;
    $array = $obj->fetchCourse();

    $code = $course_name ='';
    $codeErr = $course_nameErr ='';
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $code = clean_input($_POST["code"]);
        $course_name = clean_input($_POST["course_name"]);
        if(empty($code)){
            $codeErr = "Code is required";
        }
        if(empty($course_name)){
            $course_nameErr = "course name is required";
        }
        if(empty($codeErr) && empty($course_nameErr)){ 
            $obj->code = $code;
            $obj->course_name = $course_name;
            $obj->addCourse();
            echo "Course Added!";
            header("location:" . $_SERVER["PHP_SELF"]);
        }
    }
    ?>
    <a href="student.php">View Student</a>
    <h3>Add Course</h3>
    <form action="" method="post">
        <label for="code">Code</label>
        <span style="color: red;"><?= $codeErr ?></span>
        <input type="text" name="code" id="code">
        <br><label for="course_name">Description</label>
        <span style="color: red;"><?= $course_nameErr ?></span>
        <input type="text" name="course_name" id="course_name">
        <br><input type="submit" value="Add Course">
    </form>
    <br>
    <br>
    <table border="1px">
        <tr>
            <th>no.</th>
            <th>Course Code</th>
            <th>Course Description</th>
        </tr>
        <?php 
        $i = 1;
        if(empty($array)){?>
            <tr>
                <td colspan="6" style="text-align: center;">
                    <p class="search">No product found.</p>
                </td>
            </tr>
        <?php }
        foreach($array as $arr){
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $arr["code"] ?></td>
            <td><?= $arr["course_name"] ?></td>
        
        </tr>
        <?php
        $i++; }
        ?>
    </table>
</body>
</html>