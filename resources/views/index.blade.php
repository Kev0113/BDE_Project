@extends('layouts.header')
@section('content')


    <div class="form-box">
        <form action="{{route('traitement')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(session('message'))
                <p style="color: red; text-align: center">ERREUR : Vous n'avez pas importé d'image..</p>
            @endif

            <div>
                <label for="sexe"> <b> Sexe : </b></label>
            </div>
            <select name="sexe" id="sexe">
                <option value="MASCULIN">Masculin</option>
                <option value="FEMME">Féminin</option>
                <option value="AUTRE">Autre</option>
            </select>

            <div>
                <label for="annéescolaire"> <b> Année d'étude : </b></label>
            </div>
            <select name="anneeScolaire" id="annéescolaire">
                <option value="1">1ère année</option>
                <option value="2">2ème année</option>
                <option value="3">3ème année</option>
            </select>

            <div>
                <label for="souhait"> <b> Souhait : </b></label>
            </div>
            <select name="souhait" id="souhait">
                <option value="PARRAIN">Parrain</option>
                <option value="MARRAINE">Marraine</option>
                <option value="AUCUNE PRÉFÉRENCE">Peu Importe</option>
            </select>

            <label>
                <input type="text" name="nom" placeholder="Nom" required>
            </label>
            <label>
                <input type="text" name="prenom" placeholder="Prénom" required>
            </label>
            <label>
                <input type="email" name="emailUniv" placeholder="Email Universitaire" required>
            </label>
            <label>
                <input type="email" name="emailPerso" placeholder="Email Personnel" required>
            </label>
            <label>
                <input type="text" name="indice1" placeholder="Premier Indice" required>
            </label>
            <label>
                <input type="text" name="indice2" placeholder="Deuxième Indice" required>
            </label>

            <div>
                <label for="imageInput"><p class="btn">Charger une image</p></label>
                <input type="file" name="image" id="imageInput">
            </div>

            <div id="imagePreview" style="display: none"></div>

            <div>
                <input type="submit" class="btn"></input>
            </div>
        </form>
    </div>
@endsection
