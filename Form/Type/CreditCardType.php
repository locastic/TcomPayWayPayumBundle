<?php

namespace Locastic\TcomPayWayPayumBundle\Form\Type;

use Locastic\TcomPayWayPayumBundle\Entity\CreditCard;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Payum\Core\Bridge\Symfony\Form\Type\CreditCardType as BaseCreditCardType;

class CreditCardType extends BaseCreditCardType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('lastName', 'text', array('label' => 'form.credit_card.last_name',))
            ->add('street', 'text', array('label' => 'form.credit_card.address',))
            ->add('city', 'text', array('label' => 'form.credit_card.city',))
            ->add('postCode', 'text', array('label' => 'form.credit_card.post_code',))
            ->add('country', 'country', array('label' => 'form.credit_card.country',))
            ->add('phoneNumber', 'text', array('required' => false, 'label' => 'form.credit_card.phone_number',))
            ->add('email', 'text', array('label' => 'form.credit_card.email',))
            ->add(
                'installments',
                'choice',
                array(
                    'label' => 'form.credit_card.installments',
                    'choices' => array(
                        1 => 1,
                        2 => 2,
                    ),
                )
            );
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => CreditCard::class,
                'validation_groups' => ['Locastic'],
                'label' => false,
                'translation_domain' => 'TcomPayWayPayumBundle',
            ])
        ;
    }
}