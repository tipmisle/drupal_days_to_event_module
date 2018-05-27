<?php
/**
 * @file
 * Contains \Drupal\days_to_event_module\Controller\DaysToEventController.
 */
 
namespace Drupal\days_to_event_module\Controller;
 
use Drupal\Core\Controller\ControllerBase;
 
class DaysToEventController extends ControllerBase {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello world'),
    );
  }
}