<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/21/2017
 * Time: 2:17 AM
 */

if ( ! function_exists('btn_edit')){
    function btn_edit($uri, $extra = '')
    {
        return anchor($uri, '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', $extra);
    }
}

if ( ! function_exists('btn_delete')) {
    function btn_delete($uri, $extra = '')
    {
        $extra .= " onclick = oCrud.deleteFromDB('$uri')";
        return button('<i class="fa fa-times" aria-hidden="true"></i>', $extra);
    }
}

if ( ! function_exists('icon'))
{
    function icon($attributes = '')
    {
        if ($attributes !== '')
        {
            $attributes = _stringify_attributes($attributes);
        }

        if (is_array($attributes)){

            $attributes = _attributes_to_string($attributes);
        }

        $tag = isset($attributes['tag'])?$attributes['tag']:'i';

        $title = isset($attributes['title'])?$attributes['title']:'';

        return '<'.$tag.' '.$attributes.'> '.$title.'</'.$tag.'>';
    }
}



if (!function_exists('is_like')) {

    function is_like($var, $value) {

        if(is_string($var) && is_string($value)){

            if($var == strtoupper($value) || $var == ucfirst($value) || strtolower($value)){

                return true;
            }
        }

        return false;
    }
}
if (!function_exists('validate_modulo')) {

    function validate_modulo($mod,$subMod){

        $CI = CI_Controller::get_instance();
        $sys = config_item('sys');
        $DIRS = config_item('dirs');
        $mod_type = $sys[$mod];
        if($CI->db->table_exists("$mod_type"."_$subMod")){
            $framePath = getframePath($mod_type,$subMod);
            if(is_dir($framePath)){
                if(file_exists($framePath.'Ctrl_'.ucfirst($subMod).'.php') ||
                    file_exists($framePath.'Model_'.ucfirst($subMod).'.php') ||
                    is_dir($framePath.'views/')){
                    return true;
                }
            }
            return false;
        }
        return false;
    }
}


    if (!function_exists('getModSubMod')) {
        function getModSubMod($table)
        {
            if (substr_count($table, '_') == 1) {
                return explode('_', $table);
            } else {
                $parts = explode('_', $table);
                $mod = $parts[0];
                unset($parts[0]);
                return [$mod, implode('_', $parts)];
            }
        }
    }

    if (!function_exists('setTitleFromWordWithDashes')) {
        function setTitleFromWordWithDashes($name, $bUcFirst = false)
        {
            $sign = strpos($name,'_') > -1 ? '_' : (strpos($name,'-') > -1 ? '-' : '');
            if($sign == ''){
                return ucfirst($name);
            } else {
                $words = explode($sign, $name);
                if($bUcFirst){
                    $funct = function($key){
                        return ucfirst($key);
                    };
                    $words = array_map($funct,$words);
                }
                return $title = implode(' ', $words);
            }
        }
    }
//    if (!function_exists('setObjectFromWordWithDashes')) {
//        function setObjectFromWordWithDashes($name)
//        {
//            $sign = strpos($name,'_') > -1 ? '_' : (strpos($name,'-') > -1 ? '-' : '');
//            if($sign == ''){
//                return $name;
//            } else {
//                $words = explode($sign, $name);
//                $title = '';
//                foreach ($words as $word){
//                    $title .= ucfirst($word);
//                }
//                return lcfirst($title);
//            }
//        }
//    }
if (!function_exists('setSubModSingularPlural')) {

    function setSubModSingularPlural($sub_mod)
    {
//        (1 letra) mañanas, detalles, vasos
//        (2 letras) sesiones,
        if(strpos($sub_mod,'_') > -1){
            $names = explode('_', $sub_mod);
        } else {
            $names = [$sub_mod];
        }
        $namesPlural = [];
        $namesSingular = [];
        $aVocales = ['a','o','e','i','u'];
        $aVocalesfuertes = ['a','e','o'];
        $aVocalesdebiles = ['i','u'];
        $aDiptongos = ['ua','au','ai','ia','ei','ie','oi','io','uo','ou'];
        // ********** si la tercera letra es un de estas se resta las dos ultimas letras osea 'es', ejemplo: sesiones  ***************
        $aConsonantes = ['b','c','d','f','g','h','j','k','l','m','n','ñ','p','q','r','s','t','v','w','x','y','z'];
        // ********** si la tercera letra es un de estas se resta la primera letra del final osea la 's', ejemplo: detalles ***************
        $aConsonantesEspeciales = ['l','n'];
        $englishWords = config_item('english_words');
        foreach ($names as $name) {
            $pos1 = strlen($name) - 5;
            $pos2 = strlen($name) - 4;
            $pos3 = strlen($name) - 3;
            $pos4 = strlen($name) - 2;
            $pos5 = strlen($name) - 1;
            $fifthLetter = substr($name, $pos1, 1);
            $fourthLetter = substr($name, $pos2, 1);
            $thirdLetter = substr($name, $pos3, 1);
            $secondLetter = substr($name, $pos4, 1);
            $firstLetter = substr($name, $pos5, 1);
//            $thirdIsConsonant = in_array($thirdLetter,$aVocales) ? false : true;
//            $bIsEspecial = in_array($secondLetter,$aVocalesEspeciales) ? true : false;

            // ******************************* words excepted in english ******************************
            foreach ($englishWords as $word){
                if(strpos($name,$word) > -1){
                    $namesPlural[] = $name;
                    $namesSingular[] = substr($name, 0, strlen($name) - 1);
                    $_sub_mod_s = count($namesSingular) > 1 ? implode('_', $namesSingular) : $namesSingular[0];
                    $_sub_mod_p = count($namesPlural) > 1 ? implode('_', $namesPlural) : $namesPlural[0];
                    return [$_sub_mod_s, $_sub_mod_p];
                }
            }
            // ******************************************************************************************

            if ($firstLetter == 's' ) {
                if (in_array($secondLetter,$aVocales)) {
                    if(in_array($thirdLetter,$aConsonantes)){
                        if(in_array($fifthLetter.$fourthLetter,$aDiptongos)){
                            $namesSingular[] = substr($name, 0, strlen($name) - 2);
                        } else {
                            if (in_array($secondLetter, $aVocalesdebiles)){
                                $namesSingular[] = substr($name, 0, strlen($name) - 2);
                            } else if(in_array($secondLetter, $aVocalesfuertes)){
                                $namesSingular[] = substr($name, 0, strlen($name) - 1);
                            }
                        }
                    } else if(in_array($thirdLetter,$aVocales)){
                        if(in_array($secondLetter,$aVocalesfuertes)){
                            $namesSingular[] = substr($name, 0, strlen($name) - 1);
                        } elseif (in_array($secondLetter,$aVocalesdebiles)){
                            $namesSingular[] = substr($name, 0, strlen($name) - 2);
                        }
                    }
                } else if(in_array($secondLetter,$aConsonantes)){
                    $namesSingular[] = substr($name, 0, strlen($name) - 1);
                } else {
                    $namesSingular[] = substr($name, 0, strlen($name) - 1);
                }
                $namesPlural[] = $name;
            } else {
                $namesSingular[] = $name;
                $namesPlural[] = $name . 's';
            }
        }
        $_sub_mod_s = count($namesSingular) > 1 ? implode('_', $namesSingular) : $namesSingular[0];
        $_sub_mod_p = count($namesPlural) > 1 ? implode('_', $namesPlural) : $namesPlural[0];

        return [$_sub_mod_s, $_sub_mod_p];
    }

}