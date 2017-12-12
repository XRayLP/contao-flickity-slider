<?php

class ContentFlickitySliderImage extends ContentElement {
    
    protected $strTemplate = 'ce_flickity_slider_image';    
    
    public function generate()
    {
        $this->multiSRC = deserialize($this->multiSRC);
        
        $this->objFiles = \FilesModel::findMultipleByUuids($this->multiSRC);
        
        return parent::generate();
    }
    
    protected function compile()
    {
        
        global $objPage;
        
        $images = array();
        $cellWidth = array();
        $cellHeight = array();
        $auxDate = array();
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
                
                $auxDate[] = $objFile->mtime;
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
                    
                    $auxDate[] = $objFile->mtime;
                }
            }
        }

        // Width
        $cellWidth = deserialize($this->cellWidth);
        $cellHeight = deserialize($this->cellHeight);
            

        
        $this->Template = new \FrontendTemplate($this->strTemplate);
        $this->Template->class = "ce_flickity_slider_image";
        $this->Template->cellWidth = $this->cellWidth;
        $this->Template->cellHeight = $this->cellHeight;
        $this->Template->autoSlide = $this->autoSlide;
        
        $this->Template->cellWidth = $cellWidth;
        $this->Template->cellHeight = $cellHeight;
        
        $this->Template->images = $images;
        


    }
         
    
}