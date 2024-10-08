<?php
require_once 'database.class.php';
    class Student {
        private $conn;

        function __construct(){
            $db = new Database;
            $this->conn = $db->connect();
        }

        function getData(){
            $sql = "SELECT students.studentsName, courses.courseCode, courses.courseDescription FROM students LEFT JOIN courses ON students.courseId = courses.courseId";
            $query = $this->conn->prepare($sql);
            $data = null;
            if($query->execute()){
                $data = $query->fetchAll();
            }
            return $data;
        }

        function showCourses(){
            $sql = "SELECT * FROM courses;";
            $query = $this->conn->prepare($sql);
            $data = null;
            if($query->execute()){
                $data = $query->fetchAll();
            }
            return $data;
        }

        function addData($studentsName, $courseId){
            $sql = "INSERT INTO students(studentsName, courseId) VALUES(:studentsName, :courseId)";
            $query = $this->conn->prepare($sql);

            $query->bindParam(":studentsName", $studentsName);
            $query->bindParam(":courseId", $courseId);

            if($query->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        function addCourse($courseCode, $courseDescription){
            $sql = "INSERT INTO courses(courseCode, courseDescription) VALUES(:courseCode, :courseDescription)";
            $query = $this->conn->prepare($sql);

            $query->bindParam(":courseCode", $courseCode);
            $query->bindParam(":courseDescription", $courseDescription);

            if($query->execute()){
                return true;
            } else {
                return false;
            }
        }

        function codeExist($data, $table, $excluded_id=null){
            $sql = "SELECT 1 FROM $table WHERE studentsName = :data";
            if($excluded_id){
                $sql .= " AND id != :excluded_id;";
            }
            $query = $this->conn->prepare($sql);
            $query->bindParam(":data", $data);
            if($excluded_id){
                $query->bindParam(":excluded_id", $excluded_id);
            }
            $count = null;
            if($query->execute()){
                $count = $query->fetchColumn();
            }
            return $count > 0;
        }
    }

    ?>  