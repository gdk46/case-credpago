<?php


class Sanitize
{
    
    /**
     * sanitaliza um array POST
     *
     * @param array $Dados
     * @return array
     */
    public static function clean(array $Dados)
    {
		$Dados 	            = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		$stripTags    	    = array_map('strip_tags', $Dados);//função limpar inputs
		$sanitize_filt_post = array_map('trim', $stripTags);//função trim tirar o whitespaces
        
        return $sanitize_filt_post;
    }
}