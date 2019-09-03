<?php namespace  Royalcms\Component\FormBuilder\Fields;

class SelectType extends FormField
{

    protected $valueProperty = 'selected';

    protected function getTemplate()
    {
        return 'select';
    }

    public function getDefaults()
    {
        return [
            'choices' => [],
            'empty_value' => null,
            'selected' => null
        ];
    }
}
