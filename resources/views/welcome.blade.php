<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


       
    </head>
    <body class="antialiased">
        <ul>
            @foreach ($category as $categoryItem)
                <li>{{ $categoryItem->name }}</li>
                <ul>
                @foreach ($categoryItem->subCategories as $childCategory)
                    @include('child_cate', ['child_cate' => $childCategory])
                @endforeach
                </ul>
            @endforeach
        </ul>
    </body>
</html>
