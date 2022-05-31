<?php
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Button;
use yii\bootstrap4\ButtonDropdown;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin="" ></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/fontawesome.min.css"
        integrity="sha512-8Vtie9oRR62i7vkmVUISvuwOeipGv8Jd+Sur/ORKDD5JiLgTGeBSkI3ISOhc730VGvA5VVQPwKIKlmi+zMZ71w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <link rel="stylesheet" href="./css/style.css"> -->
        <link rel="stylesheet" href="./css/map.css">
        <title>Document</title>
    </head>
    <body>
        
        <div id="app" class="container-fluid">  
            <div class="row">    
                <nav class="navbar navbar-expand-lg navbar-light position-fixed ">
                    <a class="navbar-brand pt-0" href="<?= Yii::$app->homeUrl ?>home">
                    <img src="../img/lg1.png" alt="" width="100%">
                    </a>
                </nav>
            </div>
            <div class="nhatro-main-map row">
                <div class="sidebar-map col-md-3 pr-0">
                    <div v-if="sidebarViewType == 'detailNhatro' && selectedMarkerData  .tieude">
                        <div class="nhatro-item_return"> 
                            <a @click="showListNhatro()" class="pl-2"><i class="fa-solid fa-arrow-left img-icon"></i></a>
                        </div>
                        <div class="nhatro-box">
                            <div class="nhatro-tieude" href="<?=Yii::$app->homeUrl?>">{{selectedMarkerData.tieude}}</div>
                            <div class="nhatro-gia">
                                {{selectedMarkerData.gia}}
                            </div>
                            <div class="nhatro-dientich">
                                <i class="fa-solid fa-ruler-combined img-icon mr-2"></i>
                                {{selectedMarkerData.dientich}}
                            </div>
                            <div class="nhatro-diachi">
                                <i class="fa-solid fa-location-dot img-icon mr-2"></i>
                                {{selectedMarkerData.diachi}}
                            </div>
                            <div class="nhatro-mota" v-html="selectedMarkerData.mota"></div>
                            <div class="nhatro-lienhe">Liên hệ: {{selectedMarkerData.lienhe}}</div>
                            <div class="nhatro-chitiet">
                            </div>
                        </div>
                    </div>
                    <div v-if="sidebarViewType == 'listNhatro'">
                        <div class="nhatro-search">
                            <form class="nhatro-search_form">
                                <input type="text" v-model="searchData.searchText" placeholder="Nhập nội dung cần tìm">
                                <a @click="onChangeSearchData" class="nhatro-btn-search"><i class="fa-solid fa-search"></i></a>
                                <a @click="clearSearchData" class="nhatro-btn-clear"><i class="fa-solid fa-xmark"></i></a>
                            </form>
                        </div>
                        <div v-for="nhatro in listNhatro" class="nhatro-list">
                            <div class="nhatro-item" @click="onClickNhatroItemOnSidebar(nhatro)">
                                <div class="nhatro-tieude   ">{{nhatro.tieude}}</div>
                                <small class="">{{nhatro.lat}}, {{nhatro.lng}}</small>
                                <!-- <div><i class="fa-solid fa-phone"></i>{{nhatro.lienhe}}</div> -->
                            </div>
                            <!-- <a href="">Chi tiết</a> -->
                        </div>
                        <div class="nhatro-filter">

                        </div>
                    </div> 
                </div>
                <div class="main-map col-md-9">
                    <div id="map"></div>
                </div>
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
                            const divIcon = L.divIcon({className: "marker-nhatro", html: `<i class="fa-solid fa-location-dot marker-vitri"></i>`});
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
                showNhatroDetailView: async function(id) {
                    const response = await fetch(homeUrl + "nhatro/getdetailjson?id=" + id);
                    this.selectedMarkerData = await response.json();
                    this.sidebarViewType = "detailNhatro";
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




