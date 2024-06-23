<div>

    {{-- Header (If Defined) --}}
    @hasSection('header')
    <div class="bg-white p-4 border-b border-gray-150">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                @yield('header')
            </h3>
        </div>
    @endif

    {{-- Content --}}
    <div class="bg-white p-4">
        <div class="space-y-6">
            @yield('content')
        </div>
    </div>

    {{-- Footer --}}
    <div class="bg-white pt-2 pr-4 pb-4 pl-4">
        @yield('footer')
    </div>

</div>