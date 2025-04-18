<?php

  class Check {

    private static $Data;
    private static $Format;

    /**
     * Verifica E-mail:\' Executa validação de formato de e-mail. Se for um email válido retorna true, ou retorna false.
      //  * @param STRING $Email = Uma conta de e-mail
      //  * @return BOOL = True para um email válido, ou false
     */
    public static function Email($Email) {
      self::$Data = (string) $Email;
      self::$Format = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';
      if (preg_match(self::$Format, self::$Data)):
        return true;
      else:
        return false;
      endif;
    }

    /**
     * Tranforma URL:\' Tranforma uma string no formato de URL amigável e retorna o a string convertida!
      //  * @param STRING $Name = Uma string qualquer
      //  * @return STRING = $Data = Uma URL amigável válida
     */
    public static function Name($Name) {
      self::$Format = array();
      self::$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
      self::$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';
      self::$Data = strtr(utf8_decode($Name), utf8_decode(self::$Format['a']), self::$Format['b']);
      self::$Data = strip_tags(trim(self::$Data));
      self::$Data = str_replace(' ', '-', self::$Data);
      self::$Data = str_replace(array('-----', '----', '---', '--'), '-', self::$Data);
      return strtolower(utf8_encode(self::$Data));
    }

    /**
      //  * \'Tranforma Data:\' Transforma uma data no formato DD/MM/YY em uma data no formato DATE do Mysql!
      //  * @param STRING $Name = Data em (d/m/Y) ou (d/m/Y H:i:s)
      //  * @return STRING = $Data = Data no formato timestamp!
     */
    public static function Data($Data) {
      self::$Data = explode('/', $Data);
      self::$Data = self::$Data[2] . '-' . self::$Data[0] . '-' . self::$Data[1];
      return self::$Data;
    }

    /**
      //  * \'Limita os Palavras:\' Limita a quantidade de palavras a serem exibidas em uma string!
      //  * @param STRING $String = Uma string qualquer
      //  * @return INT = $Limite = String limitada pelo $Limite
     */
    public static function Words($String, $Limite, $Pointer = null) {
      self::$Data = strip_tags(trim($String));
      self::$Format = (int) $Limite;
      $ArrWords = explode(' ', self::$Data);
      $NumWords = count($ArrWords);
      $NewWords = implode(' ', array_slice($ArrWords, 0, self::$Format));
      $Pointer = (empty($Pointer) ? '...' : ' ' . $Pointer);
      $Result = (self::$Format < $NumWords ? $NewWords . $Pointer : self::$Data);
      return $Result;
    }

    /**
      //  * \'Oter categoria:\' Informe o name (url) de uma categoria para obter o ID da mesma.
      //  * @param STRING $category_name = URL da categoria
      //  * @return INT $category_id = id da categoria informada
     */
    public static function CatByName($CategoryName) {
      $read = new Read;
      $read->ExeRead('ws_categories', "WHERE category_name = :name", "name={$CategoryName}");
      if ($read->getRowCount()):
        return $read->getResult()[0]['category_id'];
      else:
        echo "A categoria {$CategoryName} não foi encontrada!";
        die;
      endif;
    }

    /**
     * \'Usuários Online:\' Ao executar este HELPER, ele automaticamente deleta os usuários expirados. Logo depois
     * executa um READ para obter quantos usuários estão realmente online no momento!
      //  * @return INT = Qtd de usuários online
     */
    public static function UserOnline() {
      $now = date('Y-m-d H:i:s');
      $deleteUserOnline = new Delete;
      $deleteUserOnline->ExeDelete('ws_siteviews_online', "WHERE online_endview < :now", "now={$now}");
      $readUserOnline = new Read;
      $readUserOnline->ExeRead('ws_siteviews_online');
      return $readUserOnline->getRowCount();
    }

    /**
     * \'Imagem Upload:\' Ao executar este HELPER, ele automaticamente verifica a existencia da imagem na pasta
     * uploads. Se existir retorna a imagem redimensionada!
      //  * @return HTML = imagem redimencionada!
     */
    public static function Image($ImageUrl, $ImageDesc = null, $ImageW = null, $ImageH = null) {
      self::$Data = $ImageUrl;
      if (file_exists(self::$Data) && !is_dir(self::$Data)):
        $imagem = self::$Data;
        return "<img class=\"img-responsive\" src=\"{$imagem}\" alt=\"{$ImageDesc}\" title=\"{$ImageDesc}\" style=\"height: {$ImageH}px\">";
      else:
        $imagem = PATH_FOTO_MEDIA . "/nopicture.png";
        return "<img class=\"img-responsive\" src=\"{$imagem}\" alt=\"{$ImageDesc}\" title=\"{$ImageDesc}\">";
      endif;
    }

    public static function ImageUserAvatar($ImageUrl, $ImageDesc = null) {
      self::$Data = $ImageUrl;
      if (file_exists(self::$Data) && !is_dir(self::$Data)):
        $imagem = self::$Data;
        return "<img class=\"img-thumbnail\" src=\"{$imagem}\" alt=\"{$ImageDesc}\" title=\"{$ImageDesc}\">";
      else:
//            $imagem = PATH_FOTO_MEDIA."nopicture.png";
//           return "<img class=\"img-thumbnail\" src=\"{$imagem}\" alt=\"{$ImageDesc}\" title=\"{$ImageDesc}\">";
      endif;
    }

    public static function ImageUserAvatarMini($ImageUrl, $ImageDesc = null) {
      self::$Data = $ImageUrl;
      if (file_exists(self::$Data) && !is_dir(self::$Data)):
        $imagem = self::$Data;
        return "<img class='user-image' src='{$img}' alt='{$ImageDesc}'  style='height: 240px'
                        title='{$ImageDesc}'>";
      else:
        $imagem = PATH_FOTO_MEDIA . "nopicture.png";
        return "<img class=\"user-image\" src=\"{$imagem}\" alt=\"{$ImageDesc}\" style='height: 200px' title=\"{$ImageDesc}\">";
      endif;
    }

    public static function ImageUserAvatarMicro($ImageUrl, $id_iusu, $ImageDesc = null) {
      $img = PATH_FOTO_MEDIA;
      $img .= $id_iusu . '/';
      $img .= $ImageUrl;
      return "<img class='user-image imagem-arredondada2' src='{$img}' alt='{$ImageDesc}' 
        style='height: 30px; width:30px;' title='{$ImageDesc}' >";
    }
  }
