@extends('user.layouts.master')

@section('title')
    Actualité
@endsection

@section('content')
    <section class="actu">
        <header class="actu-header">
            <div class="actu-header-img-content">
                <img src="{{ asset('storage/imageActu/' . $actu->image) }}" alt="" class="actu-header-img">
            </div>
            <div class="actu-header-desc">
                <h1 class="title actu-header-desc-title">{{ $actu->title }}</h1>
                <p class="para actu-header-desc-para">{{ $actu->description }}</p>
            </div>
        </header>
    </section>
@endsection
