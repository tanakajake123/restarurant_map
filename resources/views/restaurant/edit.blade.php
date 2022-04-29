
<!-- Image Showcases -->
<section class="showcase">
   <div class="container-fluid p-0">
      <div class="row no-gutters">
         <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Contact</h2>

            <form method="post" action="{{ route('restaurant.update', $restaurant->id) }}">
               @csrf

               <div class="mb-3">
                  <label for="nameInput" class="form-label">Name</label>
                  <input name="name" value="{{ old('name', $restaurant->name) }}" type="text" class="form-control" id="nameInput" placeholder="お名前">
               </div>

               <!-- <div class="mb-3">
                  <label for="urlInput" class="form-label">Url</label>
                  <input name="id" value="{{ old('id', $restaurant->id) }}" type="text" class="form-control" id="idInput" placeholder="aaaa">
               </div> -->



               <input type="submit" value="保存" class="btn btn-primary" />
            </form>

         </div>
      </div>
   </div>
</section>