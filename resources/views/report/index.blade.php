@props(['sort', 'status'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Все репорты') }}
        </h2>
    </x-slot>

    <div class="py-12 max-lg:mx-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="../reports/create" class="button_a">Создать</a>


            <div>
                <div style="display: flex; gap:24px; " class="max-sm:flex-wrap max-sm:justify-center">

                    <x-filter :sort=$sort :status=$status></x-filter>
                </div>
                @foreach ($reports as $report)
                <div class="card max-sm:flex-wrap">
                    <p style="margin-right: 4px;">{{ $report->number }}</p>
                    <p class="card_description">{{ $report->description }}</p>
                    <p style="margin-right: 4px;">{{ $report->status->name }}</p>
                    <p>{{ \Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i'); }}</p>
                    <x-status :type="$report->status->id">
                        {{ $report->status->name }}
                    </x-status>

                    <form method="POST" action="{{ route('reports.destroy', $report->id) }}"
                        style="padding: 4px; border: 1px solid black; margin-right: 8px;">
                        @method('delete')
                        @csrf
                        <input type="submit" value="Delete">
                    </form>

                    <a href="{{ route('reports.edit', $report->id) }}" class="button_a">Edit</a>
                </div>
                <br>
                @endforeach
                {{ $reports->links() }}
            </div>
        </div>
    </div>
</x-app-layout>



<style>
    .button_a {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        width: auto;
        height: 40px;
        border: 1px solid;
        text-decoration: none;
        color: black;
        background-color: #d1d1d1ff;
        margin: 24px 0px;
    }

    .card {
        display: flex;
        width: auto;
        justify-content: space-between;
        align-items: center;
        border: 1px solid;
        padding: 12px;
    }

    .card_description {
        width: 400px;
    }

    svg {
        width: 50px;
        height: 50px;
    }
</style>