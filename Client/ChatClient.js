window.addEventListener('load', loadChat, false);

function showMessage(messageHTML) {
	$('#chat-box').append(messageHTML);
}

function loadChat(){
	var websocket = new WebSocket('ws://localhost:9000'); 
	websocket.onopen = function(event) { 
		showMessage("<div class='chat-connection-ack'>Start chatting!</div>");		
	}
	websocket.onmessage = function(event) {
		var Data = JSON.parse(event.data);
		showMessage("<div class='" + Data.message_type + "'>" + Data.message + "</div>");
		$('#chat-message').val('');
	};
	
	websocket.onerror = function(event){
		showMessage("<div class='error'>Oh no! Something bad happened. How embarrassing</div>");
	};
	websocket.onclose = function(event){
		showMessage("<div class='chat-connection-ack'>Conversation over</div>");
	}; 

	
	$('#frmChat').on("submit",function(event){
		event.preventDefault();
		$('#chat-user').attr("type","hidden");		
		var messageJSON = {
			chat_user: $('#chat-user').val(),
			chat_message: $('#chat-message').val()
		};
		websocket.send(JSON.stringify(messageJSON));
		showMessage("<div class='" + messageJSON.chat_user + "'>" + messageJSON.chat_message + "</div>")
	});
};