<?php
/**
 * Plugin Name: Aries V2 Page Styles
 * Description: Custom CSS styles for the Aries Redesign Alternative v2 page
 * Version: 1.0
 */

add_action('wp_enqueue_scripts', function() {
    if (!is_page(46)) return;
    wp_enqueue_style('google-fonts-inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', [], null);
});

add_action('wp_head', function() {
    if (!is_page(46)) return;
    
    $hero_url = wp_upload_dir()['baseurl'] . '/2026/05/hero-background.png';

    echo '<style>
        /* === Aries Redesign V2 === */
        body, p, h1, h2, h3, h4, a, span { font-family: "Inter", sans-serif !important; }
        
        /* Header section */
        .aries-header-section { background-color: #ffffff !important; }
        .aries-header-section a:hover { color: #c91c1c !important; transition: color 0.2s ease; }
        .aries-btn-quote .elementor-button { background-color: #c91c1c !important; color: #ffffff !important; border-radius: 4px !important; }
        
        /* Hero section */
        .aries-hero-section {
            background-image: url("' . $hero_url . '") !important;
            background-size: cover !important;
            background-position: center !important;
            background-color: #222222 !important;
            position: relative;
        }
        .aries-hero-section > .elementor-background-overlay {
            background-color: rgba(0,0,0,0.6) !important;
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        }
        .aries-hero-section .elementor-heading-title {
            color: #ffffff !important;
        }
        
        /* Hero Buttons */
        .aries-btn-services .elementor-button { background-color: #c91c1c !important; color: #ffffff !important; border-radius: 4px !important; }
        .aries-btn-contact .elementor-button { background-color: transparent !important; color: #ffffff !important; border: 2px solid #ffffff !important; border-radius: 4px !important; }
        
        /* White section */
        .aries-white-section { background-color: #ffffff !important; }
        .aries-white-section .elementor-heading-title { color: #222222 !important; }
        
        /* Learn More text buttons */
        .aries-btn-learn .elementor-button { background-color: transparent !important; color: #c91c1c !important; padding: 0 !important; }
        .aries-btn-learn .elementor-button:hover { color: #a01515 !important; }
        
        /* Values section */
        .aries-values-section { background-color: #222222 !important; }
        .aries-values-section .elementor-heading-title { color: #ffffff !important; }
        
        /* CTA section */
        .aries-cta-section { background-color: #c91c1c !important; }
        .aries-cta-section .elementor-heading-title { color: #ffffff !important; }
        .aries-btn-cta .elementor-button { background-color: #ffffff !important; color: #222222 !important; border-radius: 4px !important; font-weight: 700 !important; }
        .aries-btn-cta .elementor-button:hover { background-color: #f0f0f0 !important; }
        
        /* Icons */
        .aries-icon-red .elementor-icon { color: #c91c1c !important; fill: #c91c1c !important; }
        .elementor-icon { margin-bottom: 15px !important; }
        
        /* Global Button Hover */
        .elementor-button { transition: all 0.3s ease !important; letter-spacing: 0.5px; }
        .elementor-button:hover { transform: translateY(-2px) !important; box-shadow: 0 4px 15px rgba(0,0,0,0.2) !important; }
        
        html { scroll-behavior: smooth; }
        
        /* Client Portfolio Section */
        .aries-client-portfolio-section { background-color: #F5F5F5 !important; position: relative; overflow: hidden; }
        .aries-client-portfolio-section .elementor-heading-title { position: relative; z-index: 1; }
        .aries-client-portfolio-section .elementor-widget-html { position: relative; z-index: 1; }
    </style>';
}, 100);
