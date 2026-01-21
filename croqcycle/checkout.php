<?php
/**
 * CROQ'CYCLE - Page Commande / Checkout
 * 
 * Finalisation de commande avec système de retour d'emballages
 */

$page_title = 'Finaliser ma commande';
$page = 'checkout';

// Vérifier qu'il y a des articles dans le panier
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: ?page=cart');
    exit;
}

// Produits
$products = [
    1 => ['name' => 'Croquettes Chat Adult Premium', 'price' => 24.90, 'weight' => '2kg'],
    2 => ['name' => 'Croquettes Chat Senior', 'price' => 26.90, 'weight' => '2kg'],
    3 => ['name' => 'Croquettes Chien Petite Race', 'price' => 32.90, 'weight' => '3kg'],
    4 => ['name' => 'Croquettes Chien Grande Race', 'price' => 39.90, 'weight' => '5kg'],
    5 => ['name' => 'Mélange Lapin Premium', 'price' => 16.90, 'weight' => '1.5kg'],
    6 => ['name' => 'Graines Oiseaux Variées', 'price' => 14.90, 'weight' => '1kg']
];

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
            'quantity' => $item['quantity'],
            'subtotal' => $subtotal
        ];
    }
}

$shipping = $total >= 50 ? 0 : 4.90;
$final_total = $total + $shipping;

// Traitement du formulaire
$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation basique
    $required_fields = ['name', 'email', 'address', 'city', 'postal_code', 'phone'];
    $missing = [];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $missing[] = $field;
        }
    }
    
    if (!empty($missing)) {
        $error = 'Veuillez remplir tous les champs obligatoires.';
    } else {
        // Simulation de commande réussie
        $order_id = 'CMD-2025-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $_SESSION['last_order_id'] = $order_id;
        $_SESSION['cart'] = [];
        
        $success = true;
    }
}

include('includes/header.php');
?>

