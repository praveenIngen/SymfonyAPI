<?php

namespace ContainerZ0QpvMt;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCategoryControllerupdateService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.WFtayVO.App\Controller\CategoryController::update()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.WFtayVO.App\\Controller\\CategoryController::update()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'category' => ['privates', '.errored..service_locator.WFtayVO.App\\Entity\\Category', NULL, 'Cannot autowire service ".service_locator.WFtayVO": it needs an instance of "App\\Entity\\Category" but this type has been excluded in "config/services.yaml".'],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', true],
            'serializer' => ['privates', 'serializer', 'getSerializerService', false],
        ], [
            'category' => 'App\\Entity\\Category',
            'entityManager' => '?',
            'serializer' => '?',
        ]))->withContext('App\\Controller\\CategoryController::update()', $container);
    }
}
