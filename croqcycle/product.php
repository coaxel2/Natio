<?php
/**
 * CROQ'CYCLE - Page Produit
 * 
 * Détail d'un produit spécifique
 */

$page_title = 'Détail produit';
$page = 'product';

// Simulation de données produit
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Base de données simulée
$products = [
    1 => [
        'name' => 'Croquettes Chat Adult Premium',
        'category' => 'Chat',
        'price' => 24.90,
        'description' => 'Croquettes équilibrées pour chats adultes, ingrédients locaux et naturels',
        'weight' => '2kg',
        'eco_score' => 'A',
        'icon' => '🐱',
        'ingredients' => 'Poulet français 40%, riz bio 25%, légumes locaux 20%, minéraux 10%, vitamines 5%',
        'benefits' => [
            'Protéines de haute qualité pour une musculature saine',
            'Oméga 3 et 6 pour un pelage brillant',
            'Taurine pour la santé cardiaque et visuelle',
            'Sans céréales raffinées, sans OGM'
        ]
    ],
    2 => [
        'name' => 'Croquettes Chat Senior',
        'category' => 'Chat',
        'price' => 26.90,
        'description' => 'Formule adaptée aux chats âgés, riche en protéines digestibles',
        'weight' => '2kg',
        'eco_score' => 'A',
        'icon' => '🐱',
        'ingredients' => 'Poisson français 35%, riz complet bio 25%, légumes 20%, glucosamine 15%, vitamines 5%',
        'benefits' => [
            'Protéines facilement digestibles',
            'Glucosamine pour la santé articulaire',
            'Antioxydants naturels',
            'Adapté aux besoins des seniors'
        ]
    ],
    3 => [
        'name' => 'Croquettes Chien Petite Race',
        'category' => 'Chien',
        'price' => 32.90,
        'description' => 'Croquettes adaptées aux petits chiens, circuit court français',
        'weight' => '3kg',
        'eco_score' => 'A',
        'icon' => '🐶',
        'ingredients' => 'Agneau français 45%, patate douce 20%, légumes variés 20%, huile de saumon 10%, vitamines 5%',
        'benefits' => [
            'Croquettes adaptées aux petites mâchoires',
            'Énergie optimale pour chiens actifs',
            'Soutien du système immunitaire',
            'Ingrédients 100% traçables'
        ]
    ]
];

// Produit par défaut si ID invalide
if (!isset($products[$product_id])) {
    $product_id = 1;
}

$product = $products[$product_id];

include('includes/header.php');
?>

<div class="container">
    <!-- Fil d'Ariane -->
    <nav aria-label="Fil d'Ariane" style="margin-bottom: var(--spacing-md);">
        <a href="?page=home">Accueil</a> / 
        <a href="?page=catalog">Catalogue</a> / 
        <span><?php echo htmlspecialchars($product['name']); ?></span>
    </nav>

    <!-- Détail du produit -->
    <section class="section">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-xl); align-items: start;">
            
            <!-- Colonne gauche : Image/Icône -->
            <div class="card" style="text-align: center;">
                <span class="card-icon" style="font-size: 8rem;" aria-hidden="true">
                    <?php echo $product['icon']; ?>
                </span>
                <h2 style="color: var(--color-primary); margin-top: var(--spacing-md);">
                    <?php echo htmlspecialchars($product['name']); ?>
                </h2>
                
                <div style="display: flex; justify-content: center; gap: 1rem; margin: var(--spacing-md) 0;">
                    <span class="badge badge-eco">Éco-score: <?php echo $product['eco_score']; ?></span>
                    <span class="badge badge-success"><?php echo $product['weight']; ?></span>
                    <span class="badge" style="background-color: var(--color-accent); color: white;">
                        <?php echo $product['category']; ?>
                    </span>
                </div>
            </div>

            <!-- Colonne droite : Informations -->
            <div>
                <h3 style="color: var(--color-primary);">Description</h3>
                <p style="margin-bottom: var(--spacing-md); font-size: 1.125rem;">
                    <?php echo htmlspecialchars($product['description']); ?>
                </p>

                <h3 style="color: var(--color-primary);">Ingrédients</h3>
                <p style="margin-bottom: var(--spacing-md);">
                    <?php echo htmlspecialchars($product['ingredients']); ?>
                </p>

                <h3 style="color: var(--color-primary);">Bienfaits</h3>
                <ul style="margin-bottom: var(--spacing-md); line-height: 1.8;">
                    <?php foreach ($product['benefits'] as $benefit): ?>
                        <li>✓ <?php echo htmlspecialchars($benefit); ?></li>
                    <?php endforeach; ?>
                </ul>

                <!-- Prix et action -->
                <div class="card" style="background-color: #f9f9f9; margin-top: var(--spacing-lg);">
                    <p class="card-price" style="margin: 0;">
                        <?php echo number_format($product['price'], 2, ',', ' '); ?>€
                    </p>
                    <p style="color: var(--color-text-light); margin: var(--spacing-xs) 0;">
                        Livraison dans nos emballages réutilisables
                    </p>
                    
                    <div class="form-actions">
                        <a href="?page=cart&action=add&id=<?php echo $product_id; ?>" class="btn btn-primary" style="width: 100%;">
                            Ajouter au panier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Impact écologique -->
    <section class="section">
        <div class="alert alert-success">
            <h3>🌍 Impact écologique de ce produit</h3>
            <div class="grid" style="margin-top: var(--spacing-md);">
                <div>
                    <strong>📦 Emballage réutilisable</strong>
                    <p>Contenant réutilisé en moyenne 20 fois = 95% de déchets en moins</p>
                </div>
                <div>
                    <strong>🚚 Circuit court</strong>
                    <p>Producteurs locaux à moins de 150km = -70% d'émissions transport</p>
                </div>
                <div>
                    <strong>♻️ Retour gratuit</strong>
                    <p>Collecte lors de la livraison suivante + 5% de réduction fidélité</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Produits similaires -->
    <section class="section">
        <h3 class="section-title">Produits similaires</h3>
        <p class="text-center">
            <a href="?page=catalog" class="btn btn-secondary">Voir tout le catalogue</a>
        </p>
    </section>
</div>

<?php include('includes/footer.php'); ?>
