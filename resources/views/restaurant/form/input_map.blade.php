<input id="js-input-lat" name="location[latitude]" value="{{ $latitude }}" type="hidden" class="form-control" placeholder="緯度">
<input id="js-input-lng" name="location[longitude]" value="{{ $longitude }}" type="hidden" class="form-control" placeholder="経度">

緯度: <span id="js-text-lat">{{ $latitude }}</span> 経度: <span id="js-text-lng">{{ $longitude }}</span>

<div class="p-3 border">
   <h5>住所から地図を移動</h5>
   <input id="js-input-address" value="" type="text" class="form-control" placeholder="住所,郵便番号など">
   <input type="button" class="btn btn-secondary" value="検索" onclick="doSearch();">
</div>

<div id="input-map-canvas" style="height:300px;"></div>


<script type="text/javascript">
let map;
let marker;
function initMap(){
   let latitude = "{{ $latitude }}" * 1.0;
   let longitude = "{{ $longitude }}" * 1.0;

   // The location of Uluru
   const center = { lat: latitude, lng: longitude };
   // The map, centered at Uluru
   map = new google.maps.Map(
      document.getElementById("input-map-canvas"),
      {
         zoom: 16,
         center: center,
      }
   );
   // The marker, positioned at Uluru
   marker = new google.maps.Marker({
      position: center,
      map: map,
   });

   map.addListener("drag", function (argument) {
      marker.setPosition(map.center);
      //console.log(map.center.lat(),map.center.lng());
      $("#js-input-lat").val(map.center.lat());
      $("#js-input-lng").val(map.center.lng());

      $("#js-text-lat").html(map.center.lat());
      $("#js-text-lng").html(map.center.lng());
   });
}

function doSearch(){
   const input = $("#js-input-address").val();

   //ジオコーダーを作成
   const geocoder = new google.maps.Geocoder();

   geocoder.geocode(
   {
      address: input,
      region: "jp",
      language: "ja_JP",
   },
   function (results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
            //処理
            console.log(results);

            const pos = results[0].geometry.location;
            map.setCenter({
               lat: pos.lat(),
               lng: pos.lng(),
            });
            marker.setPosition({
               lat: pos.lat(),
               lng: pos.lng(),
            });

            $("#js-input-lat").val(pos.lat());
            $("#js-input-lng").val(pos.lng());
      }
   });
}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA27L16pFqsFLMBQfRXp0Gjq23LgmdjdcI&callback=initMap&language=ja_JP"></script>