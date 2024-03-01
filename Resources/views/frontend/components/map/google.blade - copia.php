<script>

    //Global Variables
    let map;
    let bounds;
    let markers = [];
    let urlMarkerIcon;

    //Validation to Marker Icon
    @if(isset($imageIcon) && !is_null($imageIcon))
      urlMarkerIcon = "{{$imageIcon}}"
    @endif

    //Validation Modal
    @if(!isset($inModal) || !$inModal)
      document.addEventListener("DOMContentLoaded", function () {
    @endif

    //Validation Geocoder to get address
    @if($allowMoveMarker)
      geocoder = new google.maps.Geocoder();
    @endif


    /*
    * Google Map | INIT
    */
    function initMap() 
    {   
        const position = {lat: {{$lat}}, lng: {{$lng}}};
       
        map = new google.maps.Map(document.getElementById("{{$mapId}}"), {
          zoom: {{$zoom}},
          center: position,
        });

        //Init locations | By default always added one element not necessary to maps livewire component
        @if($usingLivewire==false)
          setSimpleMarkerGoogle(position)
        @endif

        //Allow User Move a marker | Prueba 1
        /*
        @if($allowMoveMarker)
          google.maps.event.addListener(map, 'click', function(event) {
            deleteMarkersGoogle()
            setSimpleMarkerGoogle(event.latLng)
            var clickData = event.latLng.toJSON();

            console.warn(event)
            //console.warn(clickData)
            // Emit to Component: Iprofile | Address Form
            //window.livewire.emit('selectedMarkerInMap',clickData);
          });
        @endif
        */
       

    }

    //INIT GOOGLE MAPS
    initMap();

    //Validation Modal
    @if(!isset($inModal) || !$inModal) 
      });
    @endif


    /*
    * Set Simple mark
    */
    function setSimpleMarkerGoogle(position)
    {
      var marker = new google.maps.Marker({
          position: position, 
          map: map,
      @if($allowMoveMarker) draggable:true @endif
      });

      @if($allowMoveMarker)
        marker.addListener("dragend", (event) => {
          const mPosition = marker.position;
          //console.log("LAT:"+mPosition.lat())

          // Get Address 
          getAddressFromPosition(marker.getPosition());

        });
      @endif

      markers.push(marker)
    }

    /*
    * Set Markers in Google Map (Case Item Maps | Livewire Component)
    */
    function setMarkerGoogle(bounds)
    {
      
      const itemPosition = {lat: parseFloat(locLat), lng: parseFloat(locLng)};
      //const iconMarker = "https://dev-lip.ozonohosting.com/assets/media/marker-2.png?u=1705935415";
    
      //Init Marker
      const googleMarker = new google.maps.Marker({
            position: itemPosition,
            map: map,
            title: locTitle,
            label: locId.toString(),
            icon: urlMarkerIcon
      });
      
      //Prueba de marcador personalizado | no funcionó, genera error en "marker"
      /*
      const priceTag = document.createElement("div");
      priceTag.className = "price-tag";
      priceTag.textContent = "$2.5M";
      const googleMarker = new google.maps.marker.AdvancedMarkerView({
            position: itemPosition,
            map: map,
            content: priceTag
      });
      */
      //======================

      //Content POPUP
      var popup = new google.maps.InfoWindow({
        content: locView
      });
      
      //Event Click
      googleMarker.addListener("click", () => {
        popup.open(map,googleMarker);
      });
    
      //Set Bounds
      bounds.extend(itemPosition);

      //Save maker
      markers.push(googleMarker);

    }

    /*
    * Deletes all markers in the array by removing references to them. (Case Item Maps | Livewire Component)
    */
    function deleteMarkersGoogle() 
    {

      for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
      }
      markers = [];

    }

    /*
    * Get Address Format 
    */
    function getAddressFromPosition(pos) 
    {
      var addressFormat;

      geocoder.geocode({latLng: pos}, function(responses) {
       
        if (responses && responses.length > 0) {
          //console.warn(responses)
          addressFormat = responses[0].formatted_address;

          //method in  = Address Form | Auto Complete Google
          var addressData = getDataFromAddress(responses[0].address_components)

        } else {
          addressFormat = 'Cannot determine address at this location.';
        }

        //Send data to Address Component
        emitAddressToUpdate(addressFormat,pos,addressData)
      });

    }
  
    /*
    * Send Data to Livewire Address Form Component
    */
    function emitAddressToUpdate(addressFormat,pos,addressData)
    {
      //Data Final
      var newPosition = {lat: pos.lat(), lng: pos.lng()}
     
      //@var inputVarName ya fue declarada en el componente livewire
      var dataToSend = {inputValue: addressFormat, inputVarName: inputVarName, newPosition: newPosition, addressData: addressData}; 

      //Emit to send data
      window.livewire.emit('updateDataFromExternal',dataToSend);
    }

    /*
    * LIVEWIRE | Listener Component | Case Address Form
    */
    window.addEventListener('google-update-marker-in-map', event => {
      //Before delete markers
      deleteMarkersGoogle()

      //Init and Reset Bounds
      var bounds = new google.maps.LatLngBounds();

      //Get data
      itemPosition = event.detail.itemPosition

      //Create Marker
      setSimpleMarkerGoogle(itemPosition)

      //Set Bounds
      bounds.extend(itemPosition);
      map.fitBounds(bounds);

    });
  
</script>