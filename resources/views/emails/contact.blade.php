<!DOCTYPE html>
<html>
<head>
    <title>Nouveau message de contact</title>
</head>
<body>
    <h1>Nouveau message de contact de {{ $details['name'] }}</h1>
    <p>Email : {{ $details['email'] }}</p>
    <p>Message :</p>
    <p>{{ $details['message'] }}</p>
</body>
</html>
