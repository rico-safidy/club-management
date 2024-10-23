@extends('user.layouts.master')

@section('title')
    Billetterie
@endsection

@section('content')
    <section class="ticket">
        <header class="ticket-header">
            <div class="ticket-header-content">
                <h2 class="subtitle-primary">Acheter des billets</h2>
            </div>
            <div class="ticket-header-content-main">
                <div class="ticket-header-content">
                    <h3 class="subtitle-primary">{{ $match->home_team }}</h3>
                    <h2 class="subtitle-primary">VS</h2>
                    <h3 class="subtitle-primary">{{ $match->visitor_team }}</h3>
                </div>
                <p class="para-primary ticket-header-content-main-para">
                    {{ $match->match_location }}
                    <i class="fi fi-rr-marker"></i>
                </p>
                @php
                    $match_date = date('d F Y', strTotime($match->match_date))
                @endphp
                <p class="para-primary ticket-header-content-main-para">
                    {{ $match_date }} à {{ $match->match_hour }}
                    <i class="fi fi-rr-calendar-day"></i>
                </p>
            </div>
        </header>
        <main class="ticket-main">
            <ul class="ticket-main-list">
                <li class="ticket-main-list-item">
                    <header class="ticket-main-list-item-header">
                        <h2 class="subtitle ticket-main-list-item-subtitle">Billet de base</h2>
                    </header>
                    <h2 class="subtitle-secondary ticket-main-list-item-title">5000 Ar</h2>
                    <hr class="ticket-main-list-item-line">
                    <main class="ticket-main-list-item-main">
                        <p class="para-primary ticket-main-list-item-main-para">
                            <span class="ticket-main-list-item-main-icon">
                                <i class="fi fi-rr-angle-double-small-right"></i>
                            </span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                        <p class="para-primary ticket-main-list-item-main-para">
                            <span class="ticket-main-list-item-main-icon">
                                <i class="fi fi-rr-angle-double-small-right"></i>
                            </span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                        <p class="para-primary ticket-main-list-item-main-para">
                            <span class="ticket-main-list-item-main-icon">
                                <i class="fi fi-rr-angle-double-small-right"></i>
                            </span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                        <p class="para-primary ticket-main-list-item-main-para">
                            <span class="ticket-main-list-item-main-icon">
                                <i class="fi fi-rr-angle-double-small-right"></i>
                            </span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                    </main>
                    <footer class="ticket-main-list-item-footer">
                        <a href="{{ url('/ticket_detail/' . $match->id) }}" class="btn btn-primary ticket-main-list-item-footer-btn">
                            Acheter
                            <span class="ticket-main-list-item-footer-btn-icon">
                                <i class="fi fi-rr-ticket"></i>
                            </span>
                        </a>
                    </footer>
                </li>
            </ul>
        </main>
    </section>
@endsection
