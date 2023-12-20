<?php
namespace Mgt\Varnish\Console\Command\FillQueueCommand;

/**
 * Interceptor class for @see \Mgt\Varnish\Console\Command\FillQueueCommand
 */
class Interceptor extends \Mgt\Varnish\Console\Command\FillQueueCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct()
    {
        $this->___init();
        parent::__construct();
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
