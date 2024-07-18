<?php
try {
    $cn= new PDO("mysql:host=localhost;dbname=URBAN",'root','' );
  
} catch (EXCEPTION $e) {
    echo" erreur :".$e->getMessage();
}
