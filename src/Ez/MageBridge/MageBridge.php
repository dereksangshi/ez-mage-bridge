<?php

namespace Ez\MageBridge;

/**
 * Class MageBridge
 *
 * @package Ez\MageBridge
 * @author Derek Li
 */
class MageBridge
{
    /**
     * @var MageEnv
     */
    protected $mageEnv = null;

    /**
     * @var MageInfo
     */
    protected $mageInfo = null;

    /**
     * Constructor.
     *
     * @param MageEnv $mageEnv
     */
    public function __construct(MageEnv $mageEnv)
    {
        $this->mageEnv = $mageEnv;
        $this->initMage();
    }

    /**
     * Initialize Magento application.
     *
     * @return $this
     */
    protected function initMage()
    {
        // Only initialize the Magento application once when MageBridge is instantiated.
        require_once $this->getMageEnv()->getMageRootDir().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Mage.php';
        \Mage::run($this->getMageEnv()->getAppCode(), $this->getMageEnv()->getAppType());
    }

    /**
     * Get MageEnv.
     *
     * @return MageEnv
     */
    public function getMageEnv()
    {
        return $this->mageEnv;
    }

    /**
     * Get MageInfo.
     *
     * @return MageInfo
     */
    public function getMageInfo()
    {
        if (!isset($this->mageInfo)) {
            $this->mageInfo = new MageInfo($this->getMageEnv());
        }
        return $this->mageInfo;
    }
}