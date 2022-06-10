@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row no-gutters">
      <div class="col-lg-6 order-lg-1 mx-auto showcase-text">

         <h2>レストラン一覧</h2>

         <div class="mb-3 text-right">
            <a class="btn btn-primary" href="{{url('/restaurant/create')}}">
               <i class="fas fa-pen"></i> 新規作成
            </a>
         </div>

         <ul class="list-group">
         @foreach($restaurant_list as $restaurant)
         <li class="list-group-item">
            <div class="row">
               <div class="col">
                  レストラン名：{{ $restaurant->name }}
               </div>
               <div class="col text-right">
                  <a href="{{ route('restaurant.show', $restaurant->id) }}" class="btn btn-primary">Detail</a>
                  <a href="{{ route('restaurant.edit', $restaurant->id) }}" class="btn btn-success">Edit</a>
                  <a href="{{ route('restaurant.confirm', $restaurant->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
               </div>
            </div>
         </li>
         @endforeach
         </ul>


      </div>
   </div>

</div>
@endsection