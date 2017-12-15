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
 * DCA tl_content with new fields
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['flickity_slider_image'] = '{type_legend},type,title;{source_legend},multiSRC,orderSRC;{config_legend},sliderHeight,wrapAround,freeScroll;{protected_legend:hide},protected;{expert_legend:hide},guest,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderHeight'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['sliderHeight'],
    'inputType'               => 'inputUnit',
    'options'                 => $GLOBALS['TL_CSS_UNITS'],
    'eval'                    => array('mandatory'=>true, 'includeBlankOption'=>true, 'rgxp'=>'digit_auto_inherit', 'maxlength' => 20, 'tl_class'=>'w50'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['wrapAround'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['wrapAround'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('include', 'tl_class' => 'w50 m12 clr'),
    'sql'                     => "char(1) NOT NULL default '0'"
    
);

$GLOBALS['TL_DCA']['tl_content']['fields']['freeScroll'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['freeScroll'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('include', 'tl_class' => 'w50 m12'),
    'sql'                     => "char(1) NOT NULL default '0'"
    
);
    