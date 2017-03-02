=== Plugin Name ===
Contributors: clifgriffin
Donate link: http://cgd.io
Tags: shopp, arrange, categories, tags, terms, taxonomies, sort, re-order
Requires at least: 3.6
Tested up to: 4.6.1
Stable tag: 1.1.3

Arrange, re-order, and sort your categories, tags, and other taxonomy terms with a simple drag-and-drop interface.

== Description ==

WordPress doesn’t have a native way to control the order of taxonomy terms. CGD Arrange Terms allows you to sort your categories, tags, and other taxonomy terms with a simple drag-and-drop interface. Re-ordering your terms has never been easier!

**Features**

* Adds a separate sorting table, so no modification of WordPress native tables required
* Low-level sorting means FAST performance and compatibility with themes and plugins without modification!
* Drag-and-drop interface makes sorting ridiculously easy.
* Light-weight. In fact, the main plugin file is only 150 lines!

**Support**

If you need support, go to http://cgd.io/contact.

= Version History =
**Version 1.1.3**

* Fix bug with WordPress 4.6. Maintains compatiblity with pre-4.6.
* Fix a couple of warnings.

**Version 1.1.2**

* Fix critical bug with new installs that prevents re-ordering terms that have not previously been ordered in older plugin versions.

**Version 1.1.1**

* Fixed accidental shorthand PHP open tag which breaks the admin page in some environments.

**Version 1.1:**

* Complete rewrote plugin and renamed to CGD Arrange Terms.
* Added support for all taxonomies and terms.
* Still works with Shopp 1.2.x and 1.3.x!
* Removed Shopp shipping and payment gateway sorting, as this is really a pretty bad idea.
* No longer modifies wp_terms table (and undoes past modification) (WARNING: This could cause problems if you were running Shopp Arrange / Category Order and Taxonomy Terms Order simultaneously, as these two plugins used the same column name and technique)

**Version 1.0.4:**

* Switched required capability for category ordering to allow Merchant role to arrange categories.

**Version 1.0.3:**

* Fixed issue where empty categories cannot be arranged.
* Minor cleanup.
* Thanks to Peter Wooster for suggesting these enhancements.

**Version 1.0.2:**

* Rewrote Shipping sort code to actually, you know, work.

**Version 1.0.1:**

* When using shipping option order override, now defaults to new first shipping option.
* Added additional check to prevent settings page injection from happening where it isn't welcome.

**Version 1.0:**

* Initial release.

== Installation ==

1. Upload the directory “shopp-arrange" to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= My terms aren't displaying in the order I chose, what gives? =

CGD Arrange Terms sorts categories and other terms by using low level filters on the get_terms() function in WordPress. If something is bypassing this function (probably an indication of a problem), the terms will not be sorted as expected.

= Can I turn off the custom term order? =

Yes, just uncheck the taxonomy under Arrange Terms -> Settings.

= Can feature x be added? =

Maybe! Contact me: http://cgd.io/contact

== Screenshots ==

1. Drag-and-drop term arrangement.
2. Works with any taxonomy.
3. Easy to use.
