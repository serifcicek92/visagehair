<?php
namespace App\System;
use Attribute;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_METHOD)]
class Route{
    public function __construct(public string $routePath,public string $method = 'get') {
        
    }
}