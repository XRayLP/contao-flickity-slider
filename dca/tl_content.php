<?php

/*$GLOBALS['TL_DCA']['tl_content'] = array
(

	// Palettes
	'palettes' => array
	(
	    //'__selector__'                => array('autoPlay'),
		'flickity_slider_image'                     => '{type_legend},type,title,multiSRC,orderSRC;{protected_legend:hide},protected;{expert_legend:hide},guest,cssID,space;{invisible_legend:hide},invisible,start,stop'
	),


	/* Fields
	'fields' => array
	(
	    
	    /*
	     * Image Configuration
	     *
	    
	    'imageSRC' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['imageSRC'],
	        'exclude'                 => true,
	        'inputType'               => 'fileTree',
	        'eval'                    => array('multiple'=>true, 'fieldType'=>'checkbox', 'orderField'=>'orderSRC', 'files'=>true, 'mandatory'=>true),
	        'sql'                     => "blob NULL",
	        /*'load_callback' => array
	        (
	            array('tl_content', 'setMultiSrcFlags')
	        )*
	    ),
	    
	    'orderSRC' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['orderSRC'],
	        'sql'                     => "blob NULL"
	    ),
	    
        /*
         * Cell Configuration
         */
	    
	    /*'cellWidth' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cellWidth'],
	        'inputType'               => 'inputUnit',
	        'options'                 => $GLOBALS['TL_CSS_UNITS'],
	        'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_auto_inherit', 'maxlength' => 20, 'tl_class'=>'w50 m12'),
	        'sql'                     => "varchar(64) NOT NULL default ''"
	    ),
	    'cellHeight' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cellHeight'],
	        'inputType'               => 'inputUnit',
	        'options'                 => $GLOBALS['TL_CSS_UNITS'],
	        'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_auto_inherit', 'maxlength' => 20, 'tl_class'=>'w50 m12'),
	        'sql'                     => "varchar(64) NOT NULL default ''"
	    ),
	    'cellMargin' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cellMargin'],
	        'inputType'               => 'inputUnit',
	        'options'                 => $GLOBALS['TL_CSS_UNITS'],
	        'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_auto_inherit', 'maxlength' => 20, 'tl_class'=>'w50 m12'),
	        'sql'                     => "varchar(64) NOT NULL default ''"
	    ),
	    'cellAlign' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cellAlign'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'select',
	        'options'                 => array('center', 'left', 'right'),
	        'reference'               => &$GLOBALS['TL_LANG']['tl_content']['cellAlign'],
	        'eval'                    => array('include', 'mandatory' => true, 'tl_class' => 'w50 m12'),
	        'sql'                     => "varchar(6) NOT NULL default 'center'"
	    ),
	    
	    /*
	     * Behaviour
	     */
	    
	    /*'draggable' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['draggable'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'checkbox',
	        'eval'                    => array('include', 'tl_class' => 'w50 m12 clr'),
	        'sql'                     => "varchar(4) NOT NULL default ''"
	    ),
	    
	    'freeScroll' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['freeScroll'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'checkbox',
	        'eval'                    => array('include', 'tl_class' => 'w50 m12'),
	        'sql'                     => "varchar(4) NOT NULL default ''"
	    ),
	    
	    'wrapAround' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['wrapAround'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'checkbox',
	        'eval'                    => array('include', 'tl_class' => 'w50 m12'),
	        'sql'                     => "varchar(4) NOT NULL default ''"
	    ),
	    
	    /*'autoPlay' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['autoPlay'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'checkbox',
	        'eval'                    => array('include', 'tl_class' => 'w50 m12'),
	        'sql'                     => "varchar(4) NOT NULL default ''"
	    ),*/
	    
	    /*'adaptiveHeight' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['adaptiveHeight'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'checkbox',
	        'eval'                    => array('include', 'tl_class' => 'w50 m12'),
	        'sql'                     => "varchar(4) NOT NULL default ''"
	    ),
	    
	    
	    /*
	     * Others
	     */
	    
	    /*'staticBanner1' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['staticBanner1'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'text',
	        'eval'                    => array('maxlength'=>48, 'decodeEntities'=>true, 'tl_class'=>'w50 clr'),
	        'sql'                     => "varchar(48) NOT NULL default ''"
	    ),
	    'staticBanner2' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['staticBanner2'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'text',
	        'eval'                    => array('maxlength'=>48, 'decodeEntities'=>true, 'tl_class'=>'w50'),
	        'sql'                     => "varchar(48) NOT NULL default ''"
	    ),*/
	//)
//);

$GLOBALS['TL_DCA']['tl_content']['palettes']['flickity_slider_image'] = '{type_legend},type,title;{config_legend},singleSRC,multiSRC,orderSRC,autoSlide;{protected_legend:hide},protected;{expert_legend:hide},guest,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['fields']['autoSlide'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['autoPlay'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('include', 'tl_class' => 'w50 m12'),
    'sql'                     => "char(1) NOT NULL default ''"

);
    