@extends('admin.layouts.master')

@section('title')
    Equipe
@endsection

@section('content')
    <section class="actuality">
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Toute l'equipe</h2>
            <div class="team-admin-content-item">
                <button class="team-admin-content-btn btn team-admin-link btn-dropdown">
                    Ajouter
                    <i class="fi fi-rr-add"></i>
                </button>
                <div class="team-admin-content-dropdown dropdown">
                    <a href="{{ Route('team_admin_add') }}" class="team-admin-content-dropdown-link">
                        Joueur
                    </a>
                    <a href="{{ Route('staff_add') }}" class="team-admin-content-dropdown-link">
                        Staff
                    </a>
                </div>
            </div>
        </header>

        <main class="actuality-main">
            <h2 class="subtitle-secondary">Gardien de but</h2>
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Numero</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Option</th>
                </tr>
                @foreach ($gardiens as $gardien)
                    <tr class="actuality-table-def">
                        <td>
                            <h2 class="subtitle-primary">{{ $gardien->number }}</h2>
                        </td>
                        <td>
                            <img src="{{ asset('storage/imageTeam/' . $gardien->profile) }}" alt=""
                                class="team-admin-img">
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $gardien->pseudo }}</h3>
                            <p class="para-primary">{{ $gardien->post }}</p>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="{{ Route('team_update', $gardien->id) }}" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-eye"></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_team', $gardien->id) }}" method="post">
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
            <div class="">
                {{ $gardiens->links('vendor.pagination.default') }}
            </div>
        </main>

        <main class="actuality-main">
            <h2 class="subtitle-secondary">Defense</h2>
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Numero</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Option</th>
                </tr>
                @foreach ($defenses as $defense)
                    <tr class="actuality-table-def">
                        <td>
                            <h2 class="subtitle-primary">{{ $defense->number }}</h2>
                        </td>
                        <td>
                            <img src="{{ asset('storage/imageTeam/' . $defense->profile) }}" alt=""
                                class="team-admin-img">
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $defense->pseudo }}</h3>
                            <p class="para-primary">{{ $defense->post }}</p>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="{{ Route('team_update', $defense->id) }}" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-eye"></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_team', $defense->id) }}" method="post">
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
            <div class="">
                {{ $defenses->links('vendor.pagination.default') }}
            </div>
        </main>

        <main class="actuality-main">
            <h2 class="subtitle-secondary">Milieu de terrain</h2>
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Numero</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Option</th>
                </tr>
                @foreach ($milieux as $milieu)
                    <tr class="actuality-table-def">
                        <td>
                            <h2 class="subtitle-primary">{{ $milieu->number }}</h2>
                        </td>
                        <td>
                            <img src="{{ asset('storage/imageTeam/' . $milieu->profile) }}" alt=""
                                class="team-admin-img">
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $milieu->pseudo }}</h3>
                            <p class="para-primary">{{ $milieu->post }}</p>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="{{ Route('team_update', $milieu->id) }}" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-eye"></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_team', $milieu->id) }}" method="post">
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
            <div class="">
                {{ $milieux->links('vendor.pagination.default') }}
            </div>
        </main>

        <main class="actuality-main">
            <h2 class="subtitle-secondary">Attaquant</h2>
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Numero</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Option</th>
                </tr>
                @foreach ($attaquants as $attaquant)
                    <tr class="actuality-table-def">
                        <td>
                            <h2 class="subtitle-primary">{{ $attaquant->number }}</h2>
                        </td>
                        <td>
                            <img src="{{ asset('storage/imageTeam/' . $attaquant->profile) }}" alt=""
                                class="team-admin-img">
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $attaquant->pseudo }}</h3>
                            <p class="para-primary">{{ $attaquant->post }}</p>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="{{ Route('team_update', $attaquant->id) }}" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-eye"></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_team', $attaquant->id) }}" method="post">
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
            <div class="">
                {{ $milieux->links('vendor.pagination.default') }}
            </div>
        </main>

        <main class="actuality-main">
            <h2 class="subtitle-secondary">Staff</h2>
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Option</th>
                </tr>
                @foreach ($staffs as $staff)
                    <tr class="actuality-table-def">
                        <td>
                            <img src="{{ asset('storage/imageTeam/' . $staff->profile) }}" alt=""
                                class="team-admin-img">
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $staff->pseudo }}</h3>
                            <p class="para-primary">{{ $staff->post }}</p>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="{{ Route('team_update', $staff->id) }}" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-eye"></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_team', $staff->id) }}" method="post">
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
            <div class="">
                {{ $staffs->links('vendor.pagination.default') }}
            </div>
        </main>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteBtn = document.querySelectorAll(".actu-delete-btn")
        deleteBtn.forEach(btn => {
            btn.addEventListener('click', (e) => {
                if (!confirm("Ëtes vous sûr de vouloir supprimer ce joeur ?")) {
                    e.preventDefault();
                }
            })
        });

        const btn = document.querySelector('.btn-dropdown')
        const dropdown = document.querySelector('.dropdown')
        btn.addEventListener('click', () => {
            dropdown.classList.toggle('show')
        })
        window.onclick = function(event) {
            if(!event.target.matches('.btn-dropdown')) {
                let i;
                for (let i = 0; i < dropdown.length; i++) {
                    const openDropdown = dropdown[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show')
                    }
                }
            }
        }
    })
</script>
