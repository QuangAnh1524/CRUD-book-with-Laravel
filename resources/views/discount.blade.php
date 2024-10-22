<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Discount Calculator</title>
</head>
<body>
<form action="/display-discount" method="post">
    @csrf
    <p>
    <label>
        Product Description: <input type="text" name="desc">
    </label>
    </p>
    <p>
        <label>
            List Price: <input type="number" name="price">
        </label>
    </p>
    <p>
        <label>
            Discount Percent: <input type="number" name="percent">
        </label>
    </p>
    <button type="submit">Calculate</button>
</form>
</body>
</html>
