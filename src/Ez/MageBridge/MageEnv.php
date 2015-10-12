<?php

namespace Ez\MageBridge;

/**
 * Class MageEnv
 *
 * @package Ez\MageBridge
 * @author Derek Li
 */
class MageEnv
{
    /**
     * Root directory of Magento.
     *
     * @var string
     */
    protected $mageRootDir = null;

    /**
     * Set Magento application code (store code or website code)
     *
     * @var string
     */
    protected $appCode = null;

    /**
     * Set Magento application type (store, website, ...)
     *
     * @var string
     */
    protected $appType = null;

    /**
     * Set magento root directory.
     *
     * @param $dir
     * @return $this
     */
    public function setMageRootDir($dir)
    {
        $this->mageRootDir = rtrim($dir, DIRECTORY_SEPARATOR);
        return $this;
    }

    /**
     * Get magento root directory.
     *
     * @return null
     */
    public function getMageRootDir()
    {
        return $this->mageRootDir;
    }

    /**
     * Set Magento application code.
     *
     * @param string $code The code to set.
     * @return $this
     */
    public function setAppCode($code)
    {
        $this->appCode = $code;
        return $this;
    }

    /**
     * Get Magento application code.
     *
     * @return string
     */
    public function getAppCode()
    {
        return $this->appCode;
    }

    /**
     * Set Magento application type.
     *
     * @param string $type The application type to set.
     * @return $this
     */
    public function setAppType($type)
    {
        $this->appType = $type;
        return $this;
    }

    /**
     * Get Magento application type.
     *
     * @return string
     */
    public function getAppType()
    {
        return $this->appType;
    }
}
