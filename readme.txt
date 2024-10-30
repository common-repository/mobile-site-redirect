=== Plugin Name ===
Contributors: webdevabq
Tags: mobile redirect, mobile site redirection, mobile site redirect, mobile detect, mobile detection, alternative mobile site, simple mobile redirection, simple mobile redirect, mobile browser redirect
Requires at least: 3.0.1
Tested up to: 3.9.1
Stable tag: 1.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Redirection to a separate mobile site such as http://m.example.com with the same page name.

== Description ==

Redirection to a separate mobile site such as http://m.example.com with the same page name (so desktop version links can be used by mobile devices without redirection to a generic home page). View full site and view mobile site options allows users to switch back and forth between the desktop and mobile site versions. Option of redirecting only phones, tablets, or both.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the `mobile-site-redirect` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Update the Mobile Site URL under Settings->Mobile Site Redirect, including a trailing slash ('/') and choose to redirect mobile phones and/or tablets.
4. Use a link on your mobile site to view the full site following this format: http://example.com/?mobile=false
5. Use a link on your full site to view the mobile site following this format: http://example.com/?mobile=true
6. Use a link on your mobile site to a page on your main site without redirecting by following this format: http://example.com/?demobile=true. This will allow the original page on the main site to be shown to mobile users instead of the mobile site's page.


== Changelog ==

= 1.2.2 =
* Bug fixes

= 1.2 =
* Added option to redirect phones, tablets, or both.
* Added option to suppress redirection of main site pages served by mobile site through a link.

= 1.1 =
* Bug fixes

= 1.0 =
* Initial version

== Upgrade Notice ==

= 1.2.2 =
Minor but important bug fix.

= 1.2 =
This version includes two new options: redirection of phones, tablets, or both; and suppressed redirection of main site pages served by the mobile site through a link.

= 1.1 =
This version fixes a few bugs.