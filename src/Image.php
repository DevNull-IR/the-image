<?php

namespace TheImage;

use \Exception;
use GdImage;
use JetBrains\PhpStorm\ArrayShape;

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
class Image
{
    protected string $image;
    protected bool $setImage = false;
    public bool $DebugMode = true;
    protected string $messageException = "Image Not set";
    protected bool $directionRTL = false;
    /**
     * @param string $image
     * @return Image
     */
    public function setImage(string $image): Image
    {
        $this->image = $image;
        $this->setImage = true;
        return $this;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getImage(): string
    {
        if ($this->isSetImage())
            return $this->image;

        throw new Exception($this->messageException);
    }

    /**
     * @return bool
     */
    public function isSetImage(): bool
    {
        return $this->setImage;
    }

    /**
     * @param bool $setImage
     * @return bool
     */
    protected function setSetImage(bool $setImage): bool
    {
        $this->setImage = $setImage;
        return $setImage;
    }

    /**
     * @return array|string
     * @throws Exception
     */
    public function getMetaData(): array|string
    {
        if ($this->isSetImage()){
            $exif = exif_read_data($this->image);
            if ($exif){
                return $exif;
            }
            $exif = getimagesize($this->getImage());

            return [
                "MimeType" => $exif['mime'],
                "FileName" => pathinfo($this->getImage(), PATHINFO_BASENAME),
                "FileSize" => filesize($this->getImage()),
                "FileDateTime" =>filemtime($this->getImage()),
                "COMPUTED" => [
                    "Width" => $exif[0],
                    "Height" => $exif[1],
                    "html" => $exif[3]
                ]
            ];
        }

        return $this->Exception($this->getMessageException());
    }

    /**
     * @return int|string
     * @throws Exception
     */
    public function getWith(): int|string
    {
        if ($this->isSetImage()){
            $get = $this->getMetaData();
            if(isset($get['COMPUTED']) and is_array($get['COMPUTED'])){
                $with = $get['COMPUTED']['Width'];
                if (isset($with) && is_integer($with)){
                    return $with;
                }
            }

            return $this->Exception("can connect to image and get with");

        }
        return $this->Exception($this->getMessageException());

    }

    /**
     * @return int|string
     * @throws Exception
     */
    public function getHeight(): int|string
    {
        if ($this->isSetImage()){
            $get = $this->getMetaData();
            if(isset($get['COMPUTED']) and is_array($get['COMPUTED'])){
                $Height = $get['COMPUTED']['Height'];
                if (isset($Height) && is_integer($Height)){
                    return $Height;
                }
            }

            return $this->Exception("can connect to image and get Height");

        }
        return $this->Exception($this->getMessageException());

    }

    /**
     * @return string
     * @throws Exception
     */
    public function getWithHeightHtml(): string
    {
        if ($this->isSetImage()){
            $get = $this->getMetaData();
            if(isset($get['COMPUTED']) and is_array($get['COMPUTED'])){
                $WithHeight = $get['COMPUTED']['html'];
                if (isset($WithHeight) && is_string($WithHeight)){
                    return $WithHeight;
                }
            }

            return $this->Exception("can connect to image and get With and Height");

        }
        return $this->Exception($this->getMessageException());

    }

    /**
     * @return string
     * @throws Exception
     */
    public function getName(): string
    {
        if ($this->isSetImage()){
            $get = $this->getMetaData();
            if(isset($get['FileName']) and is_string($get['FileName'])){
                return pathinfo($get['FileName'], 8);
            }

            return $this->Exception("can't connect to image and get name");

        }
        return $this->Exception($this->getMessageException());

    }

    /**
     * @return string
     * @throws Exception
     */
    public function getExtension(): string
    {
        if ($this->isSetImage()){
            $get = $this->getMetaData();
            if(isset($get['FileName']) and is_string($get['FileName'])){
                return pathinfo($get['FileName'], 4);
            }

            return $this->Exception("can't connect to image and get Extension");

        }
        return $this->Exception($this->getMessageException());

    }

    /**
     * @return string
     * @throws Exception
     */
    public function getMimeType(): string
    {
        if ($this->isSetImage()){
            $get = $this->getMetaData();
            if(isset($get['MimeType']) and is_string($get['MimeType'])){
                return ($get['MimeType']);
            }

            return $this->Exception("can't connect to image and get MimeType");

        }
        return $this->Exception($this->getMessageException());

    }

    /**
     * @return int|string
     * @throws Exception
     */
    public function getFileDateTime(): int|string
    {
        if ($this->isSetImage()){
            $get = $this->getMetaData();
            if(isset($get['FileDateTime']) and is_integer($get['FileDateTime'])){
                return ($get['FileDateTime']);
            }

            return $this->Exception("can't connect to image and get FileDateTime");

        }
        return $this->Exception($this->getMessageException());

    }

    /**
     * @return int|string
     * @throws Exception
     */
    public function getFileSize(): int|string
    {

        if ($this->isSetImage()){
            $get = $this->getMetaData();
            if(isset($get['FileSize']) and is_integer($get['FileSize'])){
                return ($get['FileSize']);
            }

            return $this->Exception("can't connect to image and get FileSize");

        }
        return $this->Exception($this->getMessageException());

    }

    /**
     * @param bool $DebugMode
     * @return Image
     */
    public function setDebugMode(bool $DebugMode = false): Image
    {
        $this->DebugMode = $DebugMode;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDebugMode(): bool
    {
        return $this->DebugMode;
    }

    /**
     * @return string
     */
    public function getMessageException(): string
    {
        return $this->messageException;
    }

    /**
     * @param string $messageException
     * @return Image
     */
    protected function setMessageException(string $messageException): Image
    {
        $this->messageException = $messageException;

        return $this;
    }

    /**
     * @param bool $directionRTL
     * @return Image
     */
    public function setDirectionRTL(bool $directionRTL): Image
    {
        $this->directionRTL = $directionRTL;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDirectionRTL(): bool
    {
        return $this->directionRTL;
    }

    /**
     * @param string $text
     * @param array $color
     * @param string $save
     * @param array $Options
     * @return bool|string
     * @throws Exception
     */
    public function printText(string $text, array $color, string $save, array $Options = []): bool|string
    {
        if (!$this->isSetImage()){
            return $this->Exception($this->getMessageException());
        }

        $im = $this->imageDump();

        $color = imagecolorallocate($im, $color[0], $color[1], $color[2]);

        extract($Options);

        if (!isset($Options['size']) or !is_integer($Options['size'])){
            $size = 20;
        }
        if (!isset($Options['angel']) or !is_integer($Options['angel'])){
            $angel = 0;
        }
        if (!isset($Options['y']) or !is_integer($Options['y'])){
            $y = 40;
        }
        if (!isset($Options['x']) or !is_integer($Options['x'])){
            $x = -80;
        }
        if (!isset($Options['font']) or empty($Options['font'])){
            $font = "verdana.ttf";
            if ($this->isDirectionRTL()){
                $font = "Shabnam.ttf";
            }
        }
        if ($this->isDirectionRTL()){
            $text = RTLRender::render($text, true);
            $dimensions = imagettfbbox($Options['size'], $Options['angel'], $Options['font'], $text);

            $textWidth = abs($dimensions[4] - $dimensions[0]);


            $x = imagesx($im) - $textWidth;
        }


        imagettftext($im, $size, $angel, $x, $y, $color, $font, $text);

        imagettftext($im, $size, $angel, $x, $y, $color, $font, $text);

        $Output = $this->saveImage($im, $save);

        imagedestroy($im);

        if ($Output)
            return true;
        else
            return false;
    }

    /**
     * @return GdImage|bool|string
     */

    private function imageDump(): GdImage|bool|string
    {
        if (!$this->isSetImage()){
            return $this->Exception($this->getMessageException());
        }
        if ($this->getExtension() == "png"){
            $im = imagecreatefrompng($this->getImage());
        }
        else if ($this->getExtension() == "jpeg"){
            $im = imagecreatefromjpeg($this->getImage());
        }
        else if ($this->getExtension() == "gif"){
            $im = imagecreatefromgif($this->getImage());
        }
        else if ($this->getExtension() == "bmp"){
            $im = imagecreatefrombmp($this->getImage());
        }
        else if ($this->getExtension() == "webp"){
            $im = imagecreatefromwebp($this->getImage());
        }
        else if ($this->getExtension() == "wbmp"){
            $im = imagecreatefromwbmp($this->getImage());
        }else{
            return $this->Exception("Not supported this file!");
        }

        return $im;
    }

    /**
     * @param GdImage $gdImage
     * @param string $save
     * @return bool|string
     */
    private function saveImage(GdImage $gdImage, string $save): bool|string
    {
        if (!$this->isSetImage()){
            return $this->Exception($this->getMessageException());
        }
        if ($this->getExtension() == "png"){
            $saved = imagepng($gdImage, $save . "/" . $this->getName()  .'.' . $this->getExtension());
        }
        else if ($this->getExtension() == "jpeg"){
            $saved = imagejpeg($gdImage, $save . "/" . $this->getName()  .'.' . $this->getExtension());
        }
        else if ($this->getExtension() == "gif"){
            $saved = imagegif($gdImage, $save . "/" . $this->getName()  .'.' . $this->getExtension());
        }
        else if ($this->getExtension() == "bmp"){
            $saved = imagebmp($gdImage, $save . "/" . $this->getName()  .'.' . $this->getExtension());
        }
        else if ($this->getExtension() == "webp"){
            $saved = imagewebp($gdImage, $save . "/" . $this->getName()  .'.' . $this->getExtension());
        }
        else if ($this->getExtension() == "wbmp"){
            $saved = imagewbmp($gdImage, $save . "/" . $this->getName()  .'.' . $this->getExtension());
        }else{
            return $this->Exception("Not supported this file!");
        }
        return $saved;
    }

    /**
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return int[]
     */
    public function setColorText(int $red = 0, int $green = 0, int $blue = 0): array
    {
        return [
            $red,
            $green,
            $blue
        ];
    }


    /**
     * @param int $size
     * @param string $font
     * @param int $x
     * @param int $y
     * @param int $angel
     * @return array
     */

    #[ArrayShape(["size" => "int", "font" => "string", "x" => "int", "y" => "int", "angel" => "int"])] public function setOptionPrint(int $size = 20, string $font = "verdana.ttf" , int $x = -80, int $y = 40, int $angel = 0): array
    {
        return [
            "size" => $size,
            "font" => $font,
            "x" => $x,
            "y"  => $y,
            "angel" => $angel
        ];
    }


    /**
     * @param string $DescriptionException
     * @param int $code
     * @return string
     * @throws Exception
     */
    private function Exception(string $DescriptionException, int $code = 0): string
    {
        if ($this->isDebugMode())
            throw new Exception($DescriptionException, 0);
        else
            return $DescriptionException;
    }
}