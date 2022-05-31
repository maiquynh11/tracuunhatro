<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
    />
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
      integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
      crossorigin=""
    />
    <script
      src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
      integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
      crossorigin=""
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <title>Document</title>
    <style>
        #map-container, #map, #app {
            height: 100%;
        }
        #map {
            min-height: 800px;
        }
        .marker-nhatro {
          width: 90px;
          height: 90px;
          border: 2px solid red;
          background-color: blue;
        }
        .marker-tentram {
          color: black;
          background-color: aliceblue;
          font-size: 12px;
          width: 100px;
          border: solid black 1px;
        }
        .marker-tentram:hover {
          -webkit-box-shadow: 5px 5px 15px 5px #000000; 
          box-shadow: 5px 5px 15px 5px #000000;
        }
    </style>
  </head>
  <body>
    <div id="app" class="row">
        <div id="topbar" class="col-md-12"></div>
        <div id="sidebar" class="col-md-4">
          <div v-if="sidebarViewType == 'detailNhatro' && selectedMarkerData.tieude">
            <div v-on:click="showListNhatro()"><--Quay về danh sách</div>
            <div>Tên: {{selectedMarkerData.tieude}}</div>
            <div>Lat: {{selectedMarkerData.lat}}</div>
            <div>lng: {{selectedMarkerData.lng}}</div>
            <div v-html="selectedMarkerData.mota"></div>
          </div>
          <div v-if="sidebarViewType == 'listNhatro'">
            <div>
                <input type="text" v-model="searchData.searchText" placeholder="Nhập vào nội dung cần tìm...." class="form-control"/>
                <a v-on:click="onChangeSearchData">OK</a>
                <a v-on:click="clearSearchData">CLEAR</a>
            </div>
            <div v-for="nhatro in listNhatro">
                <div class="nhatro" v-on:click="onClickNhatroItemOnSidebar(nhatro)">{{nhatro.tieude}}</div>
            </div>
          </div>
        </div>
        <div id="map-container" class="col-md-8">
            <div id="map"></div>
        </div>
    </div>
    <script>
        var homeUrl = "<?= Yii::$app->homeUrl ?>";
        var app = new Vue({
            el: '#app',
            data: {
              selectedMarkerData: {},
              sidebarViewType: "listNhatro", // "detailNhatro", "searchResultNhatro"    
              listNhatro: [],
              searchData: {
                  searchText: ""
              }
            },
            mounted: async function() {
                this.initMap();
                this.loadMarkers();
                this.loadListNhatro();
            },
            methods: {
                initMap: function() {
                    window.map = L.map('map').setView([9.725300127953927, 106.30138794590869], 9);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(window.map);
                    
                    window.nhatroLayer = L.layerGroup();
                    window.map.addLayer(window.nhatroLayer);
                },
                loadMarkers: async function() {
                    const response = await fetch(homeUrl + "nhatro/getlistjson"); // callback
                    const data = await response.json(); 
                    data.forEach((item) => {
                        if (item.lat && item.lng) {
                            const divIcon = L.divIcon({className: "marker-nhatro", html: `<div class="marker-tentram"></div>`});
                            const marker = L.marker([item.lat, item.lng], {icon: divIcon});
                            marker.data = item;
                            marker.on('click', (event) => {
                                this.onClickMarker(marker);
                            }); 

                            nhatroLayer.addLayer(marker);
                        }
                    });
                },
                onClickMarker: async function(marker) {
                    const markerData = marker.data;
                    this.showNhatroDetail(markerData.id);
                },
                showNhatroDetail: async function(id) {
                    const response = await fetch(homeUrl + "nhatro/getdetailjson?id=" + id);
                    this.selectedMarkerData = await response.json();
                    this.sidebarViewType = "detailNhatro";
                },
                showListNhatro: function() {
                    this.sidebarViewType = "listNhatro";
                },
                loadListNhatro: async function() {
                    const response = await fetch(homeUrl + "nhatro/getlistjson"); // callback
                    this.listNhatro = await response.json(); 
                },
                onClickNhatroItemOnSidebar: async function(nhatro) {
                    if (nhatro.lat && nhatro.lng) {
                        window.map.flyTo([nhatro.lat, nhatro.lng], 18);
                    }
                    this.showNhatroDetail(nhatro.id);
                },
                onChangeSearchData: async function() {
                    let searchUrl = homeUrl + "nhatro/getlistjson?e=1"
                    if (this.searchData.searchText && this.searchData.searchText != "") {
                        searchUrl += "&q=" + this.searchData.searchText;
                    }

                    const response = await fetch(searchUrl); // callback
                    this.listNhatro = await response.json(); 

                    this.showListNhatro();
                },
                clearSearchData: function() {
                    this.searchData = {
                        searchText: ""
                    }
                    this.onChangeSearchData();
                }
            }
        })
    </script>
  </body>
</html>