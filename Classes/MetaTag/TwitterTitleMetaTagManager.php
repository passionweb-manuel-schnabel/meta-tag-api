<?php

namespace Passionweb\MetaTagApi\MetaTag;

use TYPO3\CMS\Core\MetaTag\AbstractMetaTagManager;

class TwitterTitleMetaTagManager extends AbstractMetaTagManager
{
    protected $defaultNameAttribute = 'property';

    protected $handledProperties = [
        'twitter:title' => [],
    ];
}
