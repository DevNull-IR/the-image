# The image library

##use

---

Use namespace: ``TheImage\Image``

## Get metadata from image

```php
<?php

include_once __DIR__ . "/vendor/autoload.php";

use TheImage\Image;

$newImage = new Image();

$newImage->setImage(__DIR__ . "/fileImage.png");

$MetaData = $newImage->getMetaData();

```

Now value `$Metadata` saved Meta of your image

