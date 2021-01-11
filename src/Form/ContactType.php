<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre nom'
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Votre téléphone',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre numéro de téléphone'
                ]
            ])
            ->add('email', TextType::class, [
                'label' => 'Votre mail',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre mail'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre message'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr'  => [
                    'class' => 'btn btn-dark btn-block'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
