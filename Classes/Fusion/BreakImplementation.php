<?php
declare(strict_types=1);

namespace Netlogix\Fusion\Xdebug\Fusion;

use Neos\Fusion\FusionObjects\DataStructureImplementation;
use Neos\Flow\Annotations as Flow;

/**
 * @Flow\Proxy(false)
 */
class BreakImplementation extends DataStructureImplementation
{
    public function evaluate()
    {
        $context = $this->runtime->getCurrentContext();
        $data = parent::evaluate();

        xdebug_break();

        $glue = $this->getGlue();

        return $glue !== null ? join($glue, $data) : $data;
    }

    public function getGlue(): ?string
    {
        return $this->fusionValue('__meta/glue') ?? '';
    }

}
