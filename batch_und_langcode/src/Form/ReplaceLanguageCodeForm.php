<?php

namespace Drupal\batch_und_langcode\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ReplaceLanguageCodeForm extends FormBase {
    public function getFormId() {
        return 'replace_langcode_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['replace_language'] = [
            '#type' => 'submit',
            '#value' => $this->t('Replace Language code'),
        ];
        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        $query = \Drupal::entityTypeManager()->getStorage('node')->getQuery();
        $query->condition('langcode', 'und', '=');
        $nids = $query->range(0,150)->execute();

        $batch = [
            'title' => t('Replacing Language Code...'),
            'operations' => [],
            'finished' => '\Drupal\batch_und_langcode\ReplaceLanguageCode::replaceLangcodeFinishedCallback',
        ];
        foreach($nids as $nid) {
            $batch['operations'][] = ['\Drupal\batch_und_langcode\ReplaceLanguageCode::replaceLangcode', [$nid]];
        }
        batch_set($batch);
    }
}