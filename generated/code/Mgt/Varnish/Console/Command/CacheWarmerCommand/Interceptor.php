<?php
namespace Mgt\Varnish\Console\Command\CacheWarmerCommand;

/**
 * Interceptor class for @see \Mgt\Varnish\Console\Command\CacheWarmerCommand
 */
class Interceptor extends \Mgt\Varnish\Console\Command\CacheWarmerCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\HTTP\Adapter\Curl $curlAdapter, \Psr\Log\LoggerInterface $logger, \Magento\Framework\App\Filesystem\DirectoryList $directoryList, \Magento\Store\Model\StoreManagerInterface $storeManager, \Mgt\Varnish\Model\Cache\Backend\File $cache, \Magento\CacheInvalidate\Model\PurgeCache $cachePurger, \Mgt\Varnish\Model\Cache\Config $varnishConfig, \Mgt\Varnish\Model\ResourceModel\Url $urlResource, \Mgt\Varnish\Model\ResourceModel\UrlQueue $urlQueueResource, \Mgt\Varnish\Model\ResourceModel\UrlQueue\Collection $urlQueueCollection)
    {
        $this->___init();
        parent::__construct($curlAdapter, $logger, $directoryList, $storeManager, $cache, $cachePurger, $varnishConfig, $urlResource, $urlQueueResource, $urlQueueCollection);
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
