@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mon compte</h1>
    <hr>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link" href="#">Mes commandes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Mes informations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Mes adresses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Mes newsletters</a>
        </li>
    </ul>
    <hr>
    <form action="{{ route('user.account.update') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="lastname">Nom</label>
            <input type="text" name="lastname" class="form-control" value="{{ $user->person->lastname }}" id="lastname" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" class="form-control" value="{{ $user->person->firstname }}" id="firstname" placeholder="Prénom">
        </div>
        <div class="form-group">
            <label for="gender">Genre</label>
            <select class="form-control" name="gender" id="gender">
                <option value=""></option>
                <option value="m" {{ ($user->person->gender == 'm' ? 'selected' : '') }}>Homme</option>
                <option value="f" {{ ($user->person->gender == 'f' ? 'selected' : '') }}>Femme</option>
                <option value="other" {{ ($user->person->gender == 'other' ? 'selected' : '') }}>Autre</option>
            </select>
        </div>
        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" id="username" placeholder="Nom d'utilisateur">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Nouveau mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
        </div>
        <div class="form-group">
            <label for="birth_date">Date de naissance</label>
            <input type="date" name="birth_date" class="form-control" value="{{ $user->birth_date }}" id="birth_date" placeholder="Date de naissance">
        </div><hr>
        <button type="submit" class="btn btn-primary">Mettre à jour mon compte</button>
    </form>
</div>
@endsection