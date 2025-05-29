=== Accessibility Menu + VLibras ===
Contributors: softagon
Donate link: https://www.softagon.com.br
Tags: accessibility, vlibras, libras, contrast, font-size, menu, a11y
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Accessibility plugin that creates an "Brazilian Accessibility" menu with subitems (Contrast, Increase/Decrease font, Libras) and integrates the VLibras widget.

== Description ==

**Accessibility Menu + VLibras** is a plugin developed by Softagon Sistemas to improve your WordPress site's accessibility by automatically creating an "Accessibility" navigation menu with essential features.

### Main Features

* **Automatic Accessibility Menu** – Creates a parent "Accessibility" menu and 4 subitems
* **Contrast** – Inverts page colors for better visibility
* **Increase Font** – Increases font size by 10%
* **Decrease Font** – Decreases font size by 10%
* **Libras** – Integrates the official Brazilian government VLibras widget
* **Settings Page** – Admin panel in Settings → Accessibility
* **Reset Button** – Allows you to recreate the menu to its default state
* **Multilingual** – Full internationalization support

### Available CSS Classes

The plugin automatically adds the following CSS classes to menu items:

* `.js-contraste` – Toggle high contrast mode
* `.js-aumentar` – Increase font size
* `.js-diminuir` – Decrease font size
* `.js-vlibras` – Activate VLibras widget

### VLibras Integration

The plugin automatically integrates [VLibras](https://vlibras.gov.br/), the official Brazilian government tool for translating Portuguese content into Libras (Brazilian Sign Language).

**External Dependency Notice:**
This plugin loads the VLibras widget, which is an external service provided by the Brazilian government. Please review the [VLibras Privacy Policy](https://www.gov.br/governodigital/pt-br/vlibras/politica-de-privacidade) for details on data handling by this service.

### Customization

You can customize menu items via:
1. Appearance → Menus → Select "Accessibility"
2. Enable "Screen Options" to show advanced fields
3. Edit labels, URLs, CSS classes, and attributes as needed

== Installation ==

### Automatic Installation

1. Go to the WordPress admin panel
2. Navigate to Plugins → Add New
3. Search for "Accessibility Menu VLibras"
4. Click "Install Now" and then "Activate"

### Manual Installation

1. Download the plugin
2. Extract the file to the `/wp-content/plugins/` directory
3. Activate the plugin via the Plugins menu in WordPress
4. Go to Settings → Accessibility to configure

### After Installation

1. The "Accessibility" menu will be created automatically
2. Go to Settings → Accessibility for advanced options
3. Add the "Accessibility" menu to your desired menu location

== Frequently Asked Questions ==

= Does the plugin work with any theme? =
Yes! The plugin works with any WordPress theme that supports standard navigation menus.

= How do I customize the button appearance? =
You can add custom CSS for the classes `.js-contraste`, `.js-aumentar`, `.js-diminuir`, and `.js-vlibras` via the Customizer or your theme's CSS file.

= Is VLibras loaded on all pages? =
Yes, the VLibras widget is automatically loaded on all frontend pages when the plugin is active.

= How do I remove just one menu item? =
Go to Appearance → Menus, select "Accessibility," and remove the desired items. Use the "Reset Menu" button in settings to restore all items.

= Is the plugin LGPD/GDPR compliant? =
The plugin does not collect personal data. VLibras is a government service and its privacy policy applies as per the official documentation.

= How do I translate to other languages? =
The plugin supports internationalization. Create `.po/.mo` files in the `/languages/` folder or use translation plugins like Loco Translate.

== Screenshots ==

1. Automatically created "Accessibility" menu in the menu panel
2. Settings page in Settings → Accessibility
3. "General" tab with menu reset button
4. "Customization" tab with customization instructions
5. "About" tab with plugin information
6. VLibras widget active on the frontend

== Changelog ==

= 1.2 =
* Added full internationalization support
* Improved security practices with sanitization
* Created uninstall.php for cleanup
* Added English translations
* Implemented text domain 'barra-acessibilidade'
* Improved data escaping with esc_html_e()
* Added LICENSE.txt GPLv2+

= 1.1 =
* Added settings page with tabs
* Implemented "Reset Menu" button with nonce
* Created General, Customization, and About sections
* Added "Settings" link in plugin list
* Improved inline documentation

= 1.0 =
* Initial release
* Automatic creation of "Accessibility" menu
* VLibras integration
* Contrast and font adjustment features
* Activation and deactivation hooks

== Upgrade Notice ==

= 1.2 =
This version adds full internationalization support and improves security. Recommended for all users.

= 1.1 =
Adds advanced settings page and better menu control.

== Support ==

For technical support, contact:

* **Site:** [Softagon Sistemas](https://www.softagon.com.br)
* **Email:** contato@softagon.com.br
* **VLibras Documentation:** [vlibras.gov.br](https://vlibras.gov.br/)

== Privacy Policy ==

This plugin does not collect, store, or transmit users' personal data. The VLibras integration is subject to the [VLibras Privacy Policy](https://www.gov.br/governodigital/pt-br/vlibras/politica-de-privacidade).

== Development ==

The source code is open for contributions and improvements. We follow WordPress coding standards and Clean Architecture practices.
