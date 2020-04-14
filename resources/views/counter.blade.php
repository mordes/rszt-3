<!DOCTYPE html>
<html>
    <head>
        <title>Pusher Test</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
        <script>
            Pusher.logToConsole = true;

            var pusher = new Pusher('46fe423c6390703589a8', {
                cluster: 'eu',
                forceTLS: true
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('form-submitted', function(data) {
                var tipp = JSON.parse(JSON.stringify(data));
                document.getElementById('#priceplace').innerHTML = tipp.text;
            });
        </script>
    </head>
    <body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>
    <div id="priceplace"></div>
    </body>
</html>
