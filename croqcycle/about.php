<?php
/**
 * CROQ'CYCLE - Page À propos
 * 
 * Présentation de l'entreprise et de sa mission RSE
 */

$page_title = 'À propos';
$page = 'about';

include('includes/header.php');
?>

<div class="container">
    <!-- Hero Section -->
    <section class="hero" style="margin-bottom: var(--spacing-xl);">
        <h2>À propos de CROQ'CYCLE</h2>
        <p>Une écologie qui se sent dans le porte-monnaie</p>
    </section>

    <!-- Notre Mission -->
    <section class="section">
        <h3 class="section-title">Notre Mission</h3>
        
        <div class="card">
            <p style="font-size: 1.125rem; line-height: 1.8; text-align: center; max-width: 800px; margin: 0 auto;">
                CROQ'CYCLE est né d'une conviction simple : il est possible de nourrir nos animaux 
                de compagnie tout en respectant la planète. Nous avons créé le premier système 
                d'abonnement alimentaire pour animaux basé sur l'économie circulaire et le 
                retour d'emballages réutilisables.
            </p>
        </div>
    </section>

    <!-- Nos Valeurs -->
    <section class="section">
        <h3 class="section-title">Nos Valeurs</h3>
        
        <div class="grid">
            <div class="card">
                <span class="card-icon" aria-hidden="true">🌍</span>
                <h4 style="color: var(--color-primary);">Responsabilité Environnementale</h4>
                <p>
                    Nous nous engageons à réduire notre empreinte écologique à chaque étape : 
                    emballages réutilisables, circuits courts, ingrédients locaux et bio.
                </p>
            </div>

            <div class="card">
                <span class="card-icon" aria-hidden="true">💚</span>
                <h4 style="color: var(--color-primary);">Économie Circulaire</h4>
                <p>
                    Notre modèle de retour et réutilisation des emballages permet de réduire 
                    les déchets de 95% par rapport aux emballages traditionnels jetables.
                </p>
            </div>

            <div class="card">
                <span class="card-icon" aria-hidden="true">🐾</span>
                <h4 style="color: var(--color-primary);">Qualité Premium</h4>
                <p>
                    Nos produits sont élaborés avec des vétérinaires nutritionnistes et 
                    contiennent uniquement des ingrédients naturels, sans OGM ni additifs artificiels.
                </p>
            </div>
        </div>
    </section>

    <!-- Notre Impact -->
    <section class="section">
        <h3 class="section-title">Notre Impact en Chiffres</h3>
        
        <div class="grid">
            <div class="card text-center" style="background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-primary) 100%); color: white;">
            <p style="font-size: 3rem; font-weight: 700; margin: 0; color: white;">95%</p>
            <p style="font-size: 1.125rem; margin-top: var(--spacing-sm); color: white;">
                de déchets en moins grâce aux emballages réutilisables
            </p>
            </div>

            <div class="card text-center" style="background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-primary) 100%); color: white;">
            <p style="font-size: 3rem; font-weight: 700; margin: 0; color: white;">20×</p>
            <p style="font-size: 1.125rem; margin-top: var(--spacing-sm); color: white;">
                réutilisations en moyenne pour chaque emballage
            </p>
            </div>

            <div class="card text-center" style="background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-primary) 100%); color: white;">
            <p style="font-size: 3rem; font-weight: 700; margin: 0; color: white;">100%</p>
            <p style="font-size: 1.125rem; margin-top: var(--spacing-sm); color: white;">
                d'ingrédients traçables et de qualité contrôlée
            </p>
            </div>
        </div>
    </section>

    <!-- Comment ça marche -->
    <section class="section">
        <h3 class="section-title">Le Cycle CROQ'CYCLE</h3>
        
        <div class="card">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-lg); text-align: center;">
                <div>
                    <span style="font-size: 4rem;" aria-hidden="true">1️⃣</span>
                    <h4 style="color: var(--color-primary); margin-top: var(--spacing-sm);">Commande</h4>
                    <p>Vous passez commande et recevez vos produits dans nos emballages réutilisables</p>
                </div>

                <div>
                    <span style="font-size: 4rem;" aria-hidden="true">2️⃣</span>
                    <h4 style="color: var(--color-primary); margin-top: var(--spacing-sm);">Utilisation</h4>
                    <p>Vous nourrissez votre animal avec nos produits de qualité premium</p>
                </div>

                <div>
                    <span style="font-size: 4rem;" aria-hidden="true">3️⃣</span>
                    <h4 style="color: var(--color-primary); margin-top: var(--spacing-sm);">Retour</h4>
                    <p>Vous retournez les emballages vides lors de la livraison suivante</p>
                </div>

                <div>
                    <span style="font-size: 4rem;" aria-hidden="true">4️⃣</span>
                    <h4 style="color: var(--color-primary); margin-top: var(--spacing-sm);">Récompense</h4>
                    <p>Vous gagnez 5% de réduction + des points fidélité</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Concours Tech & Business -->
    <section class="section">
        <div class="alert alert-info">
            <h3 style="margin-bottom: var(--spacing-md);">🏆 Projet Concours National Tech & Business 25/26</h3>
            <p>
                CROQ'CYCLE est un projet innovant présenté dans le cadre du 
                <strong>Concours National Tech & Business 25/26</strong> sur le thème 
                <strong>"Food for Good"</strong>.
            </p>
            <p style="margin-top: var(--spacing-sm);">
                Notre objectif est de démontrer qu'une entreprise peut être à la fois 
                <strong>rentable</strong>, <strong>écologique</strong> et <strong>socialement responsable</strong>, 
                tout en offrant une vraie valeur ajoutée aux consommateurs.
            </p>
        </div>
    </section>

    <!-- Nos Engagements -->
    <section class="section">
        <h3 class="section-title">Nos Engagements</h3>
        
        <div class="card">
            <ul style="line-height: 2; font-size: 1.125rem;">
                <li>✓ <strong>Transparence totale</strong> sur l'origine et la composition de nos produits</li>
                <li>✓ <strong>Zéro déchet plastique</strong> grâce à nos emballages réutilisables</li>
                <li>✓ <strong>Circuit court</strong> avec des producteurs locaux dans un rayon de 150km</li>
                <li>✓ <strong>Qualité contrôlée</strong> par des vétérinaires nutritionnistes</li>
                <li>✓ <strong>Prix justes</strong> pour les consommateurs et les producteurs</li>
                <li>✓ <strong>Réductions fidélité</strong> qui récompensent votre engagement écologique</li>
                <li>✓ <strong>Livraisons optimisées</strong> pour réduire l'empreinte carbone transport</li>
            </ul>
        </div>
    </section>

    <!-- Contact -->
    <section class="section text-center">
        <h3 class="section-title">Rejoignez le Mouvement !</h3>
        
        <p style="font-size: 1.125rem; max-width: 700px; margin: 0 auto var(--spacing-lg);">
            Ensemble, faisons de l'alimentation animale un acte écologique et économique. 
            Chaque geste compte pour préserver notre planète.
        </p>

        <div class="form-actions" style="justify-content: center;">
            <a href="?page=register" class="btn btn-primary">Créer mon compte</a>
            <a href="?page=catalog" class="btn btn-secondary">Découvrir nos produits</a>
        </div>
    </section>
</div>

<?php include('includes/footer.php'); ?>
