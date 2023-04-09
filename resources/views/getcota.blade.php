<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Email</title>
</head>

<body>

    <p>User Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta, cupiditate, doloremque voluptas autem
        inventore ea voluptatum facere sapiente rem aperiam nisi provident, ipsa dolores quidem aspernatur dignissimos
        iusto omnis harum!</p>


    {{-- @dd($data); --}}


    @foreach ($data as $x => $x_value)
        <p>{{ $x . ' : ' . $x_value }}</p> <br />
    @endforeach

</body>

</html>
