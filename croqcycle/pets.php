<?php
/**
 * CROQ'CYCLE - Page Animaux
 * 
 * Informations sur les différents types d'animaux et leurs besoins
 */

$page_title = 'Nos animaux';
$page = 'pets';

include('includes/header.php');
?>

<div class="container">
    <h2 class="section-title">Nos Animaux de Compagnie</h2>
    <p class="section-intro">
        Chaque animal a des besoins nutritionnels spécifiques. Découvrez nos recommandations 
        pour choisir l'alimentation idéale pour votre compagnon.
    </p>

    <!-- Section Chats -->
    <section class="section">
        <div class="card" style="background: linear-gradient(135deg, #f9f9f9 0%, #ffffff 100%);">
            <div style="display: grid; grid-template-columns: auto 1fr; gap: var(--spacing-lg); align-items: center;">
                <span style="font-size: 6rem;" aria-hidden="true">🐱</span>
                <div>
                    <h3 style="color: var(--color-primary); font-size: 2rem;">Chats</h3>
                    <p style="font-size: 1.125rem; margin-top: var(--spacing-sm);">
                        Les chats sont des carnivores stricts qui nécessitent une alimentation 
                        riche en protéines animales de qualité. Nos formules sont spécialement 
                        conçues pour répondre à leurs besoins nutritionnels spécifiques.
                    </p>
                </div>
            </div>

            <h4 style="margin-top: var(--spacing-lg); color: var(--color-secondary);">Besoins nutritionnels</h4>
            <ul style="line-height: 1.8; margin-top: var(--spacing-sm);">
                <li><strong>Protéines :</strong> 30-40% minimum (viande, poisson)</li>
                <li><strong>Taurine :</strong> Acide aminé essentiel pour la vision et le cœur</li>
                <li><strong>Oméga 3 & 6 :</strong> Pour un pelage soyeux et une peau saine</li>
                <li><strong>Hydratation :</strong> Eau fraîche toujours disponible</li>
            </ul>

            <h4 style="margin-top: var(--spacing-lg); color: var(--color-secondary);">Nos formules pour chats</h4>
            <div class="grid" style="margin-top: var(--spacing-sm);">
                <div class="card">
                    <h5>Chaton (0-12 mois)</h5>
                    <p>Riche en protéines et calories pour une croissance optimale</p>
                </div>
                <div class="card">
                    <h5>Adulte (1-7 ans)</h5>
                    <p>Équilibre parfait pour maintenir la forme et la vitalité</p>
                </div>
                <div class="card">
                    <h5>Senior (7+ ans)</h5>
                    <p>Formule adaptée avec glucosamine pour les articulations</p>
                </div>
            </div>

            <div class="form-actions" style="margin-top: var(--spacing-lg);">
                <a href="?page=catalog" class="btn btn-primary">Voir nos produits pour chats</a>
            </div>
        </div>
    </section>

    <!-- Section Chiens -->
    <section class="section">
        <div class="card" style="background: linear-gradient(135deg, #f9f9f9 0%, #ffffff 100%);">
            <div style="display: grid; grid-template-columns: auto 1fr; gap: var(--spacing-lg); align-items: center;">
                <span style="font-size: 6rem;" aria-hidden="true">🐶</span>
                <div>
                    <h3 style="color: var(--color-primary); font-size: 2rem;">Chiens</h3>
                    <p style="font-size: 1.125rem; margin-top: var(--spacing-sm);">
                        Les chiens ont des besoins variés selon leur taille, âge et niveau d'activité. 
                        Nos formules sont adaptées à chaque profil pour une santé optimale.
                    </p>
                </div>
            </div>

            <h4 style="margin-top: var(--spacing-lg); color: var(--color-secondary);">Besoins nutritionnels</h4>
            <ul style="line-height: 1.8; margin-top: var(--spacing-sm);">
                <li><strong>Protéines :</strong> 18-25% selon l'âge et l'activité</li>
                <li><strong>Glucides :</strong> Source d'énergie (riz, patate douce)</li>
                <li><strong>Fibres :</strong> Pour une bonne digestion</li>
                <li><strong>Vitamines & minéraux :</strong> Calcium, phosphore pour les os</li>
            </ul>

            <h4 style="margin-top: var(--spacing-lg); color: var(--color-secondary);">Nos formules pour chiens</h4>
            <div class="grid" style="margin-top: var(--spacing-sm);">
                <div class="card">
                    <h5>Petite race (&lt;10kg)</h5>
                    <p>Croquettes adaptées aux petites mâchoires, haute énergie</p>
                </div>
                <div class="card">
                    <h5>Race moyenne (10-25kg)</h5>
                    <p>Équilibre optimal pour chiens actifs et dynamiques</p>
                </div>
                <div class="card">
                    <h5>Grande race (&gt;25kg)</h5>
                    <p>Formule pour articulations et digestion optimale</p>
                </div>
            </div>

            <div class="form-actions" style="margin-top: var(--spacing-lg);">
                <a href="?page=catalog" class="btn btn-primary">Voir nos produits pour chiens</a>
            </div>
        </div>
    </section>

    <!-- Section NAC -->
    <section class="section">
        <div class="card" style="background: linear-gradient(135deg, #f9f9f9 0%, #ffffff 100%);">
            <div style="display: grid; grid-template-columns: auto 1fr; gap: var(--spacing-lg); align-items: center;">
                <span style="font-size: 6rem;" aria-hidden="true">🐰</span>
                <div>
                    <h3 style="color: var(--color-primary); font-size: 2rem;">NAC (Nouveaux Animaux de Compagnie)</h3>
                    <p style="font-size: 1.125rem; margin-top: var(--spacing-sm);">
                        Lapins, cochons d'Inde, hamsters, oiseaux... Chaque NAC a des besoins 
                        uniques. Nous proposons des aliments adaptés et sourcés localement.
                    </p>
                </div>
            </div>

            <h4 style="margin-top: var(--spacing-lg); color: var(--color-secondary);">Types de NAC</h4>
            <div class="grid" style="margin-top: var(--spacing-sm);">
                <div class="card">
                    <h5>🐰 Lapins & Rongeurs</h5>
                    <p>Foin bio, granulés équilibrés, légumes frais recommandés</p>
                </div>
                <div class="card">
                    <h5>🐦 Oiseaux</h5>
                    <p>Mélanges de graines bio adaptés à chaque espèce</p>
                </div>
                <div class="card">
                    <h5>🐹 Hamsters & Gerbilles</h5>
                    <p>Alimentation variée avec graines, céréales et légumes</p>
                </div>
            </div>

            <div class="form-actions" style="margin-top: var(--spacing-lg);">
                <a href="?page=catalog" class="btn btn-primary">Voir nos produits pour NAC</a>
            </div>
        </div>
    </section>

    <!-- Conseils généraux -->
    <section class="section">
        <div class="alert alert-info">
            <h3>💡 Conseils pour une alimentation saine</h3>
            <div class="grid" style="margin-top: var(--spacing-md);">
                <div>
                    <strong>Quantités adaptées</strong>
                    <p>Respectez les doses recommandées selon le poids et l'âge de votre animal</p>
                </div>
                <div>
                    <strong>Transition progressive</strong>
                    <p>Changez d'alimentation sur 7-10 jours pour éviter les troubles digestifs</p>
                </div>
                <div>
                    <strong>Eau fraîche</strong>
                    <p>Veillez à ce que votre animal ait toujours de l'eau propre à disposition</p>
                </div>
                <div>
                    <strong>Suivi vétérinaire</strong>
                    <p>Consultez régulièrement votre vétérinaire pour un suivi personnalisé</p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('includes/footer.php'); ?>
