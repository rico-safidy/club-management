@extends('admin.layouts.master')

@section('title')
    Detail de l'equipe
@endsection

@section('content')
    <section class="actuality">
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Detail</h2>
            <a href="{{ Route('actuality_admin_add') }}" class="btn team-admin-link">
                Modifier
                <i class="fi fi-rr-pen-fancy"></i>
            </a>
        </header>
        <main class="actuality-main">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Image</th>
                    <th>Description</th>
                    <th>Option</th>
                </tr>
                @foreach ($actus as $actu)
                    <tr class="actuality-table-def">
                        <td>
                            <img src="{{ asset('storage/imageActu/' . $actu->image) }}" alt=""
                                class="actuality-table-def-img">
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $actu->title }}</h3>
                            <div class="actuality-table-def-content">
                                <p class="para-primary">{{ $actu->description }}</p>
                            </div>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-pen-fancy "></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_actu', $actu->id) }}" method="post">
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
