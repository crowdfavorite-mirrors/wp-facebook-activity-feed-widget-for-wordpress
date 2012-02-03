<?php
/*
Plugin Name: Facebook Activity Feed Widget for WordPress
Plugin Script: facebook-activity-feed-widget-for-wordpress.php
Plugin URI: http://healyourchurchwebsite.com/2010/04/26/the-facebook-activity-widget-plugin-for-wordpress/
Description: Allows you to configure and display a FaceBook Activity Feed Widget on the sidebar of your WordPress blog
Version: 0.2c
License: GPL
Author: Dean Peters
Author URI: http://HealYourChurchWebsite.com/
Release Notes:

2010-04-30 - v0.2b 
* color picker is driving me nutso

2010-04-30 - v0.2b 
* darn svn messed me up ... install should work now

2010-04-30 - v0.2 - working version
* update & official 'trunk' release

2010-04-26 - v0.1 - first version
* initial release

Credits:
* For the color selector code:
* Jan Odvarko, http://odvarko.cz
* http://jscolor.com
* @version 1.3.1

Helpful Resources:
* http://developers.facebook.com/docs/reference/plugins/activity
* http://codex.wordpress.org/Function_Reference/wp_enqueue_script
* http://codex.wordpress.org/Widgets_API
* http://wpengineer.com/wordpress-built-a-widget/
* http://healyourchurchwebsite.com/2010/04/22/the-facebook-like-button-plugin-for-wordpress/

License:
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt

*/
class FaceBookActivityFeed extends WP_Widget {
    /** constructor */
    function FaceBookActivityFeed() {
        parent::WP_Widget(false, $name = 'FaceBook Activity Feed');	
		
		wp_enqueue_script('jscolor', 
			WP_PLUGIN_URL."/facebook-activity-feed-widget-for-wordpress/jscolor/jscolor.js");
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		$widgetid = (isset($instance['widget_id'])) ? $instance['widget_id'] : '0';
        $title = apply_filters('widget_title', esc_attr($instance['title']));
		
		$domain = esc_attr($instance['domain']);
			$domain = $domain ? $domain : get_bloginfo('url');
			$domain = preg_replace('/^(http:\/\/)*(www\.)*(.*?)/i', '$3', $domain);
		$width = esc_attr($instance['width']);
			$width = $width ? $width : '250';
		$height = esc_attr($instance['height']);
			$height = $height ? $height : '300';
		$colorscheme = esc_attr($instance['colorscheme']);
			$colorscheme = $colorscheme ? $colorscheme: "light" ;
		$showheader = esc_attr($instance['showheader']);		
			$showheader = $showheader ? 'true' : 'false';		// note, will actually be 'on' if valued
		$fontface = esc_attr($instance['fontface']);
			$fontface = $fontface ? $fontface : "arial";
		$cssclass = esc_attr($instance['cssclass']);
			$cssclass = $cssclass ? $cssclass : "fbActContainer";
		$bordercolor = esc_attr($instance['bordercolor']);
			$bordercolor = urlencode($bordercolor ? $bordercolor : "#CCCCCC");


		$iframesrc = "http://www.facebook.com/plugins/activity.php";
		$iframesrc .= "?site=".$domain.'';
		$iframesrc .= "&amp;width=".$width.'';
		$iframesrc .= "&amp;height=".$height.'';
		$iframesrc .= "&amp;header=".$showheader.'';
		$iframesrc .= "&amp;colorscheme=".$colorscheme.'';
		$iframesrc .= "&amp;font=".$fontface.'';
		$iframesrc .= "&amp;border_color=".$bordercolor.'';
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
						<iframe 
							src="<?php echo $iframesrc ?>"  
							class="<?php echo $cssclass ?>"  
							scrolling="no"  
							frameborder="0"  
							allowTransparency="true"  
							style="border:none; overflow:hidden; width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;"> 
						</iframe>
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }


