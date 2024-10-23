@extends('admin.layouts.master')

@section('title')
    Ajout palmarès
@endsection

@section('content')

    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Ajouter un palmarès</h2>
        <form action="{{ Route('insert_palmares') }}" class="form team-add-form" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="team-add-content">
                <h3 class="subtitle-primary team-add-main-content-title">Information du palmarès</h3>
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <p style="color: #df3838">{{ $error }}</p>
                    @endforeach
                @endif
                <div class="team-add-form-main">
                    <div class="team-add-form-desc">
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-t"></i>
                            </span>
                            <select name="trophy-title" id="" class="form-input">
                                @foreach ($trophies as $trophy)
                                    <option value="{{ $trophy->name_trophy }}" class="form-input">{{ $trophy->name_trophy }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-content">
                            <label for="" class="form-label">Date d'obtension du tropée</label>
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-calendar-day"></i>
                            </span>
                            <input type="date" name="trophy-date" class="form-input" placeholder="date du tropee">
                        </div>
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-t"></i>
                            </span>
                            <textarea name="trophy-desc" rows="5" id="desc" value="" class="form-input"
                                placeholder="Description du trophée"></textarea>
                        </div>
                    </div>
                    <div class="team-add-form-img-content">
                        <img src="{{ asset('images/barea-zebu.png') }}" alt="" class="team-add-form-img"
                            id="image">
                    </div>
                </div>
                <button type="submit" class="team-add-form-btn">Ajouter</button>
            </div>
        </form>
    </main>
@endsection
