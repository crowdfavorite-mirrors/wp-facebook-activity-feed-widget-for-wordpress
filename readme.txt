=== Facebook Activity Feed Widget for WordPress ===
Contributors: Dean Peters 
Tags: Facebook, social media, Social Plugins, Widget, Facebook Open Graph, Facebook Activity Feed, Facebook Activity Plugin, Facebook Widget, Facebook Activity Widget
Requires at least: 2.9
Tested up to: 2.9
Stable tag: trunk
Version: 0.2c

A plugin that allows you to configure and display one or more FaceBook Activity Feed Widgets on the sidebar of your WordPress blog

== Description ==

The FaceBook Activity Feed Widget for WordPress displays the most interesting recent activity taking place on your web site based on feedback from Facebook users.

The activity feed displays stories both when users <a href="http://developers.facebook.com/docs/reference/plugins/like">like</a> content on your site and when users share content from your site back to Facebook.

When setting up your widget, you'll want to setup the following parameters:

*   **Domain** - <br />The domain to show activity for. Defaults to the domain is the your blog's URL without the 'http://' or 'www.' attributes.
*   **Width** - <br />The width of the plugin in pixels. The defauilt is 180px.
*   **Height** - <br />The height of the plugin in pixels. The default is 300px.
*   **Header** - <br />Show the Facebook header on the plugin.
*   **Color Scheme** - <br />The color scheme of the plugin. Choices are 'light', 'dark' and 'evil'.
*   **Font** - <br />The font of the plugin.
*   **iFrame CSS Class** - <br />A CSS class that is assigned to the iFrame so you can beter control the look and feel of the plugin.
*   **Border Color** - <br />The border color of the plugin. Examples are '#cccccc' or 'silver'.

For more information on how the this social plugin works, please visit <a href="http://developers.facebook.com/docs/reference/plugins/activity" title="Facebook Activity Feed Social Plugin Page">FaceBooks Activity Feed Webpage</a>.

For updates, you can visit the original blog post for this plugin at <a href="http://healyourchurchwebsite.com/2010/04/26/the-facebook-activity-widget-plugin-for-wordpress/" title="Heal Your Church Website post on the FaceBook Activity Plugin for WordPress">HealYourChurchWebsite.com</a>.

The plug-in has been written according to the most recent standards defined at the <a href="http://codex.wordpress.org/Widgets_API" title="WordPress Codex Widgets API">WordPress Codex Widgets API</a>, and is translation ready.

Also a quick shout of of thanks and credit goes out to Jan Odvarko for <a href="http://jscolor.com" title="jscolor JavaScript homepage">the jscolor JavaScript</a> used for the background color selector.

== Installation ==

This plugin follows the [standard WordPress installation method][]:

1. Upload the 'fbactivitywidget.zip' file to the `/wp-content/plugins/` directory using wget, curl of ftp.
2. 'unzip' the 'fbactivitywidget.zip' which will create the folder to the directory `/wp-content/plugins/fbactivitywidget` 
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Go to the Widets submenu option of the Appearance menu
5. Drag and drop the widget entitled 'Facebook Activity Widget' into widget-enabled the sidebar of your choice
4. Configure the newly dragged-n-dropped plugin through 'Facebook Activity Widget' contol box on the sidebar
5. Modify the fields to choice and click save.
 
[standard WordPress installation method]: http://codex.wordpress.org/Managing_Plugins#Installing_Plugins

== Frequently Asked Questions ==

1.  Can I aggregate more than 1 Facebook Activity Feed in a single widget?<br />No, Facebook is clear that multiple activiy feeds are not available at this time.
2.  Why is there a delay in displaying the widget?<br />Keep in mind that the widget is an iframe that reads data from Facebook's servers. So if their activity feed servers are slow, then you will notice a latency.
3.  How do I get the popup for the color selector to close?<br />Just tab or move your cursor to another field, it'll close on its own.

== Screenshots ==
1. Screenshot of the widget setup screen.
2. How the Widget appears on a blog.

== Changelog ==
*   Version 0.2c - 30Apr10 - color picker was getting a bit buggy on me
*   Version 0.2b - 30Apr10 - darn svn messed me up ... install should work now
*   Version 0.2 - 30Apr10 - initial trunk
*   Version 0.1 - 26Apr10 - beta release

==Readme Generator== 

This Readme file was generated using <a href = 'http://sudarmuthu.com/wordpress/wp-readme'>wp-readme</a>, which generates readme files for WordPress Plugins.
