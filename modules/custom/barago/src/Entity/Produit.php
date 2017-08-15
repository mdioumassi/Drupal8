<?php
namespace Drupal\barago\Entity;

use Drupal\barago\Entity\ProduitInterface;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the user entity class.
 *
 * @ContentEntityType(
 *   id = "produit",
 *   label = @Translation("Produit"),
 *   handlers = {
 *     "list_builder" = "Drupal\barago\ProduitListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider",
 *     },
 *     "form" = {
 *       "default" = "Drupal\barago\Form\ProduitEntityForm",
 *       "add" = "Drupal\barago\Form\ProduitEntityForm",
 *       "edit" = "Drupal\barago\Form\ProduitEntityForm",
 *       "delete" = "Drupal\barago\Form\ProduitDeleteForm"
 *     },
 *   },
 *   admin_permission = "administer user",
 *   base_table = "Produit",
 *   data_table = "produit_field_data",
 *   translatable = TRUE,
 *   entity_keys = {
 *     "id" = "produit_id",
 *     "langcode" = "langcode",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/produit/add",
 *     "canonical" = "/produit/{produit}",
 *     "edit-form" = "/produit/{produit}/edit",
 *     "delete-form" = "/admin/produit/{produit}/delete",
 *     "collection" = "/admin/produit",
 *   }
 * )
 */
class Produit extends ContentEntityBase implements ProduitInterface {
    public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
        $fields['produit_id'] = BaseFieldDefinition::create('integer')
            ->setLabel('Produit ID')
            ->setReadOnly(TRUE)
            ->setSetting('unsigned', TRUE);
        
        $fields['langcode'] = BaseFieldDefinition::create('language')
            ->setLabel('Language code');
        
        $fields['uuid'] = BaseFieldDefinition::create('uuid')
            ->setLabel(t('UUID'))
            ->setReadOnly(TRUE);
        
        //Champ nom
        $fields['nom'] = BaseFieldDefinition::create('string')
            ->setLabel(t('Nom'))
            ->setDescription(t('Le nom du produit'))
            ->setSettings(array(
              'default_value' => '',
              'max_length' => 255,
              'text_processing' => 0
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type'  => 'string',
                'weight'=> -4
            ))
             ->setDisplayOptions('form', array(
                'type'  => 'string',
                 'weight' => -4
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        
           //Champ PRIX
        $fields['prix'] = BaseFieldDefinition::create('float')
            ->setLabel(t('Prix'))
            ->setDescription(t('Le prix du produit'))

            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type'  => 'float',
                'weight' => -3
            ))
             ->setDisplayOptions('form', array(
                'type'  => 'float',
                 'weight' => -3
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        
           //Champ Description
        $fields['description'] = BaseFieldDefinition::create('text_long')
            ->setLabel(t('Description'))
            ->setDescription(t('La description du produit'))
            ->setSettings(array(
              'default_value' => '',
              'max_length' => 255,
              'text_processing' => 0,
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type'  => 'string',
                'weight' => -2
            ))
             ->setDisplayOptions('form', array(
                'type'  => 'string',
                 'weight' => -2
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        
        //Champ Categorie
        $fields['categorie'] = BaseFieldDefinition::create('list_string')
            ->setLabel(t('Categorie'))
            ->setDescription(t('The gender of the Contact entity.'))
            ->setSettings(array(
              'allowed_values' => array(
                'fruit' => 'fruit',
                'legume' => 'legume',
              ),
            ))
            ->setDisplayOptions('view', array(
              'label' => 'above',
              'type' => 'list_default',
              'weight' => -1,
            ))
            ->setDisplayOptions('form', array(
              'type' => 'options_select',
              'weight' => -1,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        
        //Entity Created
        $fields['created'] = BaseFieldDefinition::create('created')
            ->setLabel(t('Created'))
            ->setDescription(t('The time that the entity was created.'));
        
        //Entity Changed
        $fields['changed'] = BaseFieldDefinition::create('changed')
            ->setLabel(t('Changed'))
            ->setDescription(t('The time that the entity was last edited.'));
        
        return $fields;
    }

}
