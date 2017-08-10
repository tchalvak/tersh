<html>
<head>
<title>Insert shortcode</title>
<link href="<?php echo SC_ADMIN_URL; ?>css/style-insert.css<?php echo '?ver=' . SC_VERSION; ?>" media="all" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="<?php echo SC_ADMIN_URL; ?>js/script-insert.js<?php echo '?ver=' . SC_VERSION; ?>"></script>
</head>
<body>

<h2 class="sc_head">Insert shortcode to editor
<span class="sc_menu">
<a href="#" class="button sort_btn">Sort list</a>
<a href="<?php echo admin_url( 'options-general.php?page=shortcoder&action=new' ); ?>" target="_blank" class="button new_btn">Create new shortcode</a>
</span>
</h2>

<div class="sc_wrap">
<?php

$shortcodes = Shortcoder::list_all();

if( empty( $shortcodes ) ){
    echo '<p align="center">No shortcodes are created, go ahead create one in <a href="' . admin_url( 'options-general.php?page=shortcoder' ) . '" target="_blank">shortcoder admin page</a>.</p>';
}else{

    foreach( $shortcodes as $key=>$value ){
        if($key != '_version_fix'){
            
            $name = esc_attr( $key );
            $value = wp_parse_args( $value, Shortcoder::defaults() );
            $disabled_text = ( $value[ 'disabled' ] == '1' ) ? '<small class="disabled_text">Temporarily disabled</small>' : '';
            $options = '<span class="sc_options"><button class="button sc_quick_insert">Quick insert</button> <a href="' . esc_attr( admin_url( 'options-general.php?page=shortcoder&action=edit&name=' . $name ) ) . '" target="_blank" class="button">Edit</a></span>';
            
            echo '<div class="sc_shortcode" data-name="' . $name . '">';
            echo '<div class="sc_shortcode_name">' . $name . $disabled_text . $options . '</div>';
            preg_match_all('/%%[^%\s]+%%/', $value['content'], $matches );
            
            echo '<div class="sc_params">';
            if(!empty($matches[0])){
                echo '<h4>Available parameters: </h4>';
                $temp = array();
                foreach($matches[0] as $k=>$v){
                    $cleaned = str_replace('%', '', $v);
                    if(!in_array($cleaned, $temp)){
                        array_push($temp, $cleaned);
                        echo '<label>' . $cleaned . ': <input type="text" data-param="' . $cleaned . '"/></label> ';
                    }
                }
                echo'<hr/>';
            }else{
                echo 'No parameters available - ';
            }
            echo '<input type="button" class="sc_insert button button-primary" value="Insert Shortcode"/>';
            echo '</div>';
            echo '</div>';
        }
    }
    
}
?>
</div>

<footer class="coffee_box">
    <div class="coffee_amt_wrap">
    <p><select class="coffee_amt">
    <option value="2">$2</option>
    <option value="3">$3</option>
    <option value="4">$4</option>
    <option value="5" selected="selected">$5</option>
    <option value="6">$6</option>
    <option value="7">$7</option>
    <option value="8">$8</option>
    <option value="9">$9</option>
    <option value="10">$10</option>
    <option value="11">$11</option>
    <option value="12">$12</option>
    <option value="">Custom</option>
    </select></p>
    <a class="button button-primary buy_coffee_btn" href="https://www.paypal.me/vaakash/5" data-link="https://www.paypal.me/vaakash/" target="_blank">Buy me a coffee !</a>
    </div>
    <h3>Buy me a coffee !</h3>
    <p>Thank you for using Shortcoder. If you found the plugin useful buy me a coffee ! Your donation will motivate and make me happy for all the efforts. You can donate via PayPal.</p>
</footer>

</body>
</html>