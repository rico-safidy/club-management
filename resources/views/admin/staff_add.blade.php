@extends('admin.layouts.master')

@section('title')
    Ajout Staff
@endsection

@section('content')
    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Ajouter un Staff</h2>
        @if ($errors)
            @foreach ($errors->all() as $error)
                <p style="color: #e42d2d">{{ $error }}</p>
            @endforeach
        @endif
        <form action="{{ Route('insert_staff') }}" class="form team-add-form" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="team-add-main-content">
                <div class="team-add-content">
                    <h3 class="subtitle-primary team-add-main-content-title">Information Personnelle</h3>
                    <div class="login-main-content">
                        <div class="form-content">
                            <label for="" class="form-label">Nom</label>
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-user"></i>
                            </span>
                            <input type="text" name="fname" id="" class="form-input" placeholder="Rakoto">
                        </div>
                        <div class="form-content">
                            <label for="" class="form-label">Prenom</label>
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-user"></i>
                            </span>
                            <input type="text" name="lname" id="" class="form-input" placeholder="Nirina">
                        </div>
                    </div>
                    <div class="login-main-content">
                        <div class="form-content">
                            <label for="" class="form-label">Date de naissance</label>
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-calendar-day"></i>
                            </span>
                            <input type="date" name="birth-date" id="" class="form-input"
                                placeholder="Date de naissance">
                        </div>
                        <div class="form-content">
                            <label for="" class="form-label">Lieu de naissance</label>
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-marker"></i>
                            </span>
                            <input type="text" name="birth-place" id="" class="form-input"
                                placeholder="Lieu de naissance">
                        </div>
                    </div>
                </div>
                <div class="team-add-content">
                    <h3 class="subtitle-primary team-add-main-content-title">Information Professionnelle</h3>
                    <div class="form-content">
                        <span class="checkout-main-form-icon">
                            <i class="fi fi-rr-images-user"></i>
                        </span>
                        <input type="file" name="profile" id="" class="form-input">
                    </div>
                    <div class="login-main-content">
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-user"></i>
                            </span>
                            <input type="text" name="pseudo" id="" class="form-input" placeholder="John">
                        </div>
                    </div>

                    {{-- post --}}
                    <div class="form-content shop-main-desc-form-content">
                        <div class="form-content">
                            <label for="post" class="label">Poste</label>
                            <select name="post" id="">
                                @foreach ($staff_categories as $staff_category)
                                    <option value="{{ $staff_category->name }}">
                                        {{ $staff_category->name }}
                                    </option>
                                @endforeach
                                </option>
                            </select>
                        </div>
                    </div>
                    {{-- post --}}

                    <button type="submit" class="team-add-form-btn">Ajouter</button>
                </div>
            </div>

        </form>
    </main>
@endsection
