//map
function initMap() {13.819392695241373, 100.51440769448739
    const kmutnb = { lat: 13.819392695241373, lng: 100.51440769448739 };
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 14,
      center: kmutnb,
    });
    const marker = new google.maps.Marker({
      position: kmutnb,
      map: map,
    });
  }
  
  window.initMap = initMap;