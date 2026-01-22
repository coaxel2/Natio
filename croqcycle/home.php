<?php
/**
 * CROQ'CYCLE - Page d'accueil
 * 
 * Page principale du site avec hero, impact, formules d'abonnement
 */

// Définir le titre de la page
$page_title = 'Accueil';
$page = 'home';

// Inclure le header
include('includes/header.php');
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h2>CROQ'CYCLE</h2>
                <p>Nourrissez vos animaux en respectant la planète grâce à notre système d'économie circulaire</p>
        <a href="?page=catalog" class="cta-button">Découvrez nos produits</a>
    </div>
</section>

<div class="container">
    <!-- Section Impact Positif -->
    <section class="section">
        <h2 class="section-title">Notre Impact Positif</h2>
        <p class="section-intro">
            Chez CROQ'CYCLE, nous croyons qu'il est possible de nourrir nos compagnons à quatre pattes 
            tout en prenant soin de notre planète. Découvrez comment notre modèle d'économie circulaire 
            fait la différence.
        </p>
        
        <div class="grid">
            <div class="card">
                <span class="card-icon" aria-hidden="true">♻️</span>
                <h3>Économie Circulaire</h3>
                <p>
                    Nous collectons et réutilisons les emballages à chaque livraison. 
                    Chaque emballage retourné est nettoyé et réemployé, réduisant ainsi 
                    considérablement notre empreinte environnementale.
                </p>
            </div>

            <div class="card">
                <span class="card-icon" aria-hidden="true">📦</span>
                <h3>Emballages Réutilisables</h3>
                <p>
                    Nos contenants sont conçus pour durer. Fabriqués en matériaux robustes 
                    et lavables, ils peuvent être réutilisés des dizaines de fois, 
                    éliminant le besoin de production constante de nouveaux emballages.
                </p>
            </div>

            <div class="card">
                <span class="card-icon" aria-hidden="true">💚</span>
                <h3>Réductions Fidélité</h3>
                <p>
                    Plus vous participez au cycle de réutilisation, plus vous économisez ! 
                    Chaque emballage retourné vous fait gagner des points de fidélité 
                    convertibles en réductions sur vos prochaines commandes.
                </p>
            </div>
        </div>
    </section>

    <!-- Section Formules d'Abonnement -->
    <section class="section">
        <h2 class="section-title">Nos Formules d'Abonnement</h2>
        <p class="section-intro">
            Choisissez la formule adaptée aux besoins de votre compagnon. 
            Flexibles et sans engagement, nos abonnements s'adaptent à votre rythme de vie.
        </p>
        
        <div class="grid">
            <div class="card">
                <span class="card-icon" aria-hidden="true">🐱</span>
                <h3>Formule Chat</h3>
                <p class="card-price">À partir de 19,90€/mois</p>
                <ul class="card-features">
                    <li>✓ Croquettes premium adaptées</li>
                    <li>✓ Livraison mensuelle</li>
                    <li>✓ Emballages réutilisables inclus</li>
                    <li>✓ Retour des emballages gratuit</li>
                    <li>✓ 5% de réduction par retour</li>
                </ul>
                <a href="?page=catalog" class="btn btn-primary">Découvrir</a>
            </div>

            <div class="card">
                <span class="card-icon" aria-hidden="true">🐶</span>
                <h3>Formule Chien</h3>
                <p class="card-price">À partir de 29,90€/mois</p>
                <ul class="card-features">
                    <li>✓ Croquettes premium adaptées à la taille</li>
                    <li>✓ Livraison bi-mensuelle ou mensuelle</li>
                    <li>✓ Emballages réutilisables inclus</li>
                    <li>✓ Retour des emballages gratuit</li>
                    <li>✓ 5% de réduction par retour</li>
                </ul>
                <a href="?page=catalog" class="btn btn-primary">Découvrir</a>
            </div>

            <div class="card">
                <span class="card-icon" aria-hidden="true">🐰</span>
                <h3>Formule NAC</h3>
                <p class="card-price">À partir de 14,90€/mois</p>
                <ul class="card-features">
                    <li>✓ Alimentation pour rongeurs, oiseaux ...</li>
                    <li>✓ Livraison mensuelle</li>
                    <li>✓ Emballages réutilisables inclus</li>
                    <li>✓ Retour des emballages gratuit</li>
                    <li>✓ 5% de réduction par retour</li>
                </ul>
                <a href="?page=catalog" class="btn btn-primary">Découvrir</a>
            </div>
        </div>
    </section>

    <!-- Section Comment ça marche -->
    <section class="section">
        <h2 class="section-title">Comment ça marche ?</h2>
        
        <div class="grid">

            <div class="card">
                <h3>1. Je m'abonne</h3>
                <p>
                    Je choisis la formule adaptée à mon animal : type d'aliment, 
                    quantité et fréquence de livraison. Mon abonnement est flexible 
                    et sans engagement.
                </p>
            </div>

            <div class="card">
                <h3>2. Je retourne les emballages</h3>
                <p>
                    À la prochaine livraison, je rends simplement les emballages vides. 
                    Le livreur les récupère gratuitement et je gagne mes points fidélité.
                </p>
            </div>

            <div class="card">
                <h3>3. Je bénéficie de réductions</h3>
                <p>
                    Mes points de fidélité se transforment en réductions sur mes prochaines 
                    commandes. Plus je participe, plus j'économise !
                </p>
            </div>
        </div>
    </section>

    <!-- Section CTA Final -->
    <section class="section text-center">
        <div class="alert alert-info">
            <h3>Prêt à rejoindre la révolution écologique de l'alimentation animale ?</h3>
            <p>Créez votre compte dès maintenant et bénéficiez de 5% de réduction sur votre première commande !</p>
            <div class="form-actions" style="justify-content: center; margin-top: var(--spacing-md);">
                <a href="?page=register" class="btn btn-primary">Créer mon compte</a>
                <a href="?page=catalog" class="btn btn-secondary">Voir le catalogue</a>
            </div>
        </div>
    </section>
</div>

<?php
// Inclure le footer
include('includes/footer.php');
?>
