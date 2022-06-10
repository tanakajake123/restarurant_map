@extends('layouts.app')

@section('content')
<div class="container p-0">
   <div class="row no-gutters">
      <div class="col-lg-6 order-lg-1 mx-auto showcase-text">
         <h2>レストラン情報</h2>

         {{ Breadcrumbs::render('restaurant.show', $restaurant) }}

         <p>No：{{ $restaurant->id }}</p>
         <p>投稿者: {{ ($restaurant->user) ? $restaurant->user->name : "-" }}</p>
         <p>レストラン名：{{ $restaurant->name }}</p>
         <p>住所：{{ $restaurant->address }}</p>
         <p>来訪日：{{ $restaurant->visited_date }}</p>
         <p>同行者：{{ $restaurant->companion }}</p>
         <p>星評価：{{ str_repeat('☆', $restaurant->rating*1) }}</p>
         <p>味：{{ str_repeat('☆', $restaurant->taste*1) }}</p>
         <p>雰囲気：{{ str_repeat('☆', $restaurant->atmosphere*1) }}</p>
         <p>サービス：{{ str_repeat('☆',$restaurant->service*1) }}</p>
         <p>清潔さ：{{ str_repeat('☆',$restaurant->cleanliness*1) }}</p>
         <p>金額：{{ str_repeat('☆',$restaurant->money*1) }}</p>
         <p>緯度: {{ $restaurant->lat_lng["latitude"] }}</p>
         <p>経度: {{ $restaurant->lat_lng["longitude"] }}</p>

         <p>
            <img src="{{ asset(Storage::url($restaurant->image_path)) }}" class="w-50" />
            <img src="{{ asset(Storage::url($restaurant->image_path2)) }}" class="w-50" />
            <img src="{{ asset(Storage::url($restaurant->image_path3)) }}" class="w-50" />
         </p>

      </div>
   </div>
   <a href="{{ route('restaurant.edit', $restaurant->id) }}" class="btn btn-success">Edit</a>
</div>
</div>
@endsection