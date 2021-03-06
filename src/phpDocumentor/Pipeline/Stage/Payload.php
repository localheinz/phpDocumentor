<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link http://phpdoc.org
 */

namespace phpDocumentor\Pipeline\Stage;

use phpDocumentor\Descriptor\ProjectDescriptorBuilder;

class Payload
{
    /** @var array */
    private $config;

    /** @var ProjectDescriptorBuilder */
    private $builder;

    public function __construct(array $config, ProjectDescriptorBuilder $builder)
    {
        $this->config = $config;
        $this->builder = $builder;
    }

    public function getConfig() : array
    {
        return $this->config;
    }

    public function getBuilder() : ProjectDescriptorBuilder
    {
        return $this->builder;
    }
}
