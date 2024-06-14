
<?php
class ClassScore {
    public $transactionId;
    public $studentId;
    public $semesterId;
    public $subjectId;
    public $midtermScore;
    public $finalScore;

    public function __construct() {   
    }

    public function calculateTotalScore() {
        return $this->midtermScore + $this->finalScore;
    }

    public function calculateGrade() {
        $totalScore = $this->calculateTotalScore();
        $averageScore = $totalScore / 2;
        if ($averageScore >= 90) {
            return 'A';
        } elseif ($averageScore >= 80) {
            return 'B';
        } elseif ($averageScore >= 70) {
            return 'C';
        } elseif ($averageScore >= 60) {
            return 'D';
        } else {
            return 'F';
        }
    }

    public function checkPass() {
        $grade = $this->calculateGrade();
        return $grade !== 'F';
    }
}
?>

