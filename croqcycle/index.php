<?php
/**
 * CROQ'CYCLE - Routeur principal
 * 
 * Gère la navigation entre les pages du site
 * Éco-conception : routage simple sans dépendances externes
 */

// Affichage des erreurs en développement (à désactiver en production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Démarrage de session pour gérer l'authentification et le panier
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Récupération de la page demandée (par défaut : home)
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Liste des pages autorisées (sécurité)
$allowed_pages = [
    'home' => 'home.php',
    'about' => 'about.php',
    'catalog' => 'catalog.php',
    'product' => 'product.php',
    'pets' => 'pets.php',
    'cart' => 'cart.php',
    'checkout' => 'checkout.php',
    'login' => 'login.php',
    'register' => 'register.php',
    'account' => 'account.php',
    'terms' => 'terms.php',
    'privacy' => 'privacy.php',
    'legal' => 'legal.php'
];

// Vérification de la page demandée
if (array_key_exists($page, $allowed_pages)) {
    $file = $allowed_pages[$page];
    
    // Vérification de l'existence du fichier
    if (file_exists($file)) {
        include($file);
    } else {
        // Page non trouvée
        http_response_code(404);
        echo "<h1>Erreur 404 - Page non trouvée</h1>";
    }
} else {
    // Page non autorisée - redirection vers l'accueil
    header('Location: ?page=home');
    exit;
}
?>
