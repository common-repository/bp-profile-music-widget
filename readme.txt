=== BP Profile Music Widget ===
Contributors: slushman
Donate link: http://slushman.com/
Tags: buddypress, widget, music, player, Bandcamp, Tunecore, Reverbnation, SoundCloud, Noisetrade, embed, profile
Requires at least: 2.9.1
Tested up to: 3.2.1
Stable tag: 0.2
License: GPLv2


The BP Profile Music Widget allows users to embed a Bandcamp, Tunecore, Reverbnation, Noisetrade, or SoundCloud player on the sidebar of the user’s profile page using custom profile fields from their profile form.

== Description ==

*** THIS PLUGIN IS NO LONGER UNDER DEVELOPMENT! ***

I haven't discontinued development of this plugin in favor of the newer version - BP Profile Widgets. Please install that plugin instead of this one.


The BP Profile Music Widget was originally developed for the Towermix Network at Belmont University‘s Curb College of Entertainment and Music Business. The BP Profile Music Widget allows users to embed a Bandcamp, Tunecore, Reverbnation, Noisetrade, or SoundCloud player on the sidebar of the user’s profile page using custom profile fields from their profile form.

Features

* Users can embed one of the following music players: Bandcamp, Tunecore, Reverbnation, Noisetrade, or SoundCloud.
* The user enters their unique ID in a custom profile field on their profile form.
* A description field is included allowing the user to explain their role in the music presented.
* Multiple Instances are possible.

== Installation ==

1. Upload the BP Profile Music Widget folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create the appropriate extended profile fields
4. Drag the BP Profile Music Widget to a sidebar on the 'Widgets' page under the 'Appearance' menu

== Frequently Asked Questions ==

= What Custom Profile Fields do I need for this plugin to work properly? =

Each of the following fields are not required and are all text boxes, except for Description, which is a Multi-line Text Box:

Field Title: Bandcamp ID
Field Description: To add a Bandcamp player to your profile page, enter your ten digit Bandcamp Album ID. To find the Album ID #, click the Share link on your Bandcamp page, choose WordPress.org, then look for the ten digits after "album=".

Field Title: Tunecore ID
Field Description: To add a Tunecore player to your profile page, enter your five-digit Tunecore Media Player ID. To find the Media Player ID #, log into your Tunecore account, go to You > Media Player. Click the View link for the player, then click the Share link in the player. Copy the embed code and find the five digits after "widget_id=".

Field Title: Reverbnation ID
Field Description: To add a Reverbnation player to your profile page, enter your six-digit Reverbnation ID #. To find your Reverbnation ID #, log into your Reverbnation account. Your ID # is the six digits after "http://www.reverbnation.com/#!/artist/control_room/".

Field Title: Noisetrade ID
Field Description: To add your Noisetrade widget to your profile page, enter your unique Noisetrade ID #. To find your Noisetrade ID #, find your Noisetrade widget and click the Share link in the bottom right corner. Your ID # is the thirty-six digit number after "widget.swf?wid=".

Field Title: SoundCloud ID
Field Description: To find the ID # for your SoundCloud set player, click the Share link on your set music player and find the number after "url=http%3A%2F%2Fapi.soundcloud.com%2Fplaylists%2F".

Field Title: SoundCloud Set Link
Field Description: Click on the set you'd like to share from SoundCloud and paste the URL in this field. (example: http://soundcloud.com/christopher-joel/sets/fantasy-world-1/)

Field Title: SoundCloud Set Name
Field Description: Enter the name of the SoundCloud set.

Field Title: SoundCloud Profile Link
Field Description: Enter the URL of your public profile on SoundCloud.

Field Title: SoundCloud Artist Name
Field Description: Enter the artist name from your SoundCloud account.

Field Title: Music Player Description
Field Description: Please describe your role in the recordings in the player.

= How do I hide these custom profile fields so they don't show on people's profile pages? =

Install the plugin BP Profile Privacy.  For each of the custom profile fields created for this plugin, select User instead of Everyone.

= How do I make this widget only appear on the user's profile page? =

Install the plugin Widget Logic. At the bottom of each widget will have another field, called Widget Logic. Paste in the following:

bp_is_user_profile() && !is_page(array('About', 'News', 'Interviews')) && !is_home()

This code shows this widget only on the BuddyPress user profile page (but nowhere else in BuddyPress), and explicitly not on the WordPress home page or any other WordPress page. You'll need to change the !is_page array to reflect the pages on your site.

= I filled out all the fields, but I'm only seeing one player; what gives? =

This widget will only show one music players and they cascade, meaning: if you fill out the form for the first player, that will be the one that shows, whether or not you fill out the others. So, if you don't fill out the Bandcamp, it will look for the Tunecore. If not the Tunecore, then Reverbnation. If not Reverbnation, then Noisetrade. If not Noisetrade, then SoundCloud. If not SoundCloud, it will say: "This user has not activated their music player."

== Screenshots ==

1. Widget options
2. Bandcamp player
3. Tunecore player
4. Reverbnation player
5. Noisetrade player
6. Soundcloud Set player
7. Custom profile fields

== Changelog ==

= 0.2 =
Discontinuing development of this plugin.
Notifying users of the new plugin - BP Profile Widgets

= 0.15 =
Added support for BuddyPress 1.5

= 0.1 =
Plugin created.

== Upgrade Notice ==

= 0.2 = 
This plugin is now discontinued, please install BP Profile Widgets instead.

= 0.15 =
Added support for BuddyPress 1.5

= 0.1 =
Plugin released.