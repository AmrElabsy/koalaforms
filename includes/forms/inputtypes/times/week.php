<?php

class week extends KTimes
{
    public function __construct( array $attributes = [] ) {
        parent::__construct( $attributes );
        $this->setType("week");
	}

    public function render() {
        parent::render();
	}
}