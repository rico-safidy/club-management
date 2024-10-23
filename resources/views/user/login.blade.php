@extends('user.layouts.master')

@section('title')
    Connexion
@endsection

@section('content')
    <section class="section login">
        <div class="login-content">
            <span class="login-icon">
                <i class="fi fi-rr-user"></i>
            </span>
            <h2 class="login-subtitle">Connexion</h2>
            @if ($errors)
                @foreach ($errors->all() as $item)
                    <p style="color: #df4343">{{ $item }}</p>
                @endforeach
            @endif
            <form action="{{ Route('connexion') }}" method="post" class="form">
                @csrf
                <div class="form-content">
                    <label for="" class="form-label">Email</label>
                    <span class="form-icon">
                        <i class="fi fi-rr-envelope"></i>
                    </span>
                    <input type="email" name="email" id="" class="form-input" placeholder="exemple@gmail.com">
                </div>
                <div class="form-content">
                    <label for="" class="form-label">Mot de passe</label>
                    <span class="form-icon">
                        <i class="fi fi-rr-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-input" placeholder="********">
                </div>
                <button type="submit" class="btn btn-primary" id="login-btn">Connexion</button>
            </form>
            <p class="para-primary login-para">
                Vous n'avez pas encore un compte ?
                <a href="{{ url('/signin') }}" class="form-link">
                    Inscrivez-vous
                </a>
            </p>
        </div>
    </section>

@endsection
