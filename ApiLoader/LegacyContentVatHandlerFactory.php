<?php
/**
 * This file is part of the EzPriceBundle package.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace EzSystems\EzPriceBundle\ApiLoader;

use eZ\Publish\Core\Persistence\Database\DatabaseHandler;
use Symfony\Component\DependencyInjection\ContainerInterface;
use EzSystems\EzPriceBundle\Core\Persistence\Legacy\Price\ContentVat\Gateway\DoctrineDatabase;

class LegacyContentVatHandlerFactory
{
    /**
     * Builds the legacy vat finder handler
     *
     * @param \eZ\Publish\Core\Persistence\Database\DatabaseHandler $dbHandler
     *
     * @return \EzSystems\EzPriceBundle\Core\Persistence\Legacy\Price\ContentVat\ContentVatHandler
     */
    public function buildLegacyContentVatHandler( ContainerInterface $container, DatabaseHandler $dbHandler )
    {
        $legacyVatFinderHandlerClass = $container->getParameter( "ezprice.api.storage_engine.legacy.handler.ezprice.contentvathandler.class" );
        return new $legacyVatFinderHandlerClass(
            new DoctrineDatabase( $dbHandler )
        );
    }
}
