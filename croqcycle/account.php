<?php
/**
 * CROQ'CYCLE - Page Mon Compte
 * 
 * Tableau de bord utilisateur
 */

$page_title = 'Mon Compte';
$page = 'account';

// Vérification de la connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: ?page=login');
    exit;
}

// Données utilisateur simulées
$user = [
    'name' => $_SESSION['user_name'] ?? 'Utilisateur',
    'email' => $_SESSION['user_email'] ?? 'user@example.com',
    'member_since' => '2025-01-15',
    'loyalty_points' => 450,
    'packages_returned' => 9
];

// Commandes simulées
$orders = [
    [
        'id' => 'CMD-2025-001',
        'date' => '2025-10-15',
        'status' => 'Livrée',
        'total' => 54.80,
        'items' => 'Croquettes Chat Adult Premium x2'
    ],
    [
        'id' => 'CMD-2025-002',
        'date' => '2025-09-20',
        'status' => 'Livrée',
        'total' => 32.90,
        'items' => 'Croquettes Chien Petite Race x1'
    ]
];

// Gestion de la déconnexion
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: ?page=home');
    exit;
}

include('includes/header.php');
?>

<div class="container">
    <h2 class="section-title">Mon Compte</h2>
    
    <p class="section-intro">
        Bienvenue <strong><?php echo htmlspecialchars($user['name']); ?></strong> ! 
        Gérez votre profil, vos commandes et votre abonnement.
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--spacing-lg);">
        
        <!-- Section Profil -->
        <section class="card">
            <h3 style="color: var(--color-primary);">👤 Mon Profil</h3>
            
            <div style="margin-top: var(--spacing-md);">
                <p><strong>Nom :</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                <p><strong>Email :</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Membre depuis :</strong> <?php echo date('d/m/Y', strtotime($user['member_since'])); ?></p>
            </div>

            <div class="form-actions" style="margin-top: var(--spacing-md);">
                <button class="btn btn-secondary" style="width: 100%;">
                    Modifier mes informations
                </button>
            </div>
        </section>

        <!-- Section Points Fidélité -->
        <section class="card" style="background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-primary) 100%); color: white;">
            <h3 style="color: white;">💚 Programme Fidélité</h3>
            
            <div style="margin-top: var(--spacing-md);">
                <p style="font-size: 2.5rem; font-weight: 700; margin: var(--spacing-md) 0;">
                    <?php echo $user['loyalty_points']; ?> points
                </p>
                <p style="opacity: 0.9;">
                    📦 <?php echo $user['packages_returned']; ?> emballages retournés
                </p>
                <p style="opacity: 0.9; margin-top: var(--spacing-sm); font-size: 0.875rem;">
                    Soit <strong><?php echo $user['packages_returned'] * 5; ?>%</strong> de réduction cumulée !
                </p>
            </div>

            <div style="background: rgba(255,255,255,0.2); padding: var(--spacing-sm); border-radius: 4px; margin-top: var(--spacing-md);">
                <p style="font-size: 0.875rem; margin: 0;">
                    🎁 Prochain palier à 500 points : bon de 10€ offert !
                </p>
            </div>
        </section>

        <!-- Section Impact Écologique -->
        <section class="card" style="background-color: #e8f5e9;">
            <h3 style="color: var(--color-primary);">🌍 Mon Impact Écologique</h3>
            
            <div style="margin-top: var(--spacing-md);">
                <div style="margin-bottom: var(--spacing-md);">
                    <strong style="color: var(--color-success);">♻️ Déchets évités</strong>
                    <p style="font-size: 1.5rem; font-weight: 700; color: var(--color-primary);">
                        <?php echo $user['packages_returned'] * 250; ?>g
                    </p>
                </div>

                <div style="margin-bottom: var(--spacing-md);">
                    <strong style="color: var(--color-success);">🌱 CO2 économisé</strong>
                    <p style="font-size: 1.5rem; font-weight: 700; color: var(--color-primary);">
                        <?php echo number_format($user['packages_returned'] * 0.5, 1, ',', ''); ?>kg
                    </p>
                </div>

                <div class="alert alert-success" style="margin-top: var(--spacing-md); padding: var(--spacing-sm);">
                    <strong>Bravo !</strong> Vous contribuez activement à la préservation de l'environnement.
                </div>
            </div>
        </section>
    </div>

    <!-- Section Commandes -->
    <section class="section">
        <h3 class="section-title">📦 Mes Commandes</h3>
        
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>N° Commande</th>
                        <th>Date</th>
                        <th>Articles</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($order['id']); ?></strong></td>
                            <td><?php echo date('d/m/Y', strtotime($order['date'])); ?></td>
                            <td><?php echo htmlspecialchars($order['items']); ?></td>
                            <td><strong><?php echo number_format($order['total'], 2, ',', ' '); ?>€</strong></td>
                            <td>
                                <span class="badge badge-success"><?php echo htmlspecialchars($order['status']); ?></span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">
                                    Détails
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Section Abonnement -->
    <section class="section">
        <h3 class="section-title">📅 Mon Abonnement</h3>
        
        <div class="card">
            <div class="alert alert-info">
                <strong>ℹ️ Aucun abonnement actif</strong><br>
                Vous n'avez pas encore d'abonnement en cours. Créez votre abonnement personnalisé 
                pour bénéficier de livraisons régulières et de réductions supplémentaires.
            </div>

            <div class="form-actions" style="margin-top: var(--spacing-md);">
                <a href="?page=catalog" class="btn btn-primary">
                    Créer mon abonnement
                </a>
            </div>
        </div>
    </section>

    <!-- Section Actions -->
    <section class="section">
        <div class="form-actions" style="justify-content: center;">
            <a href="?page=account&action=logout" class="btn btn-secondary">
                Se déconnecter
            </a>
        </div>
    </section>
</div>

<?php include('includes/footer.php'); ?>
