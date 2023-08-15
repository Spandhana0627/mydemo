<?php

namespace Drupal\batch_under_langcode;

class ReplaceLanguageCode {

    public static function replaceLangcode($nid, &$context){
        $message = 'Replacing langcode(und to de)...';
        $return = array();
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);
        $node->set('langcode', 'de');
        $results[] = $node->save();
        $context['message'] = $message;
        $context['results'][] = $nid;
    }

    function replaceLangcodeFinishedCallback($success, $results, $operations) {

        if ($success) {
            $message = \Drupal::translation()->formatePlural(
                count($results),
                'One post processed.', '@count posts processed.'
            );
        }
        else {
            $message = t('Finished with an error.');
        }
        \Drupal::messenger()->addMessage($message);
    }
}