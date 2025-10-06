<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('reports.store')}}" method="POST">
        @csrf
        <input type="text" name="number" placeholder="Название продукта"><br>
        <textarea name="description" placeholder="Описание"></textarea><br>
        <input type="submit" value="Создать продукт">
    </form>
</body>
</html>