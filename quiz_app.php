<?php
// Quiz questions and answers
$quiz = [
    ["question" => "Who is father of the computer?", "options" => ["a) Thomas Edison", "b) Charles Babbage", "c) - Nikola Tesla"], "answer" => "b"],
    ["question" => "Which language is primarily used for web development?", "options" => ["a) Python", "b) PHP", "c) Java"], "answer" => "b"],
    ["question" => "what is the machine language?", "options" => ["a) Java", "b) Binary Code", "c) Python"], "answer" => "b"]
];

$score = 0;

function askQuestion($question, $options, $correctAnswer) {
    echo "\n" . $question . "\n";
    foreach ($options as $option) {
        echo $option . "\n";
    }

    echo "Your answer (a/b/c): ";
    $userAnswer = trim(fgets(STDIN));

    if ($userAnswer === $correctAnswer) {
        echo "✅ Correct!\n";
        return 1;
    } else {
        echo "❌ Incorrect! The correct answer was '$correctAnswer'.\n";
        return 0;
    }
}

// Running the quiz
foreach ($quiz as $q) {
    $score += askQuestion($q["question"], $q["options"], $q["answer"]);
}

// Display final score
echo "\n🏆 Quiz Completed! You got $score out of " . count($quiz) . " correct.\n";
?>