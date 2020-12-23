<?php

class submit extends form_input
{
	public function __construct() {
		$this->setType("submit");
	}

	function render() {
		echo "<input type='submit'>";
	}
}