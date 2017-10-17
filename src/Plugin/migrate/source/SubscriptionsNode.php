<?php

namespace Drupal\migrate_28688\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Source plugin for beer content.
 *
 * @MigrateSource(
 *   id = "subscriptions_node"
 * )
 */
class SubscriptionsNode extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $nids = [332, 337, 338, 339, 340, 341, 342, 364];
    $query = $this->select('node', 's')
      ->fields('s', ['nid', 'title'])
      ->condition('type', 'subscriptions')
      ->condition('nid', $nids, 'IN');
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'nid' => $this->t('Node ID'),
      'title' => $this->t('Title of node'),
    ];

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'nid' => [
        'type' => 'integer',
        'alias' => 's',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    return parent::prepareRow($row);
  }

}
