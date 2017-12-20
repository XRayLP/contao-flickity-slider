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

namespace XRayLP\Bundle\FlickitySliderBundle\Elements;

use Contao\ContentElement;

/**
 * Image Slider Class
 */

class ContentFlickitySliderImage extends ContentElement {
    
    protected $strTemplate = 'ce_flickity_slider_image';    
    
    /**
     * Get files and deserialize arrays
     * @see \Contao\ContentElement::generate()
     */
    
    public function generate()
    {
        //Slider Height Array
        $this->sliderHeight = deserialize($this->sliderHeight);
        
        // Image Array
        // Use the home directory of the current user as file source
        if ($this->useHomeDir && FE_USER_LOGGED_IN)
        {
            $this->import('FrontendUser', 'User');
            
            if ($this->User->assignDir && $this->User->homeDir)
            {
                $this->orderSRC = array($this->User->homeDir);
            }
        }
        else
        {
            $this->orderSRC = deserialize($this->orderSRC);
        }
        
        // Return if there are no files
        if (!is_array($this->orderSRC) || empty($this->orderSRC))
        {
            return '';
        }
        
        // Get the file entries from the database
        $this->objFiles = \FilesModel::findMultipleByUuids($this->orderSRC);
        
        if ($this->objFiles === null)
        {
            if (!\Validator::isUuid($this->orderSRC[0]))
            {
                return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
            }
            
            return '';
        }
        
        return parent::generate();
    }
    
    /**
     * Function for setting the template variables
     * @see \Contao\ContentElement::compile()
     */
    
    protected function compile()
    {
        
        global $objPage;
        
        $images = array();
        $objFiles = $this->objFiles;
        
        // Get all images
        while ($objFiles->next())
        {
            // Continue if the files has been processed or does not exist
            if (isset($images[$objFiles->path]) || !file_exists(TL_ROOT . '/' . $objFiles->path))
            {
                continue;
            }
            
            // Single files
            if ($objFiles->type == 'file')
            {
                $objFile = new \File($objFiles->path, true);
                
                if (!$objFile->isImage)
                {
                    continue;
                }
                
                $arrMeta = $this->getMetaData($objFiles->meta, $objPage->language);
                
                if (empty($arrMeta))
                {
                    if ($this->metaIgnore)
                    {
                        continue;
                    }
                    elseif ($objPage->rootFallbackLanguage !== null)
                    {
                        $arrMeta = $this->getMetaData($objFiles->meta, $objPage->rootFallbackLanguage);
                    }
                }
                
                // Use the file name as title if none is given
                if ($arrMeta['title'] == '')
                {
                    $arrMeta['title'] = specialchars($objFile->basename);
                }
                
                // Add the image
                $images[] = array
                (
                    'id'        => $objFiles->id,
                    'uuid'      => $objFiles->uuid,
                    'name'      => $objFile->basename,
                    'singleSRC' => $objFiles->path,
                    'alt'       => $arrMeta['title'],
                    'imageUrl'  => $arrMeta['link'],
                    'caption'   => $arrMeta['caption']
                );

            }
            
            // Folders
            else
            {
                $objSubfiles = \FilesModel::findByPid($objFiles->uuid);
                
                if ($objSubfiles === null)
                {
                    continue;
                }
                
                while ($objSubfiles->next())
                {
                    // Skip subfolders
                    if ($objSubfiles->type == 'folder')
                    {
                        continue;
                    }
                    
                    $objFile = new \File($objSubfiles->path, true);
                    
                    if (!$objFile->isImage)
                    {
                        continue;
                    }
                    
                    $arrMeta = $this->getMetaData($objSubfiles->meta, $objPage->language);
                    
                    if (empty($arrMeta))
                    {
                        if ($this->metaIgnore)
                        {
                            continue;
                        }
                        elseif ($objPage->rootFallbackLanguage !== null)
                        {
                            $arrMeta = $this->getMetaData($objSubfiles->meta, $objPage->rootFallbackLanguage);
                        }
                    }
                    
                    // Use the file name as title if none is given
                    if ($arrMeta['title'] == '')
                    {
                        $arrMeta['title'] = specialchars($objFile->basename);
                    }
                    
                    // Add the image
                    $images[] = array
                    (
                        'id'        => $objSubfiles->id,
                        'uuid'      => $objSubfiles->uuid,
                        'name'      => $objFile->basename,
                        'singleSRC' => $objSubfiles->path,
                        'alt'       => $arrMeta['title'],
                        'imageUrl'  => $arrMeta['link'],
                        'caption'   => $arrMeta['caption']
                    );
                    
                }
            }
        }

     
        
        //Template Configuration
        $this->Template = new \FrontendTemplate($this->strTemplate);
        $this->Template->class = "ce_flickity_slider_image";
        
        //Slider Main
        $this->Template->sliderHeight = $this->sliderHeight;
        $this->Template->images = $images;
        
        //Extra Configuration
        $this->Template->autoSlide = $this->autoSlide;
        $this->Template->wrapAround = $this->wrapAround;
        $this->Template->freeScroll = $this->freeScroll;

    }
         
    
}