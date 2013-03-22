<?php

class Orden_Form_Crear extends Zend_Form
{

    public function init()
    {
		// Dojo-enable the form:
        Zend_Dojo::enableForm($this);

		$this->setAction('/st_rep/st/public/orden/crear/post')->setMethod('post');

		$this->setAttrib('class', 'Orden_this');

		$centros = new Zend_Db_Table('centrosservicio');
        $rows = $centros->fetchAll(
        	$centros->select()->where("Activo=1")->where("Externo=0")->order('NombreCentro')
        	)->toArray();
        $select= array();
		foreach ($rows as $rowArray) {
			$select[$rowArray['CodCentro']]=$rowArray['NombreCentro'];
		}
		$group = new Zend_Form_Element_Select('origen');
		$group->setLabel('Origen');
		$group->setMultiOptions($select);
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		

		$operadoras = new Zend_Db_Table('operadoras');
        $rows = $operadoras->fetchAll(
        	$operadoras->select()->order('NombreOperadora')
        	)->toArray();
        $select= array();
		foreach ($rows as $rowArray) {
			$select[$rowArray['CodOperadora']]=$rowArray['NombreOperadora'];
		}
		$group = new Zend_Form_Element_Select('operadora');
		$group->setMultiOptions($select);
		$group->setLabel('Operadora');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Text('cliente');

		$group->setLabel('Cliente');	
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);

		$this->addDisplayGroup(array('origen', 'operadora','cliente'), 'datosi', array("legend" => "Datos Iniciales"));

		$this
			->datosi
			->setDecorators(array(
	               'FormElements',
	               array(array('data'=>'HtmlTag'),array('tag'=>'table')),
	               'Fieldset'
	        ));

		$marcas = new Zend_Db_Table('marcas');
        $rows = $marcas->fetchAll(
        	$marcas->select()->order('NombreMarca')
        	)->toArray();
        $select= array();
        $select[0]='(Seleccione una marca)';
		foreach ($rows as $rowArray) {
			$select[$rowArray['CodMarca']]=$rowArray['NombreMarca'];
		}

