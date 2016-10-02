<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Create Event</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Create Event</h1>
            <form method = 'get' action = '{{url("event")}}'>
                <button class = 'btn btn-danger'>Event Index</button>
            </form>
            <br>
            <form method = 'POST' action = '{{url("event")}}'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="form-group">
                    <label for="event_title">event_title</label>
                    <input id="event_title" name = "event_title" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="event_type">event_type</label>
                    <input id="event_type" name = "event_type" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="event_date">event_date</label>
                    <input id="event_date" name = "event_date" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="event_desc">event_desc</label>
                    <input id="event_desc" name = "event_desc" type="text" class="form-control">
                </div>
                
                
                <button class = 'btn btn-primary' type ='submit'>Create</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
