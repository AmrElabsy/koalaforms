<?php

class checkbox extends checkable_inputs
{

	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
		$this->setType("checkbox");
	}

	public function render($class = self::class) {
		parent::render();
		if ( !empty( $this->getLabel() ) ) {
			echo "<label for='" . $this->getId() . "'>" . $this->getLabel() . "</label>";
		}
	}
}