<?php

	require_once ("config.php");

	class Form
	{
		private $id;
		private $cssClass = "";
		private $acceptCharset;
		private $legend;
		private $action;
		private $autocomlete;
		private $encrypt;
		private $noValidate;
		private $method = "POST";
		private $name;
		private $inputs = [];

		/**
		 * Form constructor.
		 * @param array $config
		 */
		public function __construct( array $attributes = [] ) {
			foreach ( $attributes as $key => $value ) {
				if ( property_exists( $this, Helper::getAttributeWithCamelCase( $key ) ) ) {
					$key = Helper::getAttributeWithCamelCase( $key );
					$this->$key = $value;
				}
			}
		}


		/**
		 * @param mixed $action
		 */
		public function setAction( $action ) {
			$this->action = $action;
		}

		/**
		 * @return mixed
		 */
		public function getAction() {
			return $this->action;
		}

		/**
		 * @param $class
		 */
		public function addCssClass( $class ) {
			$this->cssClass .=  " " . $class;
		}

		/**
		 * @return array|mixed
		 */
		public function getCssClass() {
			return trim( $this->cssClass );
		}

		/**
		 * @param mixed $id
		 */
		public function setId( $id ) {
			$this->id = $id;
		}

		/**
		 * @return mixed
		 */
		public function getId() {
			return $this->id;
		}

		/**
		 * @param mixed $legend
		 */
		public function setLegend( $legend ) {
			$this->legend = $legend;
		}

		/**
		 * @return mixed
		 */
		public function getLegend() {
			return $this->legend;
		}

		/**
		 * @param mixed $method
		 */
		public function setMethod( $method ) {
			$this->method = $method;
		}

		/**
		 * @return mixed
		 */
		public function getMethod() {
			return $this->method;
		}

		/**
		 * @param mixed $name
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
		 * @param mixed $acceptCharset
		 */
		public function setAcceptCharset( $acceptCharset ) {
			$this->acceptCharset = $acceptCharset;
		}

		/**
		 * @return mixed
		 */
		public function getAcceptCharset() {
			return $this->acceptCharset;
		}

		/**
		 * @param mixed $autocomlete
		 */
		public function setAutocomlete( $autocomlete ) {
			$this->autocomlete = $autocomlete;
		}

		/**
		 * @return mixed
		 */
		public function getAutocomlete() {
			return $this->autocomlete;
		}

		/**
		 * @param mixed $encrypt
		 */
		public function setEncrypt( $encrypt ) {
			$this->encrypt = $encrypt;
		}

		/**
		 * @return mixed
		 */
		public function getEncrypt() {
			return $this->encrypt;
		}

		/**
		 * @param mixed $novalidate
		 */
		public function setNoValidate( $noValidate ) {
			$this->noValidate = $noValidate;
		}

		/**
		 * @return mixed
		 */
		public function getNovalidate() {
			return $this->noValidate;
		}

		/**
		 * @param form_input $input
		 */
		public function addInput(form_input $input) {
			$this->inputs[] = $input;
		}

		/**
		 * @param array $inputs
		 */
		public function addInputs( array $inputs ) {
			foreach ( $inputs as $input ) {
				$this->addInput( $input );
			}
		}

		/**
		 *
		 */
		public function renderForm() {
			$this->renderOpenTag();

			foreach ( $this->inputs as $input ) {
				$input->renderDiv();
			}

			$this->renderClosingTag();
		}

		/**
		 *
		 */
		private function renderOpenTag() {
			$openTag = "<form " . $this->getHtmlAttributes() . ">";

			echo $openTag;
		}

		/**
		 * @return string
		 */
		private function getHtmlAttributes() {
			$attributes = get_object_vars($this);
			$htmlAttributes = "";
			foreach ( $attributes as $key => $value ) {
				if ( $value !== NULL && !in_array($key, Helper::getAttributesNotInHtml()) ) {
					$htmlAttributes .= Helper::getHtmlAttributeName($key) . "='" . $value . "'";
				}
			}
			return $htmlAttributes;
		}

		/**
		 *
		 */
		private function renderClosingTag() {
			echo "</form>";
		}
	}