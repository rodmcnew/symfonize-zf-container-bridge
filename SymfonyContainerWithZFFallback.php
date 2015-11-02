<?php


namespace Reliv\SymfonizeZFContainerBridge;

use Reliv\SymfonizeZF\Module;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * This is a Symfony container that uses the zend service manager
 * if it cannot find its services.
 *
 * Class SymfonyContainerWithZFFallback
 * @package Reliv\SymfonizeZF\ContainerBridge
 */
class SymfonyContainerWithZFFallback extends ContainerBuilder
{
    public function compile()
    {
        /**
         * Only run the following hack if FULL Symfonize is installed.
         *
         * This hack is only needed if the Symfony framework
         * is fully booted. There is no need to do this
         * if the container is operating without Symfonize
         * routing installed.
         */
        if (class_exists('Reliv\SymfonizeZF\Module.php')) {
            /**
             * @todo find better way
             *
             * This is here because the container refuses to compile with
             * "unknown" zend service dependencies in it.
             */
            $passConfig = $this->getCompiler()->getPassConfig();
            $class = new \ReflectionClass($passConfig);
            $prop = $class->getProperty('removingPasses');
            $prop->setAccessible(true);
            $removingPasses = $prop->getValue($passConfig);
            //Remove CheckExceptionOnInvalidReferenceBehaviorPass
            unset($removingPasses[4]);
            $prop->setValue($passConfig, $removingPasses);
        }
        parent::compile();
    }

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
