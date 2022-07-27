<?php

namespace App\Form;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Autocomplete\Form\AsEntityAutocompleteField;
use Symfony\UX\Autocomplete\Form\ParentEntityAutocompleteType;

#[AsEntityAutocompleteField]
class UserRoleAutocomplete extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'class' => User::class,
            'placeholder' => 'Choisissez un nom dans la liste',
            'choice_label' => 'username',
            'query_builder' => function(UserRepository $userRepository) {
                return $userRepository->createQueryBuilder('u')
                                        ->where('u.roles NOT LIKE :roles')
                                        ->setParameter('roles', '%ROLE_PERSO%');
                                        
            },
            'autocomplete_url' => 'https://127.0.0.1:8000/autocomplete/user_role_autocomplete?query=lu',
            'security' => 'ROLE_ADMIN',
        ]);
    }

    public function getParent(): string
    {
        return ParentEntityAutocompleteType::class;
    }
}
