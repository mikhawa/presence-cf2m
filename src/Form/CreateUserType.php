<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        $builder
            ->add('username', TextType::class)
            ->add('roles', ChoiceType::class, [
                "label"                     => "Rôles",
                "choices"                   => [
                    "user"      => "ROLE_USER",
                    "personel"  => "ROLE_PERSO",
                    "formateur" => "ROLE_FORMAT",
                    "encodeur"  => "ROLE_ENCODE",
                    "pédagogue" => "ROLE_PEDAGO",
                    "admin"     => "ROLE_ADMIN",
                ],
                'choice_translation_domain' => 'user',
                'multiple'                  => true,
                'expanded'                  => true,
                'required'                  => true,
            ])
            ->add('password', TextType::class)
            ->add('thename', TextType::class)
            ->add('thesurname', TextType::class)
            ->add('themail', EmailType::class)
            ->add("register", SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver) : void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
