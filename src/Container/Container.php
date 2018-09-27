<?php
/**
 * 容器接口
 * Created by PhpStorm.
 * User: wanxiang
 * Date: 2018/9/27
 * Time: 14:19
 */

namespace Hi\Interfaces\Container;

use Closure;

interface Container
{
    /**
     * 确定给定的抽象类型是否已被绑定。
     *
     * @param  string $abstract
     * @return bool
     */
    public function bound($abstract);

    /**
     * 定义alias
     *
     * @param  string $abstract
     * @param  string $alias
     * @return void
     */
    public function alias($abstract, $alias);

    /**
     * Assign a set of tags to a given binding.
     *
     * @param  array|string $abstracts
     * @param  array|mixed ...$tags
     * @return void
     */
    public function tag($abstracts, $tags);

    /**
     * Resolve all of the bindings for a given tag.
     *
     * @param  array $tag
     * @return array
     */
    public function tagged($tag);

    /**
     * Register a binding with the container.
     *
     * @param  string|array $abstract
     * @param  \Closure|string|null $concrete
     * @param  bool $shared
     * @return void
     */
    public function bind($abstract, $concrete = null, $shared = false);

    /**
     * Register a binding if it hasn't already been registered.
     *
     * @param  string $abstract
     * @param  \Closure|string|null $concrete
     * @param  bool $shared
     * @return void
     */
    public function bindIf($abstract, $concrete = null, $shared = false);

    /**
     * 注册一个单例
     *
     * @param  string|array $abstract
     * @param  \Closure|string|null $concrete
     * @return void
     */
    public function singleton($abstract, $concrete = null);

    /**
     * 注册扩展
     *
     * @param  string $abstract
     * @param  \Closure $closure
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function extend($abstract, Closure $closure);

    /**
     * 将现有实例注册到容器中
     *
     * @param  string $abstract
     * @param  mixed $instance
     * @return void
     */
    public function instance($abstract, $instance);

    /**
     * 定义上下文绑定.
     *
     * @param  string $concrete
     * @return \Illuminate\Contracts\Container\ContextualBindingBuilder
     */
    public function when($concrete);

    /**
     * Get a closure to resolve the given type from the container.
     *
     * @param  string $abstract
     * @return \Closure
     */
    public function factory($abstract);

    /**
     * 从容器中解析给定类型
     *
     * @param  string $abstract
     * @return mixed
     */
    public function make($abstract);

    /**
     * Call the given Closure / class@method and inject its dependencies.
     *
     * @param  callable|string $callback
     * @param  array $parameters
     * @param  string|null $defaultMethod
     * @return mixed
     */
    public function call($callback, array $parameters = [], $defaultMethod = null);

    /**
     * 判断是否被实例化过
     * @param $abstract
     * @return bool
     * @throws \Exception
     */
    public function resolved($abstract);

    /**
     * Register a new resolving callback.
     *
     * @param  string $abstract
     * @param  \Closure|null $callback
     * @return void
     */
    public function resolving($abstract, Closure $callback = null);

    /**
     * Register a new after resolving callback.
     *
     * @param  string $abstract
     * @param  \Closure|null $callback
     * @return void
     */
    public function afterResolving($abstract, Closure $callback = null);
}