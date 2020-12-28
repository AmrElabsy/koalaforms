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

		protected function render() {
			echo "<input type='". $this->getType() ."' " . $this->getHtmlAttributes() . ">";
		}

		public function renderDiv() {
			$this->renderOpenTag();
			$this->render();
			$this->renderCloseTag();
		}

		protected function renderOpenTag() {
			echo "<div>\n";
		}

		protected function renderCloseTag() {
			echo "</div>\n";
		}

		protected function getHtmlAttributes() {
			$attributes = get_object_vars($this);
			$htmlAttributes = "";
			foreach ( $attributes as $key => $value ) {
				if ( $value !== NULL && !in_array($key, Helper::getAttributesNotInHtml()) ) {
					$htmlAttributes .= Helper::getHtmlAttributeName($key) . "='" . $value . "'";
				}
			}
			return $htmlAttributes;

		}
	}