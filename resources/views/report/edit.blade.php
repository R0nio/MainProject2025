<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Обновление репорта') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="../" class="button_a">Назад</a>

            <form action="{{route('reports.update', $report->id)}}" method="POST">
                @csrf
                @method('put')
                <input type="text" name="number" placeholder="Номер" value="{{$report->number}}"><br>
                <textarea name="description" placeholder="Описание заявки">{{$report->description}}</textarea><br>
                <input type="submit" style="padding: 4px; border: 1px solid black; " value="Обновить">
            </form>

        </div>
    </div>
</x-app-layout>


<style>
    .button_a {
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
