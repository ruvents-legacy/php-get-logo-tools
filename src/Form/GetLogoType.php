<?php

namespace Ruvents\GetLogoTools\Form;

use Ruvents\GetLogoTools\GetLogo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class GetLogoType extends AbstractType implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer($this);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return TextType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'get_logo';
    }

    /**
     * {@inheritdoc}
     */
    public function transform($value)
    {
        return $value;
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($value)
    {
        if (preg_match('~^/\w+/\d+$~',$value)) {
            return $value;
        }

        try {
            return GetLogo::parse($value)['id'];
        } catch (\InvalidArgumentException $exception) {
            throw new TransformationFailedException($exception->getMessage());
        }
    }
}
