<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Chatbot Dashboard</title>
</head>
<body>
        <div class="dashboard-container">
        <h2>Select Category</h2>
        <select id="category">
            <option value="academics">Academics</option>
            <option value="hostels">Hostels</option>
            <option value="admission">Admission</option>
            <option value="faculties">About college</option>
        </select>
        <h2>Ask a Question</h2>
        <input type="text" id="question" placeholder="Type your question here">
        <div id="suggestion-box">

          </div>
        <button id="submit" onclick="getAnswer()">Submit</button>
        
        
        </div>

	    <div class="display-container">
            <div id="chat-history">
                <!-- Chat history will be appended here -->
            </div>
            
            <button id="clear" onclick="clearChat()">Clear Chat</button>
	    </div>


	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="script.js"></script>

</body>
</html>


