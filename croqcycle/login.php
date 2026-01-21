<?php
/**
 * CROQ'CYCLE - Page Connexion
 * 
 * Formulaire de connexion utilisateur
 */

$page_title = 'Connexion';
$page = 'login';

// Traitement du formulaire (simulation)
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Validation basique
    if (empty($email) || empty($password)) {
        $error = 'Veuillez remplir tous les champs.';
    } else {
        // Simulation de connexion réussie
        $_SESSION['user_id'] = 1;
        $_SESSION['user_name'] = 'Utilisateur';
        $_SESSION['user_email'] = $email;
        
        // Redirection vers le compte
        header('Location: ?page=account');
        exit;
    }
}

include('includes/header.php');
?>

<div class="container">
    <div style="max-width: 500px; margin: 0 auto;">
        <h2 class="section-title">Connexion</h2>
        
        <?php if ($error): ?>
            <div class="alert" style="background-color: #fee; border-left: 4px solid var(--color-error); color: var(--color-error);">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($success); ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <form method="POST" action="?page=login">
                <div class="form-group">
                    <label for="email">Adresse email *</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required 
                        autocomplete="email"
                        placeholder="votre@email.fr"
                        aria-required="true"
                    >
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe *</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        autocomplete="current-password"
                        placeholder="Votre mot de passe"
                        aria-required="true"
                    >
                </div>

                <div class="checkbox-group" style="margin-bottom: var(--spacing-md);">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember"
                    >
                    <label for="remember">Se souvenir de moi</label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">
                        Se connecter
                    </button>
                </div>
            </form>

            <hr style="margin: var(--spacing-lg) 0; border: none; border-top: 1px solid var(--color-border);">

            <p class="text-center">
                Pas encore de compte ?<br>
                <a href="?page=register" style="color: var(--color-secondary); font-weight: 600;">
                    Créer un compte gratuitement
                </a>
            </p>

            <p class="text-center" style="margin-top: var(--spacing-md);">
                <a href="#" style="color: var(--color-text-light); font-size: 0.875rem;">
                    Mot de passe oublié ?
                </a>
            </p>
        </div>

        <!-- Avantages de créer un compte -->
        <section class="section">
            <h3 class="section-title" style="font-size: 1.5rem;">Pourquoi créer un compte ?</h3>
            
            <div class="card">
                <ul style="line-height: 2;">
                    <li>✓ <strong>Suivi de vos commandes</strong> en temps réel</li>
                    <li>✓ <strong>Historique d'achats</strong> et factures téléchargeables</li>
                    <li>✓ <strong>Gestion de votre abonnement</strong> flexible</li>
                    <li>✓ <strong>Points fidélité</strong> et réductions écologiques</li>
                    <li>✓ <strong>Profil personnalisé</strong> pour votre animal</li>
                    <li>✓ <strong>Paiement rapide</strong> avec vos informations sauvegardées</li>
                </ul>
            </div>
        </section>
    </div>
</div>

<?php include('includes/footer.php'); ?>
