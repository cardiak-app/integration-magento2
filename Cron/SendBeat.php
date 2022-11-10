<?php

namespace Cardiak\Beat\Cron;

use Magento\Framework\App\Config\ScopeConfigInterface;

class SendBeat
{
    const CONFIG_ENABLE = 'cardiak_beat/cardiak_config/beat_enable';
    const CONFIG_BEAT_ID = 'cardiak_beat/cardiak_config/beat_id';
    const BEAT_ENDPOINT = 'https://beat.cardiak.app/';

    private $scope;

    /**
     * @param ScopeConfigInterface $scope
     */
    public function __construct(ScopeConfigInterface $scope)
    {
        $this->scope = $scope;
    }

    public function execute()
    {
        if ((bool)$this->getConfig(self::CONFIG_ENABLE) === true) {
            @file_get_contents(self::BEAT_ENDPOINT . $this->getConfig(self::CONFIG_BEAT_ID));
        }
    }

    public function getConfig($path)
    {
        return $this->scope->getValue(
            $path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        );
    }
}
