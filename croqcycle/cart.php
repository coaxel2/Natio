<?php
/**
 * CROQ'CYCLE - Page Panier
 * 
 * Gestion du panier d'achat
 */

$page_title = 'Mon Panier';
$page = 'cart';

// Initialisation du panier
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Base de produits simulée
$products = [
    1 => ['name' => 'Croquettes Chat Adult Premium', 'price' => 24.90, 'weight' => '2kg'],
    2 => ['name' => 'Croquettes Chat Senior', 'price' => 26.90, 'weight' => '2kg'],
    3 => ['name' => 'Croquettes Chien Petite Race', 'price' => 32.90, 'weight' => '3kg'],
    4 => ['name' => 'Croquettes Chien Grande Race', 'price' => 39.90, 'weight' => '5kg'],
    5 => ['name' => 'Mélange Lapin Premium', 'price' => 16.90, 'weight' => '1.5kg'],
    6 => ['name' => 'Graines Oiseaux Variées', 'price' => 14.90, 'weight' => '1kg']
];

// Gestion des actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    if ($action === 'add' && isset($products[$product_id])) {
        // Ajouter au panier
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            $_SESSION['cart'][$product_id] = [
                'product_id' => $product_id,
                'quantity' => 1
            ];
        }
        header('Location: ?page=cart');
        exit;
    } elseif ($action === 'remove' && $product_id > 0) {
        // Retirer du panier
        unset($_SESSION['cart'][$product_id]);
        header('Location: ?page=cart');
        exit;
    } elseif ($action === 'update' && isset($_POST['quantities'])) {
        // Mettre à jour les quantités
        foreach ($_POST['quantities'] as $id => $qty) {
            $id = intval($id);
            $qty = intval($qty);
            if ($qty > 0 && isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] = $qty;
            } elseif ($qty <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
        header('Location: ?page=cart');
        exit;
    }
}

// Calcul du total
$total = 0;
$cart_items = [];

foreach ($_SESSION['cart'] as $item) {
    $product_id = $item['product_id'];
    if (isset($products[$product_id])) {
        $product = $products[$product_id];
        $subtotal = $product['price'] * $item['quantity'];
        $total += $subtotal;
        
        $cart_items[] = [
            'id' => $product_id,
            'name' => $product['name'],
            'price' => $product['price'],
            'weight' => $product['weight'],
            'quantity' => $item['quantity'],
            'subtotal' => $subtotal
        ];
    }
}

include('includes/header.php');
?>

<div class="container">
    <h2 class="section-title">Mon Panier</h2>
    
    <?php if (empty($cart_items)): ?>
        <!-- Panier vide -->
        <div class="card text-center">
            <span style="font-size: 4rem;" aria-hidden="true">🛒</span>
            <h3 style="color: var(--color-text-light); margin: var(--spacing-md) 0;">
                Votre panier est vide
            </h3>
            <p style="color: var(--color-text-light); margin-bottom: var(--spacing-lg);">
                Découvrez notre catalogue de produits éco-responsables pour vos animaux.
            </p>
            <a href="?page=catalog" class="btn btn-primary">
                Voir le catalogue
            </a>
        </div>
    <?php else: ?>
        <!-- Panier avec articles -->
        <form method="POST" action="?page=cart&action=update">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix unitaire</th>
                            <th>Quantité</th>
                            <th>Sous-total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_items as $item): ?>
                            <tr>
                                <td>
                                    <strong><?php echo htmlspecialchars($item['name']); ?></strong><br>
                                    <small style="color: var(--color-text-light);">
                                        <?php echo htmlspecialchars($item['weight']); ?>
                                    </small>
                                </td>
                                <td>
                                    <?php echo number_format($item['price'], 2, ',', ' '); ?>€
                                </td>
                                <td>
                                    <input 
                                        type="number" 
                                        name="quantities[<?php echo $item['id']; ?>]" 
                                        value="<?php echo $item['quantity']; ?>" 
                                        min="0" 
                                        max="99"
                                        style="width: 80px; padding: 0.5rem; border: 2px solid var(--color-border); border-radius: 4px;"
                                        aria-label="Quantité pour <?php echo htmlspecialchars($item['name']); ?>"
                                    >
                                </td>
                                <td>
                                    <strong><?php echo number_format($item['subtotal'], 2, ',', ' '); ?>€</strong>
                                </td>
                                <td>
                                    <a 
                                        href="?page=cart&action=remove&id=<?php echo $item['id']; ?>" 
                                        class="btn btn-secondary" 
                                        style="padding: 0.5rem 1rem; font-size: 0.875rem;"
                                        onclick="return confirm('Retirer cet article du panier ?');"
                                    >
                                        Retirer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="form-actions" style="margin-top: var(--spacing-md);">
                <button type="submit" class="btn btn-secondary">
                    Mettre à jour le panier
                </button>
            </div>
        </form>

        <!-- Récapitulatif -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-lg); margin-top: var(--spacing-xl);">
            
            <!-- Informations livraison -->
            <div class="card">
                <h3 style="color: var(--color-primary);">📦 Informations de livraison</h3>
                <ul style="line-height: 2; margin-top: var(--spacing-md);">
                    <li>✓ Livraison en emballages réutilisables</li>
                    <li>✓ Collecte des emballages à la prochaine livraison</li>
                    <li>✓ Points fidélité pour chaque retour</li>
                    <li>✓ Livraison gratuite dès 50€ d'achat</li>
                </ul>
            </div>

            <!-- Total et validation -->
            <div class="card" style="background-color: #f9f9f9;">
                <h3 style="color: var(--color-primary);">Récapitulatif</h3>
                
                <div style="margin: var(--spacing-md) 0; padding: var(--spacing-md) 0; border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border);">
                    <div style="display: flex; justify-content: space-between; margin-bottom: var(--spacing-sm);">
                        <span>Sous-total :</span>
                        <strong><?php echo number_format($total, 2, ',', ' '); ?>€</strong>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; margin-bottom: var(--spacing-sm);">
                        <span>Livraison :</span>
                        <strong>
                            <?php echo $total >= 50 ? 'Offerte' : '4,90€'; ?>
                        </strong>
                    </div>
                    
                    <?php if ($total < 50): ?>
                        <div class="alert alert-info" style="margin-top: var(--spacing-sm); padding: var(--spacing-xs); font-size: 0.875rem;">
                            Plus que <?php echo number_format(50 - $total, 2, ',', ' '); ?>€ 
                            pour la livraison gratuite !
                        </div>
                    <?php endif; ?>
                </div>
                
                <div style="display: flex; justify-content: space-between; font-size: 1.5rem; font-weight: 700; color: var(--color-primary);">
                    <span>Total :</span>
                    <span>
                        <?php 
                        $final_total = $total + ($total >= 50 ? 0 : 4.90);
                        echo number_format($final_total, 2, ',', ' '); 
                        ?>€
                    </span>
                </div>

                <div class="form-actions" style="margin-top: var(--spacing-lg);">
                    <a href="?page=checkout" class="btn btn-primary" style="width: 100%;">
                        Procéder au paiement
                    </a>
                </div>

                <div class="form-actions">
                    <a href="?page=catalog" class="btn btn-secondary" style="width: 100%;">
                        Continuer mes achats
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
