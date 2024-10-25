<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $question = $_POST['question'];

    // Split question into words
    $keywords = explode(" ", $question);

    $found_answer = false;
    foreach ($keywords as $keyword) {
        $sql = "SELECT answer FROM  keywords WHERE category='$category' AND keyword LIKE '%$keyword%'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['answer'];
            $found_answer = true;
            break;
        }
    }

    if (!$found_answer) {
        echo "Sorry, I couldn't find an answer to your question.";
    }
}

$con->close();
?>
