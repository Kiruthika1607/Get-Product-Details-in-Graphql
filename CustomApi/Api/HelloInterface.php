<?php

namespace Training\CustomApi\Api;

interface HelloInterface
{
    /**
     * =
     *
     * @api
     * @param string $name
     * @return string
     */
    public function name($name);
}
