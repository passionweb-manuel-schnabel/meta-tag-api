<?php

declare(strict_types=1);

namespace Passionweb\MetaTagApi\Controller;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use TYPO3\CMS\Core\Exception;
use TYPO3\CMS\Core\Http\RequestFactory;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class MetaTagController extends ActionController
{
    protected LoggerInterface $logger;

    public function __construct(
        LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }

    public function indexAction(): ResponseInterface
    {
        $metaTagManagerOgTitle =
            GeneralUtility::makeInstance(MetaTagManagerRegistry::class)
                ->getManagerForProperty('og:title');

        $metaTagManagerTwitterTitle =
            GeneralUtility::makeInstance(MetaTagManagerRegistry::class)
                ->getManagerForProperty('twitter:title');

        // removes previously set metadata by TypoScript for the og:title and twitter:title
        $metaTagManagerOgTitle->removeProperty('og:title');
        $metaTagManagerTwitterTitle->removeProperty('twitter:title');

        // set your custom (site specific) values here
        $metaTagManagerOgTitle->addProperty(
            'og:title',
            'Custom og:title string from custom meta tag manager in TYPO3'
        );
        $metaTagManagerTwitterTitle->addProperty(
            'twitter:title',
            'Custom twitter:title string from custom meta tag manager in TYPO3'
        );

        return $this->htmlResponse();
    }

}
