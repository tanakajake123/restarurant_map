@extends('layouts.app')

@section('content')
<div class="container p-0">
   <div class="row no-gutters">
      <div class="col-lg-6 order-lg-1 mx-auto showcase-text">
         <h2>新しいレストラン登録</h2>

         <form method="post" action="{{ route('restaurant.store') }}">
            @csrf

            <div class="mb-3">
               <label for="nameInput" class="form-label">レストラン名</label>
               <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="nameInput" placeholder="レストランの名前">
            </div>

            <div class="mb-3">
               <label for="addressInput" class="form-label">住所</label>
               <input name="address" value="{{ old('address') }}" type="text" class="form-control" id="addressInput" placeholder="">
            </div>

            <div class="mb-3">
               <label for="visitedDate" class="form-label">来訪日</label>
               <input name="visited_date" value="{{ old('visited_date') }}" type="date" class="form-control" id="visited_date;" placeholder="">
            </div>

            <div class="mb-3">
               <label for="companionInput" class="form-label">同行者</label>
               <input name="companion" value="{{ old('companion') }}" type="text" class="form-control" id="companionInput" placeholder="一緒に行った人">
            </div>

            <div class="mb-3">
               <label for="ratingInput" class="form-label">星評価</label>

               <select name="rating" class="custom-select">
                  <option value=""> 星の数を入れる </option>
                  <option value="1">☆</option>
                  <option value="2">☆☆</option>
                  <option value="3">☆☆☆</option>
               </select>
            </div>

            <div class="mb-3">
               <label for="tasteInput" class="form-label">味</label>
               <select name="taste" class="custom-select">
                  <option value=""> 星の数を入れる </option>
                  <option value="1">☆</option>
                  <option value="2">☆☆</option>
                  <option value="3">☆☆☆</option>
               </select>
            </div>

            <div class="mb-3">
               <label for="atmosphereInput" class="form-label">雰囲気</label>
               <select name="atmosphere" class="custom-select">
                  <option value=""> 星の数を入れる </option>
                  <option value="1">☆</option>
                  <option value="2">☆☆</option>
                  <option value="3">☆☆☆</option>
               </select>
            </div>

            <div class="mb-3">
               <label for="serviceInput" class="form-label">サービス</label>
               <select name="service" class="custom-select">
                  <option value=""> 星の数を入れる </option>
                  <option value="1">☆</option>
                  <option value="2">☆☆</option>
                  <option value="3">☆☆☆</option>
               </select>
            </div>

            <div class="mb-3">
               <label for="cleanlinessInput" class="form-label">清潔さ</label>
               <select name="cleanliness" class="custom-select">
                  <option value=""> 星の数を入れる </option>
                  <option value="1">☆</option>
                  <option value="2">☆☆</option>
                  <option value="3">☆☆☆</option>
               </select>
            </div>

            <div class="mb-3">
               <label for="moneyInput" class="form-label">金額</label>
               <select name="money" class="custom-select">
                  <option value=""> 星の数を入れる </option>
                  <option value="1">☆</option>
                  <option value="2">☆☆</option>
                  <option value="3">☆☆☆</option>
               </select>
            </div>

            <div class="mb-3">
               <label for="imageInput" class="form-label">画像</label></label>
               <br>
               <input name="image" value="" type="file">
            </div>

            <div class="mb-3">
               <label for="image2Input" class="form-label">画像2</label></label>
               <br>
               <input name="image2" value="" type="file">
            </div>

            <div class="mb-3">
               <label for="image3Input" class="form-label">画像3</label></label>
               <br>
               <input name="image3" value="" type="file">
            </div>


            <input type="submit" value="作成" class="btn btn-primary" />
         </form>

      </div>
   </div>
</div>
@endsection