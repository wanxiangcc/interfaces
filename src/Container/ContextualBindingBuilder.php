<?php
/**
 * Created by PhpStorm.
 * User: wanxiang
 * Date: 2018/9/27
 * Time: 14:25
 */

namespace Hi\Interfaces\Container;


interface ContextualBindingBuilder
{
    /**
     * Define the abstract target that depends on the context.
     *
     * @param  string $abstract
     * @return $this
     */
    public function needs($abstract);

    /**
     * Define the implementation for the contextual binding.
     *
     * @param  \Closure|string $implementation
     * @return void
     */
    public function give($implementation);
}