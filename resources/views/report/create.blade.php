<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <a href="../reports" >Назад</a>

    <form action="{{route('reports.store')}}" method="POST">
        @csrf
        <input type="text" name="number" placeholder="Номер авто"><br>
        <textarea name="description" placeholder="Описание заявки"></textarea><br>
        <input type="submit" value="Создать продукт">
    </form>
</body> 
</html>

<style>
    a{
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        width: 100px;
        height: 25px;
        border: 1px solid;
        text-decoration: none;
        color: black;
        background-color: #d1d1d1ff;
        margin-bottom: 24px;
    }
</style>