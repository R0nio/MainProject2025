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
            <!-- <div class="headere_login">
                <p>Носова Ольга Петровна</p>
                <button class="">></button>
            </div> -->
        </div>
    </header>

    <main>
        <a href="../reports/create">Создать</a>
        <div>
            <x-app-layout>
            <div>
                <span>Сортировка по дате создания:</span>
                <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}" style="width:200px">Сначала новые</a>
                <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}" style="width:200px">Сначала старые</a>
            </div>
            <div>
                <p>Фильтрация по статусу заявки</p>
                <ul>
                    @foreach($statuses as $status)
                        <li>
                            <a href="{{ route('reports.index', ['sort' => $sort, 'status' => $status->id]) }}">
                                {{$status->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @foreach ($reports as $report)
            <div class="card">
                <p>{{ $report->number }}</p>
                <p class="card_description">{{ $report->description }}</p>
                <p>{{ $report->status->name }}</p>
                <p>{{ $report->created_at }}</p>
                <form method="POST" action="{{route('reports.destroy', $report->id)}}">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete">
                </form>
                <a href="{{ route('reports.edit', $report->id) }}">Edit</a>
            </div>
            <br>
            @endforeach
            {{ $reports->links() }}
            </x-app-layout>
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
    .card{
        display:flex;
        width: 60%;
        justify-content:space-between;
        align-items: center;
        border: 1px solid;
        padding: 12px;
    }
    .card_description{
        width: 400px;
    }
    svg{
        width: 50px;
        height: 50px;
    }
</style>