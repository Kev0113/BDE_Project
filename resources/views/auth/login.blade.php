@extends('layouts.header')
@section('content')

    <div class="form-box">
        <form action="{{route('next')}}" method="POST" enctype="multipart/form-data">
            @csrf


            <label>
                <input type="password" name="pwd" placeholder="Mots de passe.." required>
            </label>
            <div>
                <input type="submit" class="btn"></input>
            </div>
        </form>

@endsection
