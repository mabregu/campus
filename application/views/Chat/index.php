<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Chat</title>

        <link rel="stylesheet" href="<?php echo base_url() ?>/publico/chat/style.css" type="text/css" />

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript">
            var instanse = false;
            var state;
            var mes;
            var file;

            function Chat() {
                this.update = updateChat;
                this.send = sendChat;
                this.getState = getStateOfChat;
            }

            //gets the state of the chat
            function getStateOfChat() {
                if (!instanse) {
                    instanse = true;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('index.php/Chat/process') ?>",
                        data: {
                            'function': 'getState',
                            'file': file
                        },
                        dataType: "json",

                        success: function (data) {
                            state = data.state;
                            instanse = false;
                        },
                    });
                }
            }

            //Updates the chat
            function updateChat() {
                if (!instanse) {
                    instanse = true;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('index.php/Chat/process') ?>",
                        data: {
                            'function': 'update',
                            'state': state,
                            'file': file
                        },
                        dataType: "json",
                        success: function (data) {
                            if (data.text) {
                                for (var i = 0; i < data.text.length; i++) {
                                    $('#chat-area').append($("<p>" + data.text[i] + "</p>"));
                                }
                            }
                            document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
                            instanse = false;
                            state = data.state;
                        },
                    });
                } else {
                    setTimeout(updateChat, 1500);
                }
            }

            //send the message
            function sendChat(message, nickname)
            {
                updateChat();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('index.php/Chat/process') ?>",
                    data: {
                        'function': 'send',
                        'message': message,
                        'nickname': nickname,
                        'file': file
                    },
                    dataType: "json",
                    success: function (data) {
                        updateChat();
                    },
                });
            }
            // ask user for name with popup prompt    
            //var name = prompt("Enter your chat name:", "Apodo");
            var name = $('#nombreUsuario').val();

            // default name is 'Apodo'
            if (!name || name === ' ') {
                name = "Apodo";
            }

            // strip tags
            name = name.replace(/(<([^>]+)>)/ig, "");

            // display name on page
            $("#name-area").html("You are: <span>" + name + "</span>");

            // kick off chat
            var chat = new Chat();
            $(function () {

                chat.getState();

                // watch textarea for key presses
                $("#sendie").keydown(function (event) {

                    var key = event.which;

                    //all keys including return.  
                    if (key >= 33) {

                        var maxLength = $(this).attr("maxlength");
                        var length = this.value.length;

                        // don't allow new content if length is maxed out
                        if (length >= maxLength) {
                            event.preventDefault();
                        }
                    }
                });
                // watch textarea for release of key press
                $('#sendie').keyup(function (e) {

                    if (e.keyCode == 13) {

                        var text = $(this).val();
                        var maxLength = $(this).attr("maxlength");
                        var length = text.length;

                        // send 
                        if (length <= maxLength + 1) {

                            chat.send(text, name);
                            $(this).val("");

                        } else {

                            $(this).val(text.substring(0, maxLength));

                        }


                    }
                });

            });
        </script>

    </head>

    <body onload="setInterval('chat.update()', 1000)">
        <br>
        <div id="page-wrap">        
            <p id="name-area"></p>
            <div id="chat-wrap"><div id="chat-area"></div></div>
            <form id="send-message-area">
                <textarea id="sendie" maxlength = '100' class="form-control input-sm" 
                          placeholder="Escriba aquí su mensaje..."></textarea>
            </form>
        </div>
    </body>

</html>