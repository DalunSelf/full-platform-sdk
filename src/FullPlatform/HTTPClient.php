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

namespace Ryan\FullPlatform;

/**
 * The interface that represents HTTP client of Ryan Messaging API.
 *
 * If you want to switch using HTTP client, please implement this.
 *
 * @package Ryan\FullPlatform
 */
interface HTTPClient
{
    /**
     * Sends GET request to Ryan Messaging API.
     *
     * @param string $url Request URL.
     * @param array $data URL parameters.
     * @param array $headers
     * @return Response Response of API request.
     */
    public function get($url, array $data = [], array $headers = []);

    /**
     * Sends POST request to Ryan Messaging API.
     *
     * @param string $url Request URL.
     * @param array $data Request body.
     * @param array|null $headers Request headers.
     * @return Response Response of API request.
     */
    public function post($url, array $data, array $headers = null);

    /**
     * Sends PUT request to Ryan Messaging API.
     *
     * @param string $url Request URL.
     * @param array $data Request body.
     * @param array|null $headers Request headers.
     * @return Response Response of API request.
     */
    public function put($url, array $data, array $headers = null);

    /**
     * Sends DELETE request to Ryan Messaging API.
     *
     * @param string $url Request URL.
     * @return Response Response of API request.
     */
    public function delete($url);
}
