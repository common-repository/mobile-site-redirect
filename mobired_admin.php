<?php 
    if($_POST['mobired_hidden'] == 'Y') {
        //Form data sent
		$mobilesite = $_POST['mobired_mobilesite'];
		$isphone = $_POST['mobired_isphone'];
		$istablet = $_POST['mobired_istablet'];
		
        update_option('mobired_mobilesite', $mobilesite);
		update_option('mobired_isphone', $isphone);
		update_option('mobired_istablet', $istablet);
		?>
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
    } else {
        //Normal page display
		$mobilesite = get_option('mobired_mobilesite');
		$isphone = get_option('mobired_isphone');
		$istablet = get_option('mobired_istablet');
    }
?>

<div class="wrap">
    <?php    echo "<h2>" . __( 'Mobile Site Redirect Settings', 'mobired_trdom' ) . "</h2>"; ?>
     
    <form name="mobired_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="mobired_hidden" value="Y">
        <p><?php _e("Mobile Site URL: " ); ?><input type="text" name="mobired_mobilesite" value="<?php echo $mobilesite; ?>" size="20"><?php _e(" http://m.example.com/" ); ?> (must include trailing slash ('/')</p>
	<p><?php _e("Redirect Mobile Devices: " ); ?><input type="checkbox" name="mobired_isphone" value="yes" <?php if($isphone == 'yes')echo "checked";?>></p>
	<p><?php _e("Redirect Tablets: " ); ?><input type="checkbox" name="mobired_istablet" value="yes" <?php if($istablet == 'yes')echo "checked";?>></p>
         
     
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Update Settings', 'mobired_trdom' ) ?>" />
        </p>
    </form>
</div>