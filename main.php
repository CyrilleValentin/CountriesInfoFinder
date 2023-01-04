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