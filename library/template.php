<?php

/**
 * Template
 */
class Template {

    protected $variables = array();
    protected $controller;
    protected $action;

    public function __construct($controller, $action) {
        $this->controller = $controller;
        $this->action = $action;
    }

    /**
     * Sets a variable for use in the template
     * @param string $name
     * @param mixed $value
     */
    public function set($name, $value) {
        $this->variables[$name] = $value;
    }

    /**
     * Render the template
     * @param bool $render
     */
    public function render($render = true) {
        extract($this->variables);

        if ($render) {
            if (file_exists(ROOT . '/application/views/' . $this->controller . '/header.php')) {
                require ROOT . '/application/views/' . $this->controller . '/header.php';
            } else {
                require ROOT . '/application/views/header.php';
            }
        }

        if (file_exists(ROOT . '/application/views/' . $this->controller . '/' . $this->action . '.php')) {
            require ROOT . '/application/views/' . $this->controller . '/' . $this->action . '.php';
        }

        if ($render) {
            if (file_exists(ROOT . '/application/views/' . $this->controller . '/footer.php')) {
                require ROOT . '/application/views/' . $this->controller . '/footer.php';
            } else {
                require ROOT . '/application/views/footer.php';
            }
        }
    }

}
