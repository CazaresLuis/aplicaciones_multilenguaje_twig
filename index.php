<?php
session_name('mtl_twig');
session_start();

// Directorio Raíz de la app
// Es utilizado en templateEngine.inc.php
$root = '';

// números de captcha
$_SESSION['inicia_app'] = true;

// Configuración de gettext()

// Incluimos el archivo de textos
include('locale/textos/text_layout.php');

// Idioma
// $lang = 'es_ES';
$lang = 'en_En';

// Dominio
$text_domain = 'multilingual_twig';

// putenv/setlocale configurarán tu idioma.
putenv('LC_ALL='.$lang);
setlocale(LC_ALL, $lang);

// La ruta a los archivos de traducción
bindtextdomain($text_domain, './locale' );

// El codeset del textdomain
bind_textdomain_codeset($text_domain, 'UTF-8'); 

// El Textdomain
textdomain($text_domain);


if(!empty($_SESSION)){
	// Incluimos el template engine
	include('includes/templateEngine.inc.php');

	// Cargar extensión twig para poder usar gettext()
	$twig->addExtension(new Twig_Extensions_Extension_I18n());

	// Cargamos la plantilla
	$twig->display('default_layout.html',array(
		"textos" => $textos['default']
	));
}
?>