    /** @see WP_Widget::form */
    function form($instance) {				

		$widgetid = (isset($instance['widget_id'])) ? $instance['widget_id'] : '0';
		$colorPickID = "fbactWidgetColorPicker".$widgetid; 
        $title = esc_attr($instance['title']);
		$domain = esc_attr($instance['domain']);
			$domain = $domain ? $domain : get_bloginfo('url');
			$domain = preg_replace('/^(http:\/\/)*(www\.)*(.*?)/i', '$3', $domain);
		$width = esc_attr($instance['width']);
			$width = $width ? $width : '250';
		$height = esc_attr($instance['height']);
			$height = $height ? $height : '300';
		$colorscheme = esc_attr($instance['colorscheme']);
			$colorscheme = $colorscheme ? $colorscheme: "light" ;
		$showheader = esc_attr($instance['showheader']);		
			$showheader = $showheader ? 'checked="checked"' : '';		// note, will actually be 'on' if valued
		$fontface = esc_attr($instance['fontface']);
			$fontface = $fontface ? $fontface : "arial";
		$cssclass = esc_attr($instance['cssclass']);
			$cssclass = $cssclass ? $cssclass : "fbActContainer";
		$bordercolor = esc_attr($instance['bordercolor']);
			$bordercolor = $bordercolor ? $bordercolor : "#CCCCCC";
			
        ?>
		<div id="facebook-activity-feed-widget-for-wordpressID<?php echo $widgetid; ?>" class="facebook-activity-feed-widget-for-wordpressParameters">
            <p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title:'); ?> 
					<input	class="widefat" 
							id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" 
							type="text" value="<?php echo $title; ?>" />
				</label>
			</p>

            <p>
				<label for="<?php echo $this->get_field_id('domain'); ?>"><?php _e('Domain / URI:'); ?> 
					<input	class="widefat" 
							id="<?php echo $this->get_field_id('domain'); ?>" name="<?php echo $this->get_field_name('domain'); ?>" 
							type="text" value="<?php echo $domain; ?>" />
				</label>
			</p>

            <p>
				<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:'); ?> 
					<input	class="widefat" 
							id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" 
							type="text" value="<?php echo $width; ?>" />
				</label>
			</p>

            <p>
				<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:'); ?> 
					<input	class="widefat" 
							id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" 
							type="text" value="<?php echo $height; ?>" />
				</label>
			</p>
		
            <p>
				<label for="<?php echo $this->get_field_id('showheader'); ?>"><?php _e('Show Header:'); ?> 
					<input	class="checkbox" 
							id="<?php echo $this->get_field_id('showheader'); ?>" name="<?php echo $this->get_field_name('showheader'); ?>" 
							type="checkbox"  <?php echo $showheader; ?> />
				</label>
			</p>


            <p>
				<label for="<?php echo $this->get_field_id('colorscheme'); ?>"><?php _e('Color Scheme:'); ?> 
					<select	class="widefat" 
							id="<?php echo $this->get_field_id('colorscheme'); ?>" name="<?php echo $this->get_field_name('colorscheme'); ?>">
							<?php
								$colorscheme_array = array('light'=>'light','dark'=>'dark','evil'=>'evil');
								foreach($colorscheme_array as $fbact_text=>$fbact_value){
									echo '<option value="'.$fbact_value.'"';
									if ($fbact_value==$colorscheme){echo ' selected="selected"';}
									echo '>'.$fbact_text.'</option> ';
								}
							?>
					</select>
				</label>
			</p>

            <p>
				<label for="<?php echo $this->get_field_id('fontface'); ?>"><?php _e('Font Face:'); ?> 
					<select	class="widefat" 
							id="<?php echo $this->get_field_id('fontface'); ?>" name="<?php echo $this->get_field_name('fontface'); ?>">
							<?php
								$fontface_array = array('arial'=>'arial','lucida grande'=>'lucida grande','segoe ui'=>'segoe ui','tahoma'=>'tahoma','trebuchet ms'=>'trebuchet ms','verdana'=>'verdana');
								foreach($fontface_array as $fbact_text=>$fbact_value){
									echo '<option value="'.$fbact_value.'"';
									if ($fbact_value==$fontface){echo ' selected="selected"';}
									echo '>'.$fbact_text.'</option> ';
								}
							?>
					</select>
				</label>
			</p>

            <p>
				<label for="<?php echo $this->get_field_id('cssclass'); ?>"><?php _e('iFrame CSS Container Class:'); ?> 
					<input	class="widefat" 
							  id="<?php echo $this->get_field_id('cssclass'); ?>" 
							name="<?php echo $this->get_field_name('cssclass'); ?>" 
							type="text" value="<?php echo $cssclass; ?>" />
				</label>
			</p>

            <p>
				<label for="<?php echo $this->get_field_id('bordercolor'); ?>"><?php _e('Border Color:'); ?> 
					<input	class="fbact_color_picker {hash:true,required:false,pickerPosition:'top'} widefat" 
							id="<?php echo $this->get_field_id('bordercolor'); ?>" name="<?php echo $this->get_field_name('bordercolor'); ?>" 
							type="text" 
							value="<?php echo $bordercolor; ?>"  />
				</label>
			</p>
			<script type="text/javascript">
			/* * /
				function initColorPicker() {
					var mfld="<?php echo $this->get_field_id('bordercolor');?>";
					var myPicker = new jscolor.color(document.getElementById(myFldID), {hash:true,required:false,pickerPosition:'top'});
					return false;
				}
				initColorPicker();
			/* */

	jscolor.init();
	var colorPickerArray = [];

	jQuery('input.fbact_color_picker').each(function(index) {

		var oldID = document.getElementById(jQuery(this).attr('id'));
		var myCol = jQuery(this).val();
		colorPickerArray[index] = new  jscolor.color(oldID, {hash:true,required:false,pickerPosition:'top'});
		colorPickerArray[index].fromString((myCol) ? myCol : "#CCCCCF");
	});


			</script>
		</div><!-- /#facebook-activity-feed-widget-for-wordpressParameters -->
        <?php 
    }

	function foobar() {

	}
} // class FaceBookActivityFeed


// register FaceBookActivityFeed widget
	add_action('widgets_init', create_function('', 'return register_widget("FaceBookActivityFeed");'));
?>
