<?php

class radiobutton extends KCheckables
{
	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
		$this->setType("radio");
	}

	/**
	 * Override the Parent Render function
	 * to write the labeb "After" the input
	 */
	public function render() {
		parent::render();
		if ( !empty( $this->getLabel() ) ) {
			echo "<label for='" . $this->getId() . "'>" . $this->getLabel() . "</label>";
		}
	}
}