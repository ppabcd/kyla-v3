<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Messages Page</title>
        <style media="screen">
            *{
                margin: 0;
                padding :0;
            }
            .container{
                width: 80%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Messenger</h1>
            <form class="" action="send_messages" method="post">
                Messages : <textarea name="messages" rows="8" cols="80"></textarea><br>
                Select Type :
                <select name="type">
                    <option value="1">Group</option>
                    <option value="2">Moderator Cermin Diskusi</option>
                </select>
                <button type="submit" name="">Submit</button>
            </form>
        </div>
    </body>
</html>
