<?php
/*
JAXHelper - CakePHP Helper for Ajax with jQuery
Author: Tulio Faria (www.tuliofaria.net)
Requeriments:
- jquery: http://docs.jquery.com/Downloading_jQuery
- jform (for some features like observeForm): http://jquery.com/plugins/project/form
Using:
- include jquery.js and jquery.form.js in your view (yes, using plain html or html helper  )
- include the helper Jax in your controller
- call any of methods available: link, observeField and observeForm
*/
class JaxHelper extends Helper {
    var $helpers = array("Html");

    function link($text, $url, $target, $options = null, $loading = null){
        $aId = 'link' . intval(rand());
        $url = $this->Html->url($url);
        $att = " ";
        if (is_array($options)){
            foreach($options as $k=>$v){
                $att.=$k.'="'.$v.'" ';
            }
        }
        echo '<a id="\" href="http://www.tuliofaria.net/%5C%22$url%5C%22">$text</a>';
        echo $this->_jsBlock("\$(\"#$aId\").click( function(){  \$.post(\"$url\", function(data){
            \$(\"$target\").html(data); }); return false; }); ");
    }

    function observeField($element, $options){
        $event = $options["event"];
        $update = $options["update"];
        $url = $this->Html->url($options["url"]);
        $code = $options["loading"].'
            $.ajax({
                type: "POST",
                url: "'.$url.'",
                data: $("'.$element.'").serialize(),
                success: function(data){
                    $("'.$update.'").html(data);
                    '.$options["complete"].'
                }
            });
            ';
        return $this->_jsBlock($this->_addReady("\$(\"$element\").$event(function(){ $code })"));
    }

    function observeForm($element, $options){
        $event = $options["event"];
        $update = $options["update"];
        $url = $this->Html->url($options["url"]);
        $code = '$("'.$element.'").ajaxSubmit({
                target:		\''.$update.'\',
                beforeSubmit:  function(){'.$options["loading"].'},
                success:	   function(){'.$options["complete"].'}
            });';
        return $this->_jsBlock($this->_addReady("\$(\"$element\").$event(function(){ $code return false; })"));
    }

    function _jsBlock($content){
        return '<script type="\">$content</script>';
    }

    function _addReady($content){
        return "\$(function(){ $content } );";
    }

    function test(){
        echo $this->_jsBlock($this->_addReady("alert(\"Jax Helper has been installed and ready to use!\");"));
    }
}
?>
