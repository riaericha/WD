<?php
require_once "databases.class.php"; 
class Student{
    //student
    public $id_student;
    public $name;
    public $course_id;

    //course
    public $id_course;
    public $code;
    public $course_name;

    protected $db;

    function __construct()
    {
        $this->db = new Database;
    }


    function addCourse(){
        $sql = "INSERT INTO course (code, course_name) VALUES (:code, :course_name)";
        $q = $this->db->connect()->prepare($sql);
        $q->bindParam(":code",$this->code);
        $q->bindParam(":course_name",$this->course_name);
        return $q->execute();
    }
    function addStudent(){
        $sql = "INSERT INTO students (name, course_id) VALUES (:name, :course_id)";
        $q = $this->db->connect()->prepare($sql);
        $q->bindParam(":name",$this->name);
        $q->bindParam(":course_id",$this->course_id);
        return $q->execute();
    }

    function fetchCourse(){
        $sql = "SELECT *
        FROM course";
        $q = $this->db->connect()->prepare($sql);
        if($q->execute()){
            $data = $q->fetchAll(); 
        }
        return $data;
    }
    function viewAll(){
        $sql = "SELECT *
        FROM students
        LEFT JOIN course
        ON course_id = course.id ";
        $q = $this->db->connect()->prepare($sql);
        if($q->execute()){
            $data = $q->fetchAll(); 
        }
        return $data;
    }
}

// $obj = new Student;
// // $obj->code = "BSCS"; 
// // $obj->course_name = "Bachelor of Science In computer Science"; 
// // $obj->addCourse();

// $obj->name = "Hans";
// $obj->course_id = 1;
// $obj->addStudent();
?>