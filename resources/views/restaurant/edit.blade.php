@extends('layouts.app')

@section('content')
<div class="container p-0">
   <div class="row no-gutters">
      <div class="col-lg-6 order-lg-1 mx-auto showcase-text">
         <h2>レストラン情報編集</h2>

         <form method="post" action="{{ route('restaurant.update', $restaurant->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
               <label for="nameInput" class="form-label">レストラン名</label>
               <input name="name" value="{{ old('name', $restaurant->name) }}" type="text" class="form-control" id="nameInput" placeholder="お名前">
            </div>

            <div class="mb-3">
               <label for="nameInput" class="form-label">住所</label>
               <input name="name" value="{{ old('name', $restaurant->name) }}" type="text" class="form-control" id="nameInput" placeholder="お名前">
            </div>

            <div class="mb-3">
               <label for="visitedDate" class="form-label">来訪日</label>
               <input name="visited_date" value="{{ old('visited_date' ,$restaurant->visited_date) }}" type="date" class="form-control" id="visited_date;" placeholder="">
            </div>

            <div class="mb-3">
               <label for="companionInput" class="form-label">同行者</label>
               <input name="companion" value="{{ old('companion' ,$restaurant->companion) }}" type="text" class="form-control" id="companionInput" placeholder="一緒に行った人">
            </div>

            <div class="mb-3">
               <label for="ratingInput" class="form-label">星評価</label>
               <!-- <input name="rating" value="{{ old('rating' ,$restaurant->rating) }}" type="text" class="form-control" id="ratingInput" placeholder="星の数を入れる"> -->

               <select name="rating" class="custom-select">
                  <option value=""> 星の数を選択してください </option>
                  <option value="1" @if($restaurant->rating == 1) selected @endif>☆</option>
                  <option value="2" @if($restaurant->rating == 2) selected @endif>☆☆</option>
                  <option value="3" @if($restaurant->rating == 3) selected @endif>☆☆☆</option>
               </select>
            </div>


            <div class="mb-3">
               <label for="tasteInput" class="form-label">味</label>
               <select name="taste" class="custom-select">
                  <option value="">星の数を選択してください</option>
                  <option value="1" @if($restaurant->taste == 1) selected @endif>☆</option>)
                  <option value="2" @if($restaurant->taste == 2) selected @endif>☆☆</option>)
                  <option value="3" @if($restaurant->taste == 3) selected @endif>☆☆☆</option>)
               </select>
            </div>

            <div class="mb-3">
               <label for="atmosphereInput" class="form-label">雰囲気</label>
               <select name="atmosphere" class="custom-select">
                  <option value="">星の数を選択してください</option>
                  <option value="1" @if($restaurant->atmosphere == 1) selected @endif>☆</option>)
                  <option value="2" @if($restaurant->atmosphere == 2) selected @endif>☆☆</option>)
                  <option value="3" @if($restaurant->atmosphere == 3) selected @endif>☆☆☆</option>)
               </select>
            </div>

            <div class="mb-3">
               <label for="serviceInput" class="form-label">サービス</label>
               <select name="service" class="custom-select">
                  <option value="">星の数を選択してください</option>
                  <option value="1" @if($restaurant->service == 1) selected @endif>☆</option>)
                  <option value="2" @if($restaurant->service == 2) selected @endif>☆☆</option>)
                  <option value="3" @if($restaurant->service == 3) selected @endif>☆☆☆</option>)
               </select>
            </div>

            <div class="mb-3">
               <label for="cleanlinessInput" class="form-label">清潔さ</label>
               <select name="cleanliness" class="custom-select">
                  <option value="">星の数を選択してください</option>
                  <option value="1" @if($restaurant->cleanliness == 1) selected @endif>☆</option>)
                  <option value="2" @if($restaurant->cleanliness == 2) selected @endif>☆☆</option>)
                  <option value="3" @if($restaurant->cleanliness == 3) selected @endif>☆☆☆</option>)
               </select>
            </div>

            <div class="mb-3">
               <label for="moneyInput" class="form-label">金額</label>
               <select name="money" class="custom-select">
                  <option value="">星の数を選択してください</option>
                  <option value="1" @if($restaurant->money == 1) selected @endif>☆</option>)
                  <option value="2" @if($restaurant->money == 2) selected @endif>☆☆</option>)
                  <option value="3" @if($restaurant->money == 3) selected @endif>☆☆☆</option>)
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
               <input name="image2" value="{{ old('image2' ,$restaurant->image_path2) }}" type="file">
            </div>

            <div class="mb-3">
               <label for="image3Input" class="form-label">画像3</label></label>
               <br>
               <input name="image3" value="{{ old('image3' ,$restaurant->image_path3) }}" type="file">
            </div>

            <div class="mb-3">
               <label for="companionInput" class="form-label">Location</label>
               @include('restaurant.form.input_map',['latitude' =>  $restaurant->lat_lng['latitude'], 'longitude' =>  $restaurant->lat_lng['longitude']])
            </div>


            <div class="mb-3">
               <label for="moneyInput" class="form-label">Comment</label>
               <textarea name="Comment" value="{{ old('money' ,$restaurant->money) }}" class="form-control" id="moneyInput" placeholder="金額"></textarea>
            </div>
            <input type="submit" value="保存" class="btn btn-primary" />
         </form>
      </div>
   </div>
</div>
</div>
@endsection