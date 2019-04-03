=== Simple Htaccess Redirects ===
Contributors: mike314156
Tags: 302, 301, 404, 500, redirect, htaccess, expired headers
Requires at least: 5.0
Tested up to: 5.1.1
Requires PHP: 5.2.4
Stable tag: 1.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Appends the correct code into the .htaccess file for redirection.

== Description ==
This plugin was created to make it easier for users to write redirection rules for their site. It generates the correct redirect code to match the user's request and places it into the .htaccess file. This plugin has a button that uses a 3rd party [validator](http://www.htaccesscheck.com/index.html) to give the user confirmation that the .htaccess file is formatted correctly. The 3rd party's terms of service can be found [here](http://www.htaccesscheck.com/about.html). No user data is sent to the 3rd party; only .htaccess file contents. You can contact the 3rd party on their [contact page](http://www.htaccesscheck.com/contact.html). This 3rd party is a free services created by [LexiConn Internet Services Inc.](https://www.lexiconn.com/). Their privacy policy can be read [here](https://www.lexiconn.com/privacy.html).

== Screenshots ==
1. Plugin Redirect Settings (Version 1.5)
2. Plugin Expired Headers Settings (Version 1.5)

== Installation ==
1. Upload the entire `simple-htaccess-redirects` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the \'Plugins\' menu in WordPress
3. Add redirects on Redirect Settings Page in admin menu

== Frequently Asked Questions ==

= Why should I use your plugin? =

This plugin provides an easy way to add new rules into your .htaccess file so you can make changes on the WordPress backend rather downloading, editing, and re-uploading the file.

= What will happen to my code that is already there? =

Nothing! This plugin makes sure to add the new rules to the bottom of the file and will not rewrite the code that is already there.

= Does the 404 effect my htaccess file? =

The 404 redirect rule was implemented in a way that it doesn't even touch the .htaccess file. Instead it uses WordPress functions to use a custom link instead of going to the 404 error page.

= What does the "Add this Redirect rule" work? =

The "Add this Redirect" option must be selected when you click Save Changes to publish to the .htaccess file. It will add the correct code to the bottom of the file without deleting anything.

= What does the "HTTP Status" mean? =

HTTP Status will tell you the status of the path you gave the plugin so you can confirm that it is a valid path.

= What does "Validate File" do? =

As of version 1.0 Validate File opens a [popular validator](http://www.htaccesscheck.com) and submits the .htaccess file contents into their website for validation. Their Terms of Service can be found [here](http://www.htaccesscheck.com/about.html).

= What if I made a mistake? =

The plugin makes sure the outputted code is valid, so a mistake may redirect people to the wrong place. Always double check before saving the changes! If you make a mistake, there is always the "Reset .htaccess file" button that will set your file back to default.

= What if I want to delete the redirect rule? =

As of version 1.0 you need to use FTP or some similar solution to remove that section.

= Are my redirect rules saved anywhere else? =

All the rules you create are also submitted into the log.txt file in the assets folder so you have a back up of the rules of the .htaccess just in case something goes wrong.

== Upgrade Notice ==
= 1.5 =
* Implemented Expired Headers Support
* Updated UI
* Updated File Structure

= 1.4.1 =
* Fixed some spacing bugs

= 1.4 =
* Content updates
* Implemented a reset link on deactivation

= 1.3 =
* Upgraded the reset button

= 1.2 =
* Implemented a way to force https

= 1.1 =
* Implemented a reset file button

= 1.0 =
* Initial Release

== Changelog ==
= 1.5 =
* Implemented Expired Headers Support
* Updated UI
* Updated File Structure

= 1.4.1 =
* Fixed some spacing bugs

= 1.4 =
* Content updates
* Implemented a reset link on deactivation

= 1.3 =
* Upgraded the reset button

= 1.2 =
* Implemented a way to force https

= 1.1 =
* Implemented a reset file button

= 1.0 =
* Initial Release
