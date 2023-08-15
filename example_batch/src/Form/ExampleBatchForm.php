<?php

namespace Drupal\example_batch\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ExampleBatchForm extends FormBase {
    public function getFormId() {
        return 'example_batch_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['delete_node'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Delete All Nodes'),
        );
        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        $nids = \Drupal::entityQuery('node')->execute();
        $operations = [
            ['delete_nodes_example', [$nids]],
        ];
        $batch = [
            'title' => $this->t('Deleting All Nodes ...'),
            'operations' => $operations,
            'finished' => 'delete_nodes_finished',
        ];
        batch_set($batch);
    }
}