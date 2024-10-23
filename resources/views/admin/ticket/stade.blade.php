@extends('admin.layouts.master')

@section('title')
    Stadium
@endsection

@section('content')
    <section class="actuality">

        {{-- stadium --}}
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Stadium</h2>
            <a href="{{ Route('stade_add') }}" class="btn team-admin-link">
                Ajouter
                <i class="fi fi-rr-add"></i>
            </a>
        </header>
        <main class="actuality-main" style="overflow: auto">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Non du stadium</th>
                    <th>Lieu du stadium</th>
                    <th>Nombre total de la place</th>
                    <th>Nombre de place par lieu disponible</th>
                    <th>Nombre de la place disponible</th>
                    <th>Option</th>
                </tr>
                @foreach ($stade as $item)
                    <tr class="actuality-table-def">
                        <td>
                            <h3 class="subtitle-primary">{{ $item->stade_name }}</h3>
                        </td>
                        <td>
                            <p class="para-primary">{{ $item->stade_location }}</p>
                        </td>
                        <td>
                            <p class="para-primary">{{ $item->stade_place_number }}</p>
                        </td>
                        <td>
                            <p class="para-primary">{{ $item->stade_place_location_number_disponible }}</p>
                        </td>
                        <td>
                            <p class="para-primary">{{ $item->stade_place_number_disponible }}</p>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="{{ Route('stade_update', $item->id) }}" class="actuality-table-def-link">
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
                @endforeach
            </table>
        </main>
        {{-- End stadium --}}

        {{-- Place  --}}
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Place dans la stade</h2>
            <a href="{{ Route('place_add') }}" class="btn team-admin-link">
                Ajouter
                <i class="fi fi-rr-add"></i>
            </a>
        </header>
        <main class="actuality-main" style="overflow: auto">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Place</th>
                    <th>Nombre</th>
                    <th>Description</th>
                    <th>Option</th>
                </tr>
                @foreach ($places as $place)
                    <tr class="actuality-table-def">
                        <td>
                            <h3 class="subtitle-primary">{{ $place->stadium_place_location }}</h3>
                        </td>
                        <td>
                            <p class="para-primary">{{ $place->stadium_place_number }}</p>
                        </td>
                        <td>
                            <p class="para-primary">{{ $place->stadium_place_description }}</p>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="{{ url('place_update/' . $place->id) }}" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-pen-fancy"></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_place', $place->id) }}" method="POST">
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
        {{-- end place  --}}
        
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
