<?php
/**
 * CROQ'CYCLE - Page Inscription
 * 
 * Formulaire d'inscription utilisateur
 */

$page_title = 'Inscription';
$page = 'register';

// Traitement du formulaire (simulation)
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
    $accept_terms = isset($_POST['accept_terms']);
    
    // Validation
    if (empty($name) || empty($email) || empty($password) || empty($password_confirm)) {
        $error = 'Veuillez remplir tous les champs obligatoires.';
    } elseif ($password !== $password_confirm) {
        $error = 'Les mots de passe ne correspondent pas.';
    } elseif (!$accept_terms) {
        $error = 'Vous devez accepter les conditions générales.';
    } else {
        // Simulation d'inscription réussie
        $_SESSION['user_id'] = 1;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        
        $success = 'Compte créé avec succès ! Redirection...';
        
        // Redirection après 2 secondes
        header('refresh:2;url=?page=account');
    }
}

include('includes/header.php');
?>

<div class="container">
    <div style="max-width: 600px; margin: 0 auto;">
        <h2 class="section-title">Créer un compte</h2>
        
        <div class="alert alert-info">
            <strong>🎁 Offre de bienvenue !</strong><br>
            Bénéficiez de 10% de réduction sur votre première commande en créant votre compte dès maintenant.
        </div>
        
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
            <form method="POST" action="?page=register">
                <h3 style="color: var(--color-primary); margin-bottom: var(--spacing-md);">
                    Informations personnelles
                </h3>

                <div class="form-group">
                    <label for="name">Nom complet *</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        required 
                        autocomplete="name"
                        placeholder="Jean Dupont"
                        aria-required="true"
                        value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>"
                    >
                </div>

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
                        value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                    >
                    <small style="color: var(--color-text-light); display: block; margin-top: 0.25rem;">
                        Nous utiliserons cette adresse pour vos confirmations de commande.
                    </small>
                </div>

                <div class="form-group">
                    <label for="phone">Téléphone (optionnel)</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        autocomplete="tel"
                        placeholder="06 12 34 56 78"
                        value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>"
                    >
                </div>

                <h3 style="color: var(--color-primary); margin: var(--spacing-lg) 0 var(--spacing-md);">
                    Sécurité
                </h3>

                <div class="form-group">
                    <label for="password">Mot de passe *</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        autocomplete="new-password"
                        placeholder="Minimum 8 caractères"
                        aria-required="true"
                        minlength="8"
                    >
                    <small style="color: var(--color-text-light); display: block; margin-top: 0.25rem;">
                        Au moins 8 caractères avec lettres et chiffres.
                    </small>
                </div>

                <div class="form-group">
                    <label for="password_confirm">Confirmer le mot de passe *</label>
                    <input 
                        type="password" 
                        id="password_confirm" 
                        name="password_confirm" 
                        required 
                        autocomplete="new-password"
                        placeholder="Retapez votre mot de passe"
                        aria-required="true"
                        minlength="8"
                    >
                </div>

                <h3 style="color: var(--color-primary); margin: var(--spacing-lg) 0 var(--spacing-md);">
                    Informations sur votre animal (optionnel)
                </h3>

                <div class="form-group">
                    <label for="pet_type">Type d'animal</label>
                    <select id="pet_type" name="pet_type">
                        <option value="">-- Sélectionner --</option>
                        <option value="chat">Chat</option>
                        <option value="chien">Chien</option>
                        <option value="lapin">Lapin</option>
                        <option value="oiseau">Oiseau</option>
                        <option value="autre">Autre NAC</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pet_name">Nom de votre animal</label>
                    <input 
                        type="text" 
                        id="pet_name" 
                        name="pet_name" 
                        placeholder="Ex: Minou, Rex..."
                        value="<?php echo htmlspecialchars($_POST['pet_name'] ?? ''); ?>"
                    >
                </div>

                <hr style="margin: var(--spacing-lg) 0; border: none; border-top: 1px solid var(--color-border);">

                <div class="checkbox-group" style="margin-bottom: var(--spacing-md);">
                    <input 
                        type="checkbox" 
                        id="accept_terms" 
                        name="accept_terms" 
                        required
                        aria-required="true"
                    >
                    <label for="accept_terms">
                        J'accepte les <a href="?page=terms" target="_blank">conditions générales</a> 
                        et la <a href="?page=privacy" target="_blank">politique de confidentialité</a> *
                    </label>
                </div>

                <div class="checkbox-group" style="margin-bottom: var(--spacing-md);">
                    <input 
                        type="checkbox" 
                        id="newsletter" 
                        name="newsletter"
                    >
                    <label for="newsletter">
                        J'accepte de recevoir les offres et actualités de CROQ'CYCLE
                    </label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">
                        Créer mon compte
                    </button>
                </div>
            </form>

            <hr style="margin: var(--spacing-lg) 0; border: none; border-top: 1px solid var(--color-border);">

            <p class="text-center">
                Vous avez déjà un compte ?<br>
                <a href="?page=login" style="color: var(--color-secondary); font-weight: 600;">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
