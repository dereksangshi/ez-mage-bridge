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
     * @var MageEnv
     */
    protected $mageEnv = null;

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
     * Constructor.
     *
     * @param MageEnv $mageEnv
     */
    public function __construct(MageEnv $mageEnv)
    {
        $this->mageEnv = $mageEnv;
        $this->initMageApp();
    }

    /**
     * Initialize Magento application.
     *
     * @return $this
     */
    protected function initMageApp()
    {
        // Only initialize the Magento application once.
        if (!isset($this->app)) {
            require_once $this->getMageEnv()->getMageRootDir().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Mage.php';
            $this->app = \Mage::app($this->getMageEnv()->getAppCode(), $this->getMageEnv()->getAppType());
        }
        return $this;
    }

    /**
     * Set Magento environment.
     *
     * @param MageEnv $mageEnv
     * @return $this
     */
    public function setMageEnv(MageEnv $mageEnv)
    {
        $this->mageEnv = $mageEnv;
        return $this;
    }

    /**
     * Get Magento environment.
     *
     * @return MageEnv
     */
    public function getMageEnv()
    {
        if (!isset($this->mageEnv)) {
            $this->mageEnv = new MageEnv();
        }
        return $this->mageEnv;
    }

    /**
     * Get the Magento application.
     *
     * @return \Mage_Core_Model_App
     */
    public function getMageApp()
    {
        return $this->$mageApp;
    }

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