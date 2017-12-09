<?php

class ContentFlickitySliderImage extends ContentElement {
    
    protected $strTemplate = 'ce_image_slider';    
    
    protected function compile()
    {
        $this->Template->title = '---TITEL---';
    }

    
}