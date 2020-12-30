<?php

Abstract class checkable_inputs extends form_input
{
	protected $checked;

	public function isChecked() {
		return $this->checked;
	}

	public function check() {
		$this->checked = true;
	}

	public function uncheck() {
		$this->checked = false;
	}


}