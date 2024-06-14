<?php

class Student
{
    private $conn;
    public $StudentID;
    public $StudentName;
    public $Gender;
    public $DOB;
    public $Email;
    public $PhoneNumber;
    public $Image;


    public function AddStudent()
    {
        $query = "INSERT INTO students (StudentID,StudentName, Gender, DOB, Email, PhoneNumber,Image) VALUES (?, ?, ?, ?, ?,?,? )";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("ssssssss", $this->StudentID, $this->StudentName, $this->Gender, $this->DOB, $this->Email, $this->PhoneNumber, $this->Image);

        if ($stmt->execute()) {
            $this->StudentID = $stmt->insert_id;
            return true;
        } else {
            error_log("Failed to add student: " . $stmt->error);
            return false;
        }
    }
}
