@extends('user/layouts/master')

@section('title')
    Collection
@endsection

@section('content')
    <section class="collection">

        <div class="collection-content">
            <h1 class="title-para collection-content-title">Collection</h1>
            <ul class="collection-content-list">
                @foreach ($articles as $article)
                    @if ($article->category != 'Maillot')
                        <li class="collection-content-list-item">
                            <a href="{{ url('/shop_collection_detail/' . $article->id) }}"
                                class="collection-content-list-item-link">
                                <img src="{{ asset('storage/imageShop/' . $article->image) }}" alt=""
                                    class="collection-content-list-item-img">
                                <div class="collection-content-list-item-desc">
                                    <h4 class="subtitle">{{ $article->name }}</h4>
                                    <p class="para">{{ $article->price }},00 $</p>
                                </div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </section>
@endsection
