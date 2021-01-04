<?php

class time extends KTimes
{
    public function __construct( array $attributes = [] ) {
        parent::__construct( $attributes );
        $this->setType("time");
	}

    public function render() {
        parent::render();
	}
}