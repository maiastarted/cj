<?php
    
    class Imagem
    {
        
        private $IdImagem;
        private $IdGaleria;
        private $NomeImagem;
        private $Ordem;
        
        public function getIdGaleria()
        {
            return $this->IdGaleria;
        }
        
        public function setIdGaleria($IdGaleria)
        {
            $this->IdGaleria = $IdGaleria;
        }
        
        public function Passo1($files, $index)
        {
//            $fileTmp = $files['tmp_name'][$index];
//            $fileExtension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
//            $fileName = uniqid() . '.' . $fileExtension;
//            $fileDestination = $uploadDirectory . $fileName;
//
//            if (in_array($fileExtension, $allowedExtensions)) {
//                if (move_uploaded_file($fileTmp, $fileDestination)) {
//                    // Geração de miniaturas (videoclipes e imagens)
//                    $thumbnailPath = $thumbnailDirectory . 'thumb_' . $fileName;
//
//                    // Gerar miniaturas com base no tipo de arquivo
//                    if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
//                        // Gerar miniatura para imagem
//                        generateImageThumbnail($fileDestination, $thumbnailPath);
//                    } elseif (in_array($fileExtension, ['mp4', 'mov', 'avi'])) {
//                        // Gerar miniatura para vídeo
//                        generateVideoThumbnail($fileDestination, $thumbnailPath);
//                    }
//
//                    // Adiciona o caminho da miniatura à resposta
//                    $uploadedFiles[] = $thumbnailPath;
//                }
//            }
//
//
//            // Resposta
//            if (!empty($uploadedFiles)) {
//                $response['success'] = true;
//                $response['thumbnails'] = $uploadedFiles;
//            }
        }
        
       public function generateImageThumbnail($imagePath, $thumbnailPath) {
            list($width, $height) = getimagesize($imagePath);
            $newWidth = 200;
            $newHeight = 200;
            
            $image = imagecreatefromstring(file_get_contents($imagePath));
            $thumbnail = imagescale($image, $newWidth, $newHeight);
            
            imagejpeg($thumbnail, $thumbnailPath);
            imagedestroy($image);
            imagedestroy($thumbnail);
        }
    
    public function generateVideoThumbnail($videoPath, $thumbnailPath) {
            // Usar o ffmpeg para gerar uma miniatura de vídeo
            $command = "ffmpeg -i $videoPath -ss 00:00:01 -vframes 1 -s 200x200 $thumbnailPath";
            exec($command);
        }
        
        public
        function getNomeImagem()
        {
            return $this->NomeImagem;
        }
        
        public
        function setNomeImagem($NomeImagem)
        {
            $this->NomeImagem = $NomeImagem;
        }
        
        public
        function getIdImagem()
        {
            return $this->IdImagem;
        }
        
        public
        function setIdImagem($IdImagem)
        {
            $this->IdImagem = $IdImagem;
        }
        
        public
        function getOrdem()
        {
            return $this->Ordem;
        }
        
        public
        function setOrdem($Ordem)
        {
            $this->Ordem = $Ordem;
        }
        
        
    }