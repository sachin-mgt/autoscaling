<?php
namespace Mgt\Varnish\Controller\Adminhtml\Queue\Information;

/**
 * Interceptor class for @see \Mgt\Varnish\Controller\Adminhtml\Queue\Information
 */
class Interceptor extends \Mgt\Varnish\Controller\Adminhtml\Queue\Information implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Json\Helper\Data $jsonHelper, \Magento\Store\Model\StoreManagerInterface $storeManager, \Mgt\Varnish\Model\ResourceModel\UrlQueue\Collection $urlQueueCollection)
    {
        $this->___init();
        parent::__construct($context, $jsonHelper, $storeManager, $urlQueueCollection);
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
