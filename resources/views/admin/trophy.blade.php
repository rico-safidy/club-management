@extends('admin.layouts.master')

@section('title')
    Trophées
@endsection

@section('content')
    <section class="actuality">
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Trophées</h2>
            <a href="{{ Route('trophy_add') }}" class="btn team-admin-link">
                Ajouter
                <i class="fi fi-rr-add"></i>
            </a>
        </header>
        <main class="actuality-main">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Nombre</th>
                    <th>Nom</th>
                    <th>Option</th>
                </tr>
                @foreach ($trophies as $trophy)
                    <tr class="actuality-table-def">
                        <td>
                            <h3 class="subtitle-primary">{{ $trophy->number_trophy }}</h3>
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $trophy->name_trophy }}</h3>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-pen-fancy "></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_trophy', $trophy->id) }}" method="post">
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
                if (!confirm("Ëtes vous sûr de vouloir supprimer cette article ?")) {
                    e.preventDefault();
                }
            })
        });
    })
</script>
