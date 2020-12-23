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

$form->addInput( $firstCheckBox );
$form->addInputs( [ new text(), new text() ] );
$form->addInput( new submit() );

?>

<body>
<?php $form->renderForm(); ?>
</body>
