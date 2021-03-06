<?php

namespace GooGee\Entity\Generator;


class Form
{
    public $fileName;
    public $filePath;
    public $method;
    public $instance;
    public $fieldList;

    function __construct($table)
    {
        $form = $table->form;
        $this->fileName = $form->name . '.html';
        $this->filePath = $form->path;

        $this->method = $form->method;
        $this->instance = $form->_instance;
        $this->fieldList = $form->field->list;
    }

    public function save()
    {
        $form = $this;
        $view = view('template::form', compact('form'));

        $file = new File($this->fileName, $this->filePath);
        $file->save($view->render());
    }

}