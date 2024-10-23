@extends('admin.layouts.master')

@section('title')
    Palmarès
@endsection

@section('content')
    <section class="actuality">
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Palmarès du club</h2>
            <a href="{{ Route('palmares_add') }}" class="team-admin-link">
                Ajouter
            </a>
        </header>
        <main class="actuality-main">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Nombre du trophée</th>
                    <th>Nom et description du trophée</th>
                    <th>Option</th>
                </tr>
                @foreach ($palmares as $item)
                    <tr class="actuality-table-def">
                        <td>
                            <h3 class="subtitle-primary">1</h3>
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $item->palmares_name }}</h3>
                            <div class="actuality-table-def-content">
                                <p class="para-primary">{{ $item->palmares_description }}</p>
                            </div>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-pen-fancy "></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_palmares', $item->id) }}" method="post">
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
