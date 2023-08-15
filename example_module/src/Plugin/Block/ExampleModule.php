<?php

namespace Drupal\example_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\example_module\Controller\ExampleAPIController;

/**
 * Provides a block with simple text.
 * 
 * @Block(
 *    id = "example_module_block",
 *    admin_label = @Translation("Example Module Simple Text Block")
 * )
 */
class ExampleModule extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build() {
        $catFactObj = new ExampleAPIController;
        $factData = $catFactObj->getFact();
        return [
            '#type' => 'markup',
            '#markup' => $factData,
        ];
    }
}