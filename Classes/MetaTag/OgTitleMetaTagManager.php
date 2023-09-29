<?php

namespace Passionweb\MetaTagApi\MetaTag;

use TYPO3\CMS\Core\MetaTag\AbstractMetaTagManager;

class OgTitleMetaTagManager extends AbstractMetaTagManager
{
    protected $defaultNameAttribute = 'property';

    protected $handledProperties = [
        'og:title' => [],
    ];
}
