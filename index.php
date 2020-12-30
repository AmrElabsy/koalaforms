<?php

include "includes/forms/form.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	echo "request is post";
}
$form = new Form([
	"meTHod" => "post",
	"action" => "index.php",
    "cssClass" => "classTest"
]);


$form->addCssClass("class1 class2");
$form->addCssClass("class3 class4");

$firstCheckBox = new checkbox();
$firstCheckBox->check();
$firstCheckBox->uncheck();
$firstCheckBox->setId("myCheckBox");
$firstCheckBox->setLabel("My Label");

$secondCheckBox = new checkbox([ "id" => "myID", "label" => "SecondLabel"]);

$checkBoxes = new checkboxes();
$checkBoxes->addCheckbox($firstCheckBox);
$checkBoxes->addCheckbox($secondCheckBox);

$checkBoxes->setName("test");

$radio = new radiobutton();
$radio->setId("rb");
$radio->setLabel("My Label for Radio");




$form->addInput( $checkBoxes );
$form->addInput($radio);
$form->addInputs( [ new text(), new text() ] );
$form->addInput( new submit() );

?>
<html>
<body>
<?php $form->renderForm(); ?>
</body>
</html>
