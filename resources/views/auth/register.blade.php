@extends('layouts.master')

@section('content')
    <section id="register">
        <h1 class="text-3xl w-full text-center mb-4 font-lg">Konto Erstellen</h1>
        <div class="shadow-xl p-4 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Username --}}
                <div>
                    <x-input-field-label text="Benutzername" for="username"/>
                    <x-input-field name="username"/>
                </div>

                {{-- Display Name --}}
                <div>
                    <x-input-field-label text="Anzeigename" for="displayname"/>
                    <x-input-field/>
                </div>

                {{-- Email --}}
                <div>
                    <x-input-field-label text="Email" for="email"/>
                    <x-input-field/>
                </div>

                {{-- Password --}}
                <div>
                    <x-input-field-label text="Passwort" for="password"/>
                    <x-input-field/>
                </div>
                
            </div>

            {{-- Button --}}
            <button class="w-full text-white mt-4 rounded-full p-2 bg-orange-500">Anmelden</button>
        </div>
    </section>
@endsection