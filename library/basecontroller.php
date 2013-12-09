<?php

/**
 * Base Controller
 */
abstract class BaseController {

    protected $controller;
    protected $action;
    protected $template;
    protected $model;

    /**
     * @var bool
     */
    public $render;

    /**
     * Pre Action
     */
    public function preAction() {
    }

    /**
     * Post Action
     */
    public function postAction() {
    }

    /**
     *
     * @param string $controller
     * @param string $action
     */
    public function __construct($controller, $action) {
        $model = ucfirst($controller) . 'Model';
        $this->controller = ucfirst($controller);
        $this->action = $action;
        $this->render = TRUE;
        $this->model = new $model;
        $this->template = new Template($controller, $action);
    }

    /**
     *
     */
    public function __destruct() {
        $this->template->render($this->render);
    }

    /**
     *
     * @param string $name
     * @param mixed $value
     */
    protected function set($name, $value) {
        $this->template->set($name, $value);
    }
}
