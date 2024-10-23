@extends('user.layouts/master')

@section('title')
    Boutique
@endsection

@section('content')
    <section class="section shop">
        <nav class="shop-nav">
            <ul class="shop-nav-list">
                <li class="shop-nav-list-item">
                    @foreach ($categories as $category)
                        <button class="shop-nav-list-item-btn">{{ $category->category }}</button>
                    @endforeach
                </li>
                <li class="shop-nav-list-item">
                    <button class="shop-nav-list-item-btn nav-link-btn">
                        <i class="fi fi-rr-shopping-cart"></i>
                        @if (Session::has('cart'))
                            @if (count(Session::get('cart')) >= 1)
                                <span class="shop-nav-list-item-btn-counter">{{ count(Session::get('cart')) }}</span>
                            @endif
                        @endif
                    </button>
                </li>
            </ul>
        </nav>

        {{-- cart --}}
        <section class="section cart" id="cart">
            <div class="cart-content" id="cart-content">
                <header class="cart-header">
                    <h2 class="subtitle-primary">Votre panier</h2>
                    <button class="cart-header-btn">
                        <i class="fi fi-rr-angle-small-right"></i>
                    </button>
                </header>
                <hr class="cart-line">
                <main class="cart-main">
                    <h3 class="subtitle-primary cart-main-subtitle">Produits ajoutés</h3>
                    <div class="cart-main-container">
                        @if (Session::has('cart'))
                            @if (count(Session::get('cart')) != 0)
                                @foreach (Session::get('cart') as $cart)
                                    <div class="cart-main-content" id="cart-parent">
                                        <div class="cart-main-content-desc">
                                            <div class="cart-main-img-content">
                                                <img src="{{ asset('storage/imageShop/' . $cart['image']) }}" alt=""
                                                    class="cart-main-img">
                                            </div>
                                            <div class="cart-main-desc">
                                                <h4 class="subtitle cart-main-desc-subtitle">{{ $cart['name'] }}</h4>
                                                <p class="para cart-main-desc-para">Taille :
                                                    <span class="cart-main-desc-para-upp">{{ $cart['size'] }}</span>
                                                </p>
                                                <p class="para cart-main-desc-para">Couleur :
                                                    <span class="cart-main-desc-para">{{ $cart['color'] }}</span>
                                                </p>
                                                <p class="para cart-main-desc-para">Nombre : <span
                                                        id="article-number">1</span></p>
                                                <hr class="cart-main-line">
                                                <input type="hidden" value="{{ $cart['price'] }}" id="cart-price">
                                                <p class="para cart-main-desc-para">
                                                    <span id="price">{{ $cart['price'] }}</span>.00$
                                                </p>
                                            </div>
                                        </div>
                                        <hr class="cart-main-line">
                                        <div class="cart-main-footer">
                                            <ul class="cart-main-footer-list">
                                                <li class="cart-main-footer-list-item">
                                                    <div class="cart-main-footer-list-item-number">
                                                        <button class="cart-main-footer-list-item-number-btn"
                                                            id="decrement-btn">-</button>
                                                        <input type="hidden" value="1" id="cart-input-quantity">
                                                        <p class="para cart-number" id="cart-number">1</p>
                                                        <button class="cart-main-footer-list-item-number-btn"
                                                            id="increment-btn">+</button>
                                                    </div>
                                                </li>
                                                <li class="cart-main-footer-list-item">
                                                    <a href="{{ url('/delete_cart/' . $cart['id']) }}"
                                                        class="btn cart-main-btn" id="delete-cart">
                                                        Retirer
                                                        <span class="cart-main-icon">
                                                            <i class="fi fi-rr-trash"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="cart-main-container-content">
                                    <img src="{{ asset('images/barea-zebu.png') }}" alt=""
                                        class="cart-main-container-img">
                                    <h2 class="subtitle-primary cart-main-container-title">Votre panier est vide !</h2>
                                </div>
                            @endif
                        @endif
                    </div>
                </main>
                @if (Session::has('cart'))
                    @if (count(Session::get('cart')) != 0)
                        <footer class="cart-footer">
                            <input type="hidden" value="1" id="cart-price-input-total">
                            <h3 class="subtitle-primary cart-footer-subtitle">Prix Total : <span
                                    id="cart-price-total">00</span>.00 $</h3>
                            <a href="{{ url('/checkout') }}" class="btn btn-primary">
                                Proceder au payment
                                <i class="fi fi-rr-cash-register"></i>
                            </a>
                        </footer>
                    @else
                        <footer class="cart-footer">
                            <a href="{{ url('/shop') }}" class="btn btn-primary">Aller dans la boutique</a>
                        </footer>
                    @endif
                @endif
            </div>
        </section>
        {{-- endCart --}}

        <header class="shop-header">
            <div class="shop-header-desc">
                <div class="shop-header-desc-text">
                    <h2 class="subtitle-primary shop-header-desc-title">Collection Alefa Barea</h2>
                    <p class="para-primary shop-header-para">Tee-shirt de supporter du club Barea.</p>
                </div>
                <a href="{{ url('/shop_collection') }}" class="btn btn-primary shop-header-desc-btn">Aller au
                    Collection</a>
            </div>
        </header>

        {{-- maillot  --}}
        <main class="shop-main">
            <h2 class="title-primary shop-main-subtitle">Maillots Officiels</h2>

            <div class="shop-main-tab">
                @foreach ($articles as $article)
                    @if ($article->category == 'Maillot')
                        <button class="shop-main-tab-link" id="defaultOpen"
                            onclick="openShop('{{ $article->name }}', event)">{{ $article->name }}</button>
                    @endif
                @endforeach
            </div>

            @foreach ($articles as $article)
                <div class="shop-main-desc" id="{{ $article->name }}">
                    <div class="shop-main-desc-image">
                        <img src="{{ asset('storage/imageShop/' . $article->image) }}" alt=""
                            class="shop-main-desc-img">
                    </div>
                    <div class="shop-main-desc-text">
                        <h1 class="subtitle-primary shop-main-desc-text-title">{{ $article->name }} {{ $article->color }}
                        </h1>
                        <form action="{{ url('/cart/' . $article->id) }}" class="form shop-main-desc-form">
                            @csrf
                            <div class="form-content shop-main-desc-form-content">
                                <label class="label shop-main-desc-form-label">Taille :</label>
                                @php
                                    $sizes = array_filter(explode(', ', $article->size));
                                @endphp
                                @foreach ($sizes as $size)
                                    <label class="shop-main-desc-input-radio">{{ $size }}
                                        <input type="radio" checked='checked' name="taille"
                                            value="{{ $size }}" id=""
                                            class="shop-main-desc-input-radio-input">
                                        <span class="shop-main-desc-input-radio-checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="form-content shop-main-desc-form-content">
                                <label class="label shop-main-desc-form-label">Couleur :</label>
                                <label class="shop-main-desc-input-radio">{{ $article->color }}
                                    <input type="radio" checked='checked' name="color"
                                        value="{{ $article->color }}" id=""
                                        class="shop-main-desc-input-radio-input">
                                    <span class="shop-main-desc-input-radio-checkmark"></span>
                                </label>
                            </div>

                            <p class="para shop-main-desc-form-para">${{ $article->price }}.00</p>
                            <button type="submit" class="btn btn-tertiary shop-main-desc-form-btn">
                                Ajouter au pannier
                                <i class="fi fi-rr-shopping-cart-add"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </main>
        {{-- endMaillot  --}}

        {{-- t-shirt  --}}
        <main class="collection">
            <div class="collection-content">
                <h1 class="subtitle collection-content-title">Collection</h1>
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
                                        <p class="para">${{ $article->price }},00</p>
                                    </div>
                                    <p class="collection-content-list-item-para">Couleur : {{ $article->color }}</p>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </main>
        {{-- t-shirt  --}}
    </section>

    <script>
        // tab shirt
        function openShop(shirtName, evt) {
            const shopContents = document.querySelectorAll('.shop-main-desc')
            const shopBtns = document.querySelectorAll('.shop-main-tab-link')
            shopContents.forEach(shopContent => {
                shopContent.style.display = 'none'
            });
            shopBtns.forEach(shopBtn => {
                shopBtn.className = shopBtn.className.replace(" shop-main-tab-link-active", "")
            });
            document.getElementById(shirtName).style.display = 'flex'
            evt.currentTarget.className += ' shop-main-tab-link-active'
        }
        document.querySelector('#defaultOpen').click()

        // cart
        document.addEventListener('DOMContentLoaded', function() {
            const cartBtn = document.querySelector('.nav-link-btn')
            const closeCart = document.querySelector('.cart-header-btn')
            const cart = document.querySelector('.cart')
            const cartContent = document.querySelector('.cart-content')

            cartBtn.addEventListener('click', () => {
                cart.style.display = 'block'
                cartContent.style.right = 0
            })
            closeCart.addEventListener('click', () => {
                cart.style.display = 'none'
                cartContent.style.right = '-25rem'
            })
            window.onclick = (event) => {
                if (event.target == cart) {
                    cart.style.display = 'none'
                    cartContent.style.right = '-25rem'
                }
            }
        })

        // delete cart
        // $(document).ready(function() {
        //     $('#cart-main-btn').on('click', function(e) {
        //         e.preventDefault();
        //         let deleteUrl = $(this).attr('href')

        //         $.ajax({
        //             url: deleteUrl,
        //             method: 'DELETE',
        //             success: function(response) {
        //                 alert(response.success)
        //                 $('#cart-content').load(location.href + ' #cart-content')
        //             },
        //             error:function(xhr) {
        //                 console.error('Une erreur s\'est produite !')
        //             }
        //         })
        //     })
        // })

        // number cart
        function quantity() {
            const increments = document.querySelectorAll('#increment-btn')
            const decrements = document.querySelectorAll('#decrement-btn')

            increments.forEach(increment => {
                increment.addEventListener('click', (e) => {
                    let cart = e.target.closest('#cart-parent')
                    let articleNumber = cart.querySelector('#article-number')
                    let quantity = cart.querySelector('#cart-number')
                    let cartInputQuantity = cart.querySelector('#cart-input-quantity')
                    let cartInputNumber = parseFloat(cartInputQuantity.value)
                    let cartPrice = parseFloat(cart.querySelector('#cart-price').value)
                    let price = cart.querySelector('#price')

                    let total = cartInputNumber + 1
                    cartInputQuantity.value = total
                    quantity.textContent = total
                    articleNumber.textContent = total
                    cartPriceIncrement = cartPrice * total
                    price.textContent = cartPriceIncrement
                })
            });
            decrements.forEach(decrement => {
                decrement.addEventListener('click', (e) => {
                    let cart = e.target.closest('#cart-parent')
                    let articleNumber = cart.querySelector('#article-number')
                    let quantity = cart.querySelector('#cart-number')
                    let cartInputQuantity = cart.querySelector('#cart-input-quantity')
                    let cartInputNumber = parseFloat(cartInputQuantity.value)
                    let cartPrice = parseFloat(cart.querySelector('#cart-price').value)
                    let price = cart.querySelector('#price')

                    if (cartInputNumber > 1) {
                        let total = cartInputNumber - 1
                        cartInputQuantity.value = total
                        quantity.textContent = total
                        articleNumber.textContent = total
                        cartPriceIncrement = cartPrice * total
                        price.textContent = cartPriceIncrement
                    }
                })
            });
        }
        quantity()

        // total price
        function totalPrice() {
            let price = document.querySelectorAll('#price')
            let number = document.querySelectorAll('#cart-input-quantity')
            let cartPriceInputTotal = document.querySelector('#cart-price-input-total')
            let cartPriceTotal = document.querySelector('#cart-price-total')

            let data = []
            price.forEach(e => {
                data.push(parseInt(e.textContent))
            });
            let sum = 0
            data.forEach(e => {
                sum += e
            });
            if (sum != 0) {
                totalPrice = cartPriceInputTotal.textContent = sum
                cartPriceInputTotal.value = totalPrice
                cartPriceTotal.textContent = totalPrice
            }

            if (!sessionStorage.getItem('price')) {
                sessionStorage.setItem('price', JSON.stringify(sum))
            } else {
                sessionStorage.setItem('price', JSON.stringify(sum))
            }
            if (sum === 0) {
                sessionStorage.removeItem('price')
            }
            return sum
        }
        setInterval(totalPrice, 100);

        // storage
        function storage() {
            let row = document.querySelectorAll('.cart-main-content-desc')
            let order = []
            row.forEach(e => {
                order.push({
                    'image': e.children[0].children[0].src,
                    'article': e.children[1].children[0].textContent,
                    'size': e.children[1].children[1].children[0].textContent,
                    'color': e.children[1].children[2].children[0].textContent,
                    'number': e.children[1].children[3].children[0].textContent,
                    'price': e.children[1].children[5].value,
                })
            });

            if (!sessionStorage.getItem('order')) {
                sessionStorage.setItem('order', JSON.stringify(order))
            } else {
                sessionStorage.setItem('order', JSON.stringify(order))
            }
        }
        setInterval(storage, 100)
    </script>
@endsection
