<?php

namespace Drupal\example_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Component\Serialization\Json;

class ExampleAPIController extends ControllerBase {
    public function getFact() {
        $client = \Drupal::httpClient();
        $request = $client->get(
            "https://catfact.ninja/fact"
        );
       
        $response = json_decode($request->getBody(), true);

        return new JsonResponse($response);
    }
   
}