<!DOCTYPE html>
<html lang="en">
<head>
    <script src="JS/slide-show.js"></script>
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="CSS/Voorstellen.css">
    <title>AlpacaWandelingSchaijk</title>
    <link rel="icon" href="IMG/Alpaca_Logo.png" type="image/icon type">
    <link rel="icon" href="IMG/Alpaca_Logo.png" type="image/icon type">
</head>
<body>
    <header>
        <header>
            <img style="height: 100%; width: 100%;" src="IMG/border.jpg">
            <img class="small-logo" src="IMG/Alpaca_Logo.png">
            <div class="top-header-content">
                <p class="main-titel">AlpacaWandelingSchaijk</p>
                <a href="https://www.facebook.com/alpacawandelingschaijk" target="_blank"><img  class="icon" src="IMG/FB.png" ></a>
                <a href="https://www.instagram.com/alpacawandelingschaijk/" target="_blank"><img style="left: calc(80% + 55px)" class="icon" src="IMG/IG.png" ></a>
            </div>
        </header>
        <div class="content">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="evenvoorstellen.php" style="background-color: var(--green1);">Even voorstellen</a></li>
                <li><a href="activiteiten.php">Activiteiten</a></li>
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="fotos.php">Foto's</a></li>
                <li><a href="corona-update.php">Corona update</a></li>
            </ul>
        </div>
    </header>
    <div class="page-wrapper">
        <div class="buttons-wrapper">
            <button class="slide-button-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="slide-button-right" onclick="plusDivs(1)">&#10095;</button>
            <div class="slideshow-wrapper">
                <img class="slides" src="IMG/Paloma.jpeg">

                <img class="slides" src="IMG/Orthello.jpeg">
                <img class="slides" src="IMG/Pancho.jpeg">
                <img class="slides" src="IMG/Primero.jpeg">
                <img class="slides" src="IMG/Picasso.jpeg">
                <div class="slides-text-div">
                    <p class="slides-text">
                        Ik ben Paloma,</br></br> het enige vrouwtje van de kudde. Met mij zul je nooit gaan wandelen want ik ben best schuw. 
                        Maar als jullie mijn vriendjes een wortel komen geven kom ik ook graag een wortel halen. Ik ben in verwachting van een cria, zo heet een kleine Alpaca. 
                        Orthello is de vader en we verwachten hem of haar in oktober.
                    </p>
                    <p class="slides-text">
                        Ik ben Orthello,</br></br>Ik ben als laatste bij deze kudde gekomen en ben nog steeds een hengst. 
                        De rest van de mannetjes zijn allemaal ruinen. In oktober verwacht Paloma mijn eerste  cria in deze kudde. 
                        Ik heb nog niet zoveel ervaring met wandelen maar ik vindt het wel leuk
                    </p>
                    <p class="slides-text">
                        Ik ben Pancho.</br></br> Als je ooit Narcos hebt gekeken dat weet je naar wie ik ben genoemd. Er zijn 2 soorten alpaca's. Mijn vriendjes zijn allemaal Huacaya's, maar ik ben de enige Suri van de kudde. 
                        Dat kun je goed zien aan mijn vacht, die is anders en veel zachter dan de rest. 
                        Ik ben in het begin een beetje schuw tijdens het wandelen, maar als je lief voor me bent kun je na een tijdje ook gewoon selfies met me maken.
                    </p>
                    <p class="slides-text">
                        Ik ben Primero.</br></br>Dat is Spaans voor "de eerste". 
                        Ik ben de eerste alpaca die hier geboren is, in augustus 2019. 
                        Mijn moeder is Paloma. Ik ben anders dan de meeste alpaca's omdat ik hele mooie blauwe ogen heb. 
                        Omdat ik nog jong ben kan ik soms wel eens ondeugend zijn tijdens het wandelen, dus hou mij goed vast.
                    </p>
                    <p class="slides-text">
                        Ik ben Picasso,</br></br> 
                        Ik ben de grootste alpaca van de kudde
                        Ik ben een echte knuffel. Ik hou ervan om heel dicht bij je te komen zodat je leuke foto's kunt maken.
                    </p>
                </div>


                
                <script>
                    var slideIndex = 1;
                    var slideTextIndex = 1;
                    showDivs(slideIndex);
                    showDivsText(slideTextIndex);

                    function plusDivs(n) {
                      showDivs(slideIndex += n);
                      showDivsText(slideTextIndex += n);
                    }

                    function showDivs(n) {
                      var i;
                      var x = document.getElementsByClassName("slides");
                      if (n > x.length) {slideIndex = 1}
                      if (n < 1) {slideIndex = x.length} ;
                      for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                      }
                      x[slideIndex-1].style.display = "block";
                    }

                    function showDivsText(n) {
                      var i;
                      var y = document.getElementsByClassName("slides-text");
                      if (n > y.length) {slideTextIndex = 1}
                      if (n < 1) {slideTextIndex = y.length} ;
                      for (i = 0; i < y.length; i++) {
                        y[i].style.display = "none";
                      }
                      y[slideTextIndex-1].style.display = "block";
                    }
                </script>
            </div>
            
        </div>
    </div>
</body>
</html>