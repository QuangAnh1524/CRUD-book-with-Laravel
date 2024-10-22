<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount Result</title>
</head>
<body>
<h1>Discount Result</h1>
<p>Product Description: {{ $productDescription }}</p>
<p>List Price: ${{ number_format($price, 2) }}</p>
<p>Discount Percent: {{ $discountPercent }}%</p>
<p>Discount Amount: ${{ number_format($discountAmount, 2) }}</p>
<p>Discount Price: ${{ number_format($discountPrice, 2) }}</p>
</body>
</html>
