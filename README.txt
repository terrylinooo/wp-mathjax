=== WP MathJax ===
Contributors: terrylin
Tags: mathjax, katex, latex, asciimath
Requires at least: 4.0
Tested up to: 6.2.2
Stable tag: 1.0.1
Requires PHP: 5.3.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl.html

== Description ==

WP MathJax displays mathematical notation in web browsers, using MathML, LaTeX and ASCIIMath markup on WordPress by using MathJax.js.

WP MathJax is smart enough that loads mathjax.js only when your posts contain mathjax syntax, by detecting the use of shortcode and block. So it will not be loaded on your website everywhere.

If you are not using Guteberg editor and looking for a [Markdown editor](https://github.com/terrylinooo/githuber-md) supporting MathJax, you can also check out my WordPress plugin called the WP Githuber MD, which provides a variety of features not just MathJax, it is worth to try.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wp-mathjax` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to the WP MathJax menu in Settings and set your options.

= Shortcode =

In classic editor, you can use the shortcode to render your MathJax syntax. If you are using WordPress version below 5.0, this is the only way you can use this feature.

= Gutenberg Block =

1. Choose a MathJax syntax block.
2. Fill in your MathJax syntax in the editor.

== Frequently Asked Questions ==

None.

== Screenshots ==

1. Choose a MathJax syntax block.
2. Fill your TeX syntax in the editor.
3. Fill your MathML syntax in the editor.
4. Fill your ASCIIMath syntax in the editor.

== Copyright ==

WP MathJax, Copyright 2020 TerryL.in
WP MathJax is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

== Changelog ==

= 1.0.0 =

- First release.

= 1.0.1 =

- Test up to PHP 8.2.5 and WordPress 6.2.2
- Add Japanese translation, thanks to [Colocal](https://colocal.com).
- Upgrade MathJax.js from 2.7.8 to 2.7.9

== Upgrade Notice ==
