<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check email</title>
</head>
<body>
    <h1>Kiểm tra email hợp lệ</h1>
    <form method="get">
        <label for="email-input">
            Email: <input id="email-input" type="email" name="email">
        </label>
        <button type="submit">Check</button>
    </form>
<p>{{$message}}</p>
</body>
</html>
