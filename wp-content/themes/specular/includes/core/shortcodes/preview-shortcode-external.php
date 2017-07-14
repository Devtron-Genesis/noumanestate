<?php 

$full_path = __FILE__;
$path = explode( 'wp-content', $full_path );
require_once( $path[0] . '/wp-load.php' );

$shortcode_css = CODELESS_BASE_URL.'css/bootstrap.css';


if(!current_user_can('edit_files')) die("");



?>

<html>

<head>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo CODELESS_BASE_URL.'js/bootstrap.js'; ?>"></script>

<link rel="stylesheet" href="<?php echo $shortcode_css; ?>">
<link rel="stylesheet" href="<?php echo CODELESS_BASE_URL.'style.css' ?>">
</head>
<body class='shortcode_prev'>

<?php

$shortcode = isset($_REQUEST['shortcode']) ? $_REQUEST['shortcode'] : '';


$shortcode = stripslashes($shortcode);

echo do_shortcode($shortcode);

?>
<script type="text/javascript">

    jQuery('#scn-preview h3:first', window.parent.document).removeClass('scn-loading');

</script>
</body>
</html>
