<?php
namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $randomNumber = random_int(11111,99999);
        $builder
            ->add('email', EmailType::class)
            ->add('name', TextType::class)
            ->add('surname', TextType::class)
            ->add('dateOfBirth', DateType::class, array('widget' => 'single_text', 'html5' => true))
            ->add('phoneNumber', TextType::class)
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password'],
            ])
            ->add('country', CountryType::class)
            ->add('tradingAccountNumber', HiddenType::class, array("attr" => array("value" => $randomNumber )))
        ;

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $e) {
            if (!$e->getData()) {
                // in create new mode
                $e->getForm()
                    ->add('address', TextType::class, ['data' => "Test Address"] )
                    ->add('country', TextType::class, ['data' => "1"] )
                    ->add('tradingAccountNumber', TextType::class, ['data' => rand(1111111111,9999999999)] )
                    ->add('balance', TextType::class, ['data' => rand(1111111111,9999999999)] )
                    ->add('openTrades', TextType::class, ['data' => rand(1111111111,9999999999)] )
                    ->add('closeTrades', TextType::class, ['data' => rand(1111111111,9999999999)] )
                    ;
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
