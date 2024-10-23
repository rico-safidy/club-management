@extends('admin.layouts.master')

@section('title')
    Billets
@endsection

@section('content')
    <section class="actuality">
        {{-- tickets --}}
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Billets</h2>
            <a href="{{ Route('ticket_add') }}" class="btn team-admin-link">
                Ajouter
                <i class="fi fi-rr-add"></i>
            </a>
        </header>
        <main class="actuality-main" style="overflow: auto">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>id</th>
                    <th>Rencotre</th>
                    <th>Categories</th>
                    <th>Nombre de billets</th>
                    <th>Option</th>
                </tr>
                <tr class="actuality-table-def">
                    <td>
                        <p class="para-primary">1</p>
                    </td>
                    <td>
                        <h3 class="subtitle-primary">Mada vs Comore</h3>
                    </td>
                    <td>
                        <p class="para-primary">Billet de base</p>
                    </td>
                    <td>
                        <p class="para-primary">2000</p>
                    </td>
                    <td class="actuality-table-def-btn-content">
                        <a href="" class="actuality-table-def-link">
                            <span class="actuality-table-def-link-icon">
                                <i class="fi fi-rr-pen-fancy"></i>
                            </span>
                        </a>
                        <form action="" method="POST">
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
            </table>
        </main>
        {{-- End ticket category --}}
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
