<?php
/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Admin\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserProfileType extends AbstractType
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
            ->setAction('/admin/profile')
            ->add('email', 'email', [
                'required' => true,
                'label' => 'Email'
            ])
            ->add('send', 'submit', [
                'label' => 'Guardar'
            ]);
    }
    /**
     * Return unique name for this form
     *
     * @return string
     */
    public function getName()
    {
        return 'urbangarden_user_form_type_user_profile';
    }
}