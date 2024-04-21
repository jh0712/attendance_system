<?php

namespace App\Providers;

use Form;
use Html;
use Illuminate\Support\ServiceProvider;

class FormComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Simply Amazing Components
        Form::component(
            'formText',
            'collectives.forms.form_text',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formTextCaptcha',
            'collectives.forms.form_text_captcha',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formTextRow',
            'collectives.forms.form_text_row',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formOtp',
            'collectives.forms.form_otp',
            ['name', 'value' => null, 'label' => null, 'button_text' => null, 'refMobile' => '', 'refPrefix' => '', 'sendOtpUrl' => '', 'sendOtpMethod' => '', 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formHide',
            'collectives.forms.form_hide',
            ['name', 'value' => null, 'label' => null, 'attributes' => []]
        );

        Form::component(
            'formEmail',
            'collectives.forms.form_email',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formPassword',
            'collectives.forms.form_password',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formSelect',
            'collectives.forms.form_select',
            ['name', 'list' => [], 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formMulSelect',
            'collectives.forms.form_select',
            ['name', 'list' => [], 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formSelectIcon',
            'collectives.forms.form_select_icon',
            ['name', 'list' => [], 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formSelectRow',
            'collectives.forms.form_select_row',
            ['name', 'list' => [], 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formMobile',
            'collectives.forms.form_mobile',
            ['name', 'number_name', 'list' => [], 'value' => null, 'label' => null, 'labelContact' => null, 'number' => null, 'attributes' => [], 'isVerticalAligned' => true, 'required' => true]
        );

        Form::component(
            'formIntlMobile',
            'collectives.forms.form_intl_mobile',
            ['name', 'value' => null, 'number_name', 'number' => null, 'label' => null, 'attributes' => [], 'isVerticalAligned' => true, 'required' => true]
        );

        Form::component(
            'formCheckbox',
            'collectives.forms.form_checkbox',
            ['name', 'value' => null, 'checked' => false, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formCheckboxMulti',
            'collectives.forms.form_checkbox_multi',
            ['name', 'value' => null, 'checked' => false, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formRadio',
            'collectives.forms.form_radio',
            ['name', 'value' => null, 'label' => null, 'options' => [], 'attributes' => [], 'isVerticalAligned' => true, 'required' => true]
        );

        Form::component(
            'formTextArea',
            'collectives.forms.form_textarea',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formDate',
            'collectives.forms.form_date',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true, 'config' => null]
        );

        Form::component(
            'formTime',
            'collectives.forms.form_time',
            ['name', 'value' => null, 'type' => 'time', 'label' => null, 'attributes' => []]
        );

        Form::component(
            'formDateRange',
            'collectives.forms.form_date_range',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formLabel',
            'collectives.forms.form_label',
            ['label' => null, 'value' => null]
        );

        Form::component(
            'formFileUpload',
            'collectives.forms.form_file_upload',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formFileUploadRow',
            'collectives.forms.form_file_upload_row',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formFileReview',
            'collectives.forms.form_file_review',
            ['name', 'url', 'value' => null, 'label' => null, 'attributes' => []]
        );

        Form::component(
            'formFileReviewRow',
            'collectives.forms.form_file_review_row',
            ['name', 'url', 'value' => null, 'label' => null, 'attributes' => []]
        );

        Form::component(
            'formIcon',
            'collectives.forms.form_icon',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formUnit',
            'collectives.forms.form_unit',
            ['name', 'value' => null, 'label' => null, 'attributes' => [], 'required' => true]
        );

        Form::component(
            'formSubmitButton',
            'collectives.forms.form_submit_button',
            ['text' => __('a_portal.submit'), 'id' => null, 'class' => 'btn-lg', 'attributes' => []]
        );

        // Html customs builds
        HTML::component(
            'htmlDisplay',
            'collectives.html.html_display',
            ['label' => null, 'value' => null]
        );

        HTML::component(
            'htmlActiveMenu',
            'collectives.html.html_active_menu',
            ['route' => null, 'exclude' => null, 'class' => 'active']
        );

        HTML::component(
            'setLanguage',
            'components.html.set_language',
            ['languages' => [], 'current_language' => 'en']
        );
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
