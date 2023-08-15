<?php

use Drupal\node\Entity\NodeType;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;

function landingpage_install() {
  $node_types = NodeType::loadMultiple();
  $node_ids = [];
  foreach ($node_type as $node){
        $node_ids[] = $node->id();
  }

  $type = 'landing_page';
  $name = 'Landing Page';
  if (in_array($type, $node_ids)) {
    return;
  } else {
    $description = 'A custom content type created programmatically.';
    $node_type = NodeType::create([
      'type' => $type,
      'name' => $name,
      'description' => $description,
    ]);
    $node_type->save();

    $storage = FieldStorageCnfig::create([
      'fields_name' => 'custom_field1',
      'entity_type' => 'node',
      'type' => 'text',
      'cardinality' => 1,
      'translatable' => TRUE,
      'locked' => FALSE,
    ]);
    $storage->save();

    $field_name = 'custom_field1';
    $field_label = 'Custom Field 1';
    $field = FieldConfig::create([
      'field_name' => $field_name,
      'entity_type' => 'node',
      'bundle' => $type,
      'label' => $field_label,
      'required' => TRUE,
      'settings' => [
        'max_langth' => 255,
      ],
      'field_type' => 'text',
    ]);
    $field->save();

    $storage = FieldStorageConfig::create([
      'field_name' => 'custom_field2',
      'entity_type' => 'node',
      'type' => 'text',
      'cardinality' => 1,
      'translatable' => TRUE,
      'locked' => FALSE,
    ]);
    $storage->save();

    $field_name = 'custom_field2';
    $field_label = 'Custom Field 2';
    $field = FieldConfig::create([
      'field_name' => $field_name,
      'entity_type' => 'node',
      'bundle' => $type,
      'label' => $field_label,
      'required' => FALSE,
      'field_type' => 'text',
    ]);
    $field->save();
  }
}