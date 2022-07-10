<?php

namespace App\Form;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Autocomplete\Form\AsEntityAutocompleteField;
use Symfony\UX\Autocomplete\Form\ParentEntityAutocompleteType;

#[AsEntityAutocompleteField]
class UserAutocompleteField extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'class' => User::class,
            'placeholder' => 'Choisissez un stagiaire',
            'choice_label' => 'username',

           /* 'query_builder' => function(UserRepository $userRepository, $value=""){
                return $userRepository->searchUserByName($value);
            },*/
            //'query_builder' => function(UserRepository $userRepository) {
              //  return $userRepository->findByExampleField($val);
            //},
            'security' => 'ROLE_FORMAT',
        ]);
    }

    public function getParent(): string
    {
        return ParentEntityAutocompleteType::class;
    }
}
