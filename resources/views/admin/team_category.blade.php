@extends('admin.layouts.master')

@section('title')
    Categorie d'equipe
@endsection

@section('content')
    <section class="actuality">
        {{-- team category --}}
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Categorie d'equipe</h2>
            <a href="{{ Route('team_category_add') }}" class="btn team-admin-link">
                Ajouter
                <i class="fi fi-rr-add"></i>
            </a>
        </header>
        <main class="actuality-main" style="overflow: auto">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>id</th>
                    <th>Categories</th>
                    <th>Option</th>
                </tr>
                @foreach ($categories as $category)
                    <tr class="actuality-table-def">
                        <td>
                            <p class="para-primary">{{ $category->id }}</p>
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $category->name }}</h3>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-pen-fancy"></i>
                                </span>
                            </a>
                            <form action="{{ url('/delete_team_category/' . $category->id) }}" method="POST">
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
        </main>
        {{-- team category --}}

        {{-- player category --}}
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Categorie des joueurs</h2>
            <a href="{{ Route('player_category_add') }}" class="btn team-admin-link">
                Ajouter
                <i class="fi fi-rr-add"></i>
            </a>
        </header>
        <main class="actuality-main" style="overflow: auto">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>id</th>
                    <th>Categories</th>
                    <th>Option</th>
                </tr>
                @foreach ($playerCategories as $category)
                    <tr class="actuality-table-def">
                        <td>
                            <p class="para-primary">{{ $category->id }}</p>
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $category->name }}</h3>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-pen-fancy"></i>
                                </span>
                            </a>
                            <form action="{{ url('/delete_player_category/' . $category->id) }}" method="POST">
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
        </main>
        {{-- player category --}}

        {{-- staff category --}}
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Categorie des staffs</h2>
            <a href="{{ Route('staff_category_add') }}" class="btn team-admin-link">
                Ajouter
                <i class="fi fi-rr-add"></i>
            </a>
        </header>
        <main class="actuality-main" style="overflow: auto">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>id</th>
                    <th>Categories</th>
                    <th>Option</th>
                </tr>
                @foreach ($staffCategories as $category)
                    <tr class="actuality-table-def">
                        <td>
                            <p class="para-primary">{{ $category->id }}</p>
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $category->name }}</h3>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-pen-fancy"></i>
                                </span>
                            </a>
                            <form action="{{ url('/delete_staff_category/' . $category->id) }}" method="POST">
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
        </main>
        {{-- staff category --}}
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
