<?php

/**
 * Copyright 2016 Ryan Corporation
 *
 * Ryan Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

namespace Ryan;

use Ryan\FullPlatform\HTTPClient;
use Ryan\FullPlatform\Response;
/**
 * A client class of Ryan Messaging API.
 *
 * @package Ryan
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class FullPlatform
{
    const DEFAULT_ENDPOINT_BASE = 'https://api.line.me';
    const DEFAULT_DATA_ENDPOINT_BASE = 'https://api-data.line.me';

    /** @var string */
    private $channelSecret;
    /** @var string */
    private $endpointBase;
    /** @var string */
    private $dataEndpointBase;
    /** @var HTTPClient */
    private $httpClient;

    /**
     * FullPlatform constructor.
     *
     * @param HTTPClient $httpClient HTTP client instance to use API calling.
     * @param array $args Configurations.
     */
    public function __construct(HTTPClient $httpClient, array $args)
    {
        $this->httpClient = $httpClient;
        $this->channelSecret = $args['channelSecret'];

        $this->endpointBase = FullPlatform::DEFAULT_ENDPOINT_BASE;
        if (!empty($args['endpointBase'])) {
            $this->endpointBase = $args['endpointBase'];
        }
    }

    /**
     * Get basic information about bot.
     *
     * @return Response
     */
    public function getBotInfo()
    {
        return $this->httpClient->get($this->endpointBase . '/v2/bot/info');
    }

    /**
     * Gets specified user's profile through API calling.
     *
     * @param string $userId The user ID to retrieve profile.
     * @return Response
     */
    public function getProfile($userId)
    {
        return $this->httpClient->get($this->endpointBase . '/v2/bot/profile/' . urlencode($userId));
    }

    public function getWebsite()
    {
        return $this->httpClient->get($this->endpointBase . '/v2/websites');
    }
}
