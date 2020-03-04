<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
      <title>Food Dojo</title>
      <!-- Fonts -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.2/css/uikit.min.css" integrity="sha256-p54YJgZLIbKdD9CCokvwnGmZR3aQUvJhrbLibudN9sk=" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/fontawesome.min.css" integrity="sha256-mM6GZq066j2vkC2ojeFbLCcjVzpsrzyMVUnRnEQ5lGw=" crossorigin="anonymous" />
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900&display=swap" rel="stylesheet">
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkfy1qoNObvO4CHbSL-7748kTJ95Kv2yc&libraries=places"></script>
<link rel="stylesheet" href="{{ URL::asset('css/test.css') }}">

      <!-- Styles -->
      
   </head>
   <body >
      <div class="uk-container main" >

         <h1 uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 50">
            Welcome to Food Dojo!
         </h1>
         <p uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 150" class="main-content">
            We help you find the best <span id="app"></span> in town!
         </p>
         <a uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 250" href="#modal-search" uk-toggle class="uk-button uk-button-default uk-button-large main-button">
            Lets get started
         </a>

      </div>
      <div id="modal-search" class="uk-modal-full uk-modal" uk-modal>
         <div class="uk-modal-dialog uk-flex uk-flex-center" uk-height-viewport>
            <button class="uk-modal-close-full" type="button" uk-close></button>


            <div class="uk-container modal-body">
                                     

            {{ Form::open(array('url' => 'find')) }}

               <div class="item-module" >
                  <span class="modal-content" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 100">I am looking for</span>
                  <div class="uk-search uk-search-large" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 150">
                     <input class="uk-search-input item-search" name="text" type="search" placeholder="burgers, pizzas, skydiving..." >
                  </div>
                  <ul class="suggestions-items">
                  </ul>
               </div>

               <div class="place-module" >
                  <span class="modal-content" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 200">Near</span>
                  <div class="uk-search uk-search-large" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 250">
                    <input id="searchInput" class="uk-search-input place-search" type="text" placeholder="richardson, plano, frisco.." >

                     <input type="text" name="lat" hidden="true" class="lat">
                     <input type="text" name="lng" hidden="true" class="lng">
                  </div>

               </div>
               <div class="search-module" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 300">
                  <button type="submit" class="uk-button uk-button-default uk-button-large search-button">
                  <span uk-icon="search"></span>
                  find places
                  </button>
               </div>
               {{ Form::close() }}

               <hr>
               <div class="popular-module">
                {{ Form::open(array('url' => 'find', 'id'=>"popular-form")) }}

                <input class="popular-item-search" name="text" hidden="true" type="text">
                <input type="text" name="lat" hidden="true" class="lat">
                <input type="text" name="lng" hidden="true" class="lng">

                  <p class="modal-content" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 150">
                     Popular options near you
                  </p>
                  <div class="uk-container">
                     <a class="popular-item" type="submit" data-item="burgers" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 200">
                        <img class="uk-border-circle" src="https://image.freepik.com/free-vector/hamburger_53876-25481.jpg" width="150" height="150" alt="Border circle">
                        <p>Burgers</p>
                     </a>
                     <a class="popular-item" type="submit" data-item="tacos" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 200">
                        <img class="uk-border-circle" src="https://image.freepik.com/free-vector/three-taco-vectors_23-2147695634.jpg?1" width="150" height="150" alt="Border circle">
                        <p>Tacos</p>
                     </a>
                     <a class="popular-item" type="submit" data-item="Pizzas" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 200">
                        <img class="uk-border-circle" src="https://image.freepik.com/free-vector/colorful-round-tasty-pizza_1284-10219.jpg" width="150" height="150" alt="Border circle">
                        <p>Pizzas</p>
                     </a>
                     <a class="popular-item" type="submit" data-item="Donuts" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 200">
                        <img class="uk-border-circle" src="https://image.freepik.com/free-vector/donut_53876-25491.jpg" width="150" height="150" alt="Border circle">
                        <p>Donuts</p>
                     </a>
                     <a class="popular-item" type="submit" data-item="Pancakes" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 200">
                        <img class="uk-border-circle" src="https://image.freepik.com/free-vector/breakfast-realistic-pancakes-top-view-image_1284-14472.jpg" width="150" height="150" alt="Border circle">
                        <p>Pancakes</p>
                     </a>
                  </div>
                  <div class="uk-container">
                     <a class="popular-item" type="submit" data-item="Ramen" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 400">
                        <img class="uk-border-circle" src="https://image.freepik.com/free-vector/noodle-bowl-asia-food_52422-141.jpg" width="150" height="150" alt="Border circle">
                        <p>Ramen</p>
                     </a>
                     <a class="popular-item" type="submit" data-item="Fries" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 400">
                        <img class="uk-border-circle" src="https://image.freepik.com/free-vector/fries_53876-25480.jpg" width="150" height="150" alt="Border circle">
                        <p>Fries</p>
                     </a>
                     <a class="popular-item" type="submit" data-item="Hotdogs" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 400">
                        <img class="uk-border-circle" src="https://image.freepik.com/free-vector/hot-dog-set_98292-429.jpg" width="150" height="150" alt="Border circle">
                        <p>Hotdogs</p>
                     </a>
                     <a class="popular-item" type="submit" data-item="Chole Bhature" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 400">
                        <img class="uk-border-circle" src="https://image.freepik.com/free-photo/indian-healthy-cuisine-chana-masala-served-with-tandoori-roti_55610-3169.jpg" width="150" height="150" alt="Border circle">
                        <p>Chole Bhature</p>
                     </a>
                     <a class="popular-item" type="submit" data-item="Sandwitches" uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: true; delay: 400">
                        <img class="uk-border-circle" src="https://image.freepik.com/free-vector/salami-sandwich-ingredients_98292-3568.jpg" width="150" height="150" alt="Border circle">
                        <p>Sandwitches</p>
                     </a>
                  </div>

                {{ Form::close() }}

               </div>
            </div>
         </div>
      </div>



      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.2/js/uikit-core.min.js" integrity="sha256-pokDnmeZPcUG8ixsBFK9UJTBZUljxfe6c/wKfL9TlMI=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.2/js/uikit-icons.min.js" integrity="sha256-y6lYHosw5EeTk2I2TwmbjQSrnLum1OhYpqUXjBIGdKw=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/TypewriterJS/1.0.0/typewriter.min.js" integrity="sha256-0GG30XmRuHKTD54lbTLEd01reloWjlnefU09UzmFpzc=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/fontawesome.min.js" integrity="sha256-7zqZLiBDNbfN3W/5aEI1OX/5uvck9V0yhwKOA9Oe49M=" crossorigin="anonymous"></script>
      <script>

         var input = document.getElementById('searchInput');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function(){
            var place = autocomplete.getPlace();
            {{-- console.log(place); --}}
            $('.lat').val(place.geometry.location.lat());
            $('.lng').val(place.geometry.location.lng());
        })

      if (navigator.geolocation) {
                (navigator.geolocation.getCurrentPosition(function(position){
                    let lat = position.coords.latitude;
                    let lng = position.coords.longitude;
                    $('.lat').val(lat);
                    $('.lng').val(lng);
                    console.log(lat, lng);
                }));
            } 
            else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
        }

        $(document).ready(function(){
        
        var app = document.getElementById('app');

        let lat = "";
        let lng = "";

         var typewriter = new Typewriter(app, {
             loop: true
         });
         
         let items = [
             "Pizzas", "Pastas", "Tacos", "Burritos", "Pav Bhaji", "Burgers", "Experiences"
         ];
         
         items.map((x)=>{
             typewriter.typeString(x).pauseFor(1000).deleteAll();
         });
         typewriter.start();
         

         $('.search-button').click(function(){
             if($('.lat').val() == "" || $('.lng').val() == ""){
                 navigator.geolocation.getCurrentPosition(getCoords);
                 alert('location');
             }
         })
         
        $('.popular-item').click(function(){
            console.log($(this).data('item'));

            let text = $(this).data('item');
            
            $('.popular-item-search').val(text);
            $('#popular-form').submit();
            })

         $('.item-search').keydown(function(){
             if(($(this).val()).length > 2){
                 console.log($(this).val());
             $.ajaxSetup(
             {
                 headers:
                 {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
         
             $.ajax(
             {
                 type: "POST",
                 url: '/autocomplete',
                 data: {
                     'text' : $(this).val()
                 },
                 dataType: "json",
                 success: function(data){
                     $('.suggestions-items').empty();
                     console.log(data.categories);
                     if(data.categories){
                         (data.categories).map((categ)=>{
                             $('.suggestions-items').append('<li class="suggestion">'+categ.title+'</li>');
                         })
                     }
                     if(data.terms){
                         (data.terms).map((categ)=>{
                           $('.suggestions-items').append('<li class="suggestion">'+categ.text+'</li>');
                         })
                     }
                     
                 },
                 error: function(jqXHR,testStatus,errorThrown){
                     console.log(errorThrown);
                 }
             });
             }
         });
         $(document).on('click', '.suggestion', function(){
             console.log($(this).parent());
             $(this).parent().empty();
             $('.item-search').val($(this).text());
         });
         

        {{-- var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input,{types: ['(cities)']});

        autocomplete.addListener('place_changed', function(){
            var place = autocomplete.getPlace();
            console.log(place);
        }) --}}

        });
      </script>
   </body>
</html>