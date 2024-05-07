@extends('layouts.master')

@section('content')

<section id="register" class="mx-auto md:w-[50%] shadow-xl my-16 md:my-32">

    <h1 class="text-2xl text-semibold mb-2 font-md flex justify-center">Jetzt einloggen</h1>
    <div class="p-4 rounded-lg">

        <form action="{{ route('auth.login.login') }}" method="POST">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                {{-- <x-input-field-label text="Email" for="email"/> --}}
                <x-input-field name="email" type="email" class="rounded-md" placeholder="Email" value="{{ old('email') }}"/>
            </div>
            
            {{-- Password --}}
            <div class="mb-4">
                {{-- <x-input-field-label text="Passwort" for="password"/> --}}
                <x-input-field class="w-full" name="password" type="password" class="rounded-md" placeholder="Passwort"/>
            </div>

            {{-- Button --}}
            <button class="w-full text-white font-semibold mt-4 rounded-full p-2 bg-orange-500">Einloggen</button>
        </form>

        {{-- Already an account --}}
        <p class="mt-8 font-medium flex justify-center">Du hast noch kein Kochbuch-Konto?</p>
        <div class="mt-4 flex justify-center">
            <a class="text-orange-500 font-semibold" href="{{ route('auth.register.index') }}">Neues Konto erstellen</a>
        </div>
    </div>

</section>

@endsection