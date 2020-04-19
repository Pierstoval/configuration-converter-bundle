<?php

declare(strict_types=1);

namespace ConfigurationConverter\Routing;

use ConfigurationConverter\Routing\Loader\ResourceImports;

interface RoutingConverterInterface
{
    public function supports(string $outputFormat): bool;

    public function convert(ResourceImports $imports): string;
}
