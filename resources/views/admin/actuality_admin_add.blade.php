@extends('admin.layouts.master')

@section('title')
    Ajout actualite
@endsection

@section('content')

    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Ajouter une actualite</h2>
        <form action="{{ Route('insert_actu') }}" class="form team-add-form" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="team-add-content">
                <h3 class="subtitle-primary team-add-main-content-title">Information de l'actualite</h3>
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <p style="color: #df3838">{{ $error }}</p>
                    @endforeach
                @endif
                <div class="team-add-form-main">
                    <div class="team-add-form-desc">
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-images-user"></i>
                            </span>
                            <input type="file" name="image" id="image-file" class="form-input">
                        </div>
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-t"></i>
                            </span>
                            <input type="text" name="title" id="title" value="" class="form-input" placeholder="Titre">
                        </div>
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-quote-right"></i>
                            </span>
                            <textarea name="desc" id="" rows="4" class="form-input" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="team-add-form-img-content">
                        <img src="{{ asset('images/barea-zebu.png') }}" alt="" class="team-add-form-img" id="image">
                    </div>
                </div>
                <button type="submit" class="btn team-add-form-btn">
                    Ajouter
                    <i class="fi fi-rr-add"></i>
                </button>
            </div>

        </form>
    </main>
    
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const imageFile = document.querySelector('#image-file')

        imageFile.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader()
                reader.onload = (e) => {
                    document.getElementById('image').src = e.target.result
                }
                reader.readAsDataURL(file)
            }
        })
    })
</script>
