@extends('user.layouts.master')

@section('title')
    Inscription
@endsection

@section('content')
    <section class="section login">
        <div class="login-content">
            <span class="login-icon">
                <i class="fi fi-rr-user"></i>
            </span>
            <h2 class="login-subtitle">Inscription</h2>
            @if ($errors)
                @foreach ($errors->all() as $item)
                    <p style="color: #eb4949">{{ $item }}</p>
                @endforeach
            @endif
            <form action="{{ Route('inscription') }}" method="post" class="form">
                @csrf
                <div class="login-main-content">
                    <div class="form-content">
                        <label for="" class="form-label">Nom</label>
                        <span class="form-icon">
                            <i class="fi fi-rr-user"></i>
                        </span>
                        <input type="text" name="fname" id="" class="form-input" placeholder="John">
                    </div>
                    <div class="form-content">
                        <label for="" class="form-label">Prenom</label>
                        <span class="form-icon">
                            <i class="fi fi-rr-user"></i>
                        </span>
                        <input type="text" name="lname" id="" class="form-input" placeholder="Doe">
                    </div>
                </div>
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
                <div class="form-content">
                    <label for="" class="form-label">Confirmation du mot de passe</label>
                    <span class="form-icon">
                        <i class="fi fi-rr-lock"></i>
                    </span>
                    <input type="password" name="password-confirm" class="form-input" placeholder="********">
                </div>
                <button type="submit" class="btn btn-primary">Inscrire</button>
            </form>
            <p class="para-primary">
                Vous arez deja un compte ?
                <a href="{{ url('/login') }}" class="form-link">
                    Connectez-vous
                </a>
            </p>
        </div>
    </section>
@endsection

<script>
    
</script>
