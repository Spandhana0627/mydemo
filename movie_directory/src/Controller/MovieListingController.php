<?php
namespace Drupal\movie_directory\Controller;

use Drupal\Core\Controller\ControllerBase;

class MovieListingController extends ControllerBase  {
      
    public function view() {
       $content = [];

       $content['name'] = 'My name is Ben';

       return [
         '#theme' => 'movie-listing',
         '#content' => $content,

       ];
      // return $content;

      // $content = array('#markup'=>'My name is Ben');
      // return $content;


    }
}
?>


