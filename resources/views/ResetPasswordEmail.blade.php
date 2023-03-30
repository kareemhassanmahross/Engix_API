<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere veniam molestias ipsum tenetur dolorem tempore
    porro, aliquam, neque et ab quod repellat optio enim quia cumque recusandae esse. Aut, voluptatum.

    {{-- <form action="{{ route('resetPasswordFromEmail') }}" method="get">
        <button type="submit" class="btn btn-link">Link</button>
    </form> --}}
    {{-- @dd($id) --}}
    <a href="http://127.0.0.1:8000/api/reset/{{ $id }}" class="btn btn-primary">Reset
        Password</a>



</body>

</html>
