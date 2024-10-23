@extends('user.layouts.master')

@section('title')
    Detail Joueur
@endsection

@php
    $birth_date = $team->birth_date;
    $date = date('d F Y', strtotime($birth_date));
@endphp

@section('content')
    <section class="team-detail">
        <div class="team-detail-content">
            <img src="{{ asset('storage/imageTeam/' . $team->profile) }}" alt="" class="team-detail-img">
            <div class="team-detail-main-desc">
                <div class="team-detail-desc-1">
                    @if ($team->post != 'staff')
                        <h1 class="aubtitle team-detail-title">{{ $team->number }}</h1>
                    @endif
                    <div class="team-detail-desc-content">
                        <h3 class="subtitle team-detail-desc-subtitle">{{ $team->pseudo }}</h3>
                        <p class="para team-detail-desc-para">{{ $team->post }}</p>
                    </div>
                </div>
                <div class="team-detail-desc-2">
                    <h2 class="subtitle team-detail-desc-2-subtitle">Information Personnelle</h2>
                    <p class="para team-detail-desc-2-para">Nom complet</p>
                    <h4 class="subtitle team-detail-desc-2-subtitle">{{ $team->first_name }} {{ $team->last_name }}</h4>
                    <p class="para team-detail-desc-2-para">Date de naissance</p>
                    <h4 class="subtitle team-detail-desc-2-subtitle">{{ $date }}</h4>
                </div>
            </div>
        </div>
    </section>
@endsection
