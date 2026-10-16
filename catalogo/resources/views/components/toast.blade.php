@if(session('status'))
    @if(session('status') === 'success')
        <div class="ml-4 mb-6 flex items-center gap-3.5 bg-green-500/[0.06] border border-green-400/35 rounded-2xl px-5 py-4 shadow-lg shadow-green-400/15">
            <span class="bg-green-400/20 text-green-400 rounded-full p-1 flex-shrink-0">
                <x-icon-check />
            </span>
            <span class="text-green-300 text-sm">{{ session('mensaje') }}</span>
        </div>
    @else
        <div class="ml-4 mb-6 flex items-center gap-3.5 bg-red-500/[0.06] border border-red-400/35 rounded-2xl px-5 py-4 shadow-lg shadow-red-400/15">
            <span class="text-red-400 flex-shrink-0">
                <x-icon-warning />
            </span>
            <span class="text-red-300 text-sm">{{ session('mensaje') }}</span>
        </div>
    @endif
@endif
