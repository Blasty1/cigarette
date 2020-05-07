@extends('layouts.layout_pre')

@section('content')
<main>
    <div class="wrapper">
        <div class="form-user">

            <form method="post" action="{{route('login')}}" class="form-entry">
                @csrf
                <div class="title">
                    <h2 class="form-title">Entra nella tua area contabile </h2>
                </div>
                @error('email')
                     <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="email" class="input" name="email" placeholder="Email">
               @error('password')
                     <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="password" class="password" placeholder="Password" name="password">
                <input type="submit" value="Conferma" class="button-confirm">

                
            </form>




        </div>
        <div>


</main>

@endsection
