<?php

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;

// Provides "hello world" block

// @Block(
//     id = "hello_world_block",
//     admin_label = @Translation("Hello-World-Block"),
//     category = @Translation("hello world block example")
// )

class HelloWorldBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */

    public function build() {
        return [
            '#type' => 'markup',
            '#markup' => 'This is a Hello World custom block!.',
        ];
    }
}