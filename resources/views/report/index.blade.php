<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <header>
        <div>
            <h1>Нарушений<span class="logo_red">.Нет</span></h1>
            <div class="headere_login">
                <p>Носова Ольга Петровна</p>
                <button class="">></button>
            </div>
        </div>
    </header>

    <main>
        <a href="../reports/create">Создать</a>
        <div>
            @foreach ($reports as $report)
            <div style="display:flex; width: 60%; justify-content:space-between;border: 1px solid">
                <p>{{ $report->number }}</p>
                <p>{{ $report->description }}</p>
                <p>{{ $report->status_id }}</p>
                <form method="POST" action="{{route('reports.destroy', $report->id)}}">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete">
                </form>
                <a href="{{ route('reports.edit', $report->id) }}">Edit</a>
            </div>
            <br>
            @endforeach
        </div>
    </main>
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
        margin: 24px 0px;
    }
</style>