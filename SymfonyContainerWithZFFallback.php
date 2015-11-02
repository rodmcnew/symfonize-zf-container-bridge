<?php


namespace Reliv\SymfonizeZFContainerBridge;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * This is a Symfony container that uses the zend service manager
 * if it cannot find its services.
 *
 * Class SymfonyContainerWithZFFallback
 * @package Reliv\SymfonizeZF\ContainerBridge
 */
class SymfonyContainerWithZFFallback extends ContainerBuilder
{
    /**
     * Returns true if the given service is defined.
     *
     * @param string $id The service identifier
     *
     * @return bool true if the service is defined, false otherwise
     *
     * @api
     */
    public function has($id)
    {
        return parent::has($id)
        || (Module::$zendServiceManager && Module::$zendServiceManager->has($id));
    }

    /**
     * Gets a service.
     *
     * @param string $id The service identifier
     * @param int $invalidBehavior The behavior when the service does not exist
     *
     * @return object The associated service
     *
     * @throws \Exception
     *
     * @see Reference
     *
     * @api
     */
    public function get($id, $invalidBehavior = ContainerInterface::EXCEPTION_ON_INVALID_REFERENCE)
    {
        if (!parent::has($id) && Module::$zendServiceManager) {
            return Module::$zendServiceManager->get($id);
        }

        return parent::get($id);
    }
}
