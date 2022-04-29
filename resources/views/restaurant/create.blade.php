@include("parts.nav")

<!-- Image Showcases -->
<section class="showcase">
   <div class="container-fluid p-0">
      <div class="row no-gutters">
         <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>restaurant</h2>

            <form method="post" action="{{ route('restaurant.store') }}">
               @csrf

               <div class="mb-3">
                  <label for="nameInput" class="form-label">レストラン名</label>
                  <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="nameInput" placeholder="レストランの名前">
               </div>

               <!-- <div class="mb-3">
                  <label for="visitedDate" class="form-label">来訪日</label>
                  <input name="visited_date" value="{{ old('visited_date') }}" type="date" class="form-control" id="visited_date;" placeholder="">
               </div> -->

               <div class="mb-3">
                  <label for="companionInput" class="form-label">同行者</label>
                  <input name="companion" value="{{ old('companion') }}" type="text" class="form-control" id="companionInput" placeholder="一緒に行った人">
               </div>

               <div class="mb-3">
                  <label for="ratingInput" class="form-label">星評価</label>
                  <input name="rating" value="{{ old('rating') }}" type="text" class="form-control" id="ratingInput" placeholder="星の数を入れる">
               </div>

               <input type="submit" value="作成" class="btn btn-primary" />
            </form>

         </div>
      </div>
   </div>
</section>
