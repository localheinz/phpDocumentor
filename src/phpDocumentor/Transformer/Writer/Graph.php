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

namespace phpDocumentor\Transformer\Writer;

use phpDocumentor\Descriptor\ProjectDescriptor;
use phpDocumentor\Transformer\Transformation;
use phpDocumentor\Transformer\Writer\Graph\GraphVizClassDiagram;
use const DIRECTORY_SEPARATOR;

/**
 * Writer responsible for generating various graphs.
 *
 * The Graph writer is capable of generating a Graph (as provided using the 'source' parameter) at the location provided
 * using the artifact parameter.
 *
 * Currently supported:
 *
 * * 'class' (default), a Class Diagram generated using GraphViz
 */
final class Graph extends WriterAbstract
{
    /** @var GraphVizClassDiagram */
    private $classDiagramGenerator;

    public function __construct(GraphVizClassDiagram $classDiagramGenerator)
    {
        $this->classDiagramGenerator = $classDiagramGenerator;
    }

    /**
     * Invokes the query method contained in this class.
     *
     * @param ProjectDescriptor $project Document containing the structure.
     * @param Transformation $transformation Transformation to execute.
     */
    public function transform(ProjectDescriptor $project, Transformation $transformation) : void
    {
        $filename = $this->getDestinationPath($transformation);

        switch ($transformation->getSource() ?: 'class') {
            case 'class':
            default:
                $this->classDiagramGenerator->create($project, $filename);
        }
    }

    private function getDestinationPath(Transformation $transformation) : string
    {
        return $transformation->getTransformer()->getTarget() . DIRECTORY_SEPARATOR . $transformation->getArtifact();
    }
}
