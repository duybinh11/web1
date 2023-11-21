<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product detail page</title>

    <!-- 
    - custom css link
  -->

    <link rel="stylesheet" href="{{ asset('assets/css/orderdetail.css') }}">


    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;500;700&display=swap" rel="stylesheet">

</head>



<body>

    <main>
        <article>
            <section class="section product" aria-label="product">

                <div class="container" id="item" data-item='@json($item)'></div>
                <div class="container">
                    <div class="product-slides">

                        <div class="slider-banner" data-slider>
                            <figure class="product-banner">
                                <img src="{{ $item->img }}" width="600" height="600" loading="lazy" alt="Nike Sneaker" class="img-cover">
                            </figure>

                        </div>

                    </div>

                    <div class="product-content">

                        <p class="product-subtitle">{{ $item->country }}</p>

                        <h1 class="h1 product-title">{{ $item->name }}s</h1>

                        <p class="product-text">
                            {{$item->img}}
                        </p>
                        <div class="detail__infor">
                            <div class="detail__infor-percentStar">
                                <span class="detail__infor-percent">{{ $item->star }}</span>
                                <div class="detail__infor-star">
                                </div>
                            </div>
                            <div class="detail__infor-Evaluate">
                                <span class="detail__infor-Evaluate__number">1.5k</span>
                                <span class="detail__infor-Evaluate__letter">Đánh Giá</span>
                            </div>
                            <div class="detail__infor-sold">
                                <span class="detail__infor-sold__number">{{ $item->sold }} </span>
                                <span class="detail__infor-sold__letter">Đã Bán</span>
                            </div>

                        </div>

                        <div class="wrapper">
                            <span class="price" id="data-total-price">{{ number_format($cart->sl*$item->cost * (1 - $item->sale/100) , 0, ',', '.')  }}đ</span>

                            <span class="badge">{{ $item->sale }}%</span>

                            <del class="del" id="data-qty-old">{{ number_format($cart->sl*$item->cost, 0, ',', '.')  }}đ</del>

                        </div>

                        <div class="btn-group">

                            <div class="counter-wrapper">

                                <button class="counter-btn" id="data-qty-minus">
                                    <ion-icon name="remove-outline"></ion-icon>
                                </button>

                                <span class="span" id="data-qty">1</span>

                                <button class="counter-btn" id="data-qty-plus">
                                    <ion-icon name="add-outline"></ion-icon>
                                </button>

                            </div>
                            <form id="addToCartForm" action="{{ route('addCartHandle') }}" method="get">
                                <input type="hidden" name="id_item" value="{{ $item->id }}" />
                                <input type="hidden" name="sl" id="slInput" value=1 />
                                <button type="submit" class="cart-btn">
                                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                    <span class="span">Mua Hàng</span>
                                </button>
                            </form>


                        </div>

                    </div>

                </div>

                </div>
            </section>

        </article>
    </main>






    <script>
        var myElement = document.getElementById('item');
        var itemData = JSON.parse(myElement.getAttribute('data-item'));

        function addEventOnElem(element, event, callback) {
            element.addEventListener(event, callback);
        }
        /**
         * product quantity functionality
         */
        const qtyInput = document.getElementById('slInput');
        const totalPriceElem = document.getElementById("data-total-price");
        const totalOld = document.getElementById("data-qty-old");
        const qtyElem = document.getElementById("data-qty");
        const qtyMinusBtn = document.getElementById("data-qty-minus");
        const qtyPlusBtn = document.getElementById("data-qty-plus");

        // set the product default quantity
        let qty = 1;

        // set the product default price
        let productPrice = itemData.cost * (1 - itemData.sale / 100);

        // set the initial total price
        let totalPrice = 0;

        const increaseProductQty = function() {
            qty++;
            totalPrice = qty * productPrice;

            qtyElem.textContent = qty;
            qtyElem.value = qty;
            const formattedPrice = totalPrice.toLocaleString('vi-VN');
            totalPriceElem.textContent = `${formattedPrice} đ`;


            qtyInput.value = qty;

            var old = qty * itemData.cost;
            const formattedOld = old.toLocaleString('vi-VN');
            totalOld.textContent = `${formattedOld} đ`
        }

        addEventOnElem(qtyPlusBtn, "click", increaseProductQty);

        const decreaseProductQty = function() {
            if (qty > 1) qty--;
            totalPrice = qty * productPrice;

            qtyElem.textContent = qty;
            const formattedPrice = totalPrice.toLocaleString('vi-VN');
            totalPriceElem.textContent = `${formattedPrice} đ`;

            qtyInput.value = qty;

            var old = qty * itemData.cost;
            const formattedOld = old.toLocaleString('vi-VN');
            totalOld.textContent = `${formattedOld} đ`
        }

        addEventOnElem(qtyMinusBtn, "click", decreaseProductQty);
    </script>
    <!-- 
    - custom js link
  -->


    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>