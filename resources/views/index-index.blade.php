<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B-Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

</head>
<div class="home-product">
    <div class="grid">
        <div class="grid__row">
            <!-- product item -->
            @foreach($items as $item)
            <div class="grid__column-2-4">
                <a class="home-product-item" href="{{ route('ctdh' ,['id_item' => $item->id]) }}" target="_top">
                    <div class="home-product-item-img" style="background-image: url('{{$item->img}}');"></div>
                    <h4 class="home-product-item-name">{{ $item->name }}</h4>
                    <div class="home-product-item-price">
                        <span class="home-product-item-price-old">{{ number_format($item->cost, 0, ',', '.') }}đ</span>
                        <span class="home-product-item-price-curent">{{ number_format($item->cost * (1 - $item->sale/100) , 0, ',', '.')  }}đ</span>
                    </div>
                    <div class="home-product-item-action">
                        <div class="home-product-item__rating">
                            @for ($i = 0; $i < 5; $i++) @if($i < $item->star)
                                <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                @else
                                <i class="fa-solid fa-star"></i>
                                @endif
                                @endfor
                        </div>
                        <span class="home-product-item__sold">{{ $item->sold }} đã bán</span>
                    </div>
                    <!-- //city -->
                    <div class="home-product-item-origin">
                        <span class="home-product-item-origin-name">{{ $item->country }}</span>
                    </div>
                    <div class="home-product-item-favourite">
                        <i class="  fas fa-check"></i>
                        <span>Yêu thích</span>

                    </div>
                    <div class="home-product-item__sale-off">
                        <span class="home-product-item__sale-off-percent">{{$item->sale}}%</span>
                        <span class="home-product-item__sale-off-label">GIẢM</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <ul class="Pagination home-product__Pagination">
            <li class="Pagination-item">
                <a href="{{ $items->previousPageUrl() }}" class="Pagination-item__link">
                    <i class="Pagination-item__icon fa-solid fa-chevron-left"></i>
                </a>
            </li>

            @for ($i = 1; $i <= $items->lastPage(); $i++)
                <li class="Pagination-item{{ $i === $items->currentPage() ? ' Pagination-item--active' : '' }}">
                    <a href="{{ $items->url($i) }}" class="Pagination-item__link">{{ $i }}</a>
                </li>
                @endfor

                <li class="Pagination-item">
                    <a href="{{ $items->nextPageUrl() }}" class="Pagination-item__link">
                        <i class="Pagination-item__icon fa-solid fa-chevron-right"></i>
                    </a>
                </li>

        </ul>
    </div>
</div>
</div>



</html>