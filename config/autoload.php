<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'ContentFlickitySliderImage' => 'system/modules/contao-flickity-slider/elements/ContentFlickitySliderImage.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_image_slider' => 'system/modules/contao-flickity-slider/templates',
));
