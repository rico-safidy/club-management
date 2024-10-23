@extends('admin/layouts/master')

@section('title')
    Tableau de bord
@endsection

@section('content')
    <main class="dashboard-main-content">
        <ul class="dashboard-main-content-list">
            <a href="{{ Route('users') }}" class="dashboard-main-content-item">
                <div class="dashboard-main-content-item-container">
                    <div class="dashboard-main-content-item-conteiner-desc">
                        <p class="para-primary">Utilisateurs</p>
                        <h3 class="subtitle-primary">{{ count($users) }}</h3>
                    </div>
                    <span class="dashboard-main-content-item-container-icon-1">
                        <i class="fi fi-rr-users"></i>
                    </span>
                </div>
            </a>
            <a href="{{ Route('team_admin') }}" class="dashboard-main-content-item">
                <div class="dashboard-main-content-item-container">
                    <div class="dashboard-main-content-item-conteiner-desc">
                        <p class="para-primary">Equipes</p>
                        <h3 class="subtitle-primary">{{ count($teams) }}</h3>
                    </div>
                    <span class="dashboard-main-content-item-container-icon-2">
                        <i class="fi fi-rr-users-alt"></i>
                    </span>
                </div>
            </a>
            <li class="dashboard-main-content-item">
                <div class="dashboard-main-content-item-container">
                    <div class="dashboard-main-content-item-conteiner-desc">
                        <p class="para-primary">Paiements</p>
                        <h3 class="subtitle-primary">{{ count($payments) }}</h3>
                    </div>
                    <span class="dashboard-main-content-item-container-icon-3">
                        <i class="fi fi-rr-cash-register"></i>
                    </span>
                </div>
            </li>
            <li class="dashboard-main-content-item">
                <div class="dashboard-main-content-item-container">
                    <div class="dashboard-main-content-item-conteiner-desc">
                        <p class="para-primary">Marchandises</p>
                        <h3 class="subtitle-primary">{{ count($shops) }}</h3>
                    </div>
                    <span class="dashboard-main-content-item-container-icon-3">
                        <i class="fi fi-rr-shopping-cart"></i>
                    </span>
                </div>
            </li>
        </ul>

        <main class="dashboard-main-content-main">
            <ul class="dashboard-main-content-main-list">
                <li class="dashboard-main-content-main-list-item">
                    <h2 class="subtitle-secondary">Utilisateurs</h2>
                    <div class="dashboard-main-content-main-list-item-content">
                        <table class="dashboard-main-content-main-list-item-table">
                            <thead class="dashboard-main-content-main-list-item-table-head">
                                <tr class="dashboard-main-content-main-list-item-table-head-row">
                                    <td class="dashboard-main-content-main-list-item-table-head-desc">Id</td>
                                    <td class="dashboard-main-content-main-list-item-table-head-desc">Nom et prenom</td>
                                    <td class="dashboard-main-content-main-list-item-table-head-desc">Email</td>
                                </tr>
                            </thead>
                            <tbody class="dashboard-main-content-main-list-item-table-body">
                                @foreach ($users as $user)
                                    @if ($user->statut == 'user')
                                        <tr class="dashboard-main-content-main-list-item-table-body-row">
                                            <td class="dashboard-main-content-main-list-item-table-body-desc">
                                                {{ $user->id }}
                                            </td>
                                            <td class="dashboard-main-content-main-list-item-table-body-desc">
                                                {{ $user->first_name }} {{ $user->last_name }}
                                            </td>
                                            <td class="dashboard-main-content-main-list-item-table-body-desc">
                                                {{ $user->email }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ Route('users') }}" class="btn dashboard-main-content-main-list-item-btn">Voir plus</a>
                </li>
                <li class="dashboard-main-content-main-list-item">
                    <h2 class="subtitle-secondary">Equipes</h2>
                    <div class="dashboard-main-content-main-list-item-content">
                        <table class="dashboard-main-content-main-list-item-table">
                            <thead class="dashboard-main-content-main-list-item-table-head">
                                <tr class="dashboard-main-content-main-list-item-table-head-row">
                                    <td class="dashboard-main-content-main-list-item-table-head-desc">Numéro</td>
                                    <td class="dashboard-main-content-main-list-item-table-head-desc">Nom</td>
                                    <td class="dashboard-main-content-main-list-item-table-head-desc">Poste</td>
                                </tr>
                            </thead>
                            <tbody class="dashboard-main-content-main-list-item-table-body">
                                @foreach ($team_views as $team)
                                    @if ($team->post != 'staff')
                                        <tr class="dashboard-main-content-main-list-item-table-body-row">
                                            <td class="dashboard-main-content-main-list-item-table-body-desc">
                                                {{ $team->number }}
                                            </td>
                                            <td class="dashboard-main-content-main-list-item-table-body-desc">
                                                {{ $team->pseudo }}
                                            </td>
                                            <td class="dashboard-main-content-main-list-item-table-body-desc">
                                                {{ $team->post }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ Route('team_admin') }}" class="btn dashboard-main-content-main-list-item-btn">Voir plus</a>
                </li>
            </ul>
        </main>
@endsection