		$group = new Zend_Form_Element_Select('marca');
		$group->setLabel('Marca');
		$group->setMultiOptions($select);
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_hidden('tecnologiahidden');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);

		$datosequipo=$this->addDisplayGroup(array('marca','tecnologiahidden'), 'espcequip', array("legend" => "Especificaciones del Equipo"));		

		$this
			->espcequip
			->setDecorators(array(
	               'FormElements',
	               array(array('data'=>'HtmlTag'),array('tag'=>'table')),
	               //array(array('data'=>'HtmlTag'),array('tag'=>'table')),
	               //array('legend',array('tag'=>'table')),
	               'Fieldset'
	        ));
		
		$group = new Zend_Form_Element_Text('orden_externa');
		$group->setLabel('Orden Externa');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Text('fecha_orden_externa');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Select('tipo_ingreso');
		$group->setLabel('Tipo de Ingreso');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Text('imei1');
		$group->setLabel('Serial 1');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Text('imei2');
		$group->setLabel('Serial 2');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Text('imei3');
		$group->setLabel('Serial 3');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Text('imei4');
		$group->setLabel('Serial 4');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Text('imei5');
		$group->setLabel('Serial 5');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);

		//$this->addDisplayGroup(array('imei1', 'imei2','imei3','imei4', 'imei5'), 'seriales', array("legend" => "Seriales"));
		
		$group = new Zend_Form_Element_Text('sintoma');
		$group->setLabel('Sintoma');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Text('condiciones');
		$group->setLabel('Condiciones');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Text('garantia');
		$group->setLabel('Garantia');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);

		$datosequipo=$this->addDisplayGroup(array('orden_externa','fecha_orden_externa'
		,'tipo_ingreso','sintoma', 'condiciones','garantia','seriales','imei1', 'imei2','imei3','imei4', 'imei5'), 'datosequip', array("legend" => "Datos del Equipo"));		

		$this
			->datosequip
			->setDecorators(array(
	               'FormElements',
	               array(array('data'=>'HtmlTag'),array('tag'=>'table')),
	               //array(array('data'=>'HtmlTag'),array('tag'=>'table')),
	               //array('legend',array('tag'=>'table')),
	               'Fieldset'
	        ));
		
		$group = new Zend_Form_Element_Checkbox('taller_externo');
		$group->setLabel('El equipo proviene de un taller externo');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$marcas = new Zend_Db_Table('centrosservicio');
        $rows = $marcas->fetchAll(
        	$marcas->select()->where('Externo=1')->order('NombreCentro')
        	)->toArray();
        $select= array();
		foreach ($rows as $rowArray) {
			$select[$rowArray['CodCentro']]=$rowArray['NombreCentro'];
		}

		$group = new Zend_Form_Element_Select('talleres');
		$group->setMultiOptions($select);
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Checkbox('solo_accesorios');
		$group->setLabel('Orden de solo accesorios');
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);
		
		$group = new Zend_Form_Element_Text('imprimir_etiqueta');
		$group->setLabel('Imprimir etiqueta');		
		$group->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->addElement($group);

		$this->addDisplayGroup(array('taller_externo', 'talleres','solo_accesorios','imprimir_etiqueta'), 'acc', array("legend" => "Accesorios Asociados"));
		
		$this
			->acc
			->setDecorators(array(
	               'FormElements',
	               array(array('data'=>'HtmlTag'),array('tag'=>'table')),
	               'Fieldset'
	        ));
		$submit = new Zend_Form_Element_Submit('submit');
		$this->addElement($submit);
		$submit->setLabel('Registrar Orden');
		$this->submit->setValue("Registrar Orden");	 
	}

	/**
   * After post, pre validation hook
   *
   * Finds all fields where name includes 'newName' and uses addNewField to add
   * them to the form object
   *
   * @param array $data $_GET or $_POST
   */
  public function preValidation(array $data) { 
    // array_filter callback
    function findFields($field) {
      // return field names that include 'newName'
		if (strpos($field, 'tecnologia') !== false) {   
			return $field;
		}
		if (strpos($field, 'modelo') !== false) {  
			return $field;
		}
		if (strpos($field, 'color') !== false) {
			return $field;
		}
    }
   
    // Search $data for dynamically added fields using findFields callback
    $newFields = array_filter(array_keys($data), 'findFields');
    foreach ($newFields as $fieldName) {
      // strip the id number off of the field name and use it to set new order
		if (strpos($fieldName, 'tecnologia') !== false && strcmp($fieldName, 'tecnologiahidden')!=0) {
			$this->addtecnologia($data[$fieldName],$data['marca']);
		}else if (strpos($fieldName, 'modelo') !== false) {
			$this->addmodelo($data[$fieldName],$data['marca'],$data['tecnologia']);
		}else if (strpos($fieldName, 'color') !== false) {
			$this->addcolor($data[$fieldName],$data['modelo']);
		}
    }
  }
 
  /**
   * Adds new fields to form
   *
   * @param string $name
   * @param string $value
   * @param int    $order
   */
  public function addtecnologia($value,$marca) {
  		$centros = new Zend_Db_Table('tecnologias');
        $rows = $centros->fetchAll(
				$centros->select()->from(array("t" => "tecnologias"), array("t.CodTecnologia","t.NombreTecnologia"))
                                 ->join(array('mt' => "marcas_tecnologias"),"t.CodTecnologia = mt.CodTecnologia",array())
                                 ->where("t.CodTecnologia in (select mt.CodTecnologia from marcas_tecnologias where mt.CodMarca=$marca)")
                                 ->order('t.NombreTecnologia asc')
        	)->toArray();
        //creo el arreglo de options
        $select= array();
        $select[0]='(Seleccione una tecnologia)';
		foreach ($rows as $rowArray) {
			$select[$rowArray['CodTecnologia']]=$rowArray['NombreTecnologia'];
		}
		$element = new Zend_Form_Element_Select("tecnologia");
		$element->setRequired(true)->setLabel('Tecnologia');
		$element->setMultiOptions($select);
		$element->setValue($value);
		$element->setAttrib('onChange','
          ajaxModeloField();');
		$element->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->espcequip->addElement($element);
  }

  public function addmodelo($value, $marca,$tecnologia) {
  		$centros = new Zend_Db_Table('modelos');
        $rows = $centros->fetchAll(
				$centros->select()->from(array("m" => "modelos"), array("m.CodModelo","m.NombreModelo"))
                                 ->where("CodMarca=".$marca)
                                 ->where("CodTecnologia=".$tecnologia)
                                 ->order('m.NombreModelo asc')
        	)->toArray();
        //creo el arreglo de options
        $select= array();
        $select[0]='(Seleccione una modelo)';
		foreach ($rows as $rowArray) {
			$select[$rowArray['CodModelo']]=$rowArray['NombreModelo'];
		}
		$element = new Zend_Form_Element_Select("modelo");
		$element->setRequired(true)->setLabel('Modelo');
		$element->setMultiOptions($select);
		$element->setValue($value);
		$element->setAttrib('onChange','
          ajaxColorField();');
		$element->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->espcequip->addElement($element);
  }

  public function addcolor($value, $modelo) {
  	$centros = new Zend_Db_Table('colores');
        //$modelo = 1;//$this->_getParam('CodModelo', null);
        $rows = $centros->fetchAll(
				$centros->select()->from(array("c" => "colores"), array("c.CodColor","c.NombreColor"))
                                 ->join(array('mc' => "modelos_colores"),"c.CodColor = mc.CodColor",array())
                                 ->where("c.CodColor in (select mc.CodColor from modelos_colores where mc.CodModelo=$modelo)")
                                 ->order('c.NombreColor asc')
        	)->toArray();
        //creo el arreglo de options
        $select= array();
        $select[0]='(Seleccione una Color)';
		foreach ($rows as $rowArray) {
			$select[$rowArray['CodColor']]=$rowArray['NombreColor'];
		}
    	$element = new Zend_Form_Element_Select("color");
		$element->setRequired(true)->setLabel('Color');
		$element->setMultiOptions($select);
		$element->setValue($value);
		$element->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
           ));
		$this->espcequip->addElement($element);
  }
}

