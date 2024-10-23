@extends('user.layouts.master')

@section('title')
    Modification profile
@endsection

@section('content')
    <section class="section login">
        <div class="login-content">
            <span class="login-icon">
                <i class="fi fi-rr-user"></i>
            </span>
            <h2 class="login-subtitle">Modification profile</h2>
            @if ($errors)
                @foreach ($errors->all() as $item)
                    <p style="color: #eb4949">{{ $item }}</p>
                @endforeach
            @endif
            @if (Session('message'))
                <p style="color: #2c811b">{{ Session('message') }}</p>
            @endif
            <form action="{{ Route('update_profile') }}" method="post" class="form">
                @csrf
                @method('PUT')
                <div class="login-main-content">
                    <div class="form-content">
                        <label for="" class="form-label">Nom</label>
                        <span class="form-icon">
                            <i class="fi fi-rr-user"></i>
                        </span>
                        <input type="text" name="u-fname" value="{{ $user->first_name }}" class="form-input" placeholder="John">
                    </div>
                    <div class="form-content">
                        <label for="" class="form-label">Prenom</label>
                        <span class="form-icon">
                            <i class="fi fi-rr-user"></i>
                        </span>
                        <input type="text" name="u-lname" value="{{ $user->last_name }}"     class="form-input" placeholder="Doe">
                    </div>
                </div>
                <div class="form-content">
                    <label for="" class="form-label">Email</label>
                    <span class="form-icon">
                        <i class="fi fi-rr-envelope"></i>
                    </span>
                    <input type="email" name="u-email" value="{{ $user->email }}"
                        class="form-input" placeholder="exemple@gmail.com">
                </div>
                <div class="form-content">
                    <label for="" class="form-label">Mot de passe</label>
                    <span class="form-icon">
                        <i class="fi fi-rr-lock"></i>
                    </span>
                    <input type="password" name="u-password" class="form-input" placeholder="********">
                </div>
                <div class="form-content">
                    <label for="" class="form-label">Confirmation du mot de passe</label>
                    <span class="form-icon">
                        <i class="fi fi-rr-lock"></i>
                    </span>
                    <input type="password" name="u-password-confirm" class="form-input" placeholder="********">
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </section>
@endsection
