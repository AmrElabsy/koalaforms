<?php

class checkbox extends form_input
{

	public function __construct() {
		$this->setType("checkbox");
	}

	protected function render() {
		echo "<input type='checkbox'>";
	}


}