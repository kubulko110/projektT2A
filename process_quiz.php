<?php
/**
 * PHP skript pro vyhodnocení kvízu
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correctAnswers = [
        'q1' => 'b',
        'q2' => 'c',
        'q3' => 'a',
        'q4' => 'c',
        'q5' => 'a',
        'q6' => 'a',
        'q7' => 'b',
        'q8' => 'a',
        'q9' => 'a',
        'q10' => 'a'
    ];

    $score = 0;
    $total = count($correctAnswers);
    $userAnswers = [];

    foreach ($correctAnswers as $q => $correct) {
        $userAnswer = $_POST[$q] ?? '';
        $userAnswers[$q] = $userAnswer;
        if ($userAnswer === $correct) {
            $score++;
        }
    }

    // Uložení výsledku do souboru
    $resultData = "--- " . date("Y-m-d H:i:s") . " ---\n";
    $resultData .= "Skóre: $score / $total\n";
    $resultData .= "Odpovědi: " . json_encode($userAnswers) . "\n";
    $resultData .= "---------------------------\n\n";
    
    file_put_contents("quiz_results.txt", $resultData, FILE_APPEND);

    // Přesměrování zpět na kvíz s výsledkem v URL
    // V reálné aplikaci by bylo lepší použít Session, ale pro tento statický web použijeme URL parametry
    header("Location: kviz.html?score=$score&total=$total");
    exit();
} else {
    header("Location: kviz.html");
    exit();
}
?>