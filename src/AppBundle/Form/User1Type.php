<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password'],
            ])
            ->add('name')
            ->add('surname')
            ->add('dateOfBirth')
            ->add('phoneNumber')
            ->add('address')
            ->add('country', CountryType::class)
            ->add('tradingAccountNumber')
            ->add('balance')
            ->add('openTrades')
            ->add('closeTrades')
            ->add('roles', ChoiceType::class, array(
                'attr'  =>  array('class' => 'form-control',
                'style' => 'margin:5px 0;'),
                'choices' => 
                array
                (
                    'ROLE_SUPER_ADMIN' => array
                    (
                        'Yes' => 'ROLE_SUPER_ADMIN'
                    ),
                    'ROLE_ADMIN' => array
                    (
                        'Yes' => 'ROLE_ADMIN',
                    ),
                    'ROLE_USER' => array
                    (
                        'Yes' => 'ROLE_USER'
                    )
                ) 
                ,
                'multiple' => true,
                'required' => true,
                )
            )
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
