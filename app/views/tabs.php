<?php

$req = $_SERVER["REQUEST_URI"];

class TabBar {
    private $tabs = [];
    private $activeTab = null;

    public function __construct(array $tabs)
    {        
        $this->tabs = $tabs;
        $this->activeTab = $tabs[0];
    }

    private function build_tab_bar(): string {
        $out = '<div class="tab-bar" role="tablist">';
        
        foreach ($this->tabs as $tab) {
            $isActive = ($tab === $this->activeTab);
            $class = $isActive ? 'class="selected"' : "";
            $selected = $isActive ? 'aria-selected="true"' : 'aria-selected="false"';

            $out .= sprintf(
                '<button hx-get="%s" %s role="tab" %s aria-controls="tab-content">%s</button>',
                htmlspecialchars($tab->getLocation()),
                $class,
                $selected,
                htmlspecialchars($tab->getName())
            );
        }

        $out .= "</div>";

        return $out;
    }

    private function build_tab_content(): string {
        $out = '<div id="tab-content" role="tabpanel" class="tab-content">';

        if ($this->activeTab) {
            $out .= $this->activeTab->getValue();
        }

        $out .= "</div>";

        return $out;
    }

    public function build(): string {
        return $this->build_tab_bar() . $this->build_tab_content();
    }

    public function getTabs(): array
    {
        return $this->tabs;
    }

    public function getActiveTab(): Tab
    {
        return $this->activeTab;
    }

    public function setEnabled(Tab $tabEnable): void
    {
        foreach ($this->tabs as $tab) {
            if ($tab === $tabEnable) {
                $this->activeTab = $tabEnable;
                break;
            }
        }
    }
}

class Tab {
    private string $name;
    private string $location;
    private string $value;

    public function __construct(string $name, string $location, string $value)
    {
        $this->name = $name;
        $this->location = $location;
        $this->value = $value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

$language = new Tab("Language", "/language", "test");
$code = new Tab("Code", "/code", "tset");

$tabs = new TabBar([$language, $code]);

if (str_contains($req, "/language")) {
    $tabs->setEnabled($language);
} elseif (str_contains($req, "/code")) {
    $tabs->setEnabled($code);
} else {
    $tabs->setEnabled($language);
}


?>

    <?= $tabs->build() ?>
