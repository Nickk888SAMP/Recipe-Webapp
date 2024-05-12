@extends('layouts.master')

@section('content')
<x-section>
    <div class="flex flex-col justify-center items-center">
        <p class="text-404 text-primary">404</p>
        <p class="text-2xl text-center">
            Huch! Hier ist wohl etwas schiefgelaufen. 
            <br>
            Diese Seite ist verschwunden wie der letzte Bissen deines Lieblingsgerichts - einfach unauffindbar!
            <br><br>
            Hier ist ein <a class="font-semibold text-primary" href="#">Keksrezept</a> zur Aufmunterung. 
            <br>
            Oder versuche es erneut mit einer anderen Seite!
        </p>
    </div>
</x-section>
@endsection