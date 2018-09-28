<?php 

/**
 * IE6Alert! Module
 *
 * @package ElGolem
 * @subpackage mod_ie6alert
 * @version   2.2 - 29/10/2010
 * @author    Emmanuel Fontan
 * @copyright (C) 2010 Emmanuel Fontan
 *
 * Some icons by http://dryicons.com
 *
 *
 * @license		GNU/GPL, see LICENSE.php
 * This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see http://www.gnu.org/licenses/.
 *
 *
 */

class modIE6AlertHelper {

	/*
	 ################################################
	#          	     SHOW_IE6ALERT	               #
	################################################
	*/
	public static function show_ie6alert(&$params) {

		$document =& JFactory::getDocument();

		//Add styles
		$document->addStyleSheet(JURI::root(true) ."/modules/mod_ie6alert/css/ie6alert.css");

		$icon_cancel = array(
				'src' => 'modules/mod_ie6alert/images/cancel.png',
				'id' => 'close_ie',
				'width' => '16',
				'height' => '16',
				'title' => JText::_('CLOSE_ALERT'),
				'alt' => 'close_ie'
		);

		$mini_msje_on=$params->get('mini_msje_on');


		/* ########################################### */
		/* MINI-MESSAGE */
		/* ########################################### */
		if ($mini_msje_on == "yes") {
				
			//DEFINE THE ICONS 16x16
			$icon_ff = array(
					'src' => 'modules/mod_ie6alert/images/browsers/16/ff.png',
					'title' => 'Download Firefox',
					'alt' => 'Download Firefox',
					'width' => '16',
					'height' => '16'
			);
				
			$icon_chrome = array(
					'src' => 'modules/mod_ie6alert/images/browsers/16/chrome.png',
					'title' => 'Download Google Chrome',
					'alt' => 'Download Google Chrome',
					'width' => '16',
					'height' => '16'
			);
				
			$icon_opera = array(
					'src' => 'modules/mod_ie6alert/images/browsers/16/opera.png',
					'title' => 'Download Opera',
					'alt' => 'Download Opera',
					'width' => '16',
					'height' => '16'
			);
				
			$icon_safari = array(
					'src' => 'modules/mod_ie6alert/images/browsers/16/safari.png',
					'title' => 'Download Safari',
					'alt' => 'Download Safari',
					'width' => '16',
					'height' => '16'
			);

			//get the messaje
			$mini_msje=$params->get('mini_msje');
				
			if ($mini_msje == "") {
				$mini_msje=JText::_('MINI_USING_IE6');
			}
			$html = "
				
			<!--[if IE 6]>
			<table class=\"ie6alert\" id=\"ie6alert\"><tr>
			<td>
			$mini_msje
			</td>

			<td valign=\"top\" align=\"right\" class=\"close_ie_button\" onclick=\"$('ie6alert').addClass('ie6alert_hidden');\">". modIE6AlertHelper::get_img($icon_cancel).
			"</td>
			</tr>
				
			<tr>
			<td colspan=\"2\" align=\"right\" class=\"ie6alert_text_right\">
				
			<a href=\"http://www.getfirefox.com/\" target=\"_blank\">".
			modIE6AlertHelper::get_img($icon_ff)
			."</a>
				
			<a href=\"http://www.google.com/chrome\" target=\"_blank\">".
			modIE6AlertHelper::get_img($icon_chrome)
			."</a>
				
			<a href=\"http://www.opera.com/download/\" target=\"_blank\">".
			modIE6AlertHelper::get_img($icon_opera)
			."</a>
				
			<a href=\"http://www.apple.com/safari/download/\" target=\"_blank\">".
			modIE6AlertHelper::get_img($icon_safari)
			."</a>
				
			</td></tr>
				
			</table>
			<![endif]--> ";

		}else{

			/* ########################################### */
			/* FULL-MESSAGE */
			/* ########################################### */
				
			//DEFINE THE ICONS 16x16
			$img_emotic = array(
					'src' => 'modules/mod_ie6alert/images/thirst.png',
					'alt' => 'Thirst',
					'width' => '100',
					'height' => '100',
					'title' => JText::_('DONT_HURT_THE_WEB')
			);
				
			$icon_ff = array(
					'src' => 'modules/mod_ie6alert/images/browsers/ff.png',
					'title' => 'Download Firefox',
					'alt' => 'Download Firefox',
					'width' => '40',
					'height' => '40'
			);
				
			$icon_chrome = array(
					'src' => 'modules/mod_ie6alert/images/browsers/chrome.png',
					'title' => 'Download Google Chrome',
					'alt' => 'Download Google Chrome',
					'width' => '40',
					'height' => '40'
			);
				
			$icon_opera = array(
					'src' => 'modules/mod_ie6alert/images/browsers/opera.png',
					'title' => 'Download Opera',
					'alt' => 'Download Opera',
					'width' => '40',
					'height' => '40'
			);
				
			$icon_safari = array(
					'src' => 'modules/mod_ie6alert/images/browsers/safari.png',
					'title' => 'Download Safari',
					'alt' => 'Download Safari',
					'width' => '40',
					'height' => '40'
			);
				
			//get the messaje
			$message=$params->get('message');
				
			if ($message == "") {
				$message= JText::_('FULL_USING_IE6');
			}

			$html = "
				
			<!--[if IE 6]>
			<table class=\"ie6alert\" id=\"ie6alert\" summary=\"Your IE version is deprecated!\"><tr >
			<td class=\"ie_message\">
			$message
			</td>
			<td>".modIE6AlertHelper::get_img($img_emotic)."</td>

			<td valign=\"top\" class=\"close_ie_button\" id=\"close_ie_button\" onclick=\"$('ie6alert').addClass('ie6alert_hidden');\">". modIE6AlertHelper::get_img($icon_cancel).
			"</td>

			</tr>

			<tr><td colspan=\"3\" class=\"ie_links\">
			<ul>
			<li>
			<a href=\"http://www.getfirefox.com/\" target=\"_blank\">".
			modIE6AlertHelper::get_img($icon_ff)
			."</a>
			</li>
			<li>
			<a href=\"http://www.google.com/chrome\" target=\"_blank\">".
			modIE6AlertHelper::get_img($icon_chrome)
			."</a>
			</li>
			<li>
			<a href=\"http://www.opera.com/download/\" target=\"_blank\">".
			modIE6AlertHelper::get_img($icon_opera)
			."</a>
			</li>
			<li>
			<a href=\"http://www.apple.com/safari/download/\" target=\"_blank\">".
			modIE6AlertHelper::get_img($icon_safari)
			."</a>
			</li>
			</ul>
			</td></tr>

			<tr class=\"ie_citation\">
			<td colspan=\"3\">
			<em class=\"ie6alert_text_right\">Powered by <a href=\"http://el-golem.com.ar\" target=\"_blank\">elGolem</a></em>
			</td>
			</tr>
			</table>
			<![endif]-->
			";
				
		}

		return $html;
	}

	/*
	 ################################################
	#          		     GET_IMG	               #
	################################################
	*/
	public static function get_img($src = '') {
		if ( ! is_array($src) ) {
			$src = array('src' => $src);
		}

		$img = '<img';

		foreach ($src as $k=>$v) {
			$img .= " $k=\"$v\" ";
		}

		$img .= '/>';

		return $img;
	}

}
?>
