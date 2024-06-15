<?php
$mysqli = new mysqli('localhost:3006', 'root', '123456', 'studentdb');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$subject = "PHP";
$className = "10E3033";
$sql = "SELECT 
    tblscoreboards.TransactionID, 
    tblstudents.StudentName, 
    tblscoreboards.Semester, 
    tblsubjects.Subject, 
    tblscoreboards.MidtermScore, 
    tblscoreboards.FinalScore
FROM 
    tblscoreboards
JOIN 
    tblstudents ON tblscoreboards.StudentID = tblstudents.StudentID
JOIN 
    tblsubjects ON tblscoreboards.SubjectID = tblsubjects.SubjectID
JOIN 
    tblstudentsclasses ON tblstudentsclasses.StudentID = tblscoreboards.StudentID
JOIN 
    tblclasses ON tblclasses.ClassID = tblstudentsclasses.ClassID
WHERE 
    tblsubjects.Subject LIKE ? 
    AND tblclasses.ClassName LIKE ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $subject, $className);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $score = new ClassScore();
        $score->transactionId = $row["TransactionID"];
        $score->semester = $row["Semester"];
        $score->midtermScore = $row["MidtermScore"];
        $score->finalScore = $row["FinalScore"];

        echo "<tr>";
        echo "<td class='py-2 items-center justify-center border'>" . $score->transactionId . "</td>";
        echo "<td class='flex flex-row justify-around items-center py-2 text-center'><img src='../Image/profile.jpg' class='w-[60px] rounded-full border-blue-600 border' alt='Profile Picture' /><h4>" . $row["StudentName"] . "</h4></td>";
        echo "<td class='py-2 items-center justify-center border'>" . $score->semester . "</td>";
        echo "<td class='py-2 items-center justify-center border'>" . $row["Subject"] . "</td>";
        echo "<td class='py-2 items-center justify-center border'>" . $score->midtermScore . "</td>";
        echo "<td class='py-2 items-center justify-center border'>" . $score->finalScore . "</td>";
        echo "<td class='py-2 items-center justify-center border'>" . $score->calculateTotalScore(). "</td>";
        echo "<td class='py-2 items-center justify-center border'>" . $score->calculateGrade(). "</td>";
        echo "<td class='py-2 items-center justify-center border hover:cursor-pointer more relative'><h4>. . .</h4><div class='more-chose w-fit bg-red-50 py-1 px-2 absolute text-black hidden rounded-lg'><div class='border-b-2 border-black hover:text-blue-800'>Edit</div><div class='hover:text-red-800'>Delete</div></div></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No data available</td></tr>";
}

$stmt->close();
$conn->close();
?>