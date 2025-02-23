<?php
// Yourtheme extension, https://github.com/datenstrom/yellow-example-theme

class YellowYourtheme {
    const VERSION = "0.9.1";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("theme" => "yourtheme"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("theme")=="yourtheme") {
            $this->yellow->system->save($fileName, array("theme" => $this->yellow->system->getDifferent("theme")));
        }
    }
}
