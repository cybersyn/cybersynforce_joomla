<?php
//  @copyright	Copyright (C) 2012 IceTheme. All Rights Reserved
//  @license	Copyrighted Commercial Software 
//  @author     IceTheme (icetheme.com)

// No direct access.
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Load optional rtl Bootstrap css and Bootstrap bugfixes
JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);

// Add current user information
$user = JFactory::getUser();

// Add pageclass from menu item
$pageclass =  & $app->getParams('com_content');

// Unset JS
unset($this->_scripts[JURI::root(true).'/media/jui/js/jquery-noconflict.js']);

// Template Style 
if(!empty($_COOKIE['templatestyle'])) $templatestyle = $_COOKIE['templatestyle'];
else $templatestyle =  $this->params->get('TemplateStyle');

// Logo 
$logo = '<img src="'. JURI::root() . $this->params->get('logo') .'" alt="'. $sitename .'" />';

// Social - Facebook
$social_fb_user = $this->params->get('social_fb_user');
$social_fb = ' <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=267255313316678";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>

<div class="fb-like-box" data-href="http://www.facebook.com/' . $social_fb_user . '" data-width="260" data-show-faces="false" data-stream="false" data-header="false"></div>';

// Social - Twitter
$social_tw_user = $this->params->get('social_tw_user');
$social_tw = ' <a href="https://twitter.com/' . $social_tw_user . '" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @icetheme</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';



// Add JS to head
if ($this->params->get('go2top')) { 
$doc->addScriptDeclaration('
    $(document).ready(function(){ 
			
			$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$(\'.scrollup\').fadeIn();
				} else {
					$(\'.scrollup\').fadeOut();
				}
			}); 
			
			$(\'.scrollup\').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 600);
				return false;
			});
 
		});
');
}



?>
	
