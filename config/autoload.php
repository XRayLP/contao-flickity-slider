<?php

/**
 * Contao Flickity Slider
 * Extension for Contao Open Source CMS (contao.org)
 *
 * Copyright (c) 2017 XRayLP
 *
 * @package contao-flickity-slider
 * @author XRayLP <info@xraylp.de>
 * @link https://github.com/XRayLP/contao-flickity-slider
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0
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
	'ce_flickity_slider_image' => 'system/modules/contao-flickity-slider/templates',
));
