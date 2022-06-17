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
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/fontawesome.min.css"
        integrity="sha512-8Vtie9oRR62i7vkmVUISvuwOeipGv8Jd+Sur/ORKDD5JiLgTGeBSkI3ISOhc730VGvA5VVQPwKIKlmi+zMZ71w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script> -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin="" ></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
        <!-- <link rel="stylesheet" href="./css/style.css"> -->
        <link rel="stylesheet" href="./css/map.css">
        <title>Document</title>
        <style>
            .leaflet-control-attribution {display: none}
        </style>
    </head>
    <body>
        <div id="app" class="container-fluid">     
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand pt-0" href="<?= Yii::$app->homeUrl ?>home">
                    <img src="../img/lg1.png" alt="" width="100%">
                </a>
                <a class="nav-link" href="<?= Yii::$app->homeUrl ?>home">Home</a>
            </nav>
            <div class="nhatro-main-map row">
                <div class="sidebar-map col-md-4 pr-0">
                    <div class="nhatro-top">        
                        <div class="nhatro-search">
                            <form class="nhatro-search_form">
                                <input type="text" v-model="searchData.searchText" placeholder="Nhập nội dung cần tìm"/>
                                <a @click="onChangeSearchData" class="nhatro-btn-search"><i class="fa-solid fa-search"></i></a>
                                <a @click="clearSearchData" class="nhatro-btn-clear"><i class="fa-solid fa-xmark"></i></a>
                            </form>
                        </div>
                        <div @click="showListNhatro()" class="list-nhatro">
                            <i class="fa-solid fa-angle-right arrow-icon-right mr-2"></i>
                            <span class="filter-text">DANH SÁCH TIN ĐĂNG</span>
                            <small class=" ml-2">{{listNhatro.length}} kết quả tìm kiếm</small>
                        </div>
                        <div class="list-unstyled components">
                            <div id="filter-view">
                                <li class="tienich-list">
                                    <a href="#filter-dropdown" data-toggle="collapse" class="dropdown-toggle">
                                        <div class="filter-title">
                                            <i class="fa-solid fa-angle-down arrow-icon-down"></i>
                                            <i class="fa-solid fa-angle-right arrow-icon-right mr-2"></i>
                                            <span class="filter-text">BỘ LỌC NÂNG CAO</span>
                                            <span class="badge badge-secondary ml-2">{{totalSelected}}</span>
                                        </div>
                                    </a>     
                                    <ul class="collapse list-unstyled" id="filter-dropdown">
                                        <li class="list-unstyled components">          
                                            <div class="khuvuc-box">
                                                <a href="#area-dropdown-item" data-toggle="collapse" aria-expanded="false" class="khuvuc-title dropdown-toggle">
                                                    <i class="fa-solid fa-angle-down arrow-icon-down "></i>
                                                    <i class="fa-solid fa-angle-right arrow-icon-right mr-2"></i>
                                                    <span class="filter-text-item">Khu vực</span>
                                                    <span class="badge badge-secondary ml-2">{{listKhuvuc.length}}</span>
                                                </a>
                                                <ul class="collapse list-unstyled pl-4 pr-2 pt-2 pb-2" id="area-dropdown-item">
                                                    <div class="row">
                                                        <div v-for="khuvucs, key in listKhuvuc" class="col-md-4" >
                                                            <div class="khuvuc-items">
                                                                <input type="checkbox" :value="khuvucs.id" @change="onChangeKhuvuc(khuvucs.id)">
                                                                <span>{{khuvucs.khuvuc}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>     
                                            </div>
                                        </li>          
                                        <li class="list-unstyled components">          
                                            <div class="tienich-box">
                                                <a href="#tienich-dropdown-item" data-toggle="collapse" aria-expanded="false" class="tienich-title dropdown-toggle">
                                                    <i class="fa-solid fa-angle-down arrow-icon-down "></i>
                                                    <i class="fa-solid fa-angle-right arrow-icon-right mr-2"></i>
                                                    <span class="filter-text-item">Tiện ích</span>
                                                    <span class="badge badge-secondary ml-2">{{listTienich.length}}</span>
                                                </a>
                                                <ul class="collapse list-unstyled pl-4 pr-2 pt-2 pb-2" id="tienich-dropdown-item">
                                                    <div class="row">
                                                        <div v-for="tienichs in listTienich" class="col-md-4" >
                                                            <div class="tienich-items">
                                                                <input type="checkbox" :value="tienichs.id" @change="onChangeTienich(tienichs.id)">
                                                                <span>{{tienichs.tienich}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>     
                                            </div>  
                                        </li>          
                                        <li class="list-unstyled components">          
                                            <div class="doituong-box">
                                                <a href="#doituong-dropdown-item" data-toggle="collapse" aria-expanded="false" class="doituong-title dropdown-toggle">
                                                    <i class="fa-solid fa-angle-down arrow-icon-down "></i>
                                                    <i class="fa-solid fa-angle-right arrow-icon-right mr-2"></i>
                                                    <span class="filter-text-item">Đối tượng</span>
                                                    <span class="badge badge-secondary ml-2">{{listDoituong.length}}</span>
                                                </a>
                                                <ul class="collapse list-unstyled pl-4 pr-2 pt-2 pb-2" id="doituong-dropdown-item">
                                                    <div class="row">
                                                        <div v-for="doituongs in listDoituong" class="col-md-3" >
                                                            <div class="doituong-items">
                                                                <input type="checkbox" :value="doituongs.id" @change="onChangeDoituong(doituongs.id)">
                                                                <span>{{doituongs.ten}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>     
                                            </div>
                                        </li>          
                                    </ul> 
                                </li>     
                            </div>
                        </div> 
                    </div>
                    <div class="nhatro-list">
                        <div v-if="sidebarViewType == 'listNhatro'">
                            <div v-for="nhatro in listNhatro" class="nhatro-list">
                                <div class="nhatro-item" @click="onClickNhatroItemOnSidebar(nhatro)">
                                    <div class="nhatro-tieude">{{nhatro.tieude}}</div>
                                    <small class="">{{nhatro.lat}}, {{nhatro.lng}}</small>
                                </div>
                            </div> 
                        </div> 
                        <div v-if="sidebarViewType == 'detailNhatro' && selectedMarkerData  .tieude">
                            <div class="nhatro-item_return"> 
                                <a @click="showListNhatro()" class="pl-2">
                                    <i class="fa-solid fa-arrow-left img-icon mr-2"></i>Quay về
                                </a>
                            </div>
                            <div class="nhatro-box">
                                <div class="nhatro-tieude">{{selectedMarkerData.tieude}}</div>
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
                                    <small class="ml-3">{{selectedMarkerData.lat}},{{selectedMarkerData.lng}}</small>
                                </div>
                                <div class="nhatro-mota" v-html="selectedMarkerData.mota"></div>
                                <div class="nhatro-lienhe">Liên hệ: {{selectedMarkerData.lienhe}}</div>
                                <a class="nhatro-chitiet" :href="urlView + selectedMarkerData.id">Xem chi tiết</a>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="main-map col-md-8">
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
                    listTienich: [],
                    listDoituong: [],
                    listKhuvuc: [],
                    listSelectedTienich: [],
                    listSelectedDoituong: [],
                    listSelectedKhuvuc: [],
                    listSeclected: [],
                    searchData: {
                        searchText: ""
                    },
                    urlView: 'http://localhost:3000/posts/view?id='
                },
                mounted: async function() {
                    this.initMap();
                    this.loadMarkers();
                    this.loadListNhatro();
                    this.loadListTienich();
                    this.loadListDoituong();
                    this.loadListKhuvuc();
                }, 
                computed: {
                    totalSelected() {
                        return this.listSelectedTienich.length + this.listSelectedDoituong.length + this.listSelectedKhuvuc.length;
                    }
                }, 
                methods: {
                    initMap: function() {
                        window.map = L.map('map').setView([10.796611153959889, 106.6668288839287], 13);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(window.map);
                        window.nhatroLayer = L.layerGroup();
                        window.map.addLayer(window.nhatroLayer);
                        this.initDrawControl();
                    },
                    initDrawControl: async () => {
                        window.drawnItems = new L.FeatureGroup();
                        window.map.addLayer(window.drawnItems);
                        var drawControl = new L.Control.Draw({
                            draw: {
                                polygon: false,
                                marker: false,
                                polyline: false,
                                rectangle: false
                            },
                            edit: {
                                featureGroup: window.drawnItems
                            }
                        });
                        window.map.addControl(drawControl);
                        window.map.on(L.Draw.Event.CREATED, async (e) => {
                            var type = e.layerType,
                                layer = e.layer;
                            window.drawnItems.clearLayers();
                            if (type === 'circle') {
                                window.drawnItems.addLayer(layer);
                                // lat, lng, radius(m)
                                const {_latlng, _mRadius} = layer;
                                console.log(_mRadius);
                                // lazy code
                                const response = await fetch(homeUrl + "nhatro/getlistjson?1=1" + `&lat=${_latlng.lat}&lng=${_latlng.lng}&radius=${_mRadius}&geoFilterType=circle`);
                                this.listNhatro = await response.json();
                                this.sidebarViewType = "listNhatro";
                            }
                        });
                        window.map.on(L.Draw.Event.EDITED, async (e) => {   
                            var layers = e.layers;
                            layers.eachLayer(async (layer) => {
                                if (layer._mRadius) {                                
                                    const {_latlng, _mRadius} = layer;
                                    console.log(_mRadius);
                                    // lazy code
                                    const response = await fetch(homeUrl + "nhatro/getlistjson?1=1" + `&lat=${_latlng.lat}&lng=${_latlng.lng}&radius=${_mRadius}&geoFilterType=circle`);
                                    this.listNhatro = await response.json();
                                    this.sidebarViewType = "listNhatro";
                                }
                            });
                        });
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
                    },
                    loadListTienich: async function(id) {
                        const response = await fetch(homeUrl + "nhatro/gettienichjson?id=" + id);
                        this.listTienich = await response.json();
                        this.sidebarViewType = "listTienich";
                    },
                    loadListKhuvuc: async function(id) {
                        const response = await fetch(homeUrl + "nhatro/getkhuvucjson?id=" + id);
                        this.listKhuvuc = await response.json();
                        this.sidebarViewType = "listKhuvuc";
                    },
                    loadListDoituong: async function(id) {
                        const response = await fetch(homeUrl + "nhatro/getdoituongjson?id=" + id);
                        this.listDoituong = await response.json();
                        this.sidebarViewType = "listDoituong";
                    },
                    onChangeTienich: async function(id) {
                        const idx = this.listSelectedTienich.indexOf(id);  
                        if (idx < 0) {
                            this.listSelectedTienich.push(id);
                        } 
                        else {
                            this.listSelectedTienich.splice(idx, 1);
                        }
                        this.showListNhatroTienich();
                    },
                    onChangeDoituong: async function(id) {
                        // const sum = 0;
                        const idx = this.listSelectedDoituong.indexOf(id);
                        if (idx < 0) {
                            this.listSelectedDoituong.push(id);
                        }
                        else {
                            this.listSelectedDoituong.splice(idx, 1);
                        }
                        this.showListNhatroDoituong();
                    },
                    onChangeKhuvuc: async function(id) {
                        const idx = this.listSelectedKhuvuc.indexOf(id);  
                        if (idx < 0) {
                            this.listSelectedKhuvuc.push(id);
                        } 
                        else {
                            this.listSelectedKhuvuc.splice(idx, 1);
                        }
                        this.showListNhatroKhuvuc();
                    },
                    getListKhuvucAsParam: function() {
                        let result = "";
                        this.listSelectedKhuvuc.forEach(e => {
                            result += "&listKhuvucId[]=" + e;
                        })
                        return result;
                    },
                    getListTienichAsParam: function() {
                        let result = "";
                        this.listSelectedTienich.forEach(e => { 
                            result += "&listTienichId[]=" + e; 
                        })
                        return result;
                    },
                    getListDoituongAsParam: function() {
                        let result = "";
                        this.listSelectedDoituong.forEach(e => { 
                            result += "&listDoituongId[]=" + e; 
                        })
                        return result;
                    },
                    showListNhatroDoituong: async function() {
                        const response = await fetch(homeUrl + "nhatro/getlistjson?1=1" + this.getListDoituongAsParam() + this.getListTienichAsParam() + this.getListKhuvucAsParam())
                        this.listNhatro = await response.json();
                        this.sidebarViewType = "listNhatro";
                    },
                    showListNhatroTienich: async function() {
                        const response = await fetch(homeUrl + "nhatro/getlistjson?1=1" + this.getListDoituongAsParam() + this.getListTienichAsParam() + this.getListKhuvucAsParam());
                        this.listNhatro = await response.json();
                        this.sidebarViewType = "listNhatro";
                    },
                    showListNhatroKhuvuc: async function() {
                        const response = await fetch(homeUrl + "nhatro/getlistjson?1=1" + this.getListDoituongAsParam() + this.getListTienichAsParam() + this.getListKhuvucAsParam());
                        this.listNhatro = await response.json();
                        this.sidebarViewType = "listNhatro";
                    },
                }
            })
            
        </script>
    </body>
</html>