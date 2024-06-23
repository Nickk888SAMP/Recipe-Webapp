@extends('layouts.master')

@section('content')

    <section id="register" class="mx-auto md:w-[50%] shadow-xl my-16 md:my-32">
        
        <h1 class="text-2xl text-semibold mb-2 font-md flex justify-center">Neues Konto erstellen</h1>
        <div class="p-4 rounded-lg">

            <form action="{{ route('auth.register.register') }}" method="POST">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    {{-- <x-input-field-label text="Email" for="email"/> --}}
                    <x-input-field name="email" type="email" class="rounded-md w-full" placeholder="Email" value="{{ old('email') }}"/>
                </div>
                
                {{-- Password --}}
                <div class="mb-4">
                    {{-- <x-input-field-label text="Passwort" for="password"/> --}}
                    <x-input-field name="password" type="password" class="rounded-md w-full" placeholder="Passwort"/>
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    {{-- <x-input-field-label text="Passwort" for="password"/> --}}
                    <x-input-field name="password_confirmation" type="password" class="rounded-md w-full" placeholder="Passwort wiederholen"/>
                </div>
                
                {{-- Display Name --}}
                <div class="mb-4">
                    {{-- <x-input-field-label text="Anzeigename" for="displayname"/> --}}
                    <x-input-field name="display_name" class="rounded-md w-full" placeholder="Anzeigename"  value="{{ old('display_name') }}"/>
                </div>

                {{-- Button --}}
                <x-button class="w-full">Konto estellen</x-button>
            </form>

            {{-- Already an account --}}
            <p class="mt-8 font-medium flex justify-center">Du hast bereits ein Das Kochbuch-Konto?</p>
            <div class="mt-4 flex justify-center">
                <a class="text-primary font-semibold" href="{{ route('auth.login.index') }}">Jetzt einloggen</a>
            </div>
        </div>

    </section>

@endsection