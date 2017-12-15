# Flickity Slider Contao Extension
Contao Module for the [Flickity Slider](https://github.com/metafizzy/flickity) by [Metafizzy](https://github.com/metafizzy)

## Requirements

- Contao 3.5 or later (I didn't test it for Contao 4)
- Latest Flickity Slider

## Install

First you have to install the Flickity Slider CSS and JS by adding the CDN to the Contao Layout.
NOTE: This wonderful Slider was created by [Metafizzy](https://github.com/metafizzy)!
```html
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<!-- or -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.css">
<!-- and -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.js"></script>
```

In the second step you have to add the "contao-flickity-slider" extension to contao through the Composer Package Manager.
(If you use the old Package Manager, you will install the module manually)
