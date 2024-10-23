@extends('admin.layouts.master')

@section('title')
    Utilisateurs
@endsection

@section('content')
    <section class="actuality">
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Admin</h2>
        </header>
        <main class="actuality-main">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Id</th>
                    <th>Nom et Prenom</th>
                    <th>Email</th>
                    <th>Option</th>
                </tr>
                @foreach ($users as $user)
                    @if ($user->statut == 'admin')
                        <tr class="actuality-table-def">
                            <td>
                                <p>{{ $user->id }}</p>
                            </td>
                            <td>
                                <h3 class="subtitle-primary">{{ $user->first_name }} {{ $user->last_name }}</h3>
                            </td>
                            <td>
                                <p class="para-primary">{{ $user->email }}</p>
                            </td>
                            <td class="actuality-table-def-btn-content">
                                <a href="" class="actuality-table-def-link">
                                    <span class="actuality-table-def-link-icon">
                                        <i class="fi fi-rr-pen-fancy "></i>
                                    </span>
                                </a>
                                <form action="{{ Route('delete_actu', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="actuality-table-def-btn actu-delete-btn">
                                        <span class="actuality-table-def-link-icon">
                                            <i class="fi fi-rr-trash"></i>
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </main>
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Utilisateurs</h2>
        </header>
        <main class="actuality-main">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Id</th>
                    <th>Nom et Prenom</th>
                    <th>Email</th>
                    <th>Option</th>
                </tr>
                @foreach ($users as $user)
                    @if ($user->statut == 'user')
                        <tr class="actuality-table-def">
                            <td>
                                <p>{{ $user->id }}</p>
                            </td>
                            <td>
                                <h3 class="subtitle-primary">{{ $user->first_name }} {{ $user->last_name }}</h3>
                            </td>
                            <td>
                                <p class="para-primary">{{ $user->email }}</p>
                            </td>
                            <td class="actuality-table-def-btn-content">
                                <a href="" class="actuality-table-def-link">
                                    <span class="actuality-table-def-link-icon">
                                        <i class="fi fi-rr-pen-fancy "></i>
                                    </span>
                                </a>
                                <form action="{{ Route('delete_actu', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="actuality-table-def-btn actu-delete-btn">
                                        <span class="actuality-table-def-link-icon">
                                            <i class="fi fi-rr-trash"></i>
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </main>
    </section>

    {{-- suite header --}}
    </main>
    </main>
    </section>
    {{-- suite header --}}
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteBtn = document.querySelectorAll(".actu-delete-btn")
        deleteBtn.forEach(btn => {
            btn.addEventListener('click', (e) => {
                if (!confirm("Ëtes vous sûr de vouloir supprimer cet utilisateur ?")) {
                    e.preventDefault();
                }
            })
        });
    })
</script>
