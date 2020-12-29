<?php

	Abstract class form_input
	{
		private $inputId;
		private $group;
		private $formId;
		private $type;
		private $style;
		private $name;
		private $value;
		private $disabled;
		private $autoFocus;
		private $label;

		/**
		 * @param $inputId
		 */
		public function setInputId( $inputId ) {
			$this->inputId = $inputId;
		}

		/**
		 * @return mixed
		 */
		public function getInputId() {
			return $this->inputId;
		}

		/**
		 * @param $group
		 */
		public function setGroup( $group ) {
			$this->group = $group;
		}

		/**
		 * @return mixed
		 */
		public function getGroup() {
			return $this->group;
		}

		/**
		 * @param $formId
		 */
		public function setFormId( $formId ) {
			$this->formId = $formId;
		}

		/**
		 * @return mixed
		 */
		public function getFormId() {
			return $this->formId;
		}

		/**
		 * @return mixed
		 */
		public function getType() {
			return $this->type;
		}

		/**
		 * @param $type
		 */
		protected function setType( $type ) {
			$this->type = $type;
		}

		/**
		 * @param $style
		 */
		public function setStyle( $style ) {
			$this->style = $style;
		}

		/**
		 * @return mixed
		 */
		public function getStyle() {
			return $this->style;
		}

		/**
		 * @param $name
		 */
		public function setName( $name ) {
			$this->name = $name;
		}

		/**
		 * @return mixed
		 */
		public function getName() {
			return $this->name;
		}

		/**
		 * @param $value
		 */
		public function setValue( $value ) {
			$this->value = $value;
		}

		/**
		 * @return mixed
		 */
		public function getValue() {
			return $this->value;
		}

		public function setDisabled( $disabled = true ) {
			$this->disabled = $disabled;
		}

		/**
		 * @return mixed
		 */
		public function getDisabled() {
			return $this->disabled;
		}

		/**
		 * @param bool $autoFocus
		 */
		public function setAutoFocus( $autoFocus = true ) {
			$this->autoFocus = $autoFocus;
		}

		/**
		 * @return mixed
		 */
		public function getAutoFocus() {
			return $this->autoFocus;
		}

		/**
		 * @param $label
		 */
		public function setLabel( $label ) {
			$this->label = $label;
		}

		/**
		 * @return mixed
		 */
		public function getLabel() {
			return $this->label;
		}

		protected function render() {
			echo "<input type='" . $this->getType() . "' " . $this->getHtmlAttributes() . ">";
		}

		public function setProperties() {
		}

		public function getProperty() {
		}

		public function getInput() {
		}

		public function setCss() {
		}

		public function createInput() {
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
