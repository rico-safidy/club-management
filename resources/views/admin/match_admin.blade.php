@extends('admin.layouts.master')

@section('title')
    Prochain match
@endsection

@section('content')
    <section class="actuality">
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Prochain match</h2>
            <a href="{{ Route('match_admin_add') }}" class="btn team-admin-link">
                Ajouter
                <i class="fi fi-rr-add"></i>
            </a>
        </header>
        <main class="actuality-main match-admin-main" style="overflow: auto">
            <table class="actuality-table match-admin-table">
                <tr class="actuality-table-header">
                    <th>id</th>
                    <th>Rencontre</th>
                    <th>Type du match</th>
                    <th>Date et lieu</th>
                    <th>Option</th>
                </tr>
                @foreach ($next_games as $next_game)
                    <tr class="actuality-table-def">
                        <td>
                            <p class="para-primary">{{ $next_game->id }}</p>
                        </td>
                        <td class="match-admin-flex">
                            <h3 class="subtitle-primary">{{ $next_game->home_team }}</h3>
                            vs
                            <h3 class="subtitle-primary">{{ $next_game->visitor_team }}</h3>
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $next_game->match_type }}</h3>
                            <p class="para-primary">{{ $next_game->match_description }}</p>
                        </td>
                        <td>
                            <p class="para-primary">{{ $next_game->match_date }}</p>
                            <p class="para-primary">{{ $next_game->match_location }}</p>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="{{ Route('match_admin_update', $next_game->id) }}" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-pen-fancy"></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_match', $next_game->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="actuality-table-def-btn delete-btn">
                                    <span class="actuality-table-def-icon">
                                        <i class="fi fi-rr-trash"></i>
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div>
                {{ $next_games->links('vendor.pagination.default') }}
            </div>
        </main>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteBtn = document.querySelectorAll(".delete-btn")
        deleteBtn.forEach(btn => {
            btn.addEventListener('click', (e) => {
                if (!confirm("Ëtes vous sûr de vouloir supprimer cet categorie ?")) {
                    e.preventDefault();
                }
            })
        });
    })
</script>
