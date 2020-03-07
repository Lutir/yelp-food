<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
      <title>Food Dojo | Results</title>
      <!-- Fonts -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.2/css/uikit.min.css" integrity="sha256-p54YJgZLIbKdD9CCokvwnGmZR3aQUvJhrbLibudN9sk=" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/fontawesome.min.css" integrity="sha256-mM6GZq066j2vkC2ojeFbLCcjVzpsrzyMVUnRnEQ5lGw=" crossorigin="anonymous" />
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

      <!-- Styles -->
      <style>
         .red
         {
         color: rgba(224, 64, 56, 1);
         }
         .cadet
         {
         color: rgba(44, 44, 84, 1);
         }
         .plat
         {
         color: rgba(232, 232, 232, 1);
         }
         .peach
         {
         color: rgba(245, 214, 186, 1);
         }
         .sandy
         {
         color: rgba(244, 157, 110, 1);
         }
         html, body {
         background: #8E4162;
         color: #636b6f;
         font-family: 'Source Sans Pro';
         font-weight: 200;
         margin: 0;
         }
         h1, h2, .modal-content{
         font-family: 'Source Sans Pro';
         font-weight: 900;
         font-size: 72px;
         color: #fff;
         }
         .item-card{
         }
         .main{
             margin-top: 10%;
         }

        .uk-card-title{
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis; 
           }

        .uk-card, h3{
            font-family: 'Nunito';
             
         }
        .uk-card-title{
            width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
         .sort-label{
             padding: 10px 25px !important;
             margin: 5px;
             min-height: auto !important;
             border-radius: 200px;
             border: 3px solid #88CCF1;
         }
         
         .sl-active{
             background: #88CCF1;
             font-weight:500;
             color: #fff !important;
             transition: all 0.25s ease-out;
         }
         
         .sort-label:hover{
             background: #88CCF1;
             font-weight:500;
             color: #fff !important;
             transition: all 0.25s ease-out;
         }

         .filter-head{
             font-size: 24px !important;
             font-weight: 400;
         }

         .rating-star{
             background: gold; 
             color: #fff; 
             padding: 2px;
         }

         .rating-star-half{
             background: linear-gradient(90deg, gold 50%, #fff 50%);
             color: #fff; 
             padding: 2px;
         }

         #map {
            height: 500px;
            margin-bottom: 10%;
        }
        .home-head a{
            font-size: 20px !important;
            color: #fff !important;
        }
        .home-head a span{
            padding: 0px 5px;
        }
        .footer{
            background: #fff;
            padding: 0px;
        }
      </style>
   </head>
   <body>
   <div class="uk-position-relative">
    <img src="#" alt="">
    <div class="uk-position-top">
        <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li class="uk-active home-head"><a href="/">
                        <span uk-icon="home" class="home-head-icon"></span>
                        <span class="home-head-text"> Home</span>
                    </a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
    <div class="uk-container main">
        <h1>
            Here are some of the best {{ $query['term'] }} options near you
        </h1>
        <hr>
        
            <nav class="uk-navbar-container" uk-navbar="boundary-align: true; align: center;">
            <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li>
                <a href="#" class="filter-head">Sort By</a>
            </li>
        </ul>
    </div>
    <div class="uk-navbar-center">
        {{ Form::open(array('url' => 'sortResults', 'id' => 'sortResultsForm')) }}

        <input name="query" type="text" hidden="true" value="{{ json_encode($query) }}">
        <input name="type" type="text" hidden="true" class="type">

        <ul class="uk-navbar-nav">
            <li class="best-match-sort">
                @if($sort_param == "best_match")
                    <a type="submit" class="sort-label sl-active" data-sort="best_match">
                        Best Match
                    </a>
                @else
                    <a type="submit" class="sort-label" data-sort="best_match">
                    Best Match
                    </a>
                @endif
            </li>
            <li class="distance-sort">
                @if($sort_param == "distance")
                    <a type="submit" class="sort-label sl-active" data-sort="distance">
                        Distance
                    </a>
                @else
                    <a type="submit" class="sort-label " data-sort="distance">
                        Distance
                    </a>
                @endif
            </li>
            <li class="rating-sort">
                @if($sort_param == "rating")
                    <a type="submit" class="sort-label sl-active" data-sort="rating">
                        Ratings
                    </a>
                @else
                    <a type="submit" class="sort-label" data-sort="rating">
                        Ratings
                    </a>
                @endif
            </li>
        </ul>

        {{ Form::close() }}

    </div>

    

</nav>

        <hr>


        <div class="uk-child-width-1-3@s uk-text-center uk-grid-match" uk-grid>
        @foreach ($data as $item)
            
            @php
                $complete = ($item->rating)*2;
                $complete = $complete%2;
                $rating = ($complete == 0)?($item->rating):($item->rating - 0.5);
            @endphp
            <div>    
                <div class="uk-card uk-card-default uk-card-hover" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: {{ 5*($loop->index) }}">
                    @if ($item->is_closed)
                        <div class="uk-card-badge uk-label uk-label-danger">Closed</div>

                    @else
                        <span class="uk-label uk-card-badge uk-label-success">Open</span>
                    @endif

                        <div class="uk-card-header">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            
                            <div class="uk-width-expand">
                                <h3 class="uk-card-title uk-margin-remove-bottom" uk-tooltip="title: {{ $item->name }}">{{ $item->name }}</h3>
                                <p class="uk-text-meta uk-margin-remove-top">
                                    @for($i = 0; $i < $rating; $i++)
                                           <span class="rating-star" uk-icon="star"></span> 
                                    @endfor
                                    @if($complete == 1)
                                            <span class="rating-star-half" uk-icon="star"></span>
                                    @endif                                 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-card-body">
                        <p>
                        This place is famous for its 
                        @foreach ($item->categories as $categ)
                            @if(($loop->remaining == 0) && ($loop->count != 1))
                               and {{ $categ->title }}.
                            @elseif(($loop->remaining == 0) && ($loop->count == 1))
                                {{ $categ->title }}
                            @elseif(($loop->remaining == 1) && ($loop->count == 1)))
                                {{ $categ->title }}
                            @else
                                {{ $categ->title }} ,
                            @endif
                        @endforeach
                        </p>

                        <small>
                            <span uk-icon="phone"></span>

                        {{ $item->display_phone }}
                        </small>
                    </div>
                    <div class="uk-card-footer">
                        <p>
                        <span uk-icon="location"></span>
                            {{ ($item->location->address1) }}, {{ $item->location->city }}, {{ $item->location->state }}, {{ $item->location->zip_code }} 
                        </p>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
        <hr>
        <h1>
            Still confused? Check out the map view to find your outlet!
        </h1>
        <div id="map"></div>

        

    </div>
      
      <div class="uk-container uk-padding footer" >
                            <div class="uk-card uk-card-body blue">
                                    <h3 class=" uk-align-left uk-margin-remove-bottom">Designed and developed by Ritul</h3>
                                    <small class="uk-card-title uk-align-right uk-margin-remove-bottom">
                                            <ul class="uk-iconnav">
                                                    <li><a href="https://www.facebook.com/ritul.jain.9" target="_blank" class="facebook" uk-icon="icon: facebook; ratio: 1.5;"></a></li>
                                                    <li><a href="https://www.linkedin.com/in/ritul-jain/" target="_blank" class="linkedin" uk-icon="icon: linkedin; ratio: 1.5;"></a></li>
                                                    <li><a href="https://www.instagram.com/lutir003/" target="_blank" class="instagram" uk-icon="icon: instagram; ratio: 1.5;"></a></li>
                                                    <li><a href="https://github.com/Lutir" target="_blank" class="github" uk-icon="icon: github; ratio: 1.5;"></a></li>
                                                </ul>
                                    </small>

                            </div>

                    </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.2/js/uikit-core.min.js" integrity="sha256-pokDnmeZPcUG8ixsBFK9UJTBZUljxfe6c/wKfL9TlMI=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.2/js/uikit-icons.min.js" integrity="sha256-y6lYHosw5EeTk2I2TwmbjQSrnLum1OhYpqUXjBIGdKw=" crossorigin="anonymous"></script>
      <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkfy1qoNObvO4CHbSL-7748kTJ95Kv2yc&callback=initMap">
        </script>
      <script>
        $(document).ready(function(){
            $('.home-head-text').hide();
            $('.home-head-icon').hover(function(){
                $('.home-head-text').show('slow');
            },
            function(){
                $('.home-head-text').hide('slow');
            });


            let jobs = {!! json_encode($query) !!};
            console.log(jobs);
            
            $('.sort-label').click(function(){
                $('.type').val($(this).data('sort'));
                $('#sortResultsForm').submit();
            })
        })
        function initMap() {
                let query = {!! json_encode($query) !!}

                let data = {!! json_encode($data) !!};

                
                var myLatLng = {lat: parseFloat(query['latitude']), lng: parseFloat(query['longitude'])};

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: myLatLng
                });

                var infowindow = new google.maps.InfoWindow({
                    content: 'You are here!'
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    label: 'You',
                    title: 'You are here!'
                });
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });

                marker.setMap(map);

                data.map((item)=>{
                    let coords = {
                        lat: parseFloat(item['coordinates']['latitude']),
                        lng: parseFloat(item['coordinates']['longitude'])
                    };
                    console.log(item);

                    let address = "";

                    (item['location']['display_address']).map((addr)=>{
                        address+=addr+ ", ";
                    });

                    let content = "\
                        <div class='container'>\
                            <p><b>\
                                "+ item['name'] +"\
                            </b></p>\
                            <hr>\
                            <p>\
                                "+ (address) +"\
                            </p>\
                        </div>\
                    ";

                    let info = new google.maps.InfoWindow({
                        content: content
                    });

                    console.log(coords);
                    var itemMarker = new google.maps.Marker({
                        position: coords,
                        map: map,
                        title: item['name']
                    });
                    itemMarker.addListener('click', function() {
                        info.open(map, itemMarker);
                    })
                    itemMarker.setMap(map);
                })
            }
      </script>
   </body>
</html>