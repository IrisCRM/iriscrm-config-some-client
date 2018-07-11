<?php

namespace SomeClient\Config\ConfigName;

use Iris\Iris;
use Bernard\Driver\FlatFileDriver;
use Bernard\Producer;
use Bernard\QueueFactory\PersistentFactory;
use Symfony\Component\DependencyInjection\Reference;

class ServiceProvider extends \Iris\Config\CRM\ServiceProvider
{
    public function register()
    {
        parent::register();

        /**
         * Predis Driver for Bernard queues
         */
        $this->container
            ->register('queue.driver', FlatFileDriver::class)
            ->addArgument(Iris::$app->getTempDir());
        
        /**
         * Persistent Queue Factory
         */
        $this->container
            ->register('queue.factory', PersistentFactory::class)
            ->addArgument(new Reference('queue.driver'))
            ->addArgument(new Reference('queue.serializer'));
        
        /**
         * Поставщик сообщений для очереди
         */
        $this->container
            ->register('queue.producer', Producer::class)
            ->addArgument(new Reference('queue.factory'))
            ->addArgument(new Reference('queue.event_dispatcher'));
    }
}