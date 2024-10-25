<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $query = $_POST['query'];

    $sql = "SELECT DISTINCT keyword FROM keywords WHERE category='$category' AND keyword LIKE '%$query%'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='suggestion'>" . $row['keyword'] . "</div>";
        }
    } else {
        echo "<div class='suggestion'>No suggestions found</div>";
    }
}

$con->close();
?>
