<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Email</title>
</head>

<body>

    <p>Admin Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta, cupiditate, doloremque voluptas autem
        inventore ea voluptatum facere sapiente rem aperiam nisi provident, ipsa dolores quidem aspernatur dignissimos
        iusto omnis harum!</p>
    <div class="">
        @foreach ($info as $x => $x_value)
            <p>{{ $x . ' : ' . $x_value }}</p> <br />
        @endforeach
    </div>
    <table>
        <tr>
            <td>name</td>
            <td>qty</td>
            <td>price</td>
            <td>commition</td>
            <td>Total Price</td>
            <td>Total commition</td>
        </tr>
        @foreach ($info2 as $i => $item)
            <tr>
                <td> {{ $item['name'] }}</td>
                <td> {{ $item['qty'] }}</td>
                <td> {{ $item['price'] }}</td>
                <td> {{ $item['commition'] }}</td>
                <td> {{ $item['qty'] * $item['price'] }}</td>
                <td> {{ $item['qty'] * $item['commition'] }}</td>
            </tr>
        @endforeach
    </table>
    <div class="">
        @foreach ($arra as $x => $x_value)
            <p>{{ $x . ' : ' . $x_value }}</p> <br />
        @endforeach
    </div>
</body>

</html>
