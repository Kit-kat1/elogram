<?php

namespace Elogram;

use Elogram\Http\Clients\GuzzleAdapter;
use Elogram\Http\Middleware\AuthMiddleware;
use Elogram\Http\Middleware\SecureRequestMiddleware;
use Elogram\Http\Sessions\NativeSessionStore;
use Noodlehaus\AbstractConfig;

/**
 * Stores the application configuration.
 *
 * @package    Elogram
 * @author     Hassan Khan <contact@hassankhan.me>
 * @link       https://github.com/hassankhan/elogram-sdk
 * @license    MIT
 */
class Config extends AbstractConfig
{
    /**
     * Constructor method and sets default options, if any
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $filteredData = array_filter(array_merge($this->getDefaults(), $data));
        parent::__construct($filteredData);
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaults()
    {
        return [
            'base_uri'        => 'https://api.instagram.com/v1/',
            'client_id'       => '',
            'client_secret'   => '',
            'access_token'    => null,
            'redirect_url'    => '',
            'secure_requests' => false,
            'session_store'   => NativeSessionStore::class,
            'http_adapter'    => GuzzleAdapter::class,
            'middleware'      => [
                'auth'   => AuthMiddleware::class,
                'secure' => SecureRequestMiddleware::class,
            ],
        ];
    }
}
