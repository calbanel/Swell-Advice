<?php

namespace App\Form;

use App\Entity\Testimonials;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestimonialsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surferName', TextType::Class, ['label' => ' Votre nom'])
            ->add('date', DateTimeType::Class, ['label' => 'Date du jour'])
            ->add('duration', TimeType::Class, ['label' => 'Durée de la session'])
            ->add('spot', TextType::Class, ['label' => 'Spot'])
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
            ->add('swimmerNb', IntegerType::Class, ['label' => 'Nombre de nageurs'])
            ->add('fishingBoatNb', IntegerType::Class, ['label' => 'Nombre de bateaux de pêche'])
            ->add('leisureBoatNb', IntegerType::Class, ['label' => 'Nombre de bateaux de loisir'])
            ->add('sailingBoatNb', IntegerType::Class, ['label' => 'Nombre de voiliers'])
            ->add('others', IntegerType::Class, ['label' => 'Nombre d activité nautique'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Testimonials::class,
        ]);
    }
}
