<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Component\Serialization\Json;

class APIController extends ControllerBase {
    public function getFact() {
        $client = \Drupal::httpClient();
        $request = $client->get(
            "https://catfact.ninja/fact"
        );
       
        $response = json_decode($request->getBody(), true);

        return new JsonResponse($response);
    }

    public function restPostApi() {
        $client = \Drupal::httpClient();
        $request = $client->post(
            "https://gorest.co.in/public/v2/graphql", [
                "query" => [
                    'query' => 'query{user(id: 2326) { id name email gender status }}',
                ],
                "headers" => [
                    'Content-type' => 'application/json',
                    'cache-control' => 'no-cache'
                ],
            ]
        );
        $response = json_decode($request->getBody(), true);

        return new JsonResponse($response);
    }

   
}