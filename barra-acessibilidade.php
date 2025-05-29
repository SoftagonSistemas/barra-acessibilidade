<?php
/**
 * Plugin Name:     Acessibilidade Menu + VLibras
 * Plugin URI:      https://github.com/SoftagonSistemas/barra-acessibilidade/
 * Description:     Cria o menu “Acessibilidade” com subitens (Contraste, Aumentar fonte, Diminuir fonte, Libras) e integra o widget VLibras. Reset em Configurações.
 * Version:         1.4
 * Author:          Softagon Sistemas
 * Author URI:      https://www.softagon.com.br
 * License:         GPLv2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     barra-acessibilidade
 * Domain Path:     /languages
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Inicialização do plugin
add_action( 'plugins_loaded', 'amv_load_textdomain' );

function amv_load_textdomain() {
    load_plugin_textdomain( 'barra-acessibilidade', false, dirname( plugin_basename(__FILE__) ) . '/languages' );
}

// --- HELPER FUNCTIONS ---

/**
 * Output plugin asset image with proper WordPress escaping
 * 
 * @param string $filename The image filename in the assets directory
 * @param array $args Optional arguments for the image tag
 */
function amv_render_plugin_image( $filename, $args = array() ) {
    $defaults = array(
        'alt' => '',
        'style' => '',
        'class' => '',
        'id' => ''
    );
    
    $args = wp_parse_args( $args, $defaults );
    $image_url = esc_url( plugin_dir_url( __FILE__ ) . 'assets/' . $filename );
    
    $attributes = array();
    $attributes[] = 'src="' . $image_url . '"';
    
    if ( ! empty( $args['alt'] ) ) {
        $attributes[] = 'alt="' . esc_attr( $args['alt'] ) . '"';
    }
    
    if ( ! empty( $args['style'] ) ) {
        $attributes[] = 'style="' . esc_attr( $args['style'] ) . '"';
    }
    
    if ( ! empty( $args['class'] ) ) {
        $attributes[] = 'class="' . esc_attr( $args['class'] ) . '"';
    }
      if ( ! empty( $args['id'] ) ) {
        $attributes[] = 'id="' . esc_attr( $args['id'] ) . '"';
    }
    
    // Since all individual attributes are already escaped, we can safely output the imploded string
    echo '<img ' . implode( ' ', $attributes ) . '>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

// --- CRIAÇÃO E REMOÇÃO DO MENU ---

function amv_create_menu() {
    $menu_name = __('Acessibilidade', 'barra-acessibilidade');
    if ( ! wp_get_nav_menu_object( $menu_name ) ) {
        $menu_id   = wp_create_nav_menu( $menu_name );
        $parent_id = wp_update_nav_menu_item( $menu_id, 0, [
            'menu-item-title'  => $menu_name,
            'menu-item-url'    => '#',
            'menu-item-status' => 'publish',
        ] );
        $items = [
            [__('Contraste', 'barra-acessibilidade'),      'js-contraste'],
            [__('Aumentar fonte', 'barra-acessibilidade'), 'js-aumentar'],
            [__('Diminuir fonte', 'barra-acessibilidade'), 'js-diminuir'],
            [__('Libras', 'barra-acessibilidade'),         'js-vlibras'],
        ];
        foreach ( $items as $item ) {
            wp_update_nav_menu_item( $menu_id, 0, [
                'menu-item-title'     => $item[0],
                'menu-item-url'       => '#',
                'menu-item-status'    => 'publish',
                'menu-item-parent-id' => $parent_id,
                'menu-item-classes'   => $item[1],
            ] );
        }
    }
}
register_activation_hook( __FILE__, 'amv_create_menu' );

function amv_remove_menu() {
    $menu_name = __('Acessibilidade', 'barra-acessibilidade');
    if ( $menu = wp_get_nav_menu_object( $menu_name ) ) {
        wp_delete_nav_menu( $menu->term_id );
    }
}
register_deactivation_hook( __FILE__, 'amv_remove_menu' );


// --- PÁGINA DE CONFIGURAÇÕES ---

function amv_register_settings_page() {
    add_options_page(
        __('Acessibilidade VLibras', 'barra-acessibilidade'),
        __('Acessibilidade', 'barra-acessibilidade'),
        'manage_options',
        'amv-settings',
        'amv_render_settings_page'
    );
}
add_action( 'admin_menu', 'amv_register_settings_page' );

function amv_render_settings_page() {    // Verificação de permissões
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'Você não tem permissão para acessar esta página.', 'barra-acessibilidade' ) );
    }
    
    // Sanitização da tab ativa
    $active_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'general';
    ?>
    <div class="wrap">        <!-- Header com logo local -->        <h1 style="display:flex; align-items:center;">            <?php
            // Exibe o logo usando função helper do plugin
            amv_render_plugin_image( 'softagon-logo.png', array(
                'alt' => __('Softagon Sistemas Logo', 'barra-acessibilidade'),
                'style' => 'height:32px; margin-right:8px;'
            ) );
            ?>
            <?php esc_html_e('Acessibilidade Menu + VLibras', 'barra-acessibilidade'); ?>
        </h1>        <p class="description">
            <?php 
            printf( 
                /* translators: %s: Company name with link */
                wp_kses( __('Desenvolvido por %s', 'barra-acessibilidade'), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), 
                '<a href="https://www.softagon.com.br" target="_blank">Softagon Sistemas</a>' 
            ); 
            ?>
        </p>

        <!-- Nav Tabs -->
        <h2 class="nav-tab-wrapper">
            <a href="?page=amv-settings&tab=general"
               class="nav-tab <?php echo $active_tab === 'general' ? 'nav-tab-active' : ''; ?>">
               <?php esc_html_e('Geral', 'barra-acessibilidade'); ?>
            </a>
            <a href="?page=amv-settings&tab=advanced"
               class="nav-tab <?php echo $active_tab === 'advanced' ? 'nav-tab-active' : ''; ?>">
               <?php esc_html_e('Personalização', 'barra-acessibilidade'); ?>
            </a>
            <a href="?page=amv-settings&tab=about"
               class="nav-tab <?php echo $active_tab === 'about' ? 'nav-tab-active' : ''; ?>">
               <?php esc_html_e('Sobre', 'barra-acessibilidade'); ?>
            </a>
        </h2>

        <!-- Conteúdo Geral -->
        <?php if ( 'general' === $active_tab ) : ?>
            <form method="post">
                <?php
                wp_nonce_field( 'amv_reset_menu_action', 'amv_reset_menu_nonce' );
                if ( isset( $_POST['amv_reset_menu'] ) ) {
                    check_admin_referer( 'amv_reset_menu_action', 'amv_reset_menu_nonce' );
                    amv_reset_menu();
                    echo '<div class="updated notice"><p>✅ ' . esc_html__('Menu resetado ao padrão!', 'barra-acessibilidade') . '</p></div>';
                }
                ?>
                <h2><?php esc_html_e('Resetar Menu', 'barra-acessibilidade'); ?></h2>
                <p><?php esc_html_e('Use este botão para apagar e recriar o menu "Acessibilidade" no estado padrão.', 'barra-acessibilidade'); ?></p>
                <p>
                    <input type="submit"
                           name="amv_reset_menu"
                           class="button button-primary"
                           value="<?php esc_attr_e('Resetar Menu', 'barra-acessibilidade'); ?>">
                </p>
            </form>            <h2><?php esc_html_e('Preview do Menu', 'barra-acessibilidade'); ?></h2>
            <p><?php esc_html_e('Aqui está como ficará o menu "Acessibilidade" após a criação ou reset:', 'barra-acessibilidade'); ?></p>            <?php
            // Exibe o screenshot usando função helper do plugin
            amv_render_plugin_image( 'menu-screenshot.png', array(
                'alt' => __('Print do Menu Acessibilidade', 'barra-acessibilidade'),
                'style' => 'max-width:100%; border:1px solid #ccc; padding:4px;'
            ) );
            ?>

        <!-- Conteúdo Personalização -->
        <?php elseif ( 'advanced' === $active_tab ) : ?>
            <h2><?php esc_html_e('Personalização de Itens', 'barra-acessibilidade'); ?></h2>
            <p><?php esc_html_e('Para editar rótulos, URLs, CSS Classes e Atributos de título:', 'barra-acessibilidade'); ?></p>            <ol>
                <li><?php 
                /* translators: %s: Menu navigation path */
                printf(esc_html__('Vá em %s e selecione "Acessibilidade".', 'barra-acessibilidade'), '<strong>' . esc_html__('Aparência', 'barra-acessibilidade') . ' &rarr; ' . esc_html__('Menus', 'barra-acessibilidade') . '</strong>'); ?></li>
                <li><?php 
                /* translators: %s: Screen options text */
                printf(esc_html__('Clique em %s (canto superior direito) e marque:', 'barra-acessibilidade'), '<em>' . esc_html__('Opções da tela', 'barra-acessibilidade') . '</em>'); ?>
                    <ul>
                        <li><?php esc_html_e('Destino do link', 'barra-acessibilidade'); ?></li>
                        <li><?php esc_html_e('Atributo de título', 'barra-acessibilidade'); ?></li>
                        <li><?php esc_html_e('Classes CSS', 'barra-acessibilidade'); ?></li>
                        <li><?php esc_html_e('Relação de Links (XFN)', 'barra-acessibilidade'); ?></li>
                        <li><?php esc_html_e('Descrição', 'barra-acessibilidade'); ?></li>
                    </ul>
                </li>
                <li><?php esc_html_e('Expanda cada subitem (Contraste, Aumentar fonte, etc.) para ajustar.', 'barra-acessibilidade'); ?></li>
            </ol>

        <!-- Conteúdo Sobre -->
        <?php else : ?>            <h2><?php esc_html_e('Sobre este plugin', 'barra-acessibilidade'); ?></h2>
            <p><?php 
            /* translators: 1: Plugin name, 2: Company name with link */
            printf(esc_html__('%1$s é um projeto open-source da %2$s.', 'barra-acessibilidade'), '<strong>' . esc_html__('Acessibilidade Menu + VLibras', 'barra-acessibilidade') . '</strong>', '<a href="https://www.softagon.com.br" target="_blank">Softagon Sistemas</a>'); ?></p>
            <p>
                <?php esc_html_e('Versão:', 'barra-acessibilidade'); ?> <strong>1.4</strong><br>
                <?php esc_html_e('Autor:', 'barra-acessibilidade'); ?> <strong>Softagon Sistemas</strong><br>
                <?php esc_html_e('Site:', 'barra-acessibilidade'); ?> <a href="https://www.softagon.com.br" target="_blank">www.softagon.com.br</a>
            </p>
            <h3><?php esc_html_e('Funcionalidades', 'barra-acessibilidade'); ?></h3>
            <ul>
                <li><?php esc_html_e('Cria o menu-pai "Acessibilidade" e 4 subitens no WP Menu.', 'barra-acessibilidade'); ?></li>
                <li><?php esc_html_e('Integra o widget VLibras, contraste e ajuste de fonte.', 'barra-acessibilidade'); ?></li>
                <li><?php esc_html_e('Enfileira automaticamente CSS e JS necessários.', 'barra-acessibilidade'); ?></li>
                <li><?php esc_html_e('Botão de reset para recriar o menu-padrão.', 'barra-acessibilidade'); ?></li>
            </ul>
        <?php endif; ?>
    </div>
    <?php
}

