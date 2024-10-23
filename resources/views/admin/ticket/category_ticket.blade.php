@extends('admin.layouts.master')

@section('title')
    Categorie
@endsection

@section('content')
    <section class="actuality">
        {{-- ticket category --}}
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Categorie de billet</h2>
            <a href="{{ Route('ticket_category_add') }}" class="btn team-admin-link">
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
                            <h3 class="subtitle-primary">{{ $category->ticket_category_name }}</h3>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="{{ url('ticket_category_update/' . $category->id) }}" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-pen-fancy"></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_ticket_category', $category->id) }}" method="POST">
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
