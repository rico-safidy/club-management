@extends('user.layouts/master')

@section('title')
    Profile
@endsection

@section('content')
    <section class="section profile">
        <aside class="profile-img-content">
            <img src="{{ asset('images/barea-team.jpg') }}" alt="" class="profile-img">
        </aside>
        <aside class="profile-desc">
            <h1 class="title profile-desc-title">Salut, {{ Session::get('user')->last_name }}</h1>
            <h3 class="subtitle profile-desc-subtitle">Vos informations</h3>
            <div class="profile-desc-content">
                <p class="para profile-desc-para">{{ Session::get('user')->first_name }}
                    {{ Session::get('user')->last_name }}</p>
                <hr class="profile-desc-line">
                <p class="para profile-desc-para">{{ Session::get('user')->email }}</p>
            </div>
            <div class="profile-desc-btns">
                <a href="{{ url('/profile_update') }}" class="btn profile-desc-btn">Modifier</a>
                <a href="{{ Route('logout') }}" class="btn profile-desc-btn" id="logout-btn">Se Deconnecter</a>
            </div>
        </aside>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteBtn = document.querySelectorAll("#logout-btn")
            deleteBtn.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    if (!confirm("Voulez-vous vraiment vous deconnecter ?")) {
                        e.preventDefault();
                    }
                })
            });
        })
    </script>
@endsection
