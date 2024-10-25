function getAnswer() {
    let category = document.getElementById('category').value;
    let question = document.getElementById('question').value;

    // Append the user's question to the chat history
    appendMessage('user-message', question);

    // Perform an AJAX request to fetch the answer from the server
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'chat.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Append the bot's response to the chat history
            appendMessage('bot-response', xhr.responseText);
        } else {
            // Handle error case
            appendMessage('bot-response', 'Sorry, there was an error processing your request.');
        }
    };

    // Send the request with the category and question as parameters
    xhr.send(`category=${encodeURIComponent(category)}&question=${encodeURIComponent(question)}`);

    // Clear the input field
    document.getElementById('question').value = '';
}

function appendMessage(type, message) {
    const chatHistory = document.getElementById('chat-history');
    const messageBubble = document.createElement('div');
    messageBubble.className = `chat-bubble ${type}`;
    messageBubble.innerText = message;
    chatHistory.appendChild(messageBubble);

    // Scroll to the bottom of the chat history
    chatHistory.scrollTop = chatHistory.scrollHeight;
}

function clearChat() {
    const chatHistory = document.getElementById('chat-history');
    chatHistory.innerHTML = ''; // Clear the chat history by setting the innerHTML to an empty string
}

$(document).ready(function(){
    $('#search').on('input', function(){
        let query = $(this).val();
        
        if (query.length > 0) {
            $.ajax({
                url: 'suggestions.php',  // The server-side script URL
                method: 'POST',           // Method (POST or GET)
                data: { query: query },   // Data to send (the search term)
                success: function(data) { // Function to execute on success
                    $('#suggestion-box').html(data);
                },
                error: function(xhr, status, error) { // Function to execute on error
                    console.error('AJAX Error:', status, error);
                }
            });
        } else {
            $('#suggestion-box').html(''); // Clear suggestions if input is empty
        }
    });
});

document.addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('suggestion')) {
        document.getElementById('question').value = e.target.innerText;
        document.getElementById('suggestion-box').innerHTML = "";
    }
});

