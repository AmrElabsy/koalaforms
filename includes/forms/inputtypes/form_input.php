<?php

	Abstract class form_input
	{
		private $type;

		/**
		 * @return mixed
		 */
		public function getType() {
			return $this->type;
		}

		protected function setType($type) {
			$this->type = $type;
		}

		abstract protected function render();

		public function renderDiv() {
			$this->renderOpenTag();
			$this->render();
			$this->renderCloseTag();
		}

		protected function renderOpenTag() {
			echo "<div>";
		}

		protected function renderCloseTag() {
			echo "</div>";
		}
	}