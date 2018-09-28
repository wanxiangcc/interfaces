<?php
/**
 * Created by PhpStorm.
 * User: wanxiang
 * Date: 2018/9/28
 * Time: 13:35
 */

namespace Hi\Interfaces\Foundation;

use Hi\Interfaces\Container\Container as ContainerInterface;

interface Application extends ContainerInterface
{
    /**
     * @return string
     */
    public function version();

    /**
     * @return string
     */
    public function basePath();

    /**
     * 获取或检查当前应用环境
     * @return string
     */
    public function environment();

    /**
     * application 是否处于维护状态
     * @return bool
     */
    public function isDownForMaintenance();

    /**
     * 注册所有配置了的service 服务提供者
     * @return void
     */
    public function registerConfiguredProviders();

    /**
     * 注册服务
     * @param $provider
     * @param array $options
     * @param bool $force
     * @return mixed
     */
    public function register($provider, $options = [], $force = false);

    /**
     * 注册延迟服务
     * @param $provider
     * @param null $service
     * @return mixed
     */
    public function registerDeferredProvider($provider, $service = null);

    public function boot();

    public function booting($callback);

    public function booted($callback);

    public function getCachedServicesPath();
}