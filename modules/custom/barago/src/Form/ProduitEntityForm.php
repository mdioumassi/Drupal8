<?php
namespace Drupal\barago\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslationInterface;


class ProduitEntityForm extends ContentEntityForm {
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form = parent::buildForm($form, $form_state);
        
        return $form;
    }
    
    public function save(array $form, FormStateInterface $form_state) {
        $entity = $this->getEntity();
        $entity->save();
        $form_state->setRedirect('entity.produit.collection');
    }
    
    public function setStringTranslation(TranslationInterface $translation) {
        $this->stringTranslation = $translation;

        return $this;
    }
}