<div class="container">
    <?php if ($success): ?>
        <!-- Confirmation de commande -->
        <div class="card text-center" style="max-width: 700px; margin: 0 auto;">
            <span style="font-size: 5rem; color: var(--color-success);" aria-hidden="true">✅</span>
            
            <h2 style="color: var(--color-success); margin: var(--spacing-md) 0;">
                Commande confirmée !
            </h2>
            
            <p style="font-size: 1.125rem; margin-bottom: var(--spacing-md);">
                Votre commande <strong><?php echo $_SESSION['last_order_id']; ?></strong> 
                a bien été enregistrée.
            </p>

            <div class="alert alert-success" style="text-align: left;">
                <h3>📦 Prochaines étapes</h3>
                <ul style="line-height: 2; margin-top: var(--spacing-sm);">
                    <li>Vous recevrez un email de confirmation à l'adresse indiquée</li>
                    <li>Votre commande sera préparée dans nos emballages réutilisables</li>
                    <li>Livraison sous 2-3 jours ouvrés</li>
                    <li><strong>N'oubliez pas :</strong> Conservez les emballages pour les retourner 
                        à la prochaine livraison et gagner 5% de réduction !</li>
                </ul>
            </div>

            <div class="form-actions" style="justify-content: center; margin-top: var(--spacing-lg);">
                <a href="?page=account" class="btn btn-primary">
                    Voir mes commandes
                </a>
                <a href="?page=catalog" class="btn btn-secondary">
                    Continuer mes achats
                </a>
            </div>
        </div>
    <?php else: ?>
        <!-- Formulaire de commande -->
        <h2 class="section-title">Finaliser ma commande</h2>
        
        <?php if ($error): ?>
            <div class="alert" style="background-color: #fee; border-left: 4px solid var(--color-error); color: var(--color-error); max-width: 800px; margin: 0 auto var(--spacing-md);">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-xl);">
            
            <!-- Colonne gauche : Formulaire -->
            <div>
                <form method="POST" action="?page=checkout">
                    <!-- Informations de livraison -->
                    <div class="card">
                        <h3 style="color: var(--color-primary);">📍 Adresse de livraison</h3>
                        
                        <div class="form-group">
                            <label for="name">Nom complet *</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                required 
                                autocomplete="name"
                                value="<?php echo htmlspecialchars($_POST['name'] ?? ($_SESSION['user_name'] ?? '')); ?>"
                            >
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                required 
                                autocomplete="email"
                                value="<?php echo htmlspecialchars($_POST['email'] ?? ($_SESSION['user_email'] ?? '')); ?>"
                            >
                        </div>

                        <div class="form-group">
                            <label for="phone">Téléphone *</label>
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone" 
                                required 
                                autocomplete="tel"
                                placeholder="06 12 34 56 78"
                                value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>"
                            >
                        </div>

                        <div class="form-group">
                            <label for="address">Adresse *</label>
                            <input 
                                type="text" 
                                id="address" 
                                name="address" 
                                required 
                                autocomplete="street-address"
                                placeholder="Numéro et nom de rue"
                                value="<?php echo htmlspecialchars($_POST['address'] ?? ''); ?>"
                            >
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: var(--spacing-sm);">
                            <div class="form-group">
                                <label for="postal_code">Code postal *</label>
                                <input 
                                    type="text" 
                                    id="postal_code" 
                                    name="postal_code" 
                                    required 
                                    autocomplete="postal-code"
                                    placeholder="75001"
                                    value="<?php echo htmlspecialchars($_POST['postal_code'] ?? ''); ?>"
                                >
                            </div>

                            <div class="form-group">
                                <label for="city">Ville *</label>
                                <input 
                                    type="text" 
                                    id="city" 
                                    name="city" 
                                    required 
                                    autocomplete="address-level2"
                                    placeholder="Paris"
                                    value="<?php echo htmlspecialchars($_POST['city'] ?? ''); ?>"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="notes">Instructions de livraison (optionnel)</label>
                            <textarea 
                                id="notes" 
                                name="notes" 
                                placeholder="Ex: Code d'accès, étage, instructions spéciales..."
                            ><?php echo htmlspecialchars($_POST['notes'] ?? ''); ?></textarea>
                        </div>
                    </div>

                    <!-- Système de retour d'emballages -->
                    <div class="card" style="background: linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 100%); margin-top: var(--spacing-lg);">
                        <h3 style="color: var(--color-primary);">♻️ Programme de retour d'emballages</h3>
                        
                        <p style="margin: var(--spacing-md) 0;">
                            Notre système d'économie circulaire vous permet de retourner gratuitement 
                            les emballages lors de votre prochaine livraison et de bénéficier de réductions !
                        </p>

                        <div class="checkbox-group" style="background-color: white; padding: var(--spacing-md); border-radius: 4px; border: 2px solid var(--color-secondary);">
                            <input 
                                type="checkbox" 
                                id="package_return" 
                                name="package_return"
                                checked
                            >
                            <label for="package_return" style="font-weight: 600;">
                                ✓ Je souhaite participer au programme de retour d'emballages 
                                et bénéficier de <strong style="color: var(--color-secondary);">5% de réduction</strong> 
                                sur ma prochaine commande
                            </label>
                        </div>

                        <div class="alert alert-info" style="margin-top: var(--spacing-md);">
                            <strong>Comment ça marche ?</strong>
                            <ol style="margin-top: var(--spacing-xs); padding-left: 1.5rem;">
                                <li>Conservez les emballages vides et propres</li>
                                <li>À la prochaine livraison, donnez-les au livreur</li>
                                <li>Gagnez automatiquement 5% de réduction + points fidélité</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Paiement -->
                    <div class="card" style="margin-top: var(--spacing-lg);">
                        <h3 style="color: var(--color-primary);">💳 Paiement</h3>
                        
                        <div class="form-group">
                            <label for="payment_method">Mode de paiement *</label>
                            <select id="payment_method" name="payment_method" required>
                                <option value="card">Carte bancaire</option>
                                <option value="paypal">PayPal</option>
                                <option value="transfer">Virement bancaire</option>
                            </select>
                        </div>

                        <div class="alert alert-info" style="font-size: 0.875rem;">
                            🔒 Paiement 100% sécurisé. Vos données bancaires sont cryptées.
                        </div>
                    </div>

                    <!-- Conditions -->
                    <div class="card" style="margin-top: var(--spacing-lg);">
                        <div class="checkbox-group">
                            <input 
                                type="checkbox" 
                                id="accept_terms" 
                                name="accept_terms" 
                                required
                            >
                            <label for="accept_terms">
                                J'accepte les <a href="?page=terms" target="_blank">conditions générales de vente</a> *
                            </label>
                        </div>
                    </div>

                    <!-- Bouton validation -->
                    <div class="form-actions" style="margin-top: var(--spacing-lg);">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            Valider ma commande
                        </button>
                    </div>
                </form>
            </div>

            <!-- Colonne droite : Récapitulatif -->
            <div>
                <div class="card" style="position: sticky; top: 100px;">
                    <h3 style="color: var(--color-primary);">📦 Récapitulatif</h3>
                    
                    <div style="margin: var(--spacing-md) 0;">
                        <?php foreach ($cart_items as $item): ?>
                            <div style="display: flex; justify-content: space-between; padding: var(--spacing-xs) 0; border-bottom: 1px solid var(--color-border);">
                                <span>
                                    <strong><?php echo htmlspecialchars($item['name']); ?></strong><br>
                                    <small style="color: var(--color-text-light);">
                                        Qté: <?php echo $item['quantity']; ?> × <?php echo number_format($item['price'], 2, ',', ' '); ?>€
                                    </small>
                                </span>
                                <span style="font-weight: 600;">
                                    <?php echo number_format($item['subtotal'], 2, ',', ' '); ?>€
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div style="padding: var(--spacing-md) 0; border-top: 2px solid var(--color-border); border-bottom: 2px solid var(--color-border);">
                        <div style="display: flex; justify-content: space-between; margin-bottom: var(--spacing-xs);">
                            <span>Sous-total :</span>
                            <strong><?php echo number_format($total, 2, ',', ' '); ?>€</strong>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between;">
                            <span>Livraison :</span>
                            <strong>
                                <?php echo $shipping > 0 ? number_format($shipping, 2, ',', ' ') . '€' : 'Offerte'; ?>
                            </strong>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: space-between; font-size: 1.5rem; font-weight: 700; color: var(--color-primary); margin-top: var(--spacing-md);">
                        <span>Total :</span>
                        <span><?php echo number_format($final_total, 2, ',', ' '); ?>€</span>
                    </div>

                    <div class="alert alert-success" style="margin-top: var(--spacing-lg);">
                        <strong>🌍 Impact écologique</strong><br>
                        En participant au retour d'emballages, vous évitez 
                        <strong><?php echo count($cart_items) * 250; ?>g</strong> de déchets plastiques !
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
