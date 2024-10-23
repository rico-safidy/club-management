@extends('admin.layouts.master')

@section('title')
    Ajout Billet
@endsection

@section('content')
    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Ajouter du billet</h2>
        @if ($errors)
            @foreach ($errors->all() as $error)
                <p style="color: #eb3232">{{ $error }}</p>
            @endforeach
        @endif
        <form action="" class="form team-add-form" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="team-add-content">
                {{-- team  --}}
                <div class="form-content">
                    <label for="" class="form-label">Match</label>
                    <span class="form-icon">
                        <i class="fi fi-rr-people-arrows-left-right"></i>
                    </span>
                    <select name="match" id="" class="form-input">
                        <option value="">Mada vs Comore</option>
                    </select>
                </div>
                {{-- team  --}}

                {{-- category --}}
                <div class="form-content">
                    <label for="" class="checkbox-label">Categories Disponible :</label>
                    <div class="checkbox-content">
                        @foreach ($ticket_categories as $category)
                            <label class="container">{{ $category->ticket_category_name }}
                                <input type="checkbox" name="ticket_category[]"
                                    value="{{ $category->ticket_category_name }}">
                                <span class="checkmark"></span>
                            </label>
                        @endforeach
                    </div>
                </div>
                {{-- category --}}

                <div class="form-content">
                    <label for="" class="form-label">Quantité du billet</label>
                    <span class="form-icon">
                        <i class="fi fi-rr-money-bill-wave"></i>
                    </span>
                    <input type="number" name="ticket_qty" id="" class="form-input"
                        placeholder="Quantité du billet">
                </div>

                <button type="submit" class="btn team-add-form-btn">
                    Ajouter
                    <i class="fi fi-rr-add"></i>
                </button>
            </div>
        </form>
    </main>
@endsection
