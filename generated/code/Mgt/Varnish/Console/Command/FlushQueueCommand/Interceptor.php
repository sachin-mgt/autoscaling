<?php
namespace Mgt\Varnish\Console\Command\FlushQueueCommand;

/**
 * Interceptor class for @see \Mgt\Varnish\Console\Command\FlushQueueCommand
 */
class Interceptor extends \Mgt\Varnish\Console\Command\FlushQueueCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Mgt\Varnish\Model\ResourceModel\UrlQueue $urlQueueResource)
    {
        $this->___init();
        parent::__construct($urlQueueResource);
    }

    /**
     * {@inheritdoc}
     */
    public function run(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'run');
        return $pluginInfo ? $this->___callPlugins('run', func_get_args(), $pluginInfo) : parent::run($input, $output);
    }
}
