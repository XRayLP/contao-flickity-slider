<?php

$GLOBALS['TL_DCA']['tl_flickity_slider'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 2,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter,sort,search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flickity_slider']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flickity_slider']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flickity_slider']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_flickity_slider']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			),
		)
	),

	// Palettes
	'palettes' => array
	(
	    '__selector__'                => array('autoPlay'),
		'default'                     => '{title_legend},title;{config_legend},imageSRC,orderSRC,cellWidth,cellHeight,cellMargin,cellAlign,draggable,freeScroll,wrapAround,autoPlay,adaptiveHeight,staticBanner1,staticBanner2'
	),


	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['title'],
            'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
	    
	    /*
	     * Image Configuration
	     */
	    
	    'imageSRC' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['imageSRC'],
	        'exclude'                 => true,
	        'inputType'               => 'fileTree',
	        'eval'                    => array('multiple'=>true, 'fieldType'=>'checkbox', 'orderField'=>'orderSRC', 'files'=>true, 'mandatory'=>true),
	        'sql'                     => "blob NULL",
	        /*'load_callback' => array
	        (
	            array('tl_flickity_slider', 'setMultiSrcFlags')
	        )*/
	    ),
	    
	    'orderSRC' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['orderSRC'],
	        'sql'                     => "blob NULL"
	    ),
	    
        /*
         * Cell Configuration
         */
	    
	    'cellWidth' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['cellWidth'],
	        'inputType'               => 'inputUnit',
	        'options'                 => $GLOBALS['TL_CSS_UNITS'],
	        'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_auto_inherit', 'maxlength' => 20, 'tl_class'=>'w50 m12'),
	        'sql'                     => "varchar(64) NOT NULL default ''"
	    ),
	    'cellHeight' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['cellHeight'],
	        'inputType'               => 'inputUnit',
	        'options'                 => $GLOBALS['TL_CSS_UNITS'],
	        'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_auto_inherit', 'maxlength' => 20, 'tl_class'=>'w50 m12'),
	        'sql'                     => "varchar(64) NOT NULL default ''"
	    ),
	    'cellMargin' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['cellMargin'],
	        'inputType'               => 'inputUnit',
	        'options'                 => $GLOBALS['TL_CSS_UNITS'],
	        'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_auto_inherit', 'maxlength' => 20, 'tl_class'=>'w50 m12'),
	        'sql'                     => "varchar(64) NOT NULL default ''"
	    ),
	    'cellAlign' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['cellAlign'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'select',
	        'options'                 => array('center', 'left', 'right'),
	        'reference'               => &$GLOBALS['TL_LANG']['tl_flickity_slider']['cellAlign'],
	        'eval'                    => array('include', 'mandatory' => true, 'tl_class' => 'w50 m12'),
	        'sql'                     => "varchar(6) NOT NULL default 'center'"
	    ),
	    
	    /*
	     * Behaviour
	     */
	    
	    'draggable' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['draggable'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'checkbox',
	        'eval'                    => array('include', 'tl_class' => 'w50 m12 clr'),
	        'sql'                     => "varchar(4) NOT NULL default ''"
	    ),
	    
	    'freeScroll' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['freeScroll'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'checkbox',
	        'eval'                    => array('include', 'tl_class' => 'w50 m12'),
	        'sql'                     => "varchar(4) NOT NULL default ''"
	    ),
	    
	    'wrapAround' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['wrapAround'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'checkbox',
	        'eval'                    => array('include', 'tl_class' => 'w50 m12'),
	        'sql'                     => "varchar(4) NOT NULL default ''"
	    ),
	    
	    'autoPlay' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['autoPlay'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'checkbox',
	        'eval'                    => array('include', 'tl_class' => 'w50 m12'),
	        'sql'                     => "varchar(4) NOT NULL default ''"
	    ),
	    
	    'adaptiveHeight' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['adaptiveHeight'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'checkbox',
	        'eval'                    => array('include', 'tl_class' => 'w50 m12'),
	        'sql'                     => "varchar(4) NOT NULL default ''"
	    ),
	    
	    
	    /*
	     * Others
	     */
	    
	    'staticBanner1' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['staticBanner1'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'text',
	        'eval'                    => array('maxlength'=>48, 'decodeEntities'=>true, 'tl_class'=>'w50 clr'),
	        'sql'                     => "varchar(48) NOT NULL default ''"
	    ),
	    'staticBanner2' => array
	    (
	        'label'                   => &$GLOBALS['TL_LANG']['tl_flickity_slider']['staticBanner2'],
	        'exclude'                 => true,
	        'search'                  => true,
	        'inputType'               => 'text',
	        'eval'                    => array('maxlength'=>48, 'decodeEntities'=>true, 'tl_class'=>'w50'),
	        'sql'                     => "varchar(48) NOT NULL default ''"
	    ),
	)
);

class tl_flickity_slider extends Backend {
    /**
     * Dynamically add flags to the "multiSRC" field
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     */
    public function setMultiSrcFlags($varValue, DataContainer $dc)
    {
        if ($dc->activeRecord)
        {
            switch ($dc->activeRecord->type)
            {
                case 'gallery':
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['isGallery'] = true;
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = Config::get('validImageTypes');
                    break;
                    
                case 'downloads':
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['isDownloads'] = true;
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = Config::get('allowedDownload');
                    break;
            }
        }
        
        return $varValue;
    }
}
