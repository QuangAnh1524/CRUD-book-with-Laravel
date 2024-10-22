<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dictionary</title>
</head>
<body>
<form action="/display-dictionary" method="post">
    @csrf
    <p>
    <label>
        Nhập từ Tiếng Anh muốn tra: <input type="text" name="word">
    </label>
    </p>
    <p>
        <button type="submit">Dịch</button>
    </p>
</form>
</body>
</html>
