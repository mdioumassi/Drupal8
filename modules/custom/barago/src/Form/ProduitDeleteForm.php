<?php
namespace Drupal\barago\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;


class ProduitDeleteForm extends ContentEntityConfirmFormBase {

    public function submitForm(array &$form, FormStateInterface $form_state) {
        $entity = $this->getEntity();
        $entity->delete();
        \Drupal::logger('produit')->notice('@type: deleted $title.', array(
            '$title' => $this->entity->label()
        ));
        $form_state->setRedirect('entity.produit.collection');
    }

    public function getCancelUrl(): Url {
        return new Url('entity.produit.collection');
    }

    public function getQuestion(): string {
          return $this->t('Ete vous sure de pouvoir supprimer @name?', array(
            '@name' => $this->entity->label()
        ));
    }
}
