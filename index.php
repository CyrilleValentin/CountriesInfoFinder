<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   
    <link rel="stylesheet" href="styl.css">
    <title>CountriesInfoFinder</title>
</head>

<body>
    <header class="head">
        <div class="logo">
            <a href="#"><span>Countries</span>Info<span class="span">Finder</span></a>
        </div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">A propos</a></li>
                    <li><a href="#">Contacter</a></li>
                </ul>
            </nav>
            
        </div>
        
        
        
        <div class="icon">
            <a href="https://twitter.com"><i class='bx bxl-twitter'></i></a>
            <a href="https://www.facebook.com"> <i class='bx bxl-facebook'></i></a>
            <a href="https://www.instagram.com"> <i class='bx bxl-instagram'></i></a>
            
        </div>
        <i id="hamburger" onclick="afficher()" class="bx bx-menu"></i>
    </header>
    <div id="top" class="top">
    <nav>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">A propos</a></li>
                    <li><a href="#">Contacter</a></li>
                    <li onclick="fermer()"><a href="#" ></a><i class="bx bx-exit" ></i> Fermer</a></li>
                </ul>
            </nav>
    </div>
    <script src="scrip.js"></script>
    <div class="container"></div>
    </div>
    <div class="input">
        <div class="bar">
            <form method="post" action="">
                <input id="search" type="text" name="code" placeholder="Entrer le code iso2 du pays">
                <button type="submit">Rechercher</button>
            </form>
        </div>
        <h1>Informations</h1>
        <div class="reponse">
            <?php
            $text = $_POST["code"];
            $curl = curl_init();
            $code = $text;
            $code_encoded = urlencode($code);
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries/' . $code_encoded,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array(
                        'X-CSCAPI-KEY: RHc4UVhRbzBzN2JKbTZFUFNjcERxa3dpZW5FZUZLSUpEM0NVR1l3WA=='
                    ),
                )
            );

            $response = curl_exec($curl);

            curl_close($curl);
            $tableau = json_decode($response, true);
            if(isset($_POST["code"])){
                echo '<ul>';
                foreach ($tableau as $cle => $valeur) {
                    echo '<li>' . $cle . ' : ' . $valeur . '</li>';
                }
                echo '</ul>';
            }
            else if(empty($_POST["code"])){
                echo"Merci d'entrer le code iso2 du pays recherché";
            }
            ?>
        
        </div>
    </div>

    </div>

    </div>
    <footer>
        <div class="logo">
            <a href="#"><span>Countries</span>Info<span class="span">Finder</span></a>
        </div>
        <p>Cyrillekyrillos6@gmail.com</p>
        <div class="icon1">
        <a href="https://twitter.com/KyrillosCyrille"><i class='bx bxl-twitter'></i></a>
            <a href="https://www.facebook.com/cyrille.adjewoda.7"> <i class='bx bxl-facebook'></i></a>
            <a href="https://www.instagram.com/cyrille_valentin/"> <i class='bx bxl-instagram'></i></a>
            
        </div>
        <p>© 2023 par Cyrille ADJEWODA</p>
    </footer>

</body>

</html>
