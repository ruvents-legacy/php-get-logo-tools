<?php

use Ruvents\GetLogoTools\Form\GetLogoType;
use Symfony\Component\Form\Test\TypeTestCase;

class GetLogoTypeTest extends TypeTestCase
{
    /**
     * @dataProvider getValidFormData
     */
    public function testSubmitValidData($formData, $expected)
    {

        $form = $this->factory->create(GetLogoType::class);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($expected, $form->getData());

        $view = $form->createView();

        $this->assertEquals($view->vars['value'], $formData);
    }

    public function getValidFormData()
    {
        return [
            ['http://getlogo.org/img/raec.fff/379/200x/', '/raec/379'],
            ['/raec/379', '/raec/379'],
            ['', null],
        ];
    }

    public function getInvalidFormData()
    {
        return [
            ['http://getlogo.org/379/200x', 'fdff'],
        ];
    }
}