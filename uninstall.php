<?php
/**
 * Arquivo de desinstalação do plugin Acessibilidade Menu + VLibras
 * 
 * Este arquivo é executado quando o plugin é desinstalado
 * Remove totalmente o menu "Acessibilidade" criado pelo plugin
 */

// Se o uninstall não foi chamado pelo WordPress, saia
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

/**
 * Remove completamente o menu "Acessibilidade"
 */
function amv_uninstall_cleanup() {
    // Tenta encontrar o menu em português
    $menu_names = ['Acessibilidade', 'Accessibility'];
    
    foreach ( $menu_names as $menu_name ) {
        $menu = wp_get_nav_menu_object( $menu_name );
        if ( $menu ) {
            wp_delete_nav_menu( $menu->term_id );
        }
    }
}

// Executa a limpeza
amv_uninstall_cleanup();
