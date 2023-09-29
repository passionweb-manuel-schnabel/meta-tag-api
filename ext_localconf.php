<?php

defined('TYPO3') || die('Access denied.');
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use Passionweb\MetaTagApi\MetaTag\OgTitleMetaTagManager;

    $metaTagManagerRegistry =
        GeneralUtility::makeInstance(MetaTagManagerRegistry::class);
    $metaTagManagerRegistry->registerManager(
        'customTitleMetaTagManager',
        OgTitleMetaTagManager::class,
        ['opengraph']
    );

$metaTagManagerRegistry->registerManager(
    'customTitleMetaTagManager',
    \Passionweb\MetaTagApi\MetaTag\OgTitleMetaTagManager::class,
    ['twitter']
);


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'MetaTagApi',
    'ExtendedMetaData',
    [
        \Passionweb\MetaTagApi\Controller\MetaTagController::class => 'index,'
    ],
    // non-cacheable actions
    [
        \Passionweb\MetaTagApi\Controller\MetaTagController::class => 'index,'
    ]
);

// wizards
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
        wizards.newContentElement.wizardItems.plugins {
            elements {
                extendedmetadata {
                    iconIdentifier = metatagapi_extendedmetadata
                    title = LLL:EXT:meta_tag_api/Resources/Private/Language/locallang_db.xlf:plugin_metatagapi_extendedmetadata.name
                    description = LLL:EXT:meta_tag_api/Resources/Private/Language/locallang_db.xlf:plugin_metatagapi_extendedmetadata.description
                    tt_content_defValues {
                        CType = list
                        list_type = metatagapi_extendedmetadata
                    }
                }
            }
            show = *
        }
   }'
);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'metatagapi_extendedmetadata',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:meta_tag_api/Resources/Public/Icons/Extension.png']
);

