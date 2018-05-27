<?php
/**
* @file providing the service that say hello world and hello 'given name'.
*
*/
namespace Drupal\days_to_event_module;
class DaysRemaining {
	protected $default_message;
	public function __construct() {
		$this->default_message = "Could not retrieve event date.";
	}

	public function DaysRemaining($event_date){
		if (empty($event_date)) {
			return $this->default_message;
		}
		else {
			$days = floor((strtotime($event_date) - time())/60/60/24);
			if ($days < -1) { // check if calculated days go to lower than -1 (this means event has ended)
				$text = "The event is ended.";
			} else if ($days == -1) { // our calculation does not take event day in to the account so present day presents remaining days value as -1 
				$text = "The event is in progress.";
			} else if ($days == 0) { // if event is taking place tomorrow
				$text = "Event is taking place tomorrow.";
			} else if ($days > 0) { // if remaining days var is larger than 0, print it in combination with suitable string
				$text = "Remaining days to event: ".$days;
			}
			return $text;
		}
	}
}