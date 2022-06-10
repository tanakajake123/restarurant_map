@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row no-gutters">
      <div class="col-lg-6 order-lg-1 mx-auto showcase-text">

         <h2>レストラン Map</h2>

         <div class="mb-3 text-right">
            <a class="btn btn-primary" href="{{url('/restaurant/create')}}">
               <i class="fas fa-pen"></i> 新規作成
            </a>
            <a class="btn btn-secondary js-btn-current" href="#">Current Pos</a>
         </div>

         <div id="input-map-canvas" style="height:300px;"></div>




<script type="text/javascript">
function initMap(){
   let latitude = "{{ $latitude }}" * 1.0;
   let longitude = "{{ $longitude }}" * 1.0;


   // The location of Uluru
   const center = { lat: latitude, lng: longitude };
   // The map, centered at Uluru
   let map = new google.maps.Map(
      document.getElementById("input-map-canvas"),
      {
         zoom: 16,
         center: center,
      }
   );

   //情報Windowを事前に作成する
   const infoWindow = new google.maps.InfoWindow();

   let markers = @json($markers);
   for(let marker of markers){
      console.log(marker);
      let markerItem = new google.maps.Marker({
         position: { lat: marker.latitude, lng: marker.longitude },
         map: map,
      });

      //マーカーのクリックイベント
      markerItem.addListener("click", function () {
         console.log("marker click " + marker.title);

         //前別のWindowを開いていたら閉じる
         infoWindow.close();

         // //情報Windowの中身を書き換える
         // //情報Windowの中身はHTMLで書き換えることが出来る
         infoWindow.setContent(
            "<h5>" +
            marker.title +
               "</h5>" +
               "<p>" +
               Math.floor(marker.distance * 100) +
               "KM</p>" +
               '<a href="comgooglemaps://?q=@'+ marker.latitude+','+marker.longitude+'">open map app</a>' +
               '<a href="http://maps.apple.com/maps?q='+ marker.latitude+','+marker.longitude+'">open map</a>'
               // "<p>" +
               // latitude +
               // "," +
               // longitude +
               // "</p>"
         );

         // //情報Windowを開く
         infoWindow.open(markerItem.getMap(), markerItem);
      });
   }

   const mapCurrentPos = function(){
      navigator.geolocation.getCurrentPosition(function(position){
         let lat = position.coords.latitude;
         let lng = position.coords.longitude;
         // console.log(lat, lng);
         // map.setCenter({
         //    lat: "{{ $latitude }}" * 1.0,
         //    lng: "{{ $longitude }}" * 1.0
         // })
         location.href = "{{ url('/restaurant/map') }}?lat=" + lat + "&lng=" + lng;
      });
   };

   $(".js-btn-current").on("click", function(){
      mapCurrentPos();
   });

}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA27L16pFqsFLMBQfRXp0Gjq23LgmdjdcI&callback=initMap&language=ja_JP"></script>

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