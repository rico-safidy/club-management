@extends('user.layouts.master')

@section('title')
    Detail du match
@endsection

@section('content')
    <section class="section match">
        {{-- <h1 class="title-primary">Detail du prochain match</h1> --}}
        <div class="match-content">
            @php
                $date = date('d F Y', strTotime($match->match_date));
            @endphp
            <div class="match-content-item">
                <h2 class="subtitle match-content-title">{{ $match->match_type }}</h2>
                <div class="match-content-item-container">
                    <h2 class="title">{{ $match->home_team }}</h2>
                    <p class="para match-content-item-container-para"> {{ $date }} </p>
                    <h1 class="title match-content-item-container-line">-</h1>
                    <h2 class="title">{{ $match->visitor_team }}</h2>
                </div>
                <p class="para-secondary match-content-para">
                    <i class="fi fi-rr-marker"></i>
                    {{ $match->match_location }}
                </p>
            </div>
            <p class="para-primary">{{ $match->match_description }}</p>
        </div>
    </section>
@endsection
