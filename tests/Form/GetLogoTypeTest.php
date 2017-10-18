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

        $this->assertEquals($expected, $form->getData());

        $view = $form->createView();

        $this->assertEquals($view->vars['value'], $formData);
    }

    public function getValidFormData()
    {
        return [
            ['http://getlogo.org/img/raec.fff/379/200x/', '/raec.fff/379'],
            ['/raec/379', '/raec/379'],
            ['/np-mks/1119', '/np-mks/1119'],
            ['', null],
        ];
    }
}
