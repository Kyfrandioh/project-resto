<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class,[
            "label"=>false
        ])
        ->add('prenom', TextType::class,[
            "label"=>false
        ])
        ->add('email', EmailType::class,[
            "label"=>false
        ])
        ->add('password', RepeatedType::class,[
            'type' => PasswordType::class,
            'invalid_message' => 'Le mots de passe et la confirmation doivent étre identique.',
            'label' => 'Votre mot de passe',
            'required' => true,
            'first_options'  => [
                'label' => 'Mot de passe',
                'attr' => [
                'class'=>'form-control',   
                ]
            ],
            
            
            'second_options' => [
                'label' => 'Confirmer votre mot de passe',
                'attr' => [
                    'class'=>'form-control',
                    
                ]
                
            ]
            
    ])
        
            ->add('submit', SubmitType::class, [
                'label' => "s'inscrire",
                'attr' => [
                    'class' => 'btn w-100 btn-lg mt-2 btn-primary',
                ]
                ]);
            
}

public function configureOptions(OptionsResolver $resolver): void
{

    $resolver->setDefaults([
       'data_class' => User::class,
    ]);
    
}
}
