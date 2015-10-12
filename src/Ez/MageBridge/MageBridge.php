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
     * Constructor
     *
     * @param string $mageRootDir OPTIONAL The root directory for Magento.
     * @param string $appCode OPTIONAL Magento application code.
     * @param string $appType OPTIONAL Magento application type.
     */
    public function __construct($mageRootDir = null, $appCode = null, $appType = null)
    {
        if (isset($mageRootDir)) {
            $this->getMageEnv()->setMageRootDir($mageRootDir);
        }
        if (isset($appCode)) {
            $this->getMageEnv()->setAppCode($appCode);
        }
        if (isset($appType)) {
            $this->getMageEnv()->setAppType($appType);
        }
    }

    /**
     * @param MageEnv $mageEnv
     * @return $this
     */
    public function setMageEnv(MageEnv $mageEnv)
    {
        $this->mageEnv = $mageEnv;
        return $this;
    }

    /**
     * Get MageEnv.
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
     * Set MageInfo.
     *
     * @param MageInfo $mageInfo
     * @return $this
     */
    public function setMageInfo(MageInfo $mageInfo)
    {
        $this->mageInfo = $mageInfo;
        return $this;
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