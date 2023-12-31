<?php
use Drupal\node\Entity\Node;


function delete_nodes_example($nids, &$context){
    $message = 'Deleting ALL Nodes ...';
    $results = array();
    foreach ($nids as $nid) {
        $node = Node::load($nid);
        $results[] = $node->delete();
    }
    $context['message'] = $message;
    $context['results'] = $results;
}

function delete_nodes_finished($success, $results, $operations) {
    
    if ($success) {
        $message = \Drupal::translation()->formatPlural(
            count($results),
            'One post processed.', '@count posts processed.'
        );
    }
    else {
        $message = t('Finished with an error.');
    }
    \Drupal::messenger()->addStatus($message);
}