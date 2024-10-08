<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <?php 
    include_once "function.php";
    include_once "student.class.php";
    $obj = new Student;

    $course_id = $name ='';
    $course_idErr = $nameErr ='';
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $course_id = clean_input($_POST["course_id"]);
        $name = clean_input($_POST["name"]);
        if(empty($course_id)){
            $course_idErr = "course code is required";
        }
        if(empty($name)){
            $nameErr = "Student name is required";
        }
        if(empty($nameErr) && empty($course_idErr)){ 
            $obj->name = $name;
            $obj->course_id = $course_id;
            $obj->addStudent();
            echo "Student Added!";
            header("refresh: 2, url=student.php");
            exit;
        }
    }
    ?>
    <a href="student.php">View Student</a>
    <h3>Add Student</h3>
    <form action="" method="post">
        <label for="name">Student Name: </label>
        <span style="color: red;"><?= $nameErr ?></span>
        <input type="text" name="name" id="name" value="<?= $name ?>">
        <br><label for="course_id">Course</label><span style="color: red;"><?= $course_idErr ?></span>
        <select name="course_id" id="course_id">
            <option value="">Select Course</option>
            <?php 
            foreach($obj->fetchCourse() as $crs){
            ?>
                <option value="<?= $crs["id"] ?>"><?= $crs["course_name"] ?></option>
            <?php 
            }
            ?>
        </select>
        <br><input type="submit" value="Add Student">
    </form>
</body>
</html>