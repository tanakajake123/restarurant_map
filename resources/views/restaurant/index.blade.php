<!-- Image Showcases -->
<section class="showcase">
   <div class="container-fluid p-0">
      <div class="row no-gutters">
         <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Recipe Index</h2>

            @foreach($restaurant_list as $restaurant)
            <p>
               {{ $restaurant->id }}
               {{ $restaurant->name }}

               <a href="{{ route('restaurant.show', $restaurant->id) }}" class="btn btn-primary">Detail</a>
               <a href="{{ route('restaurant.edit', $restaurant->id) }}" class="btn btn-success">Edit</a>
               <a href="{{ route('restaurant.confirm', $restaurant->id) }}" class="btn btn-danger">Delete</a>
               </p>
            @endforeach

         </div>
      </div>
   </div>
</section>