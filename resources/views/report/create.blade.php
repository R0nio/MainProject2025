<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создание репорта') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="../reports" class="button_a">Назад</a>

            <form action="{{route('reports.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="number" placeholder="Номер авто" required><br>
                <textarea name="description" placeholder="Описание заявки" required></textarea><br>
                <div class="flex">
                    <label for="">Выбери файл</label>
                    <input type="file" id="path_img" class="block mt-1 bg-gray-200" name="path_img" required>
                </div>
                <input type="submit" value="Создать продукт" style="padding: 4px; border: 1px solid black; ">
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