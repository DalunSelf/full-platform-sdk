<?php

/**
 * Copyright 2020 Ryan Corporation
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

namespace Ryan\Laravel;

use Ryan\FullPlatform;
use Ryan\FullPlatform\HTTPClient\CurlHTTPClient;

class FullPlatformServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/full-platform.php',
            'full-platform'
        );
        $this->app->bind('full-platform-http-client', function () {
            return new CurlHTTPClient(config('full-platform.channel_access_token'));
        });
        $this->app->bind('full-platform', function ($app) {
            $httpClient = $app->make('full-platform-http-client');
            return new FullPlatform($httpClient, ['channelSecret' => config('full-platform.channel_secret')]);
        });
    }
}
