<?php
 namespace Mgt\Varnish\Console\Command; use Symfony\Component\Console\Command\Command; use Symfony\Component\Console\Input\InputArgument; use Symfony\Component\Console\Input\InputOption; use Symfony\Component\Console\Input\InputInterface; use Symfony\Component\Console\Input\InputDefinition; use Symfony\Component\Console\Output\OutputInterface; class FillQueueCommand extends Command { const INPUT_STORE_ID = "\x73\x74\x6f\x72\145\55\151\x64"; const ENTITY_TYPE_CATEGORY = "\143\141\164\145\147\x6f\x72\x79"; const ENTITY_TYPE_PRODUCT = "\160\x72\157\144\x75\143\x74"; const URL_QUEUE_BATCH_SIZE = 2500; protected $logger; protected $storeManager; protected $categoryCollection; protected $urlQueueResource; protected $urlQueue; protected $numberOfUrls = 0; protected $categories = []; protected $state; public function __construct() { goto b9a4a; b9a4a: $objectManager = $this->getObjectManager(); goto c66d0; c1022: $this->categoryCollection = $objectManager->get("\134\115\x61\x67\145\x6e\164\157\x5c\103\141\164\141\x6c\157\x67\134\115\x6f\x64\145\154\x5c\x52\x65\x73\x6f\x75\x72\143\145\115\x6f\x64\145\x6c\134\103\141\x74\x65\147\x6f\x72\171\x5c\x43\157\154\x6c\x65\143\164\x69\157\x6e"); goto b1435; b1435: $this->urlQueueResource = $objectManager->get("\134\115\x67\164\x5c\126\x61\x72\x6e\x69\163\150\134\115\157\144\145\x6c\134\x52\145\163\157\x75\162\143\x65\115\157\x64\145\154\134\125\x72\x6c\x51\x75\x65\x75\x65"); goto C77e0; A5b3b: $this->storeManager = $objectManager->get("\134\x4d\x61\x67\x65\156\x74\157\134\123\164\157\162\x65\x5c\115\157\x64\x65\154\x5c\x53\x74\157\x72\x65\115\x61\156\x61\147\145\162\111\156\x74\x65\x72\146\x61\x63\x65"); goto c1022; c66d0: $this->logger = $objectManager->get("\x5c\120\x73\x72\134\x4c\x6f\x67\134\x4c\x6f\x67\x67\x65\162\111\x6e\164\x65\162\146\141\143\145"); goto A5b3b; C77e0: $this->urlQueue = $objectManager->get("\134\115\147\164\134\x56\x61\x72\x6e\151\163\150\134\115\157\144\x65\154\x5c\x55\x72\x6c\121\165\x65\x75\145"); goto C1d83; C1d83: parent::__construct(); goto e6ab1; e6ab1: } protected function configure() { goto ca791; ca791: $this->setName("\x6d\147\164\x2d\166\141\162\x6e\151\x73\150\72\146\151\x6c\154\55\x71\x75\x65\x75\145"); goto E37ae; E37ae: $this->setDescription("\x4d\107\124\40\126\141\162\x6e\x69\163\150\x20\103\141\x63\150\x65\x20\x51\165\x65\165\145\x20\106\151\x6c\x6c\x65\162"); goto d8547; d8547: $this->setDefinition(new InputDefinition(array(new InputOption(self::INPUT_STORE_ID, null, InputOption::VALUE_OPTIONAL, '')))); goto E9c51; E9c51: parent::configure(); goto E1096; E1096: } protected function execute(InputInterface $input, OutputInterface $output) { try { goto C0e62; Fd13b: $this->addCategoryUrls($store); goto D3ca6; da027: c15d9: goto baca0; C0e62: ini_set("\x6d\x65\x6d\x6f\162\x79\137\154\151\x6d\151\164", "\62\60\x34\x38\115"); goto Bb80d; baca0: return \Magento\Framework\Console\Cli::RETURN_SUCCESS; goto bd08b; d07e5: $storeId = (int) $input->getOption(self::INPUT_STORE_ID); goto D5fe3; f154b: Af93e: goto Fd13b; D3ca6: $this->addProductUrls($store); goto Eb42f; Bb80d: $store = null; goto d07e5; D9b59: $output->writeln(sprintf("\74\x69\156\x66\157\x3e\45\x73\40\125\122\114\163\x20\x61\144\x64\145\x64\40\164\x6f\x20\126\141\162\156\x69\x73\x68\x20\121\x75\145\165\145\x3c\x2f\151\x6e\146\x6f\76", $this->numberOfUrls)); goto da027; Eb42f: if (!($this->numberOfUrls > 0)) { goto c15d9; } goto D9b59; D5fe3: if (!$storeId) { goto Af93e; } goto ca08e; ca08e: try { $store = $this->storeManager->getStore($storeId); $this->storeManager->setCurrentStore($store); } catch (\Exception $e) { goto b3730; eed41: $output->writeln(sprintf("\74\x63\x6f\155\x6d\145\156\164\x3e\x41\166\141\151\154\x61\x62\x6c\145\x20\x53\x74\x6f\x72\x65\x73\x3c\57\143\x6f\155\x6d\x65\x6e\164\76")); goto ec0b4; b3730: $output->writeln(sprintf("\74\145\x72\x72\157\x72\76\123\164\157\162\x65\x20\x77\x69\x74\x68\40\x49\104\40\x22\x25\x73\42\40\x64\x6f\145\163\x20\x6e\157\164\40\x65\x78\151\x73\x74\163\74\x2f\x65\162\x72\157\162\x3e", $storeId)); goto ee38a; ec0b4: return $this->showStores($output); goto Cde54; ee38a: $output->writeln(''); goto eed41; Cde54: } goto f154b; bd08b: } catch (\Exception $e) { goto a0de9; a0de9: $errorMessage = $e->getMessage(); goto Dc09b; Df103: return \Magento\Framework\Console\Cli::RETURN_FAILURE; goto D2c6e; Dc09b: $output->writeln(sprintf("\x3c\x65\162\x72\x6f\x72\76\x25\x73\74\57\145\162\162\x6f\162\76", $errorMessage)); goto Df103; D2c6e: } } protected function addCategoryUrls(\Magento\Store\Model\Store $store = null) { goto a2f73; C7089: $urlRewrites = []; goto F07a1; c2ea1: D4431: goto F2a77; dc141: foreach ($urlRewriteCollection as $urlRewrite) { goto d2d35; afc79: $urls[] = ["\163\164\x6f\162\x65\137\x69\x64" => $urlRewrite->getStoreId(), "\x70\x61\x74\150" => $urlRewrite->getRequestPath(), "\x70\162\x69\157\x72\151\164\x79" => \Mgt\Varnish\Model\UrlQueue::PRIORITY_MEDIUM]; goto E1618; E1618: $urlRewrites[$urlRewriteId] = $urlRewriteId; goto c654f; cc480: if (isset($urlRewrites[$urlRewriteId])) { goto E9077; } goto afc79; F8ba6: f07b7: goto A0f6d; d2d35: $urlRewriteId = $urlRewrite->getUrlRewriteId(); goto cc480; c654f: E9077: goto F8ba6; A0f6d: } goto c2ea1; b77ae: $urlRewriteCollection->addEntityIdFilter($categoryIds); goto C7089; a7781: $storeId = $store->getStoreId(); goto D0276; B011e: $this->urlQueue->addToQueue($urls); goto dcdb3; C9627: bd608: goto c4f01; a2f73: $objectManager = $this->getObjectManager(); goto b6c69; F07a1: $urls = []; goto dc141; B1e47: if (!count($this->categories)) { goto bd608; } goto cb823; Fba91: $urlRewriteCollection->addStoreFilter($storeId, false); goto e51bd; F818d: if (!(null !== $store)) { goto A5869; } goto a7781; cb823: $categoryIds = array_keys($this->categories); goto D3eb9; ca900: foreach ($this->categoryCollection as $category) { $this->categories[$category->getId()] = $category; c5564: } goto A2f72; e41bd: $this->numberOfUrls += count($urls); goto B011e; A2f72: C6938: goto B1e47; D0276: $this->categoryCollection->setStore($store); goto Fba91; e51bd: A5869: goto ef58e; b6c69: $urlRewriteCollection = $objectManager->create("\x5c\115\147\x74\x5c\x56\141\x72\156\x69\163\150\x5c\115\157\x64\145\154\x5c\122\x65\x73\157\165\162\143\145\x4d\x6f\x64\145\x6c\x5c\125\162\x6c\122\x65\167\x72\x69\x74\x65\x5c\125\x72\x6c\122\x65\x77\162\151\x74\145\x43\x6f\154\x6c\145\x63\x74\151\157\x6e"); goto F818d; ef58e: $this->categoryCollection->addAttributeToSelect("\x65\156\164\x69\x74\x79\x5f\151\144"); goto ca900; F2a77: if (!count($urls)) { goto d27c9; } goto e41bd; D3eb9: $urlRewriteCollection->addEntityTypeFilter(self::ENTITY_TYPE_CATEGORY); goto b77ae; dcdb3: d27c9: goto C9627; c4f01: } protected function addProductUrls(\Magento\Store\Model\Store $store = null) { goto fb107; fb107: if (!count($this->categories)) { goto c8211; } goto E7f95; E7f95: $objectManager = $this->getObjectManager(); goto F9dcc; B7e20: foreach ($this->categories as $category) { goto B3955; af126: $productCollection->addCategoryFilter($category); goto f761f; B38e5: goto d356f; goto D8d23; A141d: $urlRewriteCollection->addEntityIdFilter($entityIds); goto fa5af; Ce63a: $productCollection->addAttributeToSelect(["\x65\x6e\x74\151\164\x79\137\151\x64", "\x73\x74\x61\x74\165\x73"]); goto e48fc; e48fc: $productCollection->addAttributeToFilter("\x73\x74\141\164\165\163", ["\151\156" => $productStatus->getVisibleStatusIds()]); goto E290b; Cdf48: f140c: goto Ec699; E290b: $productCollection->setVisibility($productVisibility->getVisibleInSiteIds()); goto af126; F2efd: $productCollection->setCurPage(++$i); goto b2717; c65b5: $urlRewriteCollection = $objectManager->create("\x5c\x4d\x67\x74\134\126\141\x72\156\151\163\x68\134\x4d\x6f\144\145\x6c\134\x52\x65\x73\x6f\165\162\x63\x65\x4d\x6f\x64\x65\x6c\134\125\162\154\122\145\167\162\151\x74\x65\134\125\x72\154\x52\x65\x77\162\x69\164\145\x43\157\x6c\154\x65\143\x74\151\157\x6e"); goto Bf37b; f39cf: $productCollection->clear(); goto f8119; E71be: $urls = []; goto D7b0d; Af660: $storeId = $store->getStoreId(); goto D779d; b5416: if ($break == false) { goto e581e; } goto c594c; D7b0d: foreach ($urlRewriteCollection as $urlRewrite) { goto fc9ae; f61a1: Ec1e7: goto f8fb9; fc9ae: $urlRewriteId = $urlRewrite->getUrlRewriteId(); goto Fc06d; Fc06d: if (isset($urlRewrites[$urlRewriteId])) { goto ef993; } goto Db890; Db890: $urls[] = ["\163\164\x6f\162\x65\x5f\151\144" => $urlRewrite->getStoreId(), "\160\141\164\150" => $urlRewrite->getRequestPath(), "\x70\162\x69\x6f\x72\x69\x74\171" => \Mgt\Varnish\Model\UrlQueue::PRIORITY_LOW]; goto ea3ea; Eb79b: ef993: goto f61a1; ea3ea: $urlRewrites[$urlRewriteId] = $urlRewriteId; goto Eb79b; f8fb9: } goto Ee3b9; D779d: $urlRewriteCollection->addStoreFilter($storeId, false); goto E04aa; Aab40: $break = true; goto B38e5; Bb3e8: if (false === empty($entityIds)) { goto B6944; } goto Aab40; E04aa: c9381: goto Af77e; D58c4: if (!count($urls)) { goto f140c; } goto a7063; D1c6c: E755a: goto D21ce; ea63d: $i = 0; goto deee0; a5334: $entityIds = []; goto C8769; C8769: foreach ($productCollection as $product) { goto bebc2; F73cb: $productIds[$productId] = $productId; goto Da18a; Bc798: Adc4a: goto Bf631; Deb87: $parentIds = $configurableProduct->getParentIdsByChild($productId); goto Aef5b; cfa70: A662c: goto e5b96; C736b: $productIds[$productId] = $productId; goto Bd0db; e5b96: ea0d1: goto Daf55; Bf631: goto De1b2; goto f4119; e4bd8: if (isset($productIds[$productId])) { goto A662c; } goto Baf2a; A0a5d: De1b2: goto cfa70; Baf2a: if ("\143\x6f\156\146\151\x67\165\162\141\142\154\145" == $product->getTypeId()) { goto adde2; } goto Deb87; Bd0db: $entityIds[$productId] = $productId; goto A0a5d; Da18a: $entityIds[$productId] = $productId; goto Bc798; bebc2: $productId = $product->getId(); goto e4bd8; Aef5b: if (!(true === empty($parentIds))) { goto Adc4a; } goto F73cb; f4119: adde2: goto C736b; Daf55: } goto B1370; B1370: c6693: goto Bb3e8; a7063: $this->numberOfUrls += count($urls); goto ca0ca; B3955: $productCollection = $objectManager->create("\x5c\x4d\x61\x67\145\156\x74\x6f\x5c\103\x61\x74\141\154\157\147\x5c\x4d\x6f\144\x65\154\x5c\x52\145\x73\157\x75\162\143\x65\115\x6f\144\x65\x6c\x5c\120\162\157\x64\x75\143\164\134\x43\157\154\154\x65\x63\x74\151\157\x6e"); goto Ce63a; c594c: add1c: goto D1c6c; Ec699: d356f: goto b5416; D8d23: B6944: goto c65b5; b2717: $productCollection->setPageSize(self::URL_QUEUE_BATCH_SIZE); goto a5334; Ff83f: ba389: goto F2efd; f761f: $break = false; goto ea63d; Ee3b9: Dfa2b: goto D58c4; Bf37b: if (!(null !== $store)) { goto c9381; } goto Af660; Af77e: $urlRewriteCollection->addEntityTypeFilter(self::ENTITY_TYPE_PRODUCT); goto A141d; ca0ca: $this->urlQueue->addToQueue($urls); goto Cdf48; f8119: if (!(null !== $store)) { goto ba389; } goto D31ba; fa5af: $urlRewrites = []; goto E71be; deee0: e581e: goto f39cf; D31ba: $productCollection->addStoreFilter($store); goto Ff83f; D21ce: } goto c6b18; A0384: c8211: goto E94b2; e1e2f: $productIds = []; goto B7e20; e79ff: $productStatus = $objectManager->get("\x5c\115\x61\x67\x65\x6e\164\157\x5c\103\x61\x74\x61\x6c\157\x67\134\115\x6f\x64\145\x6c\134\120\x72\x6f\144\165\x63\x74\134\101\x74\164\162\151\x62\165\x74\x65\134\x53\x6f\x75\x72\143\145\x5c\123\x74\x61\164\x75\163"); goto C1f5c; c6b18: D34a9: goto A0384; F9dcc: $configurableProduct = $objectManager->get("\134\115\x61\147\x65\156\164\x6f\x5c\x43\x6f\x6e\x66\x69\x67\x75\162\141\142\154\145\120\x72\x6f\144\x75\x63\164\x5c\115\157\x64\x65\154\134\x52\x65\163\x6f\x75\x72\143\145\x4d\x6f\144\145\154\x5c\x50\162\157\x64\165\143\164\134\124\171\x70\x65\134\103\157\156\146\x69\x67\165\x72\x61\142\x6c\145"); goto e79ff; C1f5c: $productVisibility = $objectManager->get("\x5c\115\x61\x67\x65\156\x74\157\x5c\103\x61\x74\141\x6c\157\x67\x5c\115\157\144\x65\x6c\x5c\120\162\x6f\144\165\143\164\x5c\126\151\x73\x69\x62\151\x6c\151\164\x79"); goto e1e2f; E94b2: } protected function getObjectManager() { $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); return $objectManager; } protected function showStores(OutputInterface $output) { goto Dc006; Fde78: foreach ($stores as $store) { goto b530f; d8041: b9d65: goto Fdcd4; ac07f: $table->addRow($row); goto d8041; b530f: $row = [$store->getStoreId(), $store->getBaseUrl()]; goto ac07f; Fdcd4: } goto A0cb2; A05f5: $stores = $this->storeManager->getStores(); goto Fde78; bcdc9: $table->setHeaders(["\x53\x74\x6f\162\145\40\111\104", "\x42\x61\163\x65\40\125\x52\114"]); goto A05f5; b3459: $table->render($output); goto bddeb; Dc006: $table = $this->getHelperSet()->get("\x74\x61\x62\x6c\145"); goto bcdc9; A0cb2: f397d: goto b3459; bddeb: } }