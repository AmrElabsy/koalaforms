<?php

Abstract class KCheckables extends KInput
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