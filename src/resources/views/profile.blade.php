@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="mypage__content">
    <div class="profile">
        <div class="profile__item">
            @if ($user->image)
                <img class="profile__item--img" src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}">
            @else
                <div class="profile__item--default-img"></div>
            @endif
        </div>
        <div class="profile__item">
            <input class="profile__item--name" type="text" value="{{ $user->name }}" readonly>
        </div>
        <div class="profile__item">
            <a class="profile__item--link" href="/mypage/profile">プロフィールを編集</a>
        </div>
    </div>
    <div class="product-list__tab">
        <input class="product-list__tab--input" type="radio" name="tab" id="tab1" {{ $tab === 'sell' ? 'checked' : '' }} onclick="window.location.href='{{ url('/mypage?tab=sell') }}'" checked>
        <label class="product-list__tab--label" for="tab1">出品した商品</label>
        <input class="product-list__tab--input" type="radio" name="tab" id="tab2" {{ $tab === 'buy' ? 'checked' : '' }} onclick="window.location.href='{{ url('/mypage?tab=buy') }}'">
        <label class="product-list__tab--label" for="tab2">購入した商品</label>
        <div class="product-list__item">
            @if($tab === "sell")
            @foreach ($products as $product)
                <div class="product-list__item--box" id="content1">
                    <a class="product-list__item--link" href="{{ route('products.show', $product->id) }}">
                        <img class="product-list__item--img" src="{{ $product->image }}" alt="{{ $product->name }}">
                        <p class="product-list__item--name">{{ $product->name }}</p>
                    </a>
                </div>
            @endforeach
            @elseif ($tab === 'buy')
            @foreach ($purchasedProducts as $order)
                <div class="product-list__item--box" id="content2">
                    <a class="product-list__item--link" href="{{ route('products.show', $order->product->id) }}">
                        <img class="product-list__item--img" src="{{ $order->product->image }}" alt="{{ $order->product->name }}">
                        <p class="product-list__item--name">{{ $order->product->name }}</p>
                    </a>
                </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection