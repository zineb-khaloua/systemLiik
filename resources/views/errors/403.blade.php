
@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1 class="text-danger">Accès refusé</h1>
    <p class="fs-5">Vous n'avez pas le droit d'accéder à cette page.</p>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">
        Retour au tableau de bord
    </a>
</div>
@endsection



