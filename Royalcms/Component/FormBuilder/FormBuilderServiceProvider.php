<?php namespace Royalcms\Component\FormBuilder;

use Royalcms\Component\Support\ServiceProvider;

class FormBuilderServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands('Royalcms\Component\FormBuilder\Console\FormMakeCommand');

        $this->registerFormHelper();

        $this->royalcms->singleton('form-builder', function ($royalcms) {

            return new FormBuilder($royalcms, $royalcms['form-helper']);
        });
    }

    protected function registerFormHelper()
    {
        $this->royalcms->singleton('form-helper', function ($royalcms) {

            $configuration = $royalcms['config']->get('form-builder::config');

            return new FormHelper($royalcms['view'], $royalcms['request'], $configuration);
        });

        $this->royalcms->alias('form-helper', 'Royalcms\Component\FormBuilder\FormHelper');
    }

    public function boot()
    {
        $this->package('royalcms/form-builder');
    }

    /**
     * @return string[]
     */
    public function provides()
    {
        return ['form-builder'];
    }
}
