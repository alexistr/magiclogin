<?php
/**
 * Fonctions utiles au plugin MagicLogin
 *
 * @plugin     MagicLogin
 * @copyright  2013
 * @author     Cédric
 * @licence    GNU/GPL
 * @package    SPIP\Magiclogin\Fonctions
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


function balise_LOGIN_LINKS_dist($p) {
	$_target_url = interprete_argument_balise(1,$p);
	var_dump($_target_url);
	if (!$_target_url)
		$_target_url = "''";

	$p->code = "'<' . '"."?php echo magiclogin_login_links(\''.addslashes($_target_url).'\'); ?'.'>'";

	$p->interdire_scripts = false;
	return $p;
}

function magiclogin_login_links($target_url=''){
	// if already connected : empty return
	if (isset($GLOBALS['visiteur_session']['statut'])
	  AND $GLOBALS['visiteur_session']['statut'])
		return '';

	// if no target url, back on same page
	if (!$target_url)
		$target_url = self();

	return recuperer_fond("inclure/login_links",array('url'=>$target_url));
}


function balise_LOGOUT_LINK_dist($p) {
	$_target_url = interprete_argument_balise(1,$p);
	var_dump($_target_url);
	if (!$_target_url)
		$_target_url = "''";

	$p->code = "'<' . '"."?php echo magiclogin_logout_link(\''.addslashes($_target_url).'\'); ?'.'>'";

	$p->interdire_scripts = false;
	return $p;
}

function magiclogin_logout_link($target_url=''){
	// if not connected : empty return
	if (!isset($GLOBALS['visiteur_session']['statut'])
	  OR !$GLOBALS['visiteur_session']['statut'])
		return '';

	// if no target url, back on same page
	if (!$target_url)
		$target_url = self();

	return recuperer_fond("inclure/logout_link",array('url'=>$target_url));
}


?>