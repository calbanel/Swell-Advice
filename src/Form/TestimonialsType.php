<?php

namespace App\Form;

use App\Entity\Testimonials;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestimonialsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surferName')
            ->add('date')
            ->add('duration')
            ->add('spot')
            ->add('pollution', ChoiceType::class, [
                            'choices'  => [
                                'Solar cream' => 'solar cream',
                                'Perfume' => 'perfume',
                                'Makeup' => 'makeup',
                                'Gas' => 'gas',
                                'Cigaret' => 'cigaret',
                                'Pesticid' => 'pesticid',
                                'Paint' => 'paint',
                                'Other' => 'other',
                            ],
                            'expanded' => true,
                            'multiple' => true])
            ->add('swimmerNb')
            ->add('fishingBoatNb')
            ->add('leisureBoatNb')
            ->add('sailingBoatNb')
            ->add('others')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Testimonials::class,
        ]);
    }
}
