<?php
// Redirect if the form has not been submitted
if (!isset($_POST['submit'])) {
    header("Location: daskbord.php");
    exit(); // It's important to exit after a header redirect
}

$subject = $_POST['subject'];
$name = $_POST['name']; // Correct the variable to match the intended form field
$mid = $_POST['midterm'];
$final = $_POST['final'];

// Establish a database connection
$mysqli = new mysqli('localhost:3006', 'root', '123456', 'studentdb');
if ($mysqli->connect_errno) {
    error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
    die('Database connection failed'); // Better error handling
}

// Prepare and execute the query to get SubjectID
$subjectIdQuery = "SELECT SubjectID FROM tblSubjects WHERE Subject = ?";
$stmt = $mysqli->prepare($subjectIdQuery);
if (!$stmt) {
    error_log("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
    die('Query preparation failed');
}
$stmt->bind_param("s", $subject);
$stmt->execute();
$result = $stmt->get_result();
$subjectIdRow = $result->fetch_assoc();
$stmt->close();

if (!$subjectIdRow) {
    die('Subject not found');
}
$subjectId = $subjectIdRow['SubjectID'];

// Prepare and execute the query to get StudentID
$studentIdQuery = "SELECT StudentID FROM tblstudents WHERE StudentName = ?";
$stmt = $mysqli->prepare($studentIdQuery);
if (!$stmt) {
    error_log("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
    die('Query preparation failed');
}
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();
$studentIdRow = $result->fetch_assoc();
$stmt->close();

if (!$studentIdRow) {
    die('Student not found');
}
$studentId = $studentIdRow['StudentID'];

// Function to add score
function addScore($mysqli, $studentId, $subjectId, $mid, $final, $user, $sem) {
    $query = "INSERT INTO tblscoreboards (StudentID, SubjectID, MidtermScore, FinalScore, Username, Semester)
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    if (!$stmt) {
        error_log("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
        return false;
    }
    $stmt->bind_param("iiisss", $studentId, $subjectId, $mid, $final, $user, $sem);
    if ($stmt->execute()) {
        $id = $stmt->insert_id;
        error_log("Inserted {$studentId} with transaction {$id}");
        $stmt->close();
        return true;
    } else {
        error_log("Problem inserting: " . $stmt->error);
        $stmt->close();
        return false;
    }
}

// Example usage of the addScore function
$user = "sreykhuoch12"; // Replace with actual username
$sem = "Fall 2024"; // Replace with actual semester

if (addScore($mysqli, $studentId, $subjectId, $mid, $final, $user, $sem)) {
    echo "Score added successfully";
} else {
    echo "Failed to add score";
}

// Close the database connection
$mysqli->close();
?>
