=== Acessibilidade Menu + VLibras ===
Contributors: softagon
Tags: accessibility, vlibras, libras, contrast, font-size, menu, a11y
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A plugin to add an accessibility menu to your WordPress site, including contrast, font size controls, and VLibras integration for Brazilian Sign Language.

== Description ==

Acessibilidade Menu + VLibras adds an accessibility menu to your WordPress navigation, with options for high contrast, increase/decrease font size, and VLibras (Brazilian Sign Language) widget integration. Includes a settings page, reset button, and is fully translatable.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/barra-acessibilidade` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the Settings > Acessibilidade screen to configure the plugin.

== Frequently Asked Questions ==

= Does it work with any theme? =
Yes, it works with any theme that supports WordPress menus.

= How do I customize the menu? =
Go to Appearance > Menus, select "Acessibilidade", and edit the items as needed.

= Is it compatible with LGPD/GDPR? =
The plugin does not collect personal data. VLibras is a government service and follows its own privacy policy.

== Screenshots ==

1. Accessibility menu in the navigation.
2. Settings page with reset button.
3. VLibras widget active on the site.

== Changelog ==

= 1.2 =
* Added full internationalization support.
* Improved security and sanitization.
* Added uninstall.php for clean removal.
* Added English translation.
* Improved escaping with esc_html_e().
* Added LICENSE.txt GPLv2+.

= 1.1 =
* Added settings page with tabs.
* Implemented reset menu button with nonce.
* Added plugin action links.

= 1.0 =
* Initial release with menu creation and VLibras integration.

== Upgrade Notice ==

= 1.2 =
Adds internationalization and security improvements. Recommended for all users.
