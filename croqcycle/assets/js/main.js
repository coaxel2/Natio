/**
 * CROQ'CYCLE - JavaScript léger
 * 
 * Fonctionnalités minimales pour améliorer l'UX sans surcharger
 * Éco-conception : pas de dépendances externes
 */

// Chargement lazy des images
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Lazy loading des images
    const images = document.querySelectorAll('img[loading="lazy"]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        });
        
        images.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback pour navigateurs anciens
        images.forEach(img => img.classList.add('loaded'));
    }
    
    
    // 2. Message de confirmation avant suppression du panier
    const removeLinks = document.querySelectorAll('a[href*="action=remove"]');
    removeLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!confirm('Êtes-vous sûr de vouloir retirer cet article ?')) {
                e.preventDefault();
            }
        });
    });
    
    
    // 3. Animation smooth scroll pour les ancres
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    
    // 4. Amélioration du focus clavier pour l'accessibilité
    // Rend visible le focus pour navigation clavier
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
    });
    
    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });
    
    
    // 5. Feedback visuel lors de l'ajout au panier
    const addToCartLinks = document.querySelectorAll('a[href*="action=add"]');
    addToCartLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Animation de feedback
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 100);
        });
    });
    
    
    // 6. Validation formulaire côté client (sécurité + UX)
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = 'var(--color-error)';
                } else {
                    field.style.borderColor = '';
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Veuillez remplir tous les champs obligatoires.');
            }
        });
    });
    
    
    // 7. Amélioration de l'expérience mobile - Menu responsive
    // (À implémenter si besoin d'un menu hamburger)
    
    
    console.log('🌍 CROQ\'CYCLE - Site éco-conçu chargé avec succès');
});
