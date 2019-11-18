<?php


namespace yasmf;


class View
{
    private $relativePath;
    private $viewParams = array();

    public function __construct($relativePath)
    {
        $this->relativePath = $relativePath;
    }

    public function setVar($key, $value)
    {
        $this->viewParams[$key] = $value;
        return $this;
    }

    /**
     * @return false|string
     */
    public function render()
    {
        ob_start();
        extract($this->viewParams);
        require_once $_SERVER['DOCUMENT_ROOT'] . "/$this->relativePath.php";
    }

}