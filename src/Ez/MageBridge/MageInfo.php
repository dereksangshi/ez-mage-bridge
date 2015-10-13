<?php

namespace Ez\MageBridge;

/**
 * Class MageInfo
 *
 * @package Ez\MageBridge
 * @author Derek Li
 */
class MageInfo
{
    /**
     * The Magento application.
     *
     * @var \Mage_Core_Model_App
     */
    protected $mageApp = null;

    /**
     * @var array
     */
    protected $moduleConfigArray = null;

    /**
     * All 3rd party extension names.
     *
     * @var null
     */
    protected $extensionNames = null;

    /**
     * Get Magento module configuration as array.
     *
     * @return array
     */
    public function getModuleConfigArray()
    {
        if (!isset($this->moduleConfigArray)) {
            $this->moduleConfigArray = \Mage::getConfig()->getModuleConfig()->asArray();
        }
        return $this->moduleConfigArray;
    }

    /**
     * Get all 3rd party extension names.
     *
     * @return array|null
     */
    public function getExtensionNames()
    {
        if (!isset($this->extensionNames)) {
            $this->extensionNames = array();
            foreach ($this->getModuleConfigArray() as $module => $c) {
                if ($c['codePool'] !== 'core') {
                    $this->extensionNames[] = $module;
                }
            }
        }
        return $this->extensionNames;
    }

    /**
     * Get extension directory.
     *
     * @param $extensionName
     * @return string
     */
    public function getExtensionDir($extensionName)
    {
        return rtrim(\Mage::getModuleDir(null, $extensionName), DIRECTORY_SEPARATOR);
    }
}