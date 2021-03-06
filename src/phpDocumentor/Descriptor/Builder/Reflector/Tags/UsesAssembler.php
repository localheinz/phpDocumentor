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

namespace phpDocumentor\Descriptor\Builder\Reflector\Tags;

use phpDocumentor\Descriptor\Builder\Reflector\AssemblerAbstract;
use phpDocumentor\Descriptor\Tag\UsesDescriptor;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UsesAssembler extends AssemblerAbstract
{
    /**
     * Creates a new Descriptor from the given Reflector.
     *
     * @param Uses $data
     */
    public function create($data) : UsesDescriptor
    {
        $descriptor = new UsesDescriptor($data->getName());
        $descriptor->setDescription((string) $data->getDescription());
        $reference = $data->getReference();

        $descriptor->setReference($reference);

        return $descriptor;
    }
}
