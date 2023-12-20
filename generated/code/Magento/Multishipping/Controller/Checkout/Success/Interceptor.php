<?php
namespace Magento\Multishipping\Controller\Checkout\Success;

/**
 * Interceptor class for @see \Magento\Multishipping\Controller\Checkout\Success
 */
class Interceptor extends \Magento\Multishipping\Controller\Checkout\Success implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Multishipping\Model\Checkout\Type\Multishipping\State $state, \Magento\Multishipping\Model\Checkout\Type\Multishipping $multishipping)
    {
        $this->___init();
        parent::__construct($context, $state, $multishipping);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}