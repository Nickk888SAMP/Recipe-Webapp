@extends('layouts.master')

@section('content')

    {{-- Profile Update --}}
    <x-section>

        {{-- Label --}}
        <x-sectionlabel>
            Profil bearbeiten
        </x-sectionlabel>
        
        {{-- Avatar --}}
        <div class="flex justify-center mt-4">
            <img class="w-32 rounded-full" src="{{ $user->avatar() }}" alt="avatar">
        </div>

        {{-- Form --}}
        <form action="{{ route('dashboard.update.profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-4 grid md:grid-cols-2 gap-4 items-end">
                
                {{-- Display Name --}}
                <div>
                    <x-inputfieldlabel text="Anzeige name" for="displayname"/>
                    <x-inputfield name="displayname" class="w-full rounded-md" value="{{ $user->displayname }}"/>
                </div>

                {{-- Avatar Upload --}}
                <div>
                    <x-inputfieldlabel text="Profilbild" for="displayname"/>
                    <x-inputfield name="avatar" class="w-full rounded-md bg-white" accept="image/png, image/jpeg, image/bmp" type="file"/>
                </div>
                
            </div>

            {{-- Description --}}
            <div class="mt-4">
                <x-inputfieldlabel text="Beschreibung" for="displayname"/>
                <x-textfield rows="8" name="description" class="w-full rounded-md">{{ $user->description }}</x-textfield>
            </div>

            {{-- Button --}}
            <x-button class="w-full">Profil aktualisieren</x-button>
        </form>
    </x-section>

    {{-- Change Password --}}
    <x-section>

        {{-- Label --}}
        <x-sectionlabel>
            Passwort ändern
        </x-sectionlabel>

        {{-- Form --}}
        <form action="{{ route('dashboard.update.password') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-3 gap-4">

                {{-- Current Password --}}
                <div class="w-full">
                    <x-inputfieldlabel text="Aktuelles Passwort" for="current_password"/>
                    <x-inputfield type="password" name="current_password" class="w-full rounded-md"/>
                </div>

                {{-- New Password --}}
                <div class="w-full">
                    <x-inputfieldlabel text="Neues Passwort" for="current_password"/>
                    <x-inputfield type="password" name="password" class="w-full rounded-md"/>
                </div>

                {{-- Confirm Password --}}
                <div class="w-full">
                    <x-inputfieldlabel text="Passwort wiederholen" for="current_password"/>
                    <x-inputfield type="password" name="password_confirmation" class="w-full rounded-md"/>
                </div>
            </div>

            {{-- Button --}}
            <x-button class="w-full">Passwort ändern</x-button>
        </form>
    </x-section>
@endsection