// Função de reset
function amv_reset_menu() {
    amv_remove_menu();
    amv_create_menu();
}

// Link "Configurações" na lista de plugins
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), function( $links ) {
    $settings_link = '<a href="' . admin_url( 'options-general.php?page=amv-settings' ) . '">' . esc_html__('Configurações', 'barra-acessibilidade') . '</a>';
    array_unshift( $links, $settings_link );
    return $links;
});

// Enfileira CSS/JS e VLibras
add_action( 'wp_enqueue_scripts', function() {
    wp_add_inline_style( 'wp-block-library', "
        [vw-access-button] { display: none !important; }
        body.modo-contraste { filter: invert(100%) !important; background: #000 !important; }
        body.modo-contraste img, body.modo-contraste video, body.modo-contraste iframe { filter: invert(100%) !important; }
    ");
    // Use plugin version or a date string for cache busting
    $plugin_version = '1.0.0'; // Update as needed
    wp_enqueue_script( 'amv-vlibras', 'https://vlibras.gov.br/app/vlibras-plugin.js', [], $plugin_version, true );
    wp_add_inline_script( 'amv-vlibras', "
        jQuery(function($){
            new window.VLibras.Widget('https://vlibras.gov.br/app');
            $('.js-contraste > a').click(e=>{e.preventDefault();$('body').toggleClass('modo-contraste');});
            $('.js-aumentar > a').click(e=>{e.preventDefault();let v=parseFloat($('body').css('font-size'))||16;$('body').css('font-size',(v*1.1).toFixed(1)+'px');});
            $('.js-diminuir > a').click(e=>{e.preventDefault();let v=parseFloat($('body').css('font-size'))||16;$('body').css('font-size',(v*0.9).toFixed(1)+'px');});
            $('.js-vlibras > a').click(e=>{
                e.preventDefault();
                var btn = document.querySelector('[vw-access-button]');
                if (btn) {
                    btn.click();
                } else {
                    setTimeout(function() {
                        var btn2 = document.querySelector('[vw-access-button]');
                        if (btn2) btn2.click();
                    }, 500);
                }
            });
        });
    ");
});

// Injeta o container VLibras no footer
add_action( 'wp_footer', 'amv_inject_vlibras_container' );

function amv_inject_vlibras_container() {
    echo '<div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper><div class="vw-plugin-top-wrapper"></div></div>
      </div>';
}
