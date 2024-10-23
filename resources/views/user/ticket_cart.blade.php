@extends('user.layouts.master')

@section('title')
    Panier du billet
@endsection

@section('content')
    <section class="ticket-cart">
        <header class="ticket-cart-header">
            <h2 class="subtitle-primary">Panier</h2>
        </header>
        <main class="ticket-cart-main">
            <ul class="ticket-cart-main-list">
                <li class="ticket-cart-main-list-item" id="ticket-cart">
                    <div class="ticket-cart-main-list-item-desc">
                        <header class="ticket-cart-main-list-item-desc-header">
                            <h4 class="subtitle-primary">Billet VIP</h4>
                        </header>
                        <main class="ticket-cart-main-list-item-desc-main">
                            <div class="ticket-cart-main-list-item-desc-main-left">
                                <p class="para">Tribune Est</p>
                                {{-- number  --}}
                                <h4 class="subtitle ticket-detail-main-list-item-main-subtitle">Nombre</h4>
                                <div class="ticket-detail-main-list-item-main-number">
                                    <span class="ticket-detail-main-list-item-main-number-btn" id="decrement">-</span>
                                    <input type="hidden" name="ticket-number" value="1" id="ticket-number-input">
                                    <span class="ticket-detail-main-list-item-main-number-nbr para-primary"
                                        id="ticket-number">1</span>
                                    <span class="ticket-detail-main-list-item-main-number-btn" id="increment">+</span>
                                </div>
                                {{-- end number  --}}
                            </div>
                            <div class="ticket-cart-main-list-item-desc-main-right">
                                <div class="ticket-header-content">
                                    <h3 class="subtitle">Madagascar</h3>
                                    <h2 class="subtitle">VS</h2>
                                    <h3 class="subtitle">Comore</h3>
                                </div>
                                <p class="para ticket-header-content-main-para">
                                    Stade Barea Mahamasina
                                    <i class="fi fi-rr-marker"></i>
                                </p>
                                <p class="para ticket-header-content-main-para">
                                    17/7/2024 à 15:00
                                    <i class="fi fi-rr-calendar-day"></i>
                                </p>
                            </div>
                        </main>
                    </div>
                </li>
            </ul>
        </main>
    </section>

    <script>
        // const increment = document.querySelector('#increment')
        // const decrement = document.querySelector('#decrement')
        // let number = +document.querySelector('#ticket-number').textContent
        // let numberInput = +document.querySelector('#ticket-number-input').value
        // let num = 1
        // increment.addEventListener('click', () => {
        //     let sum = num + 1
        //     num = sum
        //     document.querySelector("#ticket-number-input").value = sum
        //     document.querySelector('#ticket-number').textContent = sum
        // })
        // decrement.addEventListener('click', () => {
        //     if (num > 1) {
        //         let sum = num - 1
        //         num = sum
        //         document.querySelector("#ticket-number-input").value = sum
        //         document.querySelector('#ticket-number').textContent = sum
        //     }
        // })

        // number cart
        function quantity() {
            const increments = document.querySelectorAll('#increment')
            const decrements = document.querySelectorAll('#decrement')

            increments.forEach(increment => {
                increment.addEventListener('click', (e) => {
                    let cart = e.target.closest('#ticket-cart')
                    let articleNumber = cart.querySelector('#article-number')
                    let quantity = cart.querySelector('#cart-number')
                    let cartInputQuantity = cart.querySelector('#ticket-number-input')
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
    </script>


@endsection
