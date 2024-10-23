@extends('admin.layouts.master')

@section('title')
    Boutique
@endsection


@section('content')
    <section class="actuality">
        <header class="team-admin-content">
            <h2 class="subtitle-primary">Boutique</h2>
            <a href="{{ Route('shop_admin_add') }}" class="btn team-admin-link">
                Ajouter
                <i class="fi fi-rr-add"></i>
            </a>
        </header>
        <main class="actuality-main" style="overflow: auto">
            <table class="actuality-table">
                <tr class="actuality-table-header">
                    <th>Image</th>
                    <th>Detail</th>
                    <th>Option</th>
                </tr>
                @foreach ($articles as $article)
                    <tr class="actuality-table-def">
                        <td>
                            <img src="{{ asset('storage/imageShop/' . $article->image) }}" alt=""
                                class="actuality-table-def-img">
                        </td>
                        <td>
                            <h3 class="subtitle-primary">{{ $article->name }}</h3>
                            <p class="para-primary">Taille disponible : {{ $article->size }}</p>
                            <p class="para-primary">Couleur disponible : {{ $article->color }}</p>
                            <p class="para-primary">Prix : ${{ $article->price }},00</p>
                        </td>
                        <td class="actuality-table-def-btn-content">
                            <a href="{{ url('/shop_update/' . $article->id) }}" class="actuality-table-def-link">
                                <span class="actuality-table-def-link-icon">
                                    <i class="fi fi-rr-pen-fancy"></i>
                                </span>
                            </a>
                            <form action="{{ Route('delete_article', $article->id) }}" method="POST">
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
            <div>
                {{ $articles->links('vendor.pagination.default') }}
            </div>
        </main>
    </section>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteBtn = document.querySelectorAll(".delete-btn")
        deleteBtn.forEach(btn => {
            btn.addEventListener('click', (e) => {
                if (!confirm("Ëtes vous sûr de vouloir supprimer cette article ?")) {
                    e.preventDefault();
                }
            })
        });
    })
</script>
