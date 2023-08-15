<?php

namespace Drupal\example_module\Controller;

class ExampleModuleController {
    public function message() {
        return [
            '#markup' => 'Hello World message from custom module'
        ];
    }
}