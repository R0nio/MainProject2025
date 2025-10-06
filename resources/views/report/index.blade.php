<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
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
            </div>
            <br>
            @endforeach
        </div>
    </main>
</body>
</html>