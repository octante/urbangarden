<?php
/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urban\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class RegisterType
 */
class RegisterType extends AbstractType
{
    /**
     * Sets data class
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Urban\UserBundle\Entity\User',
        ));
    }

    /**
     * Buildform function
     *
     * @param FormBuilderInterface $builder the formBuilder
     * @param array                $options the options for this form
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->setMethod('POST')
            ->add('username', 'text', [
                'required' => true,
                'label' => false
            ])
            ->add('email', 'text', [
                'required' => true,
                'label' => false
            ])
            ->add('password', 'password', [
                'required' => true,
                'label' => false
            ])
            ->add('send', 'submit', [
                'label' => 'Enviar',
            ]);
    }
    /**
     * Return unique name for this form
     *
     * @return string
     */
    public function getName()
    {
        return 'urbangarden_user_form_type_register';
    }
}