<?php

	Abstract class form_input
	{
		private $id;
		private $group;
		private $formId;
		private $type;
		private $style;
		private $name;
		private $value;
		private $disabled;
		private $autoFocus;
		private $label;

		public function __construct( array $attributes = [] ) {
			foreach ( $attributes as $key => $value ) {
				if ( property_exists( $this, Helper::getAttributeWithCamelCase( $key ) ) ) {
					$key = Helper::getAttributeWithCamelCase( $key );
					$this->$key = $value;
				}
			}
		}

		public function setId( $id ) {
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function setGroup( $group ) {
			$this->group = $group;
		}

		public function getGroup() {
			return $this->group;
		}

		public function setFormId( $formId ) {
			$this->formId = $formId;
		}

		public function getFormId() {
			return $this->formId;
		}

		public function getType() {
			return $this->type;
		}

		protected function setType( $type ) {
			$this->type = $type;
		}

		public function setStyle( $style ) {
			$this->style = $style;
		}

		public function getStyle() {
			return $this->style;
		}

		public function setName( $name ) {
			$this->name = $name;
		}

		public function getName() {
			return $this->name;
		}

		public function setValue( $value ) {
			$this->value = $value;
		}

		public function getValue() {
			return $this->value;
		}

		public function setDisabled( $disabled = true ) {
			$this->disabled = $disabled;
		}

		public function getDisabled() {
			return $this->disabled;
		}

		public function setAutoFocus( $autoFocus = true ) {
			$this->autoFocus = $autoFocus;
		}

		public function getAutoFocus() {
			return $this->autoFocus;
		}

		public function setLabel( $label ) {
			$this->label = $label;
		}

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
				if ( $value !== NULL && !in_array($key, Helper::getAttributesNotInHtml()) && $value != false) {
					$htmlAttributes .= Helper::getHtmlAttributeName($key) . "='" . $value . "' ";
				}
			}
			return $htmlAttributes;
		}
	}
