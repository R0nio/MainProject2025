@props(['sort', 'status'])
<div>
    <div class=" max-sm:gap-2">
        <a href="{{ route('reports.index') }}" class="button_a"
            style="width:200px">Сбросить</a>
        <span>Сортировка по дате создания:</span>

        <div class="flex gap-3">
            <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}" class="button_a"
                style="width:200px">Сначала новые</a>
            <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}" class="button_a"
                style="width:200px">Сначала старые</a>
        </div>

    </div>
    <div>
        <p>Фильтрация по статусу заявки</p>
        <ul class="flex flex-row gap-3 max-lg:flex-col">
            @foreach ($statuses as $status)
            <li style="width: 200px;" class="">
                <a href="{{ route('reports.index', ['sort' => $sort, 'status' => $status->id]) }}"
                    class="button_a">
                    {{ $status->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
