<?php
namespace POS\ExceptionBundle;

use POS\ExceptionBundle\DependencyInjection\CoreExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use POS\ExceptionBundle\Exception\PosExceptionInterface;

class POSExceptionBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->registerExtension(new CoreExtension());
        parent::build($container);
        $container->registerForAutoconfiguration(PosExceptionInterface::class)
            ->addTag('pos.core_exception');
    }
}
