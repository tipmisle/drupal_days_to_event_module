<?php
/**
 * @file
 * Contains \Drupal\days_to_event_module\Plugin\Block\DaysRemainingBlock
 */
 
namespace Drupal\days_to_event_module\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
/**
 * Provides a 'DaysRemaining' Block
 *
 * @Block(
 *   id = "days_remaining_block",
 *   admin_label = @Translation("Days Remaining Block"),
 * )
 */
class DaysRemainingBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
	public function build() {
		// get our node
	    $node = \Drupal::routeMatch()->getParameter('node');
	    // get our service
	    $daysRemainingservice = \Drupal::service('days_to_event_module.days_remaining');

	    // set our text var to return value of our function
	    $text = $daysRemainingservice->DaysRemaining($node->field_event_date->value);

		return array(
			'#markup' => $text,
			'#cache' => array( // Set block to non caching value
				'max-age' => 0,
			),
		);
	}
 
}