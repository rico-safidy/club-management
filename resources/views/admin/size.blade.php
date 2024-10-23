@extends('admin.layouts.master')

@section('title')
    Taille
@endsection

@section('content')
    <section class="actuality">
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Taille</h2>
            <a href="{{ Route('size_add') }}" class="btn team-admin-link">
                Ajouter
                <i class="fi fi-rr-add"></i>
            </a>
        </header>
        <main class="actuality-main" style="overflow: auto">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>id</th>
                    <th>Taille</th>
                    <th>Option</th>
                </tr>
                @foreach ($sizes as $size)
                    <tr class="actuality-table-def">
                        <td>
                            <p class="para-primary">{{ $size->id }}</p>
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $size->sizes }}</h3>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-pen-fancy"></i>
                                </span>
                            </a>
                            <form action="{{ url('/delete_size/' . $size->id) }}" method="POST">
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
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteBtn = document.querySelectorAll(".delete-btn")
        deleteBtn.forEach(btn => {
            btn.addEventListener('click', (e) => {
                if (!confirm("Ëtes vous sûr de vouloir supprimer cet taille ?")) {
                    e.preventDefault();
                }
            })
        });
    })
</script>
