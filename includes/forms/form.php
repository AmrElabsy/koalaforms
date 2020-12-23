<?php

	require_once ("config.php");

	class Form
	{
		private $id;
		private $cssClass = "";
		private $accept_charset;
		private $legend;
		private $action;
		private $autocomlete;
		private $encrypt;
		private $novalidate;
		private $method = "POST";
		private $name;
		private $inputs = [];

		/**
		 * Form constructor.
		 * @param array $config
		 */
		public function __construct( array $attributes = [] ) {
			$attributes = [
				"cssClass" => "class",
				"metHOD" => "post"
			];
			foreach ( $attributes as $key => $value ) {
				if ( !in_array( $key, $this->getRestrictedAttributes() ) ) {
					if ( property_exists( $this, mb_strtolower( $key ) ) ) {
						$key = mb_strtolower( $key );
						$this->$key = $value;
					}
				} else {
					switch ( $key ) {
						case "cssClass":
							$this->cssClass = $value;
							break;

						// TODO: Make this Case out of the "else" block;
						case "accept_charset":
							$this->accept_charset = $value;
							break;
					}
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
		 * @param mixed $accept_charset
		 */
		public function setAcceptCharset( $accept_charset ) {
			$this->accept_charset = $accept_charset;
		}

		/**
		 * @return mixed
		 */
		public function getAcceptCharset() {
			return $this->accept_charset;
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
		public function setNovalidate( $novalidate ) {
			$this->novalidate = $novalidate;
		}

		/**
		 * @return mixed
		 */
		public function getNovalidate() {
			return $this->novalidate;
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
			$openTag = "<form " . $this->getAttributes() . ">";

			echo $openTag;
		}

		/**
		 * @return string
		 */
		private function getAttributes() {
			$attributes = get_object_vars( $this );
			$restrictedAttributes = $this->getRestrictedAttributes();
			$tempAttributes = "";
			foreach ( $attributes as $key => $value ) {
				if ( $value !== NULL && $key !== "inputs" ) {
					if ( !in_array( $key, $restrictedAttributes ) ) {
						$tempAttributes .= $key . "='"  . $value . "'";
					} else {
						switch ( $key ) {
							case "cssClass":
								$tempAttributes .=  "class='" . $this->getCssClass() . "'";
								break;

							case "accept_charset":
								$tempAttributes .=  "accept-charset='" . $this->accept_charset . "'";
								break;
						}

					}
				}
			}
			return $tempAttributes;
		}

		/**
		 * @return string[]
		 */
		private function getRestrictedAttributes() {
			return [ "cssClass", "noValidateInFront", "accept_charset" ];
		}

		/**
		 *
		 */
		private function renderClosingTag() {
			echo "</form>";
		}
	}