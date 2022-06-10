<!-- Image Showcases -->
@include("parts.nav")
<link rel="stylesheet" href="{{ asset('css/styles.css')}}" />
<section class="showcase">
   <div class="container-fluid p-0">
      <div class="row no-gutters">
         <div class="col-lg-6 order-lg-1 mx-auto showcase-text">
            <h2>Recipe Delete Confirm</h2>

            <p>{{ $restaurant->id }}</p>
            <p>{{ $restaurant->name }}</p>

            <p>を削除しますか?</p>

            <form method="post" action="{{ route('restaurant.delete', $restaurant->id) }}">
               @csrf
               <input type="submit" value="削除" class="btn btn-primary" />
            </form>


         </div>
      </div>
   </div>
</section>