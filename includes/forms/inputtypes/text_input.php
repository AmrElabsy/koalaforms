<?php

class text extends form_input
{
	public function __construct() {
		$this->setType("text");
	}

	protected function render() {
		echo "<input type='text'>";
	}


}