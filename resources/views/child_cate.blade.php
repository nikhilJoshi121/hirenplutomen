<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <li>{{ $child_cate->name }}</li>
        @if ($child_cate->categories)
            <ul>
                @foreach ($child_cate->categories as $childCategory)
                    @include('child_cate', ['child_cate' => $childCategory])
                @endforeach
            </ul>
        @endif
    </li>
</body>
</html>