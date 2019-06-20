<?php
namespace Core;


interface TemplateInterface
{
    public function render(string $templateName, $data = null);
    public function redirect(string $url);
}