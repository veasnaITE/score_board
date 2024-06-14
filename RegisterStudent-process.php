<?php
require_once "function.inc"; // Include necessary functions

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a new Student instance
    $student = new Student();

    // Set student properties from form data
    $student->StudentName = $_POST['StudentName'];
    $student->Gender = $_POST['Gender'];
    $student->DOB = $_POST['DOB'];
    $student->Email = $_POST['Email'];
    $student->PhoneNumber = $_POST['PhoneNumber'];

    // // Handle file upload for image
    // if (isset($_FILES['Image']) && $_FILES['Image']['error'] === UPLOAD_ERR_OK) {
    //     $uploadDir = 'uploads/';
    //     $uploadFile = $uploadDir . basename($_FILES['Image']['name']);

    //     if (move_uploaded_file($_FILES['Image']['tmp_name'], $uploadFile)) {
    //         $student->Image = $uploadFile; // Set image path in Student object
    //     } else {
    //         echo "Failed to move uploaded file.";
    //         exit;
    //     }
    // } else {
    //     echo "File upload error: ";
    //     switch ($_FILES['Image']['error']) {
    //         case UPLOAD_ERR_INI_SIZE:
    //             echo "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
    //             break;
    //         case UPLOAD_ERR_FORM_SIZE:
    //             echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
    //             break;
    //         case UPLOAD_ERR_PARTIAL:
    //             echo "The uploaded file was only partially uploaded.";
    //             break;
    //         case UPLOAD_ERR_NO_FILE:
    //             echo "No file was uploaded.";
    //             break;
    //         case UPLOAD_ERR_NO_TMP_DIR:
    //             echo "Missing a temporary folder.";
    //             break;
    //         case UPLOAD_ERR_CANT_WRITE:
    //             echo "Failed to write file to disk.";
    //             break;
    //         case UPLOAD_ERR_EXTENSION:
    //             echo "A PHP extension stopped the file upload.";
    //             break;
    //         default:
    //             echo "Unknown error occurred.";
    //             break;
    //     }
    //     exit;
    // }

    // Add student to database
    if ($student->AddStudent()) {
        echo "Student added successfully!";
    } else {
        echo "Failed to add student.";
    }
} else {
    echo "Invalid request method.";
}
