<?php
/**
 * CROQ'CYCLE - Page Catalogue
 * 
 * Liste des produits disponibles avec filtres
 */

$page_title = 'Catalogue';
$page = 'catalog';

// Données simulées de produits
$products = [
    [
        'id' => 1,
        'name' => 'Croquettes Chat Adult Premium',
        'category' => 'chat',
        'price' => 24.90,
        'description' => 'Croquettes équilibrées pour chats adultes, ingrédients locaux et naturels',
        'weight' => '2kg',
        'eco_score' => 'A'
    ],
    [
        'id' => 2,
        'name' => 'Croquettes Chat Senior',
        'category' => 'chat',
        'price' => 26.90,
        'description' => 'Formule adaptée aux chats âgés, riche en protéines digestibles',
        'weight' => '2kg',
        'eco_score' => 'A'
    ],
    [
        'id' => 3,
        'name' => 'Croquettes Chien Petite Race',
        'category' => 'chien',
        'price' => 32.90,
        'description' => 'Croquettes adaptées aux petits chiens, circuit court français',
        'weight' => '3kg',
        'eco_score' => 'A'
    ],
    [
        'id' => 4,
        'name' => 'Croquettes Chien Grande Race',
        'category' => 'chien',
        'price' => 39.90,
        'description' => 'Formule haute énergie pour grands chiens actifs',
        'weight' => '5kg',
        'eco_score' => 'A'
    ],
    [
        'id' => 5,
        'name' => 'Mélange Lapin Premium',
        'category' => 'nac',
        'price' => 16.90,
        'description' => 'Granulés et foin bio pour lapins, production locale',
        'weight' => '1.5kg',
        'eco_score' => 'A+'
    ],
    [
        'id' => 6,
        'name' => 'Graines Oiseaux Variées',
        'category' => 'nac',
        'price' => 14.90,
        'description' => 'Mélange de graines bio pour oiseaux d\'intérieur',
        'weight' => '1kg',
        'eco_score' => 'A+'
    ]
];

include('includes/header.php');
?>

<div class="container">
    <h2 class="section-title">Notre Catalogue</h2>
    <p class="section-intro">
        Découvrez notre gamme complète d'aliments premium pour vos compagnons. 
        Tous nos produits sont livrés dans des emballages réutilisables et bénéficient 
        de notre système de fidélité écologique.
    </p>

    <!-- Filtres simples -->
    <section class="section">
        <div class="alert alert-info">
            <strong>🌍 Éco-score :</strong> Tous nos produits sont notés A ou A+ pour leur impact environnemental minimal.
            <br><strong>📦 Emballage :</strong> Tous les produits sont livrés dans nos contenants réutilisables.
        </div>
    </section>

    <!-- Grille de produits -->
    <section class="section">
        <div class="grid">
            <?php foreach ($products as $product): ?>
                <div class="card">
                    <!-- Icône selon catégorie -->
                    <?php
                    $icon = '🐾';
                    if ($product['category'] === 'chat') $icon = '🐱';
                    elseif ($product['category'] === 'chien') $icon = '🐶';
                    elseif ($product['category'] === 'nac') $icon = '🐰';
                    ?>
                    <span class="card-icon" aria-hidden="true"><?php echo $icon; ?></span>
                    
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    
                    <div style="display: flex; gap: 0.5rem; margin-bottom: 1rem;">
                        <span class="badge badge-eco">Éco-score: <?php echo $product['eco_score']; ?></span>
                        <span class="badge badge-success"><?php echo $product['weight']; ?></span>
                    </div>
                    
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    
                    <p class="card-price"><?php echo number_format($product['price'], 2, ',', ' '); ?>€</p>
                    
                    <div class="form-actions">
                        <a href="?page=product&id=<?php echo $product['id']; ?>" class="btn btn-secondary">
                            Voir détails
                        </a>
                        <a href="?page=cart&action=add&id=<?php echo $product['id']; ?>" class="btn btn-primary">
                            Ajouter au panier
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Section Informations -->
    <section class="section">
        <h3 class="section-title">Pourquoi choisir nos produits ?</h3>
        
        <div class="grid">
            <div class="card">
                <h4>🌾 Ingrédients locaux</h4>
                <p>Nous travaillons avec des producteurs français pour réduire l'empreinte carbone du transport.</p>
            </div>
            
            <div class="card">
                <h4>🔬 Qualité contrôlée</h4>
                <p>Tous nos produits sont testés et approuvés par des vétérinaires nutritionnistes.</p>
            </div>
            
            <div class="card">
                <h4>♻️ Emballage circulaire</h4>
                <p>Chaque contenant est réutilisé en moyenne 20 fois avant recyclage, réduisant les déchets de 95%.</p>
            </div>
        </div>
    </section>
</div>

<?php include('includes/footer.php'); ?>
