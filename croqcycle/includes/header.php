<?php
/**
 * CROQ'CYCLE - Header
 * 
 * En-tête commun à toutes les pages
 * Accessibilité RGAA : navigation clavier, contraste, labels explicites
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CROQ'CYCLE - Nourriture pour animaux en économie circulaire. Une écologie qui se sent dans le porte-monnaie.">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>CROQ'CYCLE</title>
    
    <!-- CSS éco-conçu : un seul fichier, minimaliste -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Accessibilité : skip link pour navigation clavier -->
    <a href="#main-content" class="skip-link">Aller au contenu principal</a>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="header-content">
                <!-- Logo / Nom du site -->
                <div class="logo">
                    <a href="?page=home" aria-label="Retour à l'accueil de CROQ'CYCLE">
                        <img src="assets/img/logo.svg" alt="Logo CROQ'CYCLE" class="logo-svg">
                    </a>
                </div>

                <!-- Navigation principale -->
                <nav class="main-nav" role="navigation" aria-label="Navigation principale">
                    <ul>
                        <li><a href="?page=home" <?php echo ($page ?? 'home') === 'home' ? 'aria-current="page"' : ''; ?>>Accueil</a></li>
                        <li><a href="?page=catalog" <?php echo ($page ?? '') === 'catalog' ? 'aria-current="page"' : ''; ?>>Catalogue</a></li>
                        <li><a href="?page=pets" <?php echo ($page ?? '') === 'pets' ? 'aria-current="page"' : ''; ?>>Nos animaux</a></li>
                        <li><a href="?page=about" <?php echo ($page ?? '') === 'about' ? 'aria-current="page"' : ''; ?>>À propos</a></li>
                    </ul>
                </nav>

                <!-- Actions utilisateur -->
                <div class="user-actions">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="?page=account" class="user-link" aria-label="Mon compte">
                            <span aria-hidden="true">👤</span> Mon compte
                        </a>
                    <?php else: ?>
                        <a href="?page=login" class="user-link" aria-label="Se connecter">
                            <span aria-hidden="true">👤</span> Connexion
                        </a>
                    <?php endif; ?>
                    
                    <a href="?page=cart" class="cart-link" aria-label="Mon panier<?php echo isset($_SESSION['cart']) ? ' (' . count($_SESSION['cart']) . ' articles)' : ''; ?>">
                        <span aria-hidden="true">🛒</span> Panier
                        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                            <span class="cart-count">(<?php echo count($_SESSION['cart']); ?>)</span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenu principal -->
    <main id="main-content" class="main-content">
