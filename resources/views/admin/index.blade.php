<x-app-layout>
    <h1>Админ панель</h1>
    <div class="grid grid-cols-1 m-16 gap-4">
        @foreach ($reports as $report)
        <div class="border-2 border-gray-300 w-auto p-8 flex justify-between max-md:flex-wrap max-md:gap-4">
            <div>
                <h3>ФИО</h3>
                <p>{{ $report->user->name }} {{$report->user->middlename}} {{$report->user->lastname}}</p>
            </div>
            <div>
                <h3 class="max-w-[300px] ">Описание заявления</h3>
                <p>{{ $report->description }}</p>
            </div>
            <div>
                <h3>Номер автомобиля</h3>
                <p>{{ $report->number }}</p>
            </div>
            <div>
                <form class="status-form" method="post" action="{{ route('reports.status.update', $report->id ) }}">
                    @method('patch')
                    @csrf

                    @if ($report->status_id !== 1)
                    <p class="border-2 border-blue-600 p-2 min-w-[162px] text-center">{{$report->status->name}}</p>
                    @else
                    <select name="status_id" id="status_id">
                        @foreach ($statuses as $status )
                        <option value="{{$status->id}}" {{$status->id === $report->status_id ? 'selected' : ''}} {{$report->status_id !== 1 ? 'disabled': ''}}>
                            {{ $status->name }}
                        </option>
                        @endforeach
                    </select>
                    @endif
                </form>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>