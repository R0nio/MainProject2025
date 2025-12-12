@session('success')
<div id="alert-1" class="flex sm:items-center mx-auto mt-4 p-4 text-xl text-fg-brand-strong rounded-base bg-brand-softer max-w-[400px] bg-green-500 " role="alert">
    <svg class="w-4 h-4 shrink-0 mt-0.5 md:mt-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    <span class="sr-only">Success</span>
    <div class="ms-2 text-sm">
        {{$value}}
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 rounded focus:ring-2 focus:ring-brand-medium hover:bg-brand-soft inline-flex items-center justify-center h-8 w-8 shrink-0 shrink-0" data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
        </svg>
    </button>
</div>
@endsession

@session('error')
<div id="alert-1" class="flex sm:items-center p-4 mx-auto mt-4  text-xl text-fg-brand-strong rounded-base bg-brand-softer  max-w-[400px] bg-red-500" role="alert">
    <svg class="w-4 h-4 shrink-0 mt-0.5 md:mt-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    <span class="sr-only">Error</span>
    <div class="ms-2 text-sm">
        {{$value}}
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 rounded focus:ring-2 focus:ring-brand-medium hover:bg-brand-soft inline-flex items-center justify-center h-8 w-8 shrink-0 shrink-0" data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
        </svg>
    </button>
</div>
@endsession

@session('warning')
<div id="alert-1" class="flex sm:items-center p-4 mx-auto mt-4  text-xl text-fg-brand-strong rounded-base bg-brand-softer  max-w-[400px] bg-yellow-300" role="alert">
    <svg class="w-4 h-4 shrink-0 mt-0.5 md:mt-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    <span class="sr-only">Warning</span>
    <div class="ms-2 text-sm">
        {{$value}}
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 rounded focus:ring-2 focus:ring-brand-medium hover:bg-brand-soft inline-flex items-center justify-center h-8 w-8 shrink-0 shrink-0" data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
        </svg>
    </button>
</div>
@endsession

@session('info')
<div id="alert-1" class="flex sm:items-center p-4 mx-auto mt-4 text-xl text-fg-brand-strong rounded-base bg-brand-softer max-w-[400px] bg-blue-500" role="alert">
    <svg class="w-4 h-4 shrink-0 mt-0.5 md:mt-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div class="ms-2 text-sm">
        {{$value}}
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 rounded focus:ring-2 focus:ring-brand-medium hover:bg-brand-soft inline-flex items-center justify-center h-8 w-8 shrink-0 shrink-0" data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
        </svg>
    </button>
</div>
@endsession

@if ($errors->any())
<div id="alert-1" class="flex sm:items-center p-4 mx-auto mt-4 text-xl text-fg-brand-strong rounded-base bg-brand-softer  max-w-[400px] bg-red-600" role="alert">
    <svg class="w-4 h-4 shrink-0 mt-0.5 md:mt-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    <span class="sr-only">Errors</span>
    <div class="ms-2 text-sm">
        <p>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </p>
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 rounded focus:ring-2 focus:ring-brand-medium hover:bg-brand-soft inline-flex items-center justify-center h-8 w-8 shrink-0 shrink-0" data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
        </svg>
    </button>
</div>
@endif
