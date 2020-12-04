<?php

namespace App\Form;

use App\Entity\Testimonials;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestimonialsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surferName', ['label' => ' Votre nom'])
            ->add('date', ['label' => 'Date du jour'])
            ->add('duration',['label' => 'Durée de la session'])
            ->add('spot',['label' => 'Spot'])
            ->add('pollution', ChoiceType::class, [
                            'choices'  => [
                                'Creme solaire' => 'solar cream',
                                'Parfum' => 'perfume',
                                'Maquillage' => 'makeup',
                                'Essence' => 'gas',
                                'Cigarette' => 'cigaret',
                                'Pesticide' => 'pesticid',
                                'Peinture' => 'paint',
                                'Autre' => 'other',
                            ],
                            'expanded' => true,
                            'multiple' => true,
                            'label' => 'Type de pollutions'])
            ->add('swimmerNb',['label' => 'Nombre de nageurs'])
            ->add('fishingBoatNb',['label' => 'Nombre de bateaux de pêche'])
            ->add('leisureBoatNb',['label' => 'Nombre de bateaux de loisir'])
            ->add('sailingBoatNb',['label' => 'Nombre de voiliers'])
            ->add('others',['label' => 'Nombre d activité nautique'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Testimonials::class,
        ]);
    }
}
