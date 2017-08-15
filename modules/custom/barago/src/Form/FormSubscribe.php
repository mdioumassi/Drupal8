<?php
namespace Drupal\barago\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\FormStateInterface;

class FormSubscribe extends FormBase implements FormInterface{
    
    public function getFormId(): string {
        return 'subscribe_form';
    }
    
    public function buildForm(array $form, FormStateInterface $form_state): array {
        
        $form['nom']=array(
            '#type' => 'textfield',
            '#title' => $this->t('Nom du produit'),
            '#size' => 60,
            '#maxlength' => 128,
        );
        
        $form['prix'] = array(
          '#type' => 'number',
          '#title' => $this->t('Prix:'),
        );
        
        $form['description'] = array(
            '#type' => 'textarea',
            '#title' => $this->t('Description:'),
        );

        $form['categorie'] = array(
            '#type' => 'select',
            '#title' => $this->t('Catégorie:'),
            '#options' => [
              'fruit' => $this->t('Fruit'),
              'legume' => $this->t('Legume'),
            ],
        );

        $form['actions']['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Enregistrer'),
         );
        
        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
      drupal_set_message($this->t('Nom du produit @nom <br> le prix: @prix <br> Description @description <br>'
              . 'Categorie @categorie ', 
      array(
          '@nom' => $form_state->getValue('nom'),
          '@prix' => $form_state->getValue('prix'),
          '@description' => $form_state->getValue('description'),
          '@categorie' => $form_state->getValue('categorie')
      )));
    }
    
    public function validateForm(array &$form, FormStateInterface $form_state){
        if (is_numeric($form_state->getValue('nom'))) {
            $form_state->setErrorByName('name', $this->t('Le champ ne doit pas être numerique'));
        }
    }

}
