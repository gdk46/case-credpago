<?php


class Mensage
{
    private static $msgbox;
       
    /**
     * Success Mensage
     *
     * @param sting $msg
     * @return sting
     */
    public static function sucesso($msg = null)
    {
        if($msg==null){
            $msg="Salvo com Sucesso!";
        }

       self::$msgbox = '
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
            '.$msg.'
        </div>';

       echo self::$msgbox;
    }



    /**
     * Erro Mensage
     *
     * @param sting $msg
     * @return sting
     */
    public static function erro($msg = null)
    {
        if($msg == null){
            $msg="Ocoreu um Erro!";
        }
       self::$msgbox = '
       <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Erro!</h5>
            '.$msg.'
        </div>';
       echo self::$msgbox;
    }
}
?>