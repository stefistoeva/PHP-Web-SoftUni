<?php
namespace Core;
class Template implements TemplateInterface
{
    const TEMPLATE_FOLDER = "App/Views/";
    const TEMPLATE_EXENSION = ".php";
    public function render(string $templateName, $data = null)
    {
        require_once self::TEMPLATE_FOLDER . $templateName . self::TEMPLATE_EXENSION;
    }

    public function redirect(string $url)
    {
        header("Location: $url");
    }
